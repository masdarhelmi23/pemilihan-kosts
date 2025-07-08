<?php
namespace App\Http\Controllers;

use App\Models\Kost;
use Illuminate\Http\Request;

class KostController extends Controller
{
    public function index()
    {
        $kosts = Kost::all();
        return view('kosts.index', compact('kosts'));
    }

  public function show(Kost $kost)
{
    return view('kosts.show', compact('kost'));
}


}
