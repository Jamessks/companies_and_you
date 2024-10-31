<x-app-layout>
    <x-slot:heading>
        Home Page
    </x-slot:heading>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-900">Welcome to Companies & You</h1>
        <p class="mt-4 text-gray-600">We are dedicated to providing the best companies out there</p>

        <section class="mt-20 mb-20">
            <div class="flex items-center flex-col gap-8">
                <h2 class="text-5xl font-semibold">Discover Companies</h2>
                <form method="GET" action="/search" class="relative w-full max-w-[700px] flex">
                    <input name="q" class="relative w-full bg-white/10 p-2 border-gray-900 rounded-xl"
                        type="text" placeholder="I'm looking for...">
                    <x-basic.interchangeable-btn class="-ml-8 border-zinc-100 z-10 rounded-l-none" type="submit"
                        types="2" element="button">Search</x-basic.interchangeable-btn>
                </form>
            </div>
        </section>
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <x-blocks.small-card subheading="Our Services">Discover the wide range of services we offer to help you
                achieve your goals.</x-blocks.small-card>
            <x-blocks.small-card subheading="About Us">Learn more about our company and the values that drive us
                forward.</x-blocks.small-card>
            <x-blocks.small-card subheading="Contact Us">Get in touch with us for any inquiries or
                assistance.</x-blocks.small-card>
        </div>
    </div>
</x-app-layout>
