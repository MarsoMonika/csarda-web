<?php

namespace App\Http\Controllers;

use App\Models\WeeklyOffer;
use App\Models\WeeklyOfferMeta;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $meta = WeeklyOfferMeta::first();
        $offers = WeeklyOffer::orderBy('letter')->get();

        return view('admin.index', [
            'meta' => $meta ?? new WeeklyOfferMeta(['text' => '', 'validity' => '']),
            'offers' => $offers,
        ]);
    }
    public function addOffer(Request $request)
    {
        $data = $request->validate([
            'letter' => 'required|string|max:1',
            'category' => 'required|string|max:20',
            'description' => 'required|string|max:255',
        ]);

        WeeklyOffer::create($data);

        return redirect()->route('admin')->with('success', 'Tétel hozzáadva.');
    }

    public function deleteOffer($id)
    {
        WeeklyOffer::findOrFail($id)->delete();
        return redirect()->route('admin')->with('success', 'Tétel törölve.');
    }

    public function updateMeta(Request $request)
    {
        $data = $request->validate([
            'text' => 'nullable|string',
            'validity' => 'nullable|string',
        ]);

        $meta = WeeklyOfferMeta::first();

        if ($meta) {
            $meta->update($data);
        } else {
            WeeklyOfferMeta::create($data);
        }

        return redirect()->route('admin')->with('success', 'Heti ajánlat meta frissítve.');
    }
}
