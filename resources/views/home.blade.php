@extends('layouts.app')

@section('content')

    <div class="relative w-full h-[60vh] overflow-hidden bg-gradient-to-b from-transparent to-[#f9f9f5]"
         id="hero-container">
        @for ($i = 1; $i <= 5; $i++)
            <div class="absolute inset-0 transition-opacity duration-1000 {{ $i === 1 ? '' : 'opacity-0' }}"
                 id="slide-{{ $i }}">
                <img src="/images/csarda{{ $i }}.jpg" class="w-full h-full object-cover" alt="Slide {{ $i }}">
            </div>
        @endfor
    </div>

    <script>
        let current = 1;
        const total = 5;
        setInterval(() => {
            const prev = document.getElementById(`slide-${current}`);
            current = current === total ? 1 : current + 1;
            const next = document.getElementById(`slide-${current}`);
            prev.classList.add('opacity-0');
            next.classList.remove('opacity-0');
        }, 5000);
    </script>

    {{-- Rólunk szekció --}}
    <section class="relative bg-[#f9f9f5] text-gray-800 pt-36 pb-20 px-6 overflow-hidden">
        {{-- Vízjel logó (ha szeretnéd megtartani háttérként, lehet kisebbre venni vagy teljesen kivenni) --}}
        <img src="/images/logo-vizjel.jpg"
             class="absolute opacity-5 w-[60%] max-w-4xl left-1/2 -translate-x-1/2 top-10 pointer-events-none select-none"
             alt="Vízjel logó">

        <div class="relative max-w-6xl mx-auto z-10 grid grid-cols-1 md:grid-cols-2 gap-40 items-center">
            {{-- Bal oldali kép --}}
            <div>
                <img src="/images/kert1.jpg" alt="Kert" class="rounded-2xl shadow-lg w-full h-auto object-cover">
            </div>

            {{-- Jobb oldali szöveg --}}
            <div class="text-center md:text-left space-y-6">
                <h2
                    class="text-3xl md:text-4xl font-bold font-[Playfair_Display] text-[#4169E1] opacity-0 translate-y-6 transition-all duration-1000"
                    x-data
                    x-intersect="
                    $el.classList.remove('opacity-0', 'translate-y-6');
                    $el.classList.add('animate-fadeInUp');
                "
                >
                    {{ __('app.rolunk.cim') }}
                </h2>

                @foreach (['szoveg1', 'szoveg2', 'szoveg3'] as $s)
                    <p
                        x-data
                        x-intersect="
                        $el.classList.remove('opacity-0', 'translate-y-6');
                        $el.classList.add('animate-fadeInUp');
                    "
                        class="opacity-0 translate-y-6 transition-all duration-1000 text-lg leading-relaxed"
                    >
                        {{ __('app.rolunk.' . $s) }}
                    </p>
                @endforeach
            </div>
        </div>
    </section>
@endsection
