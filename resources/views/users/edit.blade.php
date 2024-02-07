@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session()->has('success'))
                <div id="successAlert" class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            <span class="font-medium"> {{ session('success') }}</span>
                        </div>
                    </div>
                </div>
            @endif

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __("User's Role") }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Update this users's Role.") }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('users.changerole', $user->id) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('post')

                            <div>
                                <select id="role_id" name="role_id"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('company_id'))
                                    <span id="nameError" class="ml-2 text-red-500">{{ $errors->first('company_id') }}</span>
                                @endif
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save Role') }}</x-primary-button>

                                @if (session('status') === 'profile-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>




                    </section>
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
    </script>
@endsection
