@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            Form Tambah Data
        </div>

        <div class="card-body">
            <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_mobil">Nama Mobil</label>
                    <input type="text" name="nama_mobil" class="form-control" value="{{ old('nama_mobil') }}">
                </div>
                <div class="form-group">
                    <label for="harga_sewa">Harga Sewa</label>
                    <input type="number" name="harga_sewa" class="form-control" value="{{ old('harga_sewa') }}">
                </div>
                <div class="form-group">
                    <label for="bahan_bakar">Bahan Bakar</label>
                    <select name="bahan_bakar" id="bahan_bakar" class="form-control">
                        <option value="bensin">Bensin</option>
                        <option value="diesel">Diesel</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah_kursi">Jumlah Kursi</label>
                    <input type="number" name="jumlah_kursi" class="form-control" value="{{ old('jumlah_kursi') }}">
                </div>
                <div class="form-group">
                    <label for="transmisi">Transmisi</label>
                    <select name="transmisi" id="transmisi" class="form-control">
                        <option value="manual">Manual</option>
                        <option value="matic">Matic</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="tersedia">Tersedia</option>
                        <option value="tidak tersedia">Tidak Tersedia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi" cols="50" rows="10">{{ old('deskripsi') }}</textarea>
                </div>
                <div class="form-group">
                    <h6>Fitur</h6>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="1" name="p3k" id="p3k">
                    <label for="p3k" class="form-check-label">P3K</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="1" name="charger" id="charger">
                    <label for="charger" class="form-check-label">Charger</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="1" name="audio" id="audio">
                    <label for="audio" class="form-check-label">Audio</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="1" name="ac" id="ac">
                    <label for="ac" class="form-check-label">AC</label>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control" name="gambar">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
                </div>
            </form>
        </div>
    </div>

@endsection