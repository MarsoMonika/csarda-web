<nav class="bg-gradient-to-b from-black/70 to-transparent text-white fixed top-0 left-0 w-full z-50" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <a href="/" class="text-xl font-bold text-white">Kecskeméti Csárda</a>

        {{-- Hamburger ikon (mobilon) --}}
        <button class="md:hidden" @click="open = !open">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24">
                <path x-show="!open" stroke-linecap="round" stroke-linejoin="round"
                      d="M4 6h16M4 12h16M4 18h16"/>
                <path x-show="open" stroke-linecap="round" stroke-linejoin="round"
                      d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        {{-- Menü desktopon --}}
        <ul class="hidden md:flex space-x-6">
            <li><a href="/#about" class="hover:text-amber-300">{{ __('app.menu.rolunk') }}</a></li>
            <li><a href="/etlap" class="hover:text-amber-300">{{ __('app.menu.etlap') }}</a></li>
            <li><a href="/itallap" class="hover:text-amber-300">{{ __('app.menu.itallap') }}</a></li>
            <li><a href="/hetiaj" class="hover:text-amber-300">{{ __('app.menu.hetiaj') }}</a></li>
            <li><a href="/elerhetoseg" class="hover:text-amber-300">{{ __('app.menu.elerhetoseg') }}</a></li>
        </ul>

        {{-- Nyelvválasztó desktopon --}}
        <div class="hidden md:flex space-x-2 text-sm">
            <a href="?lang=hu">HU</a>
            <a href="?lang=en">EN</a>
            <a href="?lang=de">DE</a>
        </div>
    </div>

    {{-- Mobilmenü --}}
    <div x-show="open" class="md:hidden px-4 pb-4 space-y-2 bg-black/90 text-white">
        <a href="/#about" class="block hover:text-amber-300">{{ __('app.menu.rolunk') }}</a>
        <a href="/etlap" class="block hover:text-amber-300">{{ __('app.menu.etlap') }}</a>
        <a href="/itallap" class="block hover:text-amber-300">{{ __('app.menu.itallap') }}</a>
        <a href="/hetiaj" class="block hover:text-amber-300">{{ __('app.menu.hetiaj') }}</a>
        <a href="/elerhetoseg" class="block hover:text-amber-300">{{ __('app.menu.elerhetoseg') }}</a>
        <div class="flex space-x-2 text-sm pt-2 border-t border-white/20">
            <a href="?lang=hu">HU</a>
            <a href="?lang=en">EN</a>
            <a href="?lang=de">DE</a>
        </div>
    </div>
</nav>
