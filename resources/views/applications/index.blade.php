@extends('layouts.app')

@section('content')
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



            <div class="overflow-hidden shadow-lg">
                <table class="min-w-full divide-y divide-gray-200 table-fixed">
                    <thead class="bg-white">
                        <tr>
                            {{-- <th scope="col"
                                class=" w-1/3 p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                ID
                            </th> --}}

                            <th scope="col"
                                class=" w-1/3 p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                User's Fullname
                            </th>

                            <th scope="col"
                                class=" w-1/3 p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                Job Title
                            </th>


                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($applications as $application)
                            @include('applications.partials.announce-table-row')
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