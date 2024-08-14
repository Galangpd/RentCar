@extends('layouts.admin')

@section('content')

            <div class="card">
                <div class="card-header">
                Form Edit Data
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="nama_mobil">Nama Mobil</label>
                            <input type="text" name="nama_mobil" class="form-control" value="{{ old('nama_mobil', $car->nama_mobil) }}">
                        </div>
                        <div class="form-group">
                            <label for="harga_sewa">Harga Sewa</label>
                            <input type="number" name="harga_sewa" class="form-control" value="{{ old('harga_sewa', $car->harga_sewa) }}">
                        </div>
                        <div class="form-group">
                            <label for="bahan_bakar">Bahan Bakar</label>
                            <select name="bahan_bakar" id="bahan_bakar" class="form-control">
                                <option {{ $car->bahan_bakar == 'bensin' ? 'selected' : null }} value="bensin">Bensin</option>
                                <option {{ $car->bahan_bakar == 'diesel' ? 'selected' : null }} value="diesel">Diesel</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_kursi">Jumlah Kursi</label>
                            <input type="number" name="jumlah_kursi" class="form-control" value="{{ old('jumlah_kursi', $car->jumlah_kursi) }}">
                        </div>
                        <div class="form-group">
                            <label for="transmisi">Transmisi</label>
                            <select name="transmisi" id="transmisi" class="form-control">
                                <option {{ $car->transmisi == 'manual' ? 'selected' : null }} value="manual">Manual</option>
                                <option {{ $car->transmisi == 'matic' ? 'selected' : null }} value="matic">Matic</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option {{ $car->status == 'tersedia' ? 'selected' : null }} value="tersedia">Tersedia</option>
                                <option {{ $car->status == 'tidak tersedia' ? 'selected' : null }} value="tidak tersedia">Tidak Tersedia</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi" cols="50" rows="10"> {{ old('deskripsi', $car->deskripsi) }}</textarea>
                        </div>
                        <div class="form-group">
                            <h6>Fitur</h6>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="" name="p3k" id="p3k" {{ $car->p3k ? 'checked' : '' }}>
                            <label for="p3k" class="form-check-label">P3K</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="" name="charger" id="charger" {{ $car->charger ? 'checked' : '' }}>
                            <label for="charger" class="form-check-label">Charger</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="" name="audio" id="audio" {{ $car->audio ? 'checked' : '' }}>
                            <label for="audio" class="form-check-label">Audio</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="" name="ac" id="ac" {{ $car->ac ? 'checked' : '' }}>
                            <label for="ac" class="form-check-label">AC</label>
                        </div>
                        <div class="form-group">
                            <img src="{{ Storage::url($car->gambar) }}" alt="">
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control" name="gambar" {{ old('gambar', $car->gambar) }}>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>


@endsection