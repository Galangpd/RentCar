@extends('layouts.home')

@section('content')
<header class="py-5 mt-5" style="background-image: url('{{ Storage::url('public/assets/cars/sewa-mobil.png') }}'); height: 600px; background-size: cover; background-position: center;">
  <div class="container px-4 px-lg-5 my-5">
    <div class="text-center text-dark">
      <h1 class="display-4 fw-bolder">RentCar</h1>
      <p class="lead fw-normal text-dark-50 mb-0">
        Sewa mobil terpercaya
      </p>
    </div>
  </div>
</header>
<!-- Section-->
<section class="py-5">
  <div class="container px-4 py-4 mt-5 text-center">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime libero voluptates ut! Aspernatur assumenda nam quo ut? Deserunt quas iure quis fugiat nulla velit nisi. In numquam aspernatur fugit molestias facilis consectetur, necessitatibus debitis aperiam tempora, dolorem autem voluptates aliquam corrupti quasi voluptas repellat ratione vel? Nisi earum nostrum officia!</p>
  </div>
  <div class="container px-4 px-lg-5 mt-5">
    <h3 class="text-center mb-5">Daftar Mobil</h3>
    <div
      class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"
    >
    @foreach ($cars as $car)
    <div class="col mb-5">
      <div class="card h-100">
        <!-- Sale badge-->
        <div
          class="badge badge-custom {{ $car->status == 'tersedia' ? 'bg-success' : 'bg-warning'}} text-white position-absolute"
          style="top: 0; right: 0"
        >
          {{ $car->status }}
        </div>
        <!-- Product image-->
        <img
          class="card-img-top"
          src="{{ Storage::url($car->gambar) }}"
          alt="{{ $car->nama_mobil }}"
          style="height: 200px"
        />
        <!-- Product details-->
        <div class="pt-4">
          <div class="text-center w-auto">
            <!-- Product name-->
            <h5 class="bg-primary text-white py-2">{{ $car->nama_mobil }}</h5>
            <!-- Product price-->
            <div class="rent-price mb-3">
              <span class="text-primary">Rp{{ number_format($car->harga_sewa) }}/</span>hari
            </div>
            <ul class="list-unstyled list-style-group px-3">
              <li
                class="border-bottom p-2 d-flex justify-content-between"
              >
                <span>Bahan bakar</span>
                <span style="font-weight: 600">{{ $car->bahan_bakar }}</span>
              </li>
              <li
                class="border-bottom p-2 d-flex justify-content-between"
              >
                <span>Jumlah Kursi</span>
                <span style="font-weight: 600">{{ $car->jumlah_kursi }}</span>
              </li>
              <li
                class="border-bottom p-2 d-flex justify-content-between"
              >
                <span>Transmisi</span>
                <span style="font-weight: 600">{{ $car->transmisi }}</span>
              </li>
            </ul>
          </div>
        </div>
        <!-- Product actions-->
        <div class="card-footer border-top-0 bg-transparent">
          <div class="text-center">
            <a class="btn btn-primary mt-auto" href="https://api.whatsapp.com/send?phone=6288232386446&text=Saya%20tertarik%20untuk%20menyewa%20mobil%20{{$car->nama_mobil }}">Sewa</a>
            <a
              class="btn btn-info mt-auto text-white"
              href="{{ route('detail', $car->slug) }}"
              >Detail</a
            >
          </div>
        </div>
      </div>
    </div>
    @endforeach

    </div>
  </div>
</section>
@endsection