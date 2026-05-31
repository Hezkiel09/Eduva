<?php

namespace App\Http\Controllers;

use App\Models\IndustryTrend;

class IndustryTrendController extends Controller
{
    
    public function index()
    {
        
        $trendsGrouped = IndustryTrend::orderByRaw("FIELD(demand_level, 'high', 'medium', 'low')")
            ->orderBy('category')
            ->get()
            ->groupBy('category');

        return view('trends.index', compact('trendsGrouped'));
    }
}
