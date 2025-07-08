<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, $kost_id)
    {
        $request->validate([
            'nama_reviewer' => 'required',
            'komentar' => 'required',
            'rating' => 'required|integer|min:1|max:5'
        ]);

        Review::create([
            'kost_id' => $kost_id,
            'nama_reviewer' => $request->nama_reviewer,
            'komentar' => $request->komentar,
            'rating' => $request->rating
        ]);

        return redirect()->back()->with('success', 'Review berhasil dikirim.');
    }
}
