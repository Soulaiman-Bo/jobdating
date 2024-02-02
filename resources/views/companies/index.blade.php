@extends('layouts.app')

@section('content')
    <style>
        .tabActive {
            /* border-left-width: 2px;
                                    border-right-width: 2px;
                                    border-top-width: 2px; */
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity));
        }

        .tabinActive {
            /* border-bottom-width: 2px; */
        }

        .tabinActive:hover {
            background-color: rgba(212, 210, 210, 0.153);
        }
    </style>
    <div>
        @if (session()->has('success'))
            <div id="successAlert"
                class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium"> {{ session('success') }}</span>
            </div>
        @endif
    </div>




    {{--  --}}




    @include('companies.partials.add-company-button');


    <div class="border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
            data-tabs-toggle="#default-tab-content" role="tablist">
            <li class="tabs tabActive flex-grow  border-gray-300 rounded-t-2xl" role="presentation">
                <button
                    class="inline-block p-4 w-full  rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="All-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings"
                    aria-selected="false" onclick="changeTab('all', 'All-tab')">
                    All
                </button>
            </li>

            <li class="tabs tabinActive flex-grow  border-gray-300 rounded-t-2xl" role="presentation">
                <button
                    class="inline-block p-4 w-full rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="Archived-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts"
                    aria-selected="false" onclick="changeTab('archived', 'Archived-tab')">
                    Archived
                </button>
            </li>
        </ul>
    </div>

    <div id="default-tab-content">
        <div id="all" class="tabcontent  rounded-lg bg-gray-50 dark:bg-gray-800" id="pending" role="tabpanel"
            aria-labelledby="profile-tab">
            <div class="overflow-x-auto  rounded-2xl">
                <div class="inline-block min-w-full align-middle">
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
                                        Name
                                    </th>

                                    <th scope="col"
                                        class=" w-1/3 p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                        Sector
                                    </th>

                                    <th scope="col" class=" w-1/3 p-4 lg:p-5"></th>
                                    <th scope="col" class=" w-1/3 p-4 lg:p-5">image</th>

                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($companies as $company)
                                    @include('companies.partials.table-row-tr')
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div id="archived" class="tabcontent hidden  rounded-lg bg-gray-50 dark:bg-gray-800" id="pending" role="tabpanel"
            aria-labelledby="profile-tab">
            <div class="overflow-x-auto  rounded-2xl">
                <div class="inline-block min-w-full align-middle">


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
                                        Name
                                    </th>

                                    <th scope="col"
                                        class=" w-1/3 p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                        Sector
                                    </th>

                                    <th scope="col" class=" w-1/3 p-4 lg:p-5"></th>
                                    <th scope="col" class=" w-1/3 p-4 lg:p-5">image</th>

                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($archived as $archive)
                                    @include('companies.partials.archived-table-row-tr')
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                </div>
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

        function changeTab(tabId, tabelm) {
            // Hide all tab content
            var tabContents = document.querySelectorAll('.tabcontent');
            var tabs = document.querySelectorAll('.tabs');

            tabContents.forEach(function(content) {
                content.classList.add('hidden');
            });

            tabs.forEach((elm) => {
                elm.classList.remove('tabActive');
                elm.classList.add('tabinActive');
            })

            var selectedTab = document.getElementById(tabelm);
            selectedTab.parentElement.classList.remove('tabinActive');
            selectedTab.parentElement.classList.add('tabActive');

            // Show the selected tab content
            var selectedTab = document.getElementById(tabId);
            selectedTab.classList.remove('hidden');
        }
    </script>
@endsection
