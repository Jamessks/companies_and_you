<x-app-layout>
    <x-slot:heading>
        My Companies
    </x-slot:heading>
    <div class="flex mb-12">
        <x-basic.interchangeable-btn href="{{ route('companies.create') }}" types="2">Create
            Company</x-basic.interchangeable-btn>
    </div>
    <div class="space-y-16">
        <section>
            <h2 class="text-2xl font-bold mb-6">Your active companies</h2>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-100 uppercase bg-gray-800 dark:bg-gray-900">
                    <tr>
                        <th scope="col" class="px-6 py-3">Company Name</th>
                        <th scope="col" class="px-6 py-3">Website</th>
                        <th scope="col" class="px-6 py-3">Address</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($companies->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center px-6 py-4 bg-gray-800">You dont have any companies
                                listed
                                yet.
                            </td>
                        </tr>
                    @else
                        @foreach ($companies as $company)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 relative">
                                    <a class="underline font-bold"
                                        href="{{ route('companies.show', $company->id) }}">{{ $company->name }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 relative">{{ $company->website }}</td>
                                <td class="px-6 py-4 relative">{{ $company->address }}</td>
                                <td class="px-6 py-4 relative">{{ $company->email }}</td>
                                <td class="px-6 py-4 flex space-x-2">
                                    <div class="flex flex-col gap-2">
                                        <x-basic.interchangeable-btn href="{{ route('companies.edit', $company->id) }}"
                                            types="2">Edit</x-basic.interchangeable-btn>
                                        <form action="{{ route('companies.toggleStatus', $company->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delist this company?');">
                                            @csrf
                                            <input type="hidden" name="status" value="0">
                                            <x-basic.interchangeable-btn type="submit" types="1"
                                                element="button">Delist</x-basic.interchangeable-btn>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="mt-6">
                {{ $companies->links() }}
            </div>
        </section>

        <section>
            <h2 class="text-2xl font-bold mb-6">Your inactive companies</h2>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-100 uppercase bg-gray-800 dark:bg-gray-900">
                    <tr>
                        <th scope="col" class="px-6 py-3">Company Name</th>
                        <th scope="col" class="px-6 py-3">Website</th>
                        <th scope="col" class="px-6 py-3">Address</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($inactiveCompanies->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center px-6 py-4 bg-gray-800">You dont have any inactive
                                companies yet.
                            </td>
                        </tr>
                    @else
                        @foreach ($inactiveCompanies as $inactiveCompany)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 relative"> <a class="underline font-bold"
                                        href="{{ route('companies.show', $inactiveCompany->id) }}">{{ $inactiveCompany->name }}</a>
                                </td>
                                <td class="px-6 py-4 relative">{{ $inactiveCompany->website }}</td>
                                <td class="px-6 py-4 relative">{{ $inactiveCompany->address }}</td>
                                <td class="px-6 py-4 relative">{{ $inactiveCompany->email }}</td>
                                <td class="px-6 py-4 flex space-x-2">
                                    <div class="flex flex-col gap-2">
                                        <!-- Restore Company -->
                                        <form action="{{ route('companies.toggleStatus', $inactiveCompany->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to restore this company?');">
                                            @csrf
                                            <input type="hidden" name="status" value="1">
                                            <x-basic.interchangeable-btn type="submit" types="2"
                                                element="button">Restore</x-basic.interchangeable-btn>
                                        </form>
                                        <!-- Delete Company -->
                                        <form action="{{ route('companies.destroy', $inactiveCompany->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this company?');">
                                            @csrf
                                            @method('DELETE')
                                            <x-basic.interchangeable-btn type="submit" types="1"
                                                element="button">Delete</x-basic.interchangeable-btn>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="mt-6">
                {{ $inactiveCompanies->links() }}
            </div>
        </section>
    </div>
</x-app-layout>
