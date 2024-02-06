@extends('layouts.app')

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
            <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                <div class="flex items-center">
                    <p class="mb-0">Create Announcement</p>
                </div>
            </div>

            <form id="addwikiForm" action="{{ route('announcements.update', $announcement->id) }}" method="POST"
                enctype="multipart/form-data" class="flex-auto p-6">
                @csrf
                @method('PUT')

                <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                        <div class="mb-4">
                            <label for="title"
                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Title</label>
                            <input type="text" id="title" name="title" value=" {{ $announcement->title }}""
                                class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />

                            @if ($errors->has('title'))
                                <span id="nameError" class="ml-2 text-red-500">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                        <div class="mb-4">
                            <label for="category"
                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Company</label>
                            <select id="category" name="company_id"
                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                <option value="" selected disabled>Company</option>
                                @foreach ($companies as $company)
                                    @if ($company->id === $announcement->company_id)
                                        <option selected value="{{ $company->id }}">
                                            {{ $company->name }}
                                        </option>
                                    @else
                                        <option value="{{ $company->id }}">
                                            {{ $company->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>

                            @if ($errors->has('company_id'))
                                <span id="nameError" class="ml-2 text-red-500">{{ $errors->first('company_id') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                        <div class="mb-4">
                            <label for="header_img"
                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Image</label>
                            <input type="file" id="image" name="image" value=" {{ $announcement->image }}"
                                onchange="showFile(event)"
                                class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            @if ($errors->has('image'))
                                <span id="nameError" class="ml-2 text-red-500">{{ $errors->first('image') }}</span>
                            @endif

                        </div>
                        <div class="mb-4">
                            <img src="" alt="" class=" hidden w-[100px] h-[80px]" id="file-preview" />
                        </div>
                    </div>

                </div>

                <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                        <div class="mb-4">
                            <label for="description"
                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Description</label>
                            <textarea id="description" name="description" value=" {{ $announcement->name }}" rows="5"
                                class="noteditor focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">{{ $announcement->description }}
                            </textarea>
                            @if ($errors->has('description'))
                                <span id="nameError" class="ml-2 text-red-500">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="inline-flex items-center w-fit mb-5 py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        style="fill: rgb(255, 255, 255)">
                        <path d="M19 11h-6V5h-2v6H5v2h6v6h2v-6h6z"></path>
                    </svg>
                    Update Announcement
                </button>

            </form>

        </div>


        <div class="p-4 sm:p-8 mt-9  bg-white shadow-xl sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Add Skills') }}
                        </h2>
                    </header>

                    <form method="post" action="{{ route('announcements.add', [$announcement->id]) }}"
                        class="mt-6 space-y-6">
                        @csrf
                        @method('POST')

                        <select class="js-example-basic-multiple w-full" name="skills[]" multiple="multiple">
                            @foreach ($skills as $skill)
                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('skills'))
                            <span id="tagsError" class="ml-2 text-red-500">{{ $errors->first('skills') }}</span>
                        @endif

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Add Skills') }}</x-primary-button>
                        </div>
                    </form>
                </section>
            </div>
        </div>


        <div class="p-4 sm:p-8 mt-9 bg-white shadow-xl sm:rounded-lg">
            <section>
                <header>
                    <h2 class="text-lg font-medium mb-9 text-gray-900">
                        {{ __('Your Skills') }}
                    </h2>
                </header>
            </section>
            <div class="max-w-full flex flex-wrap ">
                @foreach ($ownskills as $skill)
                    <span
                        class=" mb-3 text-blue-600 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{ $skill['name'] }}</span>
                @endforeach
            </div>
        </div>

    </div>
    <script>
        function showFile(event) {
            var input = event.target;
            var reader = new FileReader()
            reader.onload = function() {
                var dataUrl = reader.result
                var output = document.getElementById('file-preview');
                output.src = dataUrl;
            }
            reader.readAsDataURL(input.files[0]);
        }


        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

        let successAlert = document.getElementById("successAlert");

        if (successAlert) {
            setTimeout(() => {
                successAlert.classList.add("hidden");
            }, 3000);
        }
    </script>
@endsection
