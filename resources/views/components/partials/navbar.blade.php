<nav id="navbar" class="fixed w-full z-10 top-0 left-0 py-1 bg-[#213555] transition-all duration-300">
    <div class="md:mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex flex-column justify-center items-center gap-3 w-[110px] h-[40px]">
                <img class="h-7 w-auto" src="{{ asset('img/logo.png') }}" alt="Your Company">
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">GovCall</span>
            </div>

            <div class="hidden sm:flex space-x-4 items-end justify-end flex-1">
                <a href="#home"
                    class="rounded-md px-3 py-2 text-[18px] text-white hover:bg-blue-500 hover:text-white">Home</a>
                <a href="#about"
                    class="rounded-md px-3 py-2 text-[18px] text-white hover:bg-blue-500 hover:text-white">About</a>
                <a href="#service"
                    class="rounded-md px-3 py-2 text-[18px] text-white hover:bg-blue-500 hover:text-white">Service</a>
                <a href="#faq"
                    class="rounded-md px-3 py-2 text-[18px] text-white hover:bg-blue-500 hover:text-white">FAQ</a>
            </div>

            <div class="sm:hidden flex items-center">
                <button id="mobile-menu-button" class="text-white focus:outline-none">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="sm:hidden hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="#home"
                class="block rounded-md px-3 py-2 text-[18px] text-white hover:bg-blue-500 hover:text-white">Home</a>
            <a href="#about"
                class="block rounded-md px-3 py-2 text-[18px] text-white hover:bg-blue-500 hover:text-white">About</a>
            <a href="#service"
                class="block rounded-md px-3 py-2 text-[18px] text-white hover:bg-blue-500 hover:text-white">Service</a>
            <a href="#faq"
                class="block rounded-md px-3 py-2 text-[18px] text-white hover:bg-blue-500 hover:text-white">FAQ</a>
        </div>
    </div>
</nav>

<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });
</script>