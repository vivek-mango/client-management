<x-app-layout>

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @endpush

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1 flex justify-between">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium text-gray-900">{{ __('Client Details') }}</h3>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Add details of the client.') }}
                    </p>
                </div>
            </div>

            <div class="md:mt-0 md:col-span-2">
                <form method="post" action="/create-client">
                    @csrf
                    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                        <div class="grid grid-cols-6 gap-6">
                            <!-- Company Information-->
                            <div class="col-span-6 sm:col-span-4">
                                <label class="block font-medium text-m text-gray-700 ">
                                    {{ __('Company Information') }}
                                </label>
                            </div>

                            <!-- Company Name -->
                            <div class="col-span-6 sm:col-span-4 ps-3">
                                <label class="block font-medium text-sm text-gray-700" for="company_name">
                                    {{ __('Company Name') }}
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                    id="company_name" type="text" name="company_name"
                                    value="{{ old('company_name') }}" required="required" autocomplete="company_name">
                                @error('company_name')
                                    <div class="invalid text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Company Email -->
                            <div class="col-span-6 sm:col-span-4 ps-3">
                                <label class="block font-medium text-sm text-gray-700" for="company_email">
                                    {{ __('Company Email:') }}
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                    id="company_email" name="company_email" type="email"
                                    value="{{ old('company_email') }}" required="required" autocomplete="company_email">
                                @error('company_email')
                                    <div class="invalid text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Client Type -->
                            <div class="col-span-6 sm:col-span-4 ps-3">
                                <label class="block font-medium text-sm text-gray-700" for="client_type">
                                    {{ __('Client Type:') }}
                                </label>
                                <select id="client_type" name="client_type"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('client_type') }}" required="required" autocomplete="client_type">
                                    <option value="">{{ __('Select the type') }}</option>
                                    <option value="0">{{ __('Person') }}</option>
                                    <option value="1">{{ __('Company') }}</option>
                                </select>
                                @error('client_type')
                                    <div class="invalid text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--  Date of Birth (shown if client type is person) -->
                            <div class="col-span-6 sm:col-span-4 ps-3" id="dateOfBirthContainer" style="display: none;">
                                <label class="block font-medium text-sm text-gray-700" for="date_of_birth">
                                    {{ __('Date of Birth:') }}
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                    type="date" id="date_of_birth" name="date_of_birth"
                                    value="{{ old('date_of_birth') }}">
                                @error('date_of_birth')
                                    <div class="invalid text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--  Registration Number (shown if client type is company) -->
                            <div class="col-span-6 sm:col-span-4 ps-3" id="registrationNumberContainer"
                                style="display: none;">
                                <label class="block font-medium text-sm text-gray-700"
                                    for="company_registration_number">
                                    {{ __('Company Registration Number:') }}
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                    id="company_registration_number" value="{{ old('company_registration_number') }}"
                                    name="company_registration_number" type="text">
                                @error('company_registration_number')
                                    <div class="invalid text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Primary Contact-->
                            <div class="col-span-6 sm:col-span-4">
                                <label class="block font-medium text-m text-gray-700 ">
                                    {{ __('Primary Contact') }}
                                </label>
                            </div>
                            <!-- Contact Name -->
                            <div class="col-span-6 sm:col-span-4 ps-3">
                                <label class="block font-medium text-sm text-gray-700" for="contact_name">
                                    {{ __('Contact Name:') }}
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                    type="text" id="contact_name" name="contact_name" required="required"
                                    value="{{ old('contact_name') }}" autocomplete="username">
                                @error('contact_name')
                                    <div class="invalid text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Contact Email -->
                            <div class="col-span-6 sm:col-span-4 ps-3">
                                <label class="block font-medium text-sm text-gray-700" for="contact_email">
                                    {{ __('Contact Email:') }}
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                    type="email" id="contact_email" name="contact_email" required="required"
                                    value="{{ old('contact_email') }}" autocomplete="username">
                                @error('contact_email')
                                    <div class="invalid text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex items-center justify-end px-4 py-3 bg-gray-50 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">

                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __('Create Client') }}
                        </button>
                        <a href="{{ route('lists') }}" class="text-transparent border-transparent">
                            <button
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 "
                                type="button">Cancel</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.getElementById('client_type').addEventListener('change', function() {
                var dateOfBirthContainer = document.getElementById('dateOfBirthContainer');
                var registrationNumberContainer = document.getElementById('registrationNumberContainer');

                if (this.value == '0') {
                    dateOfBirthContainer.style.display = 'block';
                    registrationNumberContainer.style.display = 'none';
                } else if (this.value == '1') {
                    dateOfBirthContainer.style.display = 'none';
                    registrationNumberContainer.style.display = 'block';
                } else {
                    dateOfBirthContainer.style.display = 'none';
                    registrationNumberContainer.style.display = 'none';
                }
            });
        </script>
    @endpush
</x-app-layout>
