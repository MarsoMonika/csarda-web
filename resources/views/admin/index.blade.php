@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-10 space-y-12 px-4">

        {{-- Heti ajánlat szöveg és érvényesség --}}
        <section class="bg-white shadow rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Heti ajánlat beállítása</h1>

            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.meta.update') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block font-semibold mb-1">Megjelenő szöveg</label>
                    <textarea name="text" rows="3" class="w-full border rounded px-4 py-2">{{ $meta->text }}</textarea>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Érvényesség</label>
                    <input type="text" name="validity" value="{{ $meta->validity }}"
                           class="w-full border rounded px-4 py-2"/>
                </div>

                <button type="submit" class="bg-amber-700 hover:bg-amber-800 text-white px-4 py-2 rounded">Mentés
                </button>
            </form>
        </section>

        {{-- Aktuális tételek listázása --}}
        <section class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Aktuális tételek</h2>
            <ul class="space-y-2">
                @forelse ($offers as $offer)
                    <li class="flex justify-between items-center border-b pb-2">
                        <span>{{ $offer->letter }} - <strong>{{ ucfirst($offer->category) }}</strong>: {{ $offer->description }}</span>
                        <form method="POST" action="{{ route('admin.offer.delete', $offer->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">–</button>
                        </form>
                    </li>
                @empty
                    <li class="text-gray-500">Nincs még tétel.</li>
                @endforelse
            </ul>
        </section>

        {{-- Új tétel hozzáadása --}}
        <section class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Új tétel hozzáadása</h2>
            <form method="POST" action="{{ route('admin.offer.add') }}" class="space-y-4">
                @csrf
                <input name="letter" placeholder="Betű (pl. A)" class="w-full border rounded px-4 py-2" required>
                <label for="category" class="block font-semibold mb-1">Kategória</label>
                <select name="category" id="category" class="w-full border px-4 py-2" required>
                    <option value="">-- Válassz kategóriát --</option>
                    <option value="leves">Leves</option>
                    <option value="főétel">Főétel</option>
                </select>
                <input name="description" placeholder="Leírás" class="w-full border rounded px-4 py-2" required>
                <button type="submit" class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded">Hozzáadás
                </button>
            </form>
        </section>

    </div>
@endsection
