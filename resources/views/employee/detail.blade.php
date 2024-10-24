@extends('shared.layout')


@section('css')
@endsection

@section('body')
    <div class="uk-flex uk-flex-between uk-margin-bottom">
        <div class="uk-width-1-2">
            <h3>Detail data karyawan</h3>
        </div>
        <div class="uk-width-1-2">
            <button class="uk-button uk-button-small" onclick="window.location.href='/employee'">Kembali</button>

        </div>
    </div>
    <div class="uk-flex uk-flex-between uk-margin-bottom">
        <div class="uk-width-1-2">
            <p>NIP</p>
        </div>
        <div class="uk-width-1-2">
            <p>{{ $employee->nip }}</p>
        </div>
    </div>
    <div class="uk-flex uk-flex-between uk-margin-bottom">
        <div class="uk-width-1-2">
            <p>Nama Karyawan</p>
        </div>
        <div class="uk-width-1-2">
            <p>{{ $employee->nama_karyawan }}</p>
        </div>
    </div>
    <div class="uk-flex uk-flex-between uk-margin-bottom">
        <div class="uk-width-1-2">
            <p>Jabatan</p>
        </div>
        <div class="uk-width-1-2">
            <p>{{ $employee->jabatan }}</p>
        </div>
    </div>
    <div class="uk-flex uk-flex-between uk-margin-bottom">
        <div class="uk-width-1-2">
            <p>Alamat</p>
        </div>
        <div class="uk-width-1-2">
            <p>{{ $employee->alamat }}</p>
        </div>
    </div>
    <div class="uk-flex uk-flex-between uk-margin-bottom">
        <div class="uk-width-1-2">
            <p>No. Telepon</p>
        </div>
        <div class="uk-width-1-2">
            <p>{{ $employee->telp }}</p>
        </div>
    </div>
    <div class="uk-flex uk-flex-between uk-margin-bottom">
        <div class="uk-width-1-2">
            <p>Foto</p>
        </div>
        <div class="uk-width-1-2">
            <img src="{{ asset($employee->foto) }}" style="width: 500px" alt="{{ $employee->nama_karyawan }}">
        </div>
    </div>
@endsection

@section('js')
    <script></script>
@endsection
