<x-app-layout>
    <section class="mt-8 pb-8">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-2xl font-bold text-gray-800">Browse Companies</h1>
        </div>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-100 uppercase bg-gray-800 dark:bg-gray-900">
                <tr>
                    <th scope="col" class="px-6 py-3">Company Name</th>
                    <th scope="col" class="px-6 py-3">Website</th>
                    <th scope="col" class="px-6 py-3">Address</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Actions</th> <!-- New column for actions -->
                </tr>
            </thead>
            <tbody>
                @if ($companies->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center px-6 py-4 bg-gray-800">No results found.</td>
                    </tr>
                @else
                    @foreach ($companies as $company)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 relative">{{ $company->name }}</td>
                            <td class="px-6 py-4 relative">{{ $company->website }}</td>
                            <td class="px-6 py-4 relative">{{ $company->address }}</td>
                            <td class="px-6 py-4 relative">{{ $company->email }}</td>
                            <td class="px-6 py-4 relative">
                                <x-basic.interchangeable-btn href="{{ route('companies.show', $company->id) }}"
                                    types="2">View</x-basic.interchangeable-btn>
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
</x-app-layout>
