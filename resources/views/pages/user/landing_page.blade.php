@extends('components.layouts.main')

@include('components.partials.navbar')

@section('container')
    <section id="home" class="md:mb-[100px] mb-14">
        <div class="relative h-screen bg-fixed bg-center bg-cover"
            style="background-image: url('{{ asset('img/background.png') }}')">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            <div class="relative flex flex-col items-center justify-center h-screen text-center text-white mx-5">
                <div>
                    <h1 class="text-4xl font-bold md:text-6xl">Find the Government Contact <br> Instantly and Effortlessly
                    </h1>
                    <p class="mt-3 text-sm md:text-xl md:mt-8">Streamline your search with our comprehensive contact
                        directory</p>
                </div>
                <div class="mt-3 w-full max-w-xl md:mt-8">
                    <form action="{{ route('search') }}" method="GET" class="relative">
                        <div class="flex">
                            <select name="filter"
                                class="w-20 md:w-40 h-10 md:h-12 px-4 rounded-l-lg bg-blue-500 text-white focus:border-blue-500 focus:ring focus:ring-blue-500 appearance-auto cursor-pointer">
                                <option value="all">All</option>
                                <option value="district">District</option>
                                <option value="sub-district">Sub-District</option>
                            </select>
                            <input type="text" name="search" placeholder="Search a contact..."
                                class="w-full h-10 pl-4 pr-10 rounded-r-lg text-black focus:border-blue-500 focus:ring focus:ring-blue-500 md:h-12">
                            <button type="submit"
                                class="absolute top-0 right-0 h-10 w-10 bg-blue-500 rounded-r-lg flex items-center justify-center text-white hover:bg-blue-600 md:w-12 md:h-12">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <section id="about" class="container mx-auto px-5 md:mb-[100px] mb-14">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div class="grid grid-cols-2 gap-3">
                <div class="">
                    <img src="{{ asset('img/calling1.png') }}" alt="" class="h-full w-auto object-cover">
                </div>
                <div class="flex flex-col gap-3">
                    <img src="{{ asset('img/calling2.png') }}" alt="" class="h-full w-auto object-cover">
                    <img src="{{ asset('img/calling3.png') }}" alt="" class="h-full w-auto object-cover">
                </div>
            </div>
            <div class="flex flex-col justify-center">
                <h1 class="text-3xl lg:text-5xl font-bold">Effortless Contact Search, Anytime Anywhere</h1>
                <p class="mt-6 text-sm md:text-xl text-justify">Discover the fastest way to find the right connections.
                    Our intuitive contact directory simplifies your search, offering instant access to trusted colleagues
                    and work divisions. Experience seamless navigation and effortless communication, all in one place.</p>
                <button class="mt-6 w-full h-10 md:w-32 md:h-12 rounded-lg bg-blue-500 hover:bg-blue-600 text-white">
                    More info
                </button>
            </div>
        </div>
    </section>

    <section id="service" class="container mx-auto px-5 md:mb-[100px] mb-14">
        <div>
            <h1 class="text-3xl md:text-5xl font-bold text-center">Our Service</h1>
            <p class="mt-3 text-sm md:text-xl md:mt-5 text-center mb-10">Discover how Quick Connect simplifies your contact
                search experience, making it effortless and instant.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 justify-center items-center">
                <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-lg hover:shadow-2xl transition-shadow">
                    <div class="flex justify-center items-center">
                        <div class="w-16 h-16 bg-blue-500 text-white rounded-full flex justify-center items-center">
                            <i class="fas fa-search text-2xl"></i>
                        </div>
                    </div>
                    <h2 class="text-xl md:text-2xl font-semibold text-center mt-4">Quick Contact Search</h2>
                    <p class="mt-3 text-sm md:text-xl text-center font-light">
                        Instantly find the contact you need with our powerful search engine, saving your time and effort.
                    </p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-lg hover:shadow-2xl transition-shadow">
                    <div class="flex justify-center items-center">
                        <div class="w-16 h-16 bg-blue-500 text-white rounded-full flex justify-center items-center">
                            <i class="fas fa-folder text-2xl"></i>
                        </div>
                    </div>
                    <h2 class="text-xl md:text-2xl font-semibold text-center mt-4">Smart Organization</h2>
                    <p class="mt-3 text-sm md:text-xl text-center font-light">
                        Organize your contacts with smart categories and labels for quick and easy access.
                    </p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-lg hover:shadow-2xl transition-shadow">
                    <div class="flex justify-center items-center">
                        <div class="w-16 h-16 bg-blue-500 text-white rounded-full flex justify-center items-center">
                            <i class="fas fa-sync text-2xl"></i>
                        </div>
                    </div>
                    <h2 class="text-xl md:text-2xl font-semibold text-center mt-4">Instant Synchronization</h2>
                    <p class="mt-3 text-sm md:text-xl text-center font-light">
                        Sync your contact list seamlessly across all your devices with one click.
                    </p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-lg hover:shadow-2xl transition-shadow">
                    <div class="flex justify-center items-center">
                        <div class="w-16 h-16 bg-blue-500 text-white rounded-full flex justify-center items-center">
                            <i class="fas fa-lock text-2xl"></i>
                        </div>
                    </div>
                    <h2 class="text-xl md:text-2xl font-semibold text-center mt-4">Secure Access</h2>
                    <p class="mt-3 text-sm md:text-xl text-center font-light">
                        Your data is protected with top-notch security measures, ensuring confidentiality and safety.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="" class="container mx-auto px-5 md:mb-[100px] mb-14">
        <div>
            <h1 class="text-3xl md:text-5xl font-bold text-center">Discover Districts</h1>
            <p class="mt-3 text-sm md:text-xl md:mt-5 text-center mb-10">Explore all available districts and find more
                information.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ($districts as $district)
                    <a href="{{ route('result', ['id' => $district->id]) }}">
                        <div class="border border-gray-200 rounded-lg px-6 py-10 md:py-20 shadow-lg hover:shadow-2xl transition-shadow bg-cover"
                            style="background-image: url('{{ asset('img/background.png') }}')">
                            <h1 class="text-white text-xl md:text-3xl font-bold text-center">
                                {{ $district->id == 1 ? 'Kota' : 'Kabupaten' }} {{ $district->name }}
                            </h1>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section id="faq" class="container mx-auto px-5 mb-10">
        <div class="mx-auto">
            <h1 class="text-3xl lg:text-5xl font-bold text-center">Frequently Asked Question</h1>
            <p class="mt-3 text-sm md:text-xl md:mt-5 text-center mb-10">Lorem ipsum dolor sit amet consectetur adipisicing
                elit. At, reiciendis.</p>
            <div class="w-full">
                <ul class="space-y-4">
                    <li>
                        <button
                            class="relative flex gap-2 items-center w-full py-4 md:py-5 text-left border-t border-base-content/10 md:text-lg"
                            aria-expanded="false" onclick="toggleFAQ(this)">
                            <span class="flex-1 text-sm md:text-xl font-semibold">What is QuickConnect?</span>
                            <i
                                class="fas fa-plus w-4 h-4 ml-auto transition-transform duration-300 ease-out fa-rotate-90"></i>
                        </button>
                        <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                            style="transition: max-height 0.3s ease-in-out 0s;">
                            <div
                                class="pb-4 md:pb-5 leading-relaxed border-l-4 border-blue-500 pl-4 md:pl-6 text-sm md:text-xl">
                                QuickConnect is a digital platform designed to help you search and connect with contacts
                                effortlessly, quickly, and instantly.
                            </div>
                        </div>
                    </li>
                    <li>
                        <button
                            class="relative flex gap-2 items-center w-full py-4 md:py-5 text-left border-t border-base-content/10 md:text-lg"
                            aria-expanded="false" onclick="toggleFAQ(this)">
                            <span class="flex-1 text-sm md:text-xl font-semibold">How do I search for a contact in
                                QuickConnect?</span>
                            <i
                                class="fas fa-plus w-4 h-4 ml-auto transition-transform duration-300 ease-out fa-rotate-90"></i>
                        </button>
                        <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                            style="transition: max-height 0.3s ease-in-out 0s;">
                            <div
                                class="pb-4 md:pb-5 leading-relaxed border-l-4 border-blue-500 pl-4 md:pl-6 text-sm md:text-xl">
                                Simply type the name or keyword in the search bar and QuickConnect will instantly provide
                                the most relevant results from your database.
                            </div>
                        </div>
                    </li>
                    <li>
                        <button
                            class="relative flex gap-2 items-center w-full py-4 md:py-5 text-left border-t border-base-content/10 md:text-lg"
                            aria-expanded="false" onclick="toggleFAQ(this)">
                            <span class="flex-1 text-sm md:text-xl font-semibold">Can I use QuickConnect on multiple
                                devices?</span>
                            <i
                                class="fas fa-plus w-4 h-4 ml-auto transition-transform duration-300 ease-out fa-rotate-90"></i>
                        </button>
                        <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                            style="transition: max-height 0.3s ease-in-out 0s;">
                            <div
                                class="pb-4 md:pb-5 leading-relaxed border-l-4 border-blue-500 pl-4 md:pl-6 text-sm md:text-xl">
                                Yes, QuickConnect is accessible on any device with an internet connection, including
                                smartphones, tablets, and desktops.
                            </div>
                        </div>
                    </li>
                    <li>
                        <button
                            class="relative flex gap-2 items-center w-full py-4 md:py-5 text-left border-t border-base-content/10 md:text-lg"
                            aria-expanded="false" onclick="toggleFAQ(this)">
                            <span class="flex-1 text-sm md:text-xl font-semibold">Is my contact information secure?</span>
                            <i
                                class="fas fa-plus w-4 h-4 ml-auto transition-transform duration-300 ease-out fa-rotate-90"></i>
                        </button>
                        <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                            style="transition: max-height 0.3s ease-in-out 0s;">
                            <div
                                class="pb-4 md:pb-5 leading-relaxed border-l-4 border-blue-500 pl-4 md:pl-6 text-sm md:text-xl">
                                Absolutely. QuickConnect uses robust encryption to ensure that your contact information is
                                kept safe and private.
                            </div>
                        </div>
                    </li>
                    <li>
                        <button
                            class="relative flex gap-2 items-center w-full py-4 md:py-5 text-left border-t border-base-content/10 md:text-lg"
                            aria-expanded="false" onclick="toggleFAQ(this)">
                            <span class="flex-1 text-sm md:text-xl font-semibold">Can I save and manage my contacts?</span>
                            <i
                                class="fas fa-plus w-4 h-4 ml-auto transition-transform duration-300 ease-out fa-rotate-90"></i>
                        </button>
                        <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                            style="transition: max-height 0.3s ease-in-out 0s;">
                            <div
                                class="pb-4 md:pb-5 leading-relaxed border-l-4 border-blue-500 pl-4 md:pl-6 text-sm md:text-xl">
                                Yes, you can add, edit, and manage your contacts within QuickConnect for easy access and
                                organization.
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <script>
            function toggleFAQ(element) {
                const content = element.nextElementSibling;
                const icon = element.querySelector('svg');

                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                    icon.classList.remove('rotate-180');
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                    icon.classList.add('rotate-180');
                }
            }
        </script>
    </section>

    @include('components.partials.footer')
@endsection
