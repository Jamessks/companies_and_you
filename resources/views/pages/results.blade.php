<x-app-layout>
    <section class="mt-20 mb-20">
        <div class="flex items-center flex-col gap-8">
            <h2 class="text-5xl font-semibold">Discover Companies</h2>
            <form method="GET" action="/search" class="relative w-full max-w-[700px] flex">
                <input name="q" class="relative w-full bg-white/10 p-2 border-gray-900 rounded-xl" type="text"
                    placeholder="I'm looking for...">
                <x-basic.interchangeable-btn class="-ml-8 border-zinc-100 z-10 rounded-l-none" type="submit"
                    types="2" element="button">Search</x-basic.interchangeable-btn>
            </form>
        </div>
    </section>

    @if ($justVisit == false)
        <section class="mt-8 pb-8">
            <div class="flex justify-between items-center mb-10">
                <h1 class="text-2xl font-bold text-gray-800">Search Results</h1>
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
        </section>
    @endif

</x-app-layout>
