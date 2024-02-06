@extends('layouts.app')

@section('content')
    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
            <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                <div class="flex items-center">
                    <p class="mb-0">Create skill</p>
                </div>
            </div>
            <form id="addwikiForm" method="post" action="{{ route('skills.store') }}" enctype="multipart/form-data"
                class="flex-auto p-6">
                @csrf
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                        <div class="mb-4">
                            <label for="name"
                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />

                            @if ($errors->has('name'))
                                <span id="nameError" class="ml-2 text-red-500">{{ $errors->first('name') }}</span>
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
                    Create New skill
                </button>

            </form>

        </div>
    </div>
    <script>
        function showFile(event) {
            var input = event.target;
            var reader = new FileReader()
            reader.onload = function() {
                var dataUrl = reader.result
                var output = document.getElementById('file-preview');
                output.classList.remove("hidden");
                output.src = dataUrl;
            }
            reader.readAsDataURL(input.files[0]);
        }
    </script>
@endsection
