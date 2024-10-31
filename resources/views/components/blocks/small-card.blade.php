@props(['subheading' => ''])
<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-xl font-semibold text-gray-800">{{ $subheading }}</h2>
    <p class="mt-2 text-gray-600">{{ $slot }}</p>
</div>
