@extends('layout')
@section('judul', 'Pengumuman')
@section('konten')
 <section class="hero is-success">
 <div class="hero-body">
 <p class="title">Pengumuman</p>
 <p class="subtitle">Program Studi Sistem Informasi</p>
 </div>
 </section>
 <section class="section has-background-primary-soft has-text-primary-soft-invert">
 @foreach ($data as $item)
 <div class="card">
 <div class="card-content">
 <div class="content">
 {{ $item->judul_pengumuman }}
 </div>
 </div>
<footer class="card-footer">
 <a href="/pengumuman/{{ $item->id }}" class="card-footer-item">
Selengkapnya
 </a>
 </footer>
 </div>
 @endforeach
 </section>
@endsection