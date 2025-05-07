<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class MenuController extends Controller
{
    public function index()
    {
        $locale = App::getLocale();
        $fileName = "etlap_{$locale}.json";
        $path = resource_path("lang/{$locale}/{$fileName}");

        if (!File::exists($path)) {
            abort(404, "Etlap fájl nem található: $path");
        }

        $menu = json_decode(File::get($path), true);

        return view('menu', compact('menu'));
    }
}
