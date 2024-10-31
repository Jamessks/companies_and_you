    <x-app-layout>
        <x-slot:heading>Company Profile</x-slot:heading>
        <h1 class="text-xl mb-4">{{ $company->name }}</h1>
        @if ($ownerVisit && $company->status == 0)
            <p class="text-red-600 mb-4">Please note, this company is not currently publicly listed</p>
        @endif
        <div class="mb-4 space-y-4 p-4 bg-gray-50 border border-gray-200 rounded-md shadow-md relative block">
            <div class="flex items-center">
                <span class="font-semibold">Company's Address:</span>
                <span class="underline text-blue-600 hover:text-blue-800 ml-2">{{ $company->address }}</span>
            </div>
            <div class="flex items-center">
                <span class="font-semibold">Company's Website:</span>
                <a href="{{ $company->website }}" class="underline text-blue-600 hover:text-blue-800 ml-2"
                    target="_blank">{{ $company->website }}</a>
            </div>
            <div class="flex items-center">
                <span class="font-semibold">Send your CV at:</span>
                <span class="underline text-blue-600 hover:text-blue-800 ml-2">{{ $company->email }}</span>
            </div>
        </div>
        @can('manage', $company)
            @if ($ownerVisit && $company->status == 0)
                <form action="{{ route('companies.toggleStatus', $company->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to restore this company?');">
                    @csrf
                    <input type="hidden" name="status" value="1">
                    <x-basic.interchangeable-btn type="submit" types="2"
                        element="button">Restore</x-basic.interchangeable-btn>
                </form>
            @else
                <x-basic.interchangeable-btn href="{{ route('companies.edit', $company->id) }}"
                    types="2">Edit</x-basic.interchangeable-btn>
            @endif
        @endcan
    </x-app-layout>
