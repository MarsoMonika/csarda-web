@extends('layouts.app')

@section('content')
    <section class="relative min-h-screen bg-[#f9f9f5] text-gray-800 pt-36 pb-20 px-6 overflow-hidden">
        {{-- Háttér vízjel --}}
        <img src="/images/logo-vizjel.jpg"
             class="absolute opacity-5 w-[60%] max-w-4xl left-1/2 -translate-x-1/2 top-10 pointer-events-none select-none"
             alt="Vízjel logó">

        <div class="relative max-w-4xl mx-auto z-10 text-center px-4">
            {{-- Meta szöveg --}}
            @if ($meta && ($meta->text || $meta->validity))
                <div class="mb-10">
                    @if ($meta->text)
                        <h2 class="text-2xl font-bold mb-2 text-[#4169E1]">{{ $meta->text }}</h2>
                    @endif
                    @if ($meta->validity)
                        <p class="text-[#4169E1]">{{ $meta->validity }}</p>
                    @endif
                </div>
            @endif

            {{-- Levesek --}}
            @if ($soups->count())
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-[#4169E1] mb-2">Levesek:</h3>
                    @foreach ($soups as $item)
                        <p class="text-base"><strong>{{ $item->letter }}:</strong> {{ $item->description }}</p>
                    @endforeach
                </div>
            @endif

            {{-- Főételek --}}
            @if ($mains->count())
                <div>
                    <h3 class="text-xl font-semibold text-[#4169E1] mb-2">Főételek:</h3>
                    @foreach ($mains as $item)
                        <p class="text-base"><strong>{{ $item->letter }}:</strong> {{ $item->description }}</p>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
