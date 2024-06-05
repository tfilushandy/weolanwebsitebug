@extends('layouts.template')
@section('content')
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
      background-image: linear-gradient(#3354e7, #a0adeb);
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

    .card-header {
      background: linear-gradient(to right, #3354e7, slategray);
      border: none;
    }

    .card-yellow {
      background-color: yellow;
    }

    .rating input {
      display: none;
    }

    .rating label {
      font-size: 20px;
      color: grey;
      cursor: pointer;
    }

    .rating input:checked ~ label {
      color: gold;
    }

    .rating input:not(:checked) ~ label:hover,
    .rating input:not(:checked) ~ label:hover ~ label {
      color: gold;
    }
  </style>
</head>
<div class="container" style="margin-top:70px;">
  <!-- Product Name -->
  <div class="row">
    <div class="col-12">
      <h1 class="font-weight-bold">{{ $itemproduk->nama_produk }}</h1>
    </div>
  </div>

    <!-- Flyer -->
    <div class="row mt-4">
        <div class="col-lg-8">
            <div class="card" style="box-shadow: 5px 6px 6px 2px #e9ecef;">
                <a href="{{ URL::to('product{id}/'.$itemproduk->slug_produk ) }}">
                    <img src="http://127.0.0.1:8000/images/{{ $itemproduk->flyer }}" alt="{{ $itemproduk->nama_produk }}" class="card-img-top" style="max-height: 190px; width: 100%;">
                </a>  
            </div>
        </div>

    <!-- Add to Wishlist and Checkout -->
    <div class="col-lg-4">
      <div class="card" style="box-shadow: 5px 6px 6px 2px #e9ecef;">
        <div class="card-body card">
          <!-- @if(count($errors) > 0)
            @foreach($errors->all() as $error)
              <div class="alert alert-warning">{{ $error }}</div>
            @endforeach
          @endif
          @if ($message = Session::get('error'))
            <div class="alert alert-warning">
              <p>{{ $message }}</p>
            </div>
          @endif
          @if ($message = Session::get('success'))
            <div class="alert alert-success">
              <p>{{ $message }}</p>
            </div>
          @endif -->
          <h5 class="strong" style="color:white">{{ $itemproduk->nama_produk }}</h5>
          <div class="row">
            <div class="col">
              @if($itemproduk->promo != null)
                <p style="color:white">
                  Rp. <del>{{ number_format($itemproduk->promo->harga_awal, 2) }}</del>
                  <br />
                  Rp. {{ number_format($itemproduk->promo->harga_akhir, 2) }}
                </p>
              @else
                <p style="color:white">
                  Rp. {{ number_format($itemproduk->harga, 2) }}
                </p>
              @endif
            </div>
          </div>
          <div class="row mt-4">
            <div class="col">
              <form action="{{ route('wishlist.store') }}" method="post">
                @csrf
                <input type="hidden" name="produk_id" value={{ $itemproduk->id }}>
                <button type="submit" class="btn btn-sm" >
                  @if(isset($itemwishlist) && $itemwishlist)
                    <i class="fas fa-heart"></i> Add to Wishlist
                  @else
                    <i class="far fa-heart"></i> Add to Wishlist
                  @endif
                </button>
              </form>
            </div>
            <div class="col" style="margin-top: -5px">
              <form action="{{ route('cartdetail.store') }}" method="POST">
                @csrf
                <input type="hidden" name="produk_id" value={{$itemproduk->id}}>
                <button class="btn btn-sm" type="submit" style="margin-top:5px;  ">
                  <i class="fa fa-shopping-cart"></i> Add to Cart
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Description Section -->
  <div class="row mt-4">
    <div class="col-lg-8">
      <div class="card" style="box-shadow: 5px 6px 6px 2px #e9ecef;">
        <div class="card-header">
          <h5>Description</h5>
        </div>
        <div class="card-body" style="color:black;">
          {{ $itemproduk->deskripsi_produk }}
          <br>
          <br>
          Cara Melakukan Top Up di WEOLAN:
          <br>
          1. Login atau register terlebih dahulu
          <br>
          2. Kembali ke produk dan klik detail
          <br>
          3. Masukkan UID dan server, lalu klik add to Cart
          <br>
          4. Pilihlah pembayaran yang tersedia di Cart
          <br>
          5. Klik checkout dan buat pesanan.
        </div>
      </div>
    </div>

    <!-- Add Review Section -->
    <div class="col-lg-4">
      <div class="card" style="box-shadow: 5px 6px 6px 2px #e9ecef;">
        <div class="card-header">
          <h5>Add Review</h5>
        </div>
        <div class="card-body">
          <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group">
              <div class="rating" style="margin-left: 5px;">
                <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> 
                <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                <img src="{{ asset('img/user1-128x128.jpg') }}" style="max-height: 40px; max-width: 40px; margin-bottom: 10px; margin-right:5px" />
              </div>
              <input type="hidden" name="produk_id" value="{{ $itemproduk->id }}">
              <textarea class="form-control mt-3" name="content" id="content"></textarea>
              <button type="submit" class="btn btn-sm btn-primary" style=" margin-top: 10px;">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



  <!-- Reviews Section -->
  <div class="row mt-4">
    <div class="col">
      <div class="card" style="box-shadow: 5px 6px 6px 2px #e9ecef;">
        <div class="card-header">
          <h5>Reviews</h5>
        </div>
        <div class="card-body">
          @forelse ($itemproduk->comments as $comment)
            <div class="row">
              <div class="col-md-1">
                <img src="{{ asset('img/user1-128x128.jpg') }}" style="max-height: 40px; max-width: 40px;" />
              </div>
              <div class="col-md">
                <p class="font-weight-bold">{{ $comment->user->name }}</p>
                <p>{{ $comment->content }}</p>
              </div>
              <div class="col-md">
                @for ($i = 0; $i < 5; $i++)
                  @if ($i < $comment->rating)
                    <i class="fas fa-star text-warning"></i>
                  @else
                    <i class="far fa-star text-warning"></i>
                  @endif
                @endfor
              </div>
            </div>
            <hr />
          @empty
            <div class="alert alert-info">Belum ada komentar.</div>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</div>


@endsection