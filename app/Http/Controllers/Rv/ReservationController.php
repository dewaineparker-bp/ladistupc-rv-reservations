<?php

namespace App\Http\Controllers\Rv;

use App\Http\Controllers\Controller;
use App\Models\RvReservation;
use App\Models\RvSite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ReservationController extends Controller
{
    public function index()
    {
        return view('rv.index');
    }

    public function availability(Request $request)
    {
        $validated = $request->validate([
            'arrival_date' => ['required', 'date', 'after_or_equal:today'],
            'departure_date' => ['required', 'date', 'after:arrival_date'],
            'usage_mode' => ['required', 'in:occupied,storage'],
        ]);

        if (!Schema::hasTable('rv_sites')) {
            return redirect()->route('rv.home')->with('error', 'The RV database has not been initialized yet.');
        }

        $blockedSiteIds = RvReservation::query()
            ->whereIn('status', ['pending', 'confirmed'])
            ->where('arrival_date', '<', $validated['departure_date'])
            ->where('departure_date', '>', $validated['arrival_date'])
            ->pluck('site_id');

        $sites = RvSite::query()
            ->where('active', true)
            ->whereNotIn('id', $blockedSiteIds)
            ->orderBy('site_number')
            ->get();

        return view('rv.availability', compact('sites', 'validated'));
    }
}
