@extends('layout')
@section('judul', $data->judul_pengumuman )
@section('konten')
 <section class="hero is-success">
 <div class="hero-body">
 <p class="title">Pengumuman</p>
 <p class="subtitle"> {{ $data->judul_pengumuman }} </p>
 </div>
 </section>
 <section class="section has-background-primary-soft has-text-primary-soft-invert">
 <div class="card">
 <div class="card-content">
 <div class="content">
 {{ $data->konten_pengumuman }}
 </div>
 </div>
 </div>
 <a href="/pengumuman" class="button is-info">Kembali</a>

 </section>
@endsection