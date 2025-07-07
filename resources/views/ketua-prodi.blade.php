@extends('layout')

@section('judul', Ketua Prodi')

@section('konten')
<section class="hero is-success">
<div class="hero-body">
<p class="title">Ketua Prodi</p>
<p class="subtitle">

Program Studi Sistem Informasi
</p>
</div>
</section>
<section class="section has-background-primary-soft
has-text-primary-soft-invert">
<div class="columns">
<div class="column is-one-third box">
<img class="image" src="/images/foto.jpg">
</div>
<div class="column">
<table class="table is-striped">
<tr>
<td>Nama</td>
<td>:</td>
<td> Eko Purwanto, M.Kom</td>

</tr>
<tr>

<td>Alamat</td>
<td>:</td>
<td> Surakarta</td>

</tr>

Memanggil/mewariskan
template layout.blade.php

Mengisi @yield(‘judul’) yang
berada di layout.blade.php

Mengisi @yield(‘konten’) yang
berada di layout.blade.php

<tr>
<td>Kewarganegaraan</td>

<td>:</td>
<td> Indonesia</td>

</tr>
</table>
</div>
</div>
</section>
@endsection