@if ($successes = session('__messenger' . '.' . 'success'))
    @foreach ($successes as $success)
        <div
            class='notification-msg cursor-pointer flex w-full items-center justify-start font-semibold min-h-14 px-10 bg-green-600'>
            <p class="text-white">{{ $success }}</p>
        </div>
    @endforeach
@endif
@if ($neutrals = session('__messenger' . '.' . 'neutral'))
    @foreach ($neutrals as $neutral)
        <div
            class='notification-msg cursor-pointer flex w-full items-center justify-start font-semibold min-h-14 px-10 bg-yellow-600'>
            <p class="text-white">{{ $neutral }}</p>
        </div>
    @endforeach
@endif
@if ($errors = session('__messenger' . '.' . 'error'))
    @foreach ($errors as $error)
        <div
            class='notification-msg cursor-pointer flex w-full items-center justify-start font-semibold min-h-14 px-10 bg-red-600'>
            <p class="text-white">{{ $error }}</p>
        </div>
    @endforeach
@endif
