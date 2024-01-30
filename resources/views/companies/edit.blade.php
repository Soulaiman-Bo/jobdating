@extends('layouts.app')

@section('content')
    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
        <div
            class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
            <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                <div class="flex items-center">
                    <p class="mb-0">Create Company</p>
                </div>
            </div>

            <form id="addwikiForm" action="{{ route('company.update', $company->id) }}" method="POST" class="flex-auto p-6">

                @csrf
                @method('PUT')

                <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                        <div class="mb-4">
                            <label for="title"
                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Name</label>
                            <input type="text" id="name" name="name" value=" {{ $company->name }}"
                                class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            <span id="nameError" class="ml-2 text-red-500"></span>
                        </div>
                    </div>

                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                        <div class="mb-4">
                            <label for="title"
                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Description</label>
                            <input type="text" id="description" name="description" value=" {{ $company->description }}"
                                class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            <span id="descriptionError" class="ml-2 text-red-500"></span>
                        </div>
                    </div>

                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                        <div class="mb-4">
                            <label for="header_img"
                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Header
                                logo</label>
                            <input type="text" id="logo" name="logo"  value=" {{ $company->logo }}"
                                class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            <span id="logoError" class="ml-2 text-red-500"></span>
                        </div>
                    </div>

                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                        <div class="mb-4">
                            <label for="header_img"
                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Sector
                                sector</label>
                            <input type="text" id="sector" name="sector"  value=" {{ $company->sector }}"
                                class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            <span id="sectorError" class="ml-2 text-red-500"></span>
                        </div>
                    </div>

                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                        <div class="mb-4">
                            <label for="header_img"
                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Location
                                location</label>
                            <input type="text" id="location" name="location"  value=" {{ $company->location }}"
                                class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            <span id="locationError" class="ml-2 text-red-500"></span>
                        </div>
                    </div>

                </div>

                <button type="submit"
                    class="inline-flex items-center w-fit mb-5 py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        style="fill: rgb(255, 255, 255)">
                        <path d="M19 11h-6V5h-2v6H5v2h6v6h2v-6h6z"></path>
                    </svg>
                    Create New Company
                </button>

            </form>

        </div>
    </div>
@endsection
