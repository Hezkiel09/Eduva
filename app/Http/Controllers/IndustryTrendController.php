<?php

namespace App\Http\Controllers;

use App\Models\IndustryTrend;

class IndustryTrendController extends Controller
{
    /**
     * Tampilkan semua tren industri, dikelompokkan per kategori.
     */
    public function index()
    {
        // Ambil semua tren, diurutkan: high demand duluan
        $trendsGrouped = IndustryTrend::orderByRaw("FIELD(demand_level, 'high', 'medium', 'low')")
            ->orderBy('category')
            ->get()
            ->groupBy('category');

        return view('trends.index', compact('trendsGrouped'));
    }
}
