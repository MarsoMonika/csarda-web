<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DrinkListController extends Controller
{
public function index()
{
    $path = resource_path('data/itallap.json');

    if (!File::exists($path)) {
        abort(404, "Itallap fájl nem található: $path");
    }

    $json = File::get($path);
    $sections = json_decode($json, true);

    $menu = collect($sections)->map(function ($section) {
        return [
            'category' => $section['category'],
            'items' => collect($section['items'])->flatMap(function ($item) {

                if (isset($item['borok'])) {
                    return collect($item['borok'])->map(function ($bor) use ($item) {
                        return [
                            'name' => $bor['nev'],
                            'description' => isset($bor['mennyiseg']) ? implode(' / ', $bor['mennyiseg']) : null,
                            'price' => implode(' / ', array_map(
                                fn($a) => $a !== null ? number_format($a, 0, ',', '.') . ' Ft' : '-',
                                $bor['ar']
                            )),
                            'regio' => $item['regio'] ?? null,
                        ];
                    });
                }

                // Egyszerű item (nem bor)
                return [[
                    'name' => $item['nev'],
                    'description' => isset($item['mennyiseg'])
                        ? (is_array($item['mennyiseg'])
                            ? implode(' / ', $item['mennyiseg'])
                            : $item['mennyiseg'])
                        : null,
                    'price' => is_array($item['ar'])
                        ? implode(' / ', array_map(
                            fn($a) => number_format($a, 0, ',', '.') . ' Ft',
                            $item['ar']
                        ))
                        : number_format($item['ar'], 0, ',', '.') . ' Ft',
                    'regio' => null
                ]];
            })->toArray(),
        ];
    })->toArray();

    return view('drinkList', compact('menu'));
}
}
