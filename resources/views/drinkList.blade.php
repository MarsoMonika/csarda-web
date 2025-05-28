@extends('layouts.app')

@section('content')
    <section class="relative bg-[#f9f9f5] py-20 px-6 text-gray-800">
        <div class="relative z-10 max-w-6xl mx-auto space-y-16">
            @foreach ($menu as $section)
                <div class="space-y-6">
                    <h2 class="text-2xl md:text-3xl font-semibold text-[#4169E1] border-b pb-2">
                        {{ $section['category'] }}
                    </h2>
                    <div class="grid gap-6">
                        @foreach ($section['items'] as $item)
                            <div class="flex justify-between items-start border-b pb-2">
                                <div>
                                    <h3 class="text-lg font-medium">{{ $item['name'] }}</h3>
                                    @if (!empty($item['region']))
                                        <p class="text-sm italic text-gray-500">{{ $item['region'] }}</p>
                                    @endif
                                    @if (!empty($item['description']))
                                        <p class="text-sm text-gray-600">{{ $item['description'] }}</p>
                                    @endif
                                </div>
                                <div class="text-[#4169E1] font-semibold whitespace-nowrap text-right">
                                    {{ $item['price'] ?? '-' }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
