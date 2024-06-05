@extends('layouts.template')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      background-image: url('/images/bgmain.png'); /* Replace with the path to your background image */
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed; /* Ensure the background remains fixed when scrolling */
      font-family: 'Poppins', sans-serif;
    }

    .category-btn {
      width: 150px;
      font-size: 13px;
      font-weight: bold;
      color: white;
      background-color: #3399ff;
      transition: transform 0.3s ease, background-color 0.3s ease;
      margin: 5px;
      border: none;
      border-radius: 5px;
    }

    .category-btn:hover {
      background-color: #0056b3;
      color: white;
      transform: scale(1.1);
    }

    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      font-family: 'Poppins', sans-serif;
      background-image: linear-gradient(#4139d4, #a0adeb);
      color: white;
    }

    .card h2, .card .text-left {
      font-weight: bold;
      margin-bottom: 20px;
    }

    .btn-group .btn {
      border-radius: 5px;
    }

    .toolbar-sorted {
      margin: 20px;
    }

    .select-box {
      width: 100%;
      padding: 10px;
      border: 1px solid #3399ff;
      border-radius: 5px;
      background-color: white;
      color: #3399ff;
      font-family: 'Poppins', sans-serif;
      font-weight: bold;
      appearance: none;
    }

    .select-box:focus {
      outline: none;
      border-color: #0056b3;
    }

    .card-body {
      background-color: white;
      color: black;
    }

    .card-body .btn {
      background-color: #3399ff;
      color: white;
      border: none;
      font-weight: bold;
      border-radius: 5px;
    }

    .card-body .btn:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container" style="margin-bottom:70px;">
    <div class="row">
      <div class="col">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" style="margin-bottom: 30px;">
          <div class="carousel-inner">
            <!-- Carousel items go here -->
          </div>
        </div>
      </div>
    </div>


    <!-- kategori produk -->
    <div class="card" style="padding: 20px;">
      <div class="bg-transparent">
        <h2 class="text-left">Product Category</h2>
        <div class="btn-group d-flex flex-wrap shadow-none mt-1 mt-lg-1 mt-md-1 mt-xl-1 ms-2 ms-lg-2 ms-md-2 ms-xl-2">
          @foreach($listkategori as $kategori)
            <a href="{{ URL::to('category/'.$kategori->slug_kategori) }}" class="btn category-btn mt-1 mt-lg-1 mt-md-1 mt-xl-1 mx-2 mx-lg-2 mx-md-2 mx-xl-2 rounded">
              {{ $kategori->nama_kategori }}
            </a>
          @endforeach
        </div>
      </div>
    </div>
    <!-- end kategori produk -->


    <!-- produk Terbaru -->
    <div class="row mt-4" style="margin-top: 30px; margin-bottom: 30px;">
      <div class="col col-md-12 col-sm-12 mb-4">
        <h2 class="text-left">Terbaru</h2>
      </div>
      @foreach($itemproduk as $produk)
      <!-- produk pertama -->
      <div class="col-md-4">
        <div class="card mb-4">
          <div style="height: 190px; max-width: 270px; display: flex; align-items: center; margin-left: auto; margin-right: auto;">
            <a href="{{ URL::to('product/'.$produk->slug_produk) }}">
              @if($produk->foto != null)
                <img src="http://127.0.0.1:8000/images/{{ $produk->foto }}" alt="{{ $produk->nama_produk }}" class="card-img-top" style="max-height: 190px; width: 100%;">
              @else
                <img src="/images/diamondml.jpg" alt="{{ $produk->nama_produk }}" class="card-img-top" style="max-height: 190px; width: 100%;">
              @endif
            </a>
          </div>
          <div class="card-body">
            <div class="row mt-4">
              <div class="col">
                <a class="text-decoration-none" style="color: black;">
                  <p class="card-text h5">
                    <strong>{{ $produk->nama_produk }}</strong>
                  </p>
                </a>
              </div>
              <div class="col-auto">
                <p>
                  Rp. {{ number_format($produk->harga, 2) }}
                </p>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col">
                <a class="btn" href="{{ URL::to('product/'.$produk->slug_produk) }}">
                  Detail
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</body>
</html>
@endsection
