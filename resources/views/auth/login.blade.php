<x-app-layout>
    <x-slot:heading>
        Log In
    </x-slot:heading>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form class="space-y-6" action="{{ route('login') }}" method="POST">
        @csrf
        <x-form.form-field>
            <x-form.form-label for="email">Email</x-form.form-label>
            <div class="mt-2">
                <x-form.form-input required type="text" name="email" id="email" placeholder="johndoe@example.com"
                    :value="old('email')"></x-form.form-input>
                @error('email')
                    <x-form.form-error>{{ $message }}</x-form.form-error>
                @enderror
            </div>
        </x-form.form-field>
        <x-form.form-field>
            <x-form.form-label for="password">Password</x-form.form-label>
            <div class="mt-2">
                <x-form.form-input required type="password" name="password" id="password"
                    placeholder="Enter your password"></x-form.form-input>
                @error('password')
                    <x-form.form-error>{{ $message }}</x-form.form-error>
                @enderror
            </div>
        </x-form.form-field>
        <div class="flex w-6/12 justify-between mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-400 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <x-basic.interchangeable-btn href="/" types="0">Back</x-basic.interchangeable-btn>
        <x-basic.interchangeable-btn type="submit" types="2" element="button">Log In</x-basic.interchangeable-btn>
    </form>
</x-app-layout>
