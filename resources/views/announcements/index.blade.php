@extends('layouts.app')

@section('content')
    <?php
    function shorten_title($title, $max_length = 25)
    {
        $words = explode(' ', $title);
        $shortened_words = array_slice($words, 0, $max_length - 3);

        if (count($words) > $max_length - 3) {
            $shortened_words[] = '...';
        }

        return implode(' ', $shortened_words);
    }
    ?>

    <div>
        @if (session()->has('success'))
            <div id="successAlert"
                class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium"> {{ session('success') }}</span>
            </div>
        @endif
    </div>
    <div class="overflow-x-auto  rounded-2xl">
        <div class="inline-block min-w-full align-middle">

            @include('announcements.partials.add-announce-button')


            <div class="overflow-hidden shadow-lg">
                <table class="min-w-full divide-y divide-gray-200 table-fixed">
                    <thead class="bg-white">
                        <tr>
                            <th scope="col"
                                class=" w-1/3 p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                ID
                            </th>

                            <th scope="col"
                                class=" w-1/3 p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                Title
                            </th>

                            <th scope="col"
                                class=" w-1/3 p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                Company
                            </th>

                            <th scope="col" class=" w-1/3 p-4 lg:p-5"></th>

                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($announcements as $announcement)
                            @include('announcements.partials.announce-table-row')
                        @endforeach

                    </tbody>

                </table>
            </div>

        </div>
    </div>

    <script>
        let successAlert = document.getElementById("successAlert");

        if (successAlert) {
            setTimeout(() => {
                successAlert.classList.add("hidden");
            }, 3000);
        }
    </script>
@endsection
