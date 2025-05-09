<?php

namespace App\Http\Controllers;

use App\Models\WeeklyOffer;
use App\Models\WeeklyOfferMeta;
use Illuminate\Http\Request;

class WeeklyOfferController extends Controller
{
    public function show()
    {
        $meta = WeeklyOfferMeta::first();
        $soups = WeeklyOffer::where('category', 'leves')->orderBy('letter')->get();
        $mains = WeeklyOffer::where('category', 'főétel')->orderBy('letter')->get();

        return view('weeklyOffer', compact('meta', 'soups', 'mains'));
    }
}
