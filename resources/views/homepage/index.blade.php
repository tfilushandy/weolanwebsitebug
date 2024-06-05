@extends('layouts.template')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

</head>

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<style>
  /* CSS for background */
  body {
    background-image: url('/images/bgmain.png'); /* Replace with the path to your background image */
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed; /* Ensure the background remains fixed when scrolling */
  }

  /* Carousel images */
  .carousel-item img {
    border-radius: 10px; /* Set the border-radius for rounded corners */
    border: 0px solid #ccc; /* Optional: Add border if needed */
    max-height: 500px; /* Set a maximum height for the carousel images */
    width: 100%;
    object-fit: cover; /* Ensure the image covers the container while maintaining aspect ratio */
  }

  /* Shake animation on hover */
  .shake-on-hover:hover {
    animation: shake 0.5s ease;
  }

  @keyframes shake {
    0% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    50% { transform: translateX(5px); }
    75% { transform: translateX(-5px); }
    100% { transform: translateX(0); }
  }

  /* Category image */
  .cardproduk {
    box-shadow: ;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%; /* Ensure the card takes full height */
    display: flex;
    flex-direction: column;
  }

  .cardproduk:hover {
    transform: scale(1.05);
    box-shadow: 10px 12px 12px 4px #e9ecef;
  }

  .card-image {
    max-height: 100%;
    max-width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: linear-gradient(to right, #3354e7, slategray); /* Background gradient */
  }

  .product-image {
    max-height: 50%;
    max-width: 50%;
    align-items: center;
    justify-content: center;
    transition: transform 0.3s ease;
  }

  .cardproduk:hover .product-image {
    transform: scale(1.1);
  }

  .card-body {
    border: none;
    background: linear-gradient(to right, #3354e7, slategray);
    padding: 1rem;
    flex-grow: 1; /* Allow card body to grow */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    
  }

  .card-body .row {
    margin: 0;
  }

  .btn {
    background-color: white;
    color: black;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  .btn:hover {
    background-color: #3354e7;
    color: white;
  }

  .category-link {
    width: 150px;
    font-size: 13px;
    font-weight: bold;
    font-family: 'Poppins', sans-serif;
    background-color: #4b68e7;
    color: white;
    padding: 10px;
    margin: 2px;
    margin-right: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    border-radius: 5px;
  }

  .bodycardkali{
    border-radius: 4%;
  }

  .category-link:hover {
    background-color: #3354e7;
    transform: scale(1.05);
  }

  .category-image {
    max-height: 100px;
    max-width: 100px;
  }

  /* Responsive adjustments */
@media (max-width: 768px) {
  .category-link {
    width: 120px;
    font-size: 11px;
  }

  .card-image {
    position: relative;
    height: 0px;
    weight: 0px;
  }

  .cardproduk{
    flex-direction: ;
  }


  .product-image {
    max-height: 100%;
    max-width: 100%;
    position: absolute;
    top: 50%;
    left: 10px; /* Adjust left position as needed */
    transform: translate(-50%, -50%);
    opacity: 0.5; /* Adjust opacity as needed */
    z-index: -1; /* Ensure image is behind text */
    transition: opacity 0.3s ease;
  }

  .cardproduk:hover .product-image {
    opacity: 1; /* Change opacity on hover */
  }

  .card-body {
    padding-left: 30px; /* Adjust left padding to accommodate the image */

  }

  .btn {
    margin-top: 5px; /* Add margin to separate button from text */
  }
}

/* full screen */
@media only screen and (min-width: 1056px) {

  .category-link {
    font-size: 11px;
    display: flex;
    flex-direction: column;
    animation: slideRight 30s linear infinite;
}

}

@media only screen and (max-width: 1056px) {

.category-link {
  font-size: 11px;
  display: flex;
  flex-direction: column;
}

}


/* Untuk layar dengan lebar maksimum 768px */
@media only screen and (max-width: 768px) {
  .cardcategory .category-link {
    display: flex;
    flex: 0 0 105%;
    flex-direction: row;
    align-items: center;
    text-align: left;
    margin-left: 5px;
  }

  .category-image {
    /* Menambahkan margin kanan agar terpisah dari teks */
    margin-right: 10px;
  }

  .category-link .text-white {
    flex-grow: 1; /* Agar teks mengambil sisa ruang yang tersedia */
  }

  .category-link{
    font-size: 20px;
  }
}



</style>

<div class="container-fluid">
  <!-- Carousel -->


  <!-- End Carousel -->

  <!-- Category -->
  <div class="cardcategory p-4 bg-transparent border-0 my-3">
    <div class="bg-transparent">
      <h2 class="font-weight-bold mb-4 text-white" style="margin-left: -21px;">Pilihan Game</h2>
      <div class="d-flex flex-wrap justify-content-center">
        @foreach($itemkategori as $kategori)
          @php
            $imageSrc = '';
            switch ($kategori->nama_kategori) {
              case 'DIAMOND MOBILE LEGENDS':
                $imageSrc = 'images/mlkat.png';
                break;
              case 'JOKI MOBILE LEGEND':
                $imageSrc = 'images/jokikat.png';
                break;
              case 'GENESIS CRYSTALS GENSHIN IMPACT':
                $imageSrc = 'images/genshinkat.png';
                break;
              case 'DIAMOND FREE FIRE BOOYAH':
                $imageSrc = 'images/ffkat.png';
                break;
              case 'PUBG MOBILE':
                $imageSrc = 'images/pubgkat.png';
                break;
              case 'CLASH OF CLAN MOBILE':
                $imageSrc = 'images/cockat.jpg';
                break;
              default:
                $imageSrc = 'images/mlkat.png';
                break;
            }
          @endphp
          <a href="{{ URL::to('category/'.$kategori->slug_kategori) }}" class="category-link">
            <img src="{{ asset($imageSrc) }}" alt="{{ $kategori->nama_kategori }}" class="category-image">
            <span class="mt-2 text-white">{{ $kategori->nama_kategori }}</span>
          </a>
        @endforeach
      </div>
    </div>
  </div>
  <!-- End Category -->

  <!-- Product Promo -->
  <div class="row mt-4">
    <div class="col-12 mb-4">
      <h2 class="font-weight-bold text-white">Product Promo</h2>
    </div>
  </div>

  <?php
/*
* Bootstrap 4 carousel w/ php
*/ 
      $slider = [
          [
              'img'         => asset('images/promoo1.png'),
          ],
          [
            'img'         => asset('images/promoo2.png'),
        ],
        [
          'img'         => asset('images/promoo3.png'),
      ],
      [
        'img'         => asset('images/promoo4.png'),
    ],
      ];
      $length = count($slider);
      $index = 0;

?>
  

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="height: 100%;">
        <!-- Indicators -->
        <ol class="carousel-indicators">
        <?php for ($i = 0; $i < $length; $i++): ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>"<?php echo ($index === $i ? ' class="active"' : ''); ?>></li>
        <?php endfor; ?>
        </ol>
        <div class="carousel-inner" role="listbox">
        <?php foreach ($slider as $i => $item): ?>
            <div class="carousel-item<?php echo ($index === $i ? ' active' : ''); ?>">
            <?php echo '<img class="d-block img-fluid" src="'.$item['img'].'" alt="...">'; ?>
            </div>
        <?php endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
  <!-- End Product Promo -->

  <!-- New Product -->
  <div class="row mt-4">
    <div class="col-12 mb-4">
      <h2 class="font-weight-bold text-white">New Product</h2>
    </div>
    @foreach($itemproduk as $produk)
    <div class="bodycardkali col-md-4 mb-4">
      <div class="cardproduk">
        <div class="card-image">
          <a href="{{ URL::to('product/'.$produk->slug_produk ) }}">
            @if($produk->foto != null)
              <img src="images/{{ $produk->foto }}" alt="{{ $produk->nama_produk }}" class="product-image">
            @else
              <img src="/images/diamondml.jpg" alt="{{ $produk->nama_produk }}" class="product-image">
            @endif
          </a>
        </div>
        <div class="card-body">
          <div class="row mt-4">
            <div class="col">
              <a href="{{ URL::to('product/'.$produk->slug_produk ) }}" class="text-decoration-none text-white">
                <p class="card-text h5">
                  <strong>{{ $produk->nama_produk }}</strong>
                </p>
              </a>
            </div>
            <div class="col-auto">
              <p class="text-white">
                Rp. {{ number_format($produk->harga, 2) }}
              </p>
            </div>
            <div class="row mt-4">
              <div class="col">
                <a class="btn" href="{{ URL::to('product/'.$produk->slug_produk ) }}">
                  Checkout Sekarang
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <!-- End New Product -->
</div>
@endsection
