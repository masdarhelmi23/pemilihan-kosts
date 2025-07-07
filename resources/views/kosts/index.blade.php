@extends('layouts.app')

@section('content')
    <h1>Daftar Kost</h1>
    <ul>
        @foreach($kosts as $kost)
            <li>
                <a href="{{ route('kosts.show', $kost->id) }}">{{ $kost->nama_kost }}</a>
            </li>
        @endforeach
    </ul>
@endsection
