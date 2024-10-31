<x-app-layout>
    <x-slot:heading>
        Forgot password
    </x-slot:heading>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form class="space-y-6" action="{{ route('password.email') }}" method="POST">
        @csrf
        <x-form.form-field>
            <x-form.form-label for="email">Email</x-form.form-label>
            <div class="mt-2">
                <x-form.form-input required type="text" name="email" id="email" placeholder="Enter your email"
                    :value="old('email')"></x-form.form-input>
                @error('email')
                    <x-form.form-error>{{ $message }}</x-form.form-error>
                @enderror
            </div>
        </x-form.form-field>
        <x-basic.interchangeable-btn href="/login" types="0">Back</x-basic.interchangeable-btn>
        <x-basic.interchangeable-btn type="submit" types="2" element="button">EMAIL PASSWORD RESET
            LINK</x-basic.interchangeable-btn>
    </form>
</x-app-layout>

<x-app-layout>
    <x-slot:heading>
        Forgot password
    </x-slot:heading>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form class="space-y-6" action="{{ route('password.email') }}" method="POST">
        @csrf
        <x-form.form-field>
            <x-form.form-label for="email">Email</x-form.form-label>
            <div class="mt-2">
                <x-form.form-input required type="text" name="email" id="email" placeholder="Enter your email"
                    :value="old('email')"></x-form.form-input>
                @error('email')
                    <x-form.form-error>{{ $message }}</x-form.form-error>
                @enderror
            </div>
        </x-form.form-field>
        <x-basic.interchangeable-btn href="/login" types="0">Back</x-basic.interchangeable-btn>
        <x-basic.interchangeable-btn type="submit" types="2" element="button">EMAIL PASSWORD RESET
            LINK</x-basic.interchangeable-btn>
    </form>
</x-app-layout>
