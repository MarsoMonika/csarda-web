@extends('layouts.app')

@section('content')
    <<section class="relative min-h-screen bg-[#f9f9f5] text-gray-800 pt-36 pb-20 px-6 overflow-hidden">
        {{-- Háttér vízjel --}}
        <img src="/images/logo-vizjel.jpg"
             class="absolute opacity-5 w-[60%] max-w-4xl left-1/2 -translate-x-1/2 top-10 pointer-events-none select-none"
             alt="Vízjel logó">

        <div class="relative z-10 max-w-3xl mx-auto space-y-10 text-center">

            <h1 class="text-3xl font-bold">@lang('app.contact.title')</h1>

            <div class="space-y-4">
                <p><span class="font-semibold">@lang('app.contact.address_label'):</span>
                    <span class="text-[#4169E1]">@lang('app.contact.address')</span>
                </p>
                <p><span class="font-semibold">@lang('app.contact.phone_label'):</span>
                    <a href="tel:+3676488686" class="text-[#4169E1] hover:underline">@lang('app.contact.phone')</a>
                </p>
                <p><span class="font-semibold">@lang('app.contact.website_label'):</span>
                    <a href="http://kecskemeticsarda.hu" target="_blank" class="text-[#4169E1] hover:underline">@lang('app.contact.website')</a>
                </p>
            </div>

            <div class="mt-8">
                <h2 class="text-xl font-semibold">@lang('app.contact.opening_hours')</h2>
                <ul class="mt-4 space-y-1">
                    <li><strong>@lang('app.days.mon'):</strong> @lang('app.contact.hours.week')</li>
                    <li><strong>@lang('app.days.tue'):</strong> @lang('app.contact.hours.week')</li>
                    <li><strong>@lang('app.days.wed'):</strong> @lang('app.contact.hours.week')</li>
                    <li><strong>@lang('app.days.thu'):</strong> @lang('app.contact.hours.week')</li>
                    <li><strong>@lang('app.days.fri'):</strong> @lang('app.contact.hours.week')</li>
                    <li><strong>@lang('app.days.sat'):</strong> @lang('app.contact.hours.week')</li>
                    <li><strong>@lang('app.days.sun'):</strong> @lang('app.contact.hours.sun')</li>
                </ul>
            </div>
        </div>
    </section>
@endsection
