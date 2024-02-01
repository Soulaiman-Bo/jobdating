@extends('layouts.app')

@section('content')
    {{-- <x-logout-component /> --}}

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

            <div class="items-center gap-5 p-9 mb-9 shadow-lg relative rounded-2xl bg-white bg-clip-border">
                <div class="flex gap-6  items-center">
                    <a href="/company/create"
                        class="inline-flex items-center  w-fit py-3 px-4 text-sm font-medium text-center text-white bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            style="fill: rgb(255, 255, 255)">
                            <path d="M19 11h-6V5h-2v6H5v2h6v6h2v-6h6z"></path>
                        </svg>
                        Add new Company
                    </a>
                </div>
            </div>


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
                            <tr class="hover:bg-gray-100">
                                <td class=" w-1/3 p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">
                                    {{ $company->id }}
                                </td>

                                <td class=" w-1/3 p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">
                                    {{ $company->name }}
                                </td>

                                <td class=" w-1/3 p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">
                                    {{ $company->sector }}
                                </td>

                                <td class="w-1/3 flex gap-2 p-4 space-x-2 whitespace-nowrap lg:p-5">
                                    {{-- <form  action="{{ route('company.destroy', $company->id) }}" method="DELETE" class="deleteCategoryForm">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-br from-red-400 to-red-600 rounded-lg shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">
                                            <svg class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Delete Company
                                        </button>
                                    </form> --}}

                                    <form action="{{ route('company.destroy', $company->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-br from-red-400 to-red-600 rounded-lg shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform"
                                            type="submit" class="btn btn-danger">
                                            <svg class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Delete Company
                                        </button>
                                    </form>

                                    <a href="/company/{{ $company->id }}/edit"
                                        class="btn inline-flex items-center py-2 px-3 text-sm font-medium text-center text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 hover:text-gray-900 hover:scale-[1.02] transition-all">
                                        <svg class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                            </path>
                                            <path fill-rule="evenodd"
                                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Update Company</button>
                                    </a>
                                </td>
                                <td><img src="{{ $company->getFirstMediaUrl('logos', 'thumbs')}}" / width="120px"></td>

                            </tr>
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
