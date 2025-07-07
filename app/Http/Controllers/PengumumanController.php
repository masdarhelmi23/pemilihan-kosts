<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use Illuminate\View\View;

class PengumumanController extends Controller
{
    public function list(): View
 {
 $data = pengumuman::all();
 return view('pengumuman.list', [ 'data' => $data ]);
 }
 public function detail($id): View
 {
 $data = Pengumuman::find($id);
 return view('pengumuman.detail', [ 'data' => $data ]);
 }
}
