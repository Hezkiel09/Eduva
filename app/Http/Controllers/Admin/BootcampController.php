<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bootcamp;
use App\Models\CareerTrack;
use Illuminate\Http\Request;

class BootcampController extends Controller
{
    public function index()
    {
        $bootcamps = Bootcamp::with('careerTrack')->orderBy('track_id')->get();

        return view('admin.bootcamps.index', compact('bootcamps'));
    }

    public function create()
    {
        $tracks = CareerTrack::all();

        return view('admin.bootcamps.create', compact('tracks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'track_id'    => 'required|exists:career_tracks,track_id',
            'name'        => 'required|string|max:150',
            'url'         => 'required|url|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        Bootcamp::create($validated);

        return redirect()->route('admin.bootcamps.index')
            ->with('success', 'Rekomendasi pembelajaran berhasil ditambahkan.');
    }

    public function edit(Bootcamp $bootcamp)
    {
        $tracks = CareerTrack::all();

        return view('admin.bootcamps.edit', compact('bootcamp', 'tracks'));
    }

    public function update(Request $request, Bootcamp $bootcamp)
    {
        $validated = $request->validate([
            'track_id'    => 'required|exists:career_tracks,track_id',
            'name'        => 'required|string|max:150',
            'url'         => 'required|url|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        $bootcamp->update($validated);

        return redirect()->route('admin.bootcamps.index')
            ->with('success', 'Rekomendasi pembelajaran berhasil diperbarui.');
    }

    public function destroy(Bootcamp $bootcamp)
    {
        $bootcamp->delete();

        return redirect()->route('admin.bootcamps.index')
            ->with('success', 'Rekomendasi pembelajaran berhasil dihapus.');
    }
}
