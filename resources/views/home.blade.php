 {{-- <?php
 //  function shorten_title($title, $max_length = 25)
 //  {
 //      $words = explode(' ', $title);
 //      $shortened_words = array_slice($words, 0, $max_length - 3);

 //      if (count($words) > $max_length - 3) {
 //          $shortened_words[] = '...';
 //      }

 //      return implode(' ', $shortened_words);
 //  }
 ?> --}}

 <!DOCTYPE html>
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     @vite(['resources/css/app.css', 'resources/js/app.js'])
     <title>Laravel</title>

     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700;800;900&display=swap"
         rel="stylesheet">

 </head>

 <body class="antialiased">

     <div
         class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
         @if (Route::has('login'))
             <div class="sm:fixed flex gap-4 sm:top-0 sm:right-0 p-6 text-right z-10">
                 @auth
                     <a href="{{ url('/dashboard') }}"
                         class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                     <x-logout-component />
                 @else
                     <a href="{{ route('login') }}"
                         class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                         in</a>

                     @if (Route::has('register'))
                         <a href="{{ route('register') }}"
                             class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                     @endif
                 @endauth
             </div>
         @endif

         <div class="max-w-7xl mx-auto p-6 lg:p-8">

             <div class="mt-16">
                 <div>
                     @if (session()->has('success'))
                         <div id="successAlert"
                             class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                             role="alert">
                             <span class="font-medium"> {{ session('success') }}</span>
                         </div>
                     @endif
                 </div>
                 <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">

                     @foreach ($announcements as $announce)
                         <div
                             class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                             <div>
                                 <div
                                     class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                         <path stroke-linecap="round" stroke-linejoin="round"
                                             d="M6.115 5.19l.319 1.913A6 6 0 008.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 002.288-4.042 1.087 1.087 0 00-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 01-.98-.314l-.295-.295a1.125 1.125 0 010-1.591l.13-.132a1.125 1.125 0 011.3-.21l.603.302a.809.809 0 001.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 001.528-1.732l.146-.292M6.115 5.19A9 9 0 1017.18 4.64M6.115 5.19A8.965 8.965 0 0112 3c1.929 0 3.716.607 5.18 1.64" />
                                     </svg>


                                     @if ($announce->company->getFirstMediaUrl('logos', 'thumbs'))
                                         <img src="{{ $announce->company->getFirstMediaUrl('logos', 'thumbs') }}" />
                                     @else
                                         <p>No logo available.</p>
                                     @endif
                                 </div>

                                 <p class="mt-6 font-medium text-gray-500">{{ $announce->company->name }}</p>

                                 <p class="mt-6 font-semibold text-gray-500">Degree of Matching:
                                     {{ number_format($announce->percentageSharedSkills, 2) }} %</p>

                                 <h2 class="mt-6 text-xl font-bold text-gray-900 dark:text-white">
                                     {{ $announce->title }}</h2>

                                 <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                     {{ $announce->description }}

                                 </p>

                                 <div class="mt-7">
                                     <form action="{{ route('announcements.apply') }}" method="POST">
                                         @csrf
                                         @method('post')

                                         <input type="hidden" name="announce_id" value="{{ $announce->id }}" />
                                         <button
                                             class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-br from-red-400 to-red-600 rounded-lg shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform"
                                             type="submit" onclick="return confirm('Are tou sure?')"
                                             class="btn btn-danger">

                                             <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                 viewBox="0 0 24 24" style="fill: rgb(255, 255, 255)">
                                                 <path d="M19 11h-6V5h-2v6H5v2h6v6h2v-6h6z"></path>
                                             </svg>
                                             Apply
                                         </button>
                                     </form>
                                 </div>
                             </div>
                         </div>
                     @endforeach
                 </div>
             </div>
         </div>
     </div>
 </body>
 <script>
     let successAlert = document.getElementById("successAlert");

     if (successAlert) {
         setTimeout(() => {
             successAlert.classList.add("hidden");
         }, 3000);
     }
 </script>

 </html>
