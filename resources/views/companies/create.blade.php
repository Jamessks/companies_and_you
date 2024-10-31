<x-app-layout>
    <x-slot:heading>
        Create Company Form
    </x-slot:heading>
    <form method="POST" action="{{ route('companies.store') }}">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Create a new Company</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">Provide some basic details about your company.</p>
                <div class="block space-y-6 mt-6">
                    <x-form.form-field>
                        <x-form.form-label for="title">Company Name</x-form.form-label>
                        <div class="mt-2">
                            <x-form.form-input type="text" name="name" id="name" placeholder="MyCompany.inc"
                                required></x-form.form-input>
                            @error('name')
                                <x-form.form-error>{{ $message }}</x-form.form-error>
                            @enderror
                        </div>
                    </x-form.form-field>
                    <x-form.form-field>
                        <x-form.form-label for="address">Company Address</x-form.form-label>
                        <div class="mt-2">
                            <x-form.form-input type="text" name="address" id="address"
                                placeholder="123 Main St, New York, NY 10001" required></x-form.form-input>
                            @error('address')
                                <x-form.form-error>{{ $message }}</x-form.form-error>
                            @enderror
                        </div>
                    </x-form.form-field>
                    <x-form.form-field>
                        <x-form.form-label for="website">Company Website</x-form.form-label>
                        <div class="mt-2">
                            <x-form.form-input type="url" name="website" id="website"
                                placeholder="https://mycompany.com" required></x-form.form-input>
                            @error('website')
                                <x-form.form-error>{{ $message }}</x-form.form-error>
                            @enderror
                        </div>
                    </x-form.form-field>
                    <x-form.form-field>
                        <x-form.form-label for="email">Company Email</x-form.form-label>
                        <div class="mt-2">
                            <x-form.form-input type="text" name="email" id="email"
                                placeholder="mycompany.hr@domain.com" required></x-form.form-input>
                            @error('email')
                                <x-form.form-error>{{ $message }}</x-form.form-error>
                            @enderror
                        </div>
                    </x-form.form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-start gap-x-6">
            <x-basic.interchangeable-btn href="{{ url()->previous() }}"
                types="0">Cancel</x-basic.interchangeable-btn>
            <x-basic.interchangeable-btn type="submit" types="2"
                element="button">Create</x-basic.interchangeable-btn>
        </div>
    </form>
</x-app-layout>
