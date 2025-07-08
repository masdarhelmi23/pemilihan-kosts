@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <div class="box"> {{-- Bulma 'box' component for the main container --}}
            <h1 class="title is-3 has-text-primary mb-5">Pesan Kost: {{ $kost->nama_kost }}</h1> {{-- Bulma title and color classes --}}

            <form action="{{ route('pemesanans.store', $kost->id) }}" method="POST">
                @csrf

                <div class="field"> {{-- Bulma 'field' for form groups --}}
                    <label class="label" for="nama_penyewa">Nama Penyewa</label> {{-- Bulma 'label' class --}}
                    <div class="control"> {{-- Bulma 'control' for input wrapping --}}
                        <input class="input" type="text" name="nama_penyewa" id="nama_penyewa" placeholder="Masukkan nama penyewa" required> {{-- Bulma 'input' class --}}
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="tanggal_mulai">Tanggal Mulai</label>
                    <div class="control">
                        <input class="input" type="date" name="tanggal_mulai" id="tanggal_mulai" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="tanggal_akhir">Tanggal Akhir</label>
                    <div class="control">
                        <input class="input" type="date" name="tanggal_akhir" id="tanggal_akhir" required>
                    </div>
                </div>

                <div class="field is-grouped is-justify-content-center"> {{-- Menggunakan is-grouped untuk tombol dan is-justify-content-center untuk memusatkannya --}}
                    <div class="control">
                        <button type="submit" class="button is-primary is-medium"> {{-- Bulma 'button' classes --}}
                            Simpan Pemesanan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection