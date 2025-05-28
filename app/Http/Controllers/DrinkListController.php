<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class DrinkListController extends Controller
{
    public function index()
    {
        $locale = App::getLocale();
        $drinkFile = "itallap_{$locale}.json";
        $drinkPath = resource_path("lang/{$locale}/{$drinkFile}");

        if (!File::exists($drinkPath)) {
            abort(404, "Itallap fájl nem található: $drinkPath");
        }

        $sections = json_decode(File::get($drinkPath), true);

        $menu = collect($sections)->map(function ($section) {
            // Boros régiós szerkezet ellenőrzése:
            if (
                isset($section['items'][0]['region']) &&
                isset($section['items'][0]['wines'])
            ) {
                // Ezt csak boroknál (fehérbor, rosé, vörös, desszert) használod!
                return [
                    'category' => $section['category'],
                    'items' => collect($section['items'])->flatMap(function ($regionBlock) {
                        return collect($regionBlock['wines'])->map(function ($wine) use ($regionBlock) {
                            return [
                                'name' => $wine['name'],
                                'description' => isset($wine['quantity']) ? implode(' / ', $wine['quantity']) : null,
                                'price' => is_array($wine['price'])
                                    ? implode(' / ', array_map(
                                        fn($a) => $a !== null ? number_format($a, 0, ',', '.') . ' Ft' : '-',
                                        $wine['price']
                                    ))
                                    : number_format($wine['price'], 0, ',', '.') . ' Ft',
                                'region' => $regionBlock['region'] ?? null,
                            ];
                        });
                    })->toArray(),
                ];
            }

            // Normál ital szekció (nincs boros régió)
            return [
                'category' => $section['category'],
                'items' => collect($section['items'])->map(function ($item) {
                    return [
                        'name' => $item['name'],
                        'description' => isset($item['quantity'])
                            ? (is_array($item['quantity'])
                                ? implode(' / ', $item['quantity'])
                                : $item['quantity'])
                            : null,
                        'price' => is_array($item['price'])
                            ? implode(' / ', array_map(
                                fn($a) => number_format($a, 0, ',', '.') . ' Ft',
                                $item['price']
                            ))
                            : number_format($item['price'], 0, ',', '.') . ' Ft',
                        'region' => null
                    ];
                })->toArray(),
            ];
        })->toArray();

        return view('drinkList', compact('menu'));
    }
}
