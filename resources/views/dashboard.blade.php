@extends('layouts.app')


@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-16 lg:px-6">
            <dl class="grid max-w-screen-xl gap-8 mx-auto text-gray-900 grid-cols-1 md:grid-cols-2 xl:grid-cols-4 dark:text-white">

                <article
                    class="flex items-center gap-4 rounded-lg bg-gray-100 border border-gray-100  p-6 sm:justify-between">
                    <span class="rounded-full bg-blue-100 p-3 text-blue-600 sm:order-last">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            style="fill: currentColor;transform: ;msFilter:;">
                            <path
                                d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z">
                            </path>
                        </svg>
                    </span>

                    <div>
                        <p class="text-2xl font-medium text-gray-900">{{$totalUsers}}</p>

                        <p class="text-sm text-gray-500">Total users</p>
                    </div>
                </article>

                <article
                    class="flex items-center gap-4 rounded-lg bg-gray-100 border border-gray-100  p-6 sm:justify-between">
                    <span class="rounded-full bg-blue-100 p-3 text-blue-600 sm:order-last">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            style="fill: currentColor;transform: ;msFilter:;">
                            <path
                                d="M12 2C6.486 2 2 5.589 2 10c0 2.908 1.898 5.515 5 6.934V22l5.34-4.005C17.697 17.852 22 14.32 22 10c0-4.411-4.486-8-10-8zm0 14h-.333L9 18v-2.417l-.641-.247C5.67 14.301 4 12.256 4 10c0-3.309 3.589-6 8-6s8 2.691 8 6-3.589 6-8 6z">
                            </path>
                            <path d="M7 7h10v2H7zm0 4h7v2H7z"></path>
                        </svg>
                    </span>

                    <div>
                        <p class="text-2xl font-medium text-gray-900">{{$totalAnnouncements}}</p>

                        <p class="text-sm text-gray-500">Total Offers</p>
                    </div>
                </article>

                <article
                    class="flex items-center gap-4 rounded-lg bg-gray-100 border border-gray-100  p-6 sm:justify-between">
                    <span class="rounded-full bg-blue-100 p-3 text-blue-600 sm:order-last">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            style="fill: currentColor;transform: ;msFilter:;">
                            <path
                                d="M20 4H6c-1.103 0-2 .897-2 2v5h2V8l6.4 4.8a1.001 1.001 0 0 0 1.2 0L20 8v9h-8v2h8c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm-7 6.75L6.666 6h12.668L13 10.75z">
                            </path>
                            <path d="M2 12h7v2H2zm2 3h6v2H4zm3 3h4v2H7z"></path>
                        </svg>

                    </span>

                    <div>
                        <p class="text-2xl font-medium text-gray-900">{{$totalApplications}}</p>

                        <p class="text-sm text-gray-500">Total Applications</p>
                    </div>
                </article>

                <article
                    class="flex items-center gap-4 rounded-lg bg-gray-100 border border-gray-100  p-6 sm:justify-between">
                    <span class="rounded-full bg-blue-100 p-3 text-blue-600 sm:order-last">
                        <svg xmlns="http://www.w3.org/2000/svg"class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            style="fill: currentColor;transform: ;msFilter:;">
                            <path
                                d="M21 7h-6a1 1 0 0 0-1 1v3h-2V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1zM8 6h2v2H8V6zM6 16H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V6h2v2zm4 8H8v-2h2v2zm0-4H8v-2h2v2zm9 4h-2v-2h2v2zm0-4h-2v-2h2v2z">
                            </path>
                        </svg>
                    </span>

                    <div>
                        <p class="text-2xl font-medium text-gray-900">{{$totalCompany}}</p>

                        <p class="text-sm text-gray-500">Total Companies</p>
                    </div>
                </article>

            </dl>
        </div>
    </section>
@endsection
