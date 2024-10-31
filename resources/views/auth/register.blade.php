<x-app-layout>
    <x-slot:heading>
        Registration Form
    </x-slot:heading>
    <form class="space-y-6" action="{{ route('register') }}" method="POST">
        @csrf

        <!-- Name -->
        <x-form.form-field>
            <x-form.form-label for="name">Name</x-form.form-label>
            <div class="mt-2">
                <x-form.form-input required type="text" name="name" id="name"
                    placeholder="John"></x-form.form-input>
                @error('name')
                    <x-form.form-error>{{ $message }}</x-form.form-error>
                @enderror
            </div>
        </x-form.form-field>

        <!-- Email Address -->
        <x-form.form-field>
            <x-form.form-label for="email">Email</x-form.form-label>
            <div class="mt-2">
                <x-form.form-input required type="text" name="email" id="email"
                    placeholder="johndoe@example.com"></x-form.form-input>
                @error('email')
                    <x-form.form-error>{{ $message }}</x-form.form-error>
                @enderror
            </div>
        </x-form.form-field>

        <!-- Password -->
        <x-form.form-field>
            <x-form.form-label for="password">Password</x-form.form-label>
            <div class="mt-2">
                <x-form.form-input required type="password" name="password" id="password"
                    placeholder="Enter your password" autocomplete="new-password"></x-form.form-input>
                @error('password')
                    <x-form.form-error>{{ $message }}</x-form.form-error>
                @enderror
            </div>
        </x-form.form-field>
        <x-form.form-field>
            <x-form.form-label for="password_confirmation">Confirm Password</x-form.form-label>
            <div class="mt-2">
                <x-form.form-input required type="password" name="password_confirmation" id="password_confirmation"
                    placeholder="Confirm password" autocomplete="new-password"></x-form.form-input>
                @error('password_confirmation')
                    <x-form.form-error>{{ $message }}</x-form.form-error>
                @enderror
            </div>
        </x-form.form-field>
        <x-basic.interchangeable-btn href="/" types="0">Back</x-basic.interchangeable-btn>
        <x-basic.interchangeable-btn type="submit" types="2"
            element="button">Register</x-basic.interchangeable-btn>
    </form>
</x-app-layout>

{{-- <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form> --}}
