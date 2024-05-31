@extends('layouts.template')
@section('content')

<div class="container" style="margin-top:70px;">
  <div class="row mt-4">
    <div class="col-lg-8">
      <!-- UID and Server Input Section -->
      <div class="card" style="border-color:linear-gradient(to right, #3354e7, slategray); box-shadow: 5px 6px 6px 2px #e9ecef;">
        <div class="card-header" style="border:none; background:linear-gradient(to right, #3354e7, slategray);">
          <h5>Masukkan UID dan server</h5>
        </div>
        <div class="card-body">
          <div style="display: flex; gap: 20px;">
            <div style="display: flex; flex-direction: column;">
              <label for="uid" style="color:black;">UID:</label>
              <input type="text" id="uid" name="uid" style="color:black;">
            </div>
            <div style="display: flex; flex-direction: column;">
              <label for="server" style="color:black;">Server:</label>
              <input type="text" id="server" name="server">
            </div>
          </div>
        </div>
      </div>

      <!-- Payment Section -->
      <div class="card mt-4" style="border-color:linear-gradient(to right, #3354e7, slategray); box-shadow: 5px 6px 6px 2px #e9ecef;">
        <div class="card-header" style="border:none; background:linear-gradient(to right, #3354e7, slategray);">
          <h5>Payment</h5>
        </div>
        <div class="card-body">
        <div style="display: flex; flex-wrap: wrap; gap: 10px;">
          <label class="btn btn-primary payment-label" style="background-color:white; color:black">
            <input type="radio" name="payment" value="GoPay" class="payment-radio" style="display:none">
            <img src="/images/gopaylogo.jpg" alt="GoPay" class="payment-logo"> GoPay
          </label>
          <label class="btn btn-primary payment-label" style="background-color:white; color:black">
            <input type="radio" name="payment" value="Dana" class="payment-radio" style="display:none">
            <img src="/images/danalogo.jpg" alt="Dana" class="payment-logo"> Dana
          </label>
          <label class="btn btn-primary payment-label" style="background-color:white; color:black">
            <input type="radio" name="payment" value="BCA" class="payment-radio" style="display:none">
            <img src="/images/bca.png" alt="BCA" class="payment-logo"> BCA
          </label>
          <label class="btn btn-primary payment-label" style="background-color:white; color:black">
            <input type="radio" name="payment" value="OvO" class="payment-radio" style="display:none">
            <img src="/images/ovologo.png" alt="OvO" class="payment-logo"> OvO
          </label>
          <label class="btn btn-primary payment-label" style="background-color:white; color:black">
            <input type="radio" name="payment" value="ShopeePay" class="payment-radio" style="display:none">
            <img src="/images/shopeelogo.png" alt="ShopeePay" class="payment-logo"> ShopeePay
          </label>
          <label class="btn btn-primary payment-label" style="background-color:white; color:black">
            <input type="radio" name="payment" value="Kredivo" class="payment-radio" style="display:none">
            <img src="/images/kredivologo.jpg" alt="Kredivo" class="payment-logo"> Kredivo
          </label>
        </div>
        </div>
      </div>

      <!-- Email Submission Section -->
      <div class="card mt-4" style="border-color:linear-gradient(to right, #3354e7, slategray); box-shadow: 5px 6px 6px 2px #e9ecef;">
        <div class="card-header" style="border:none; background:linear-gradient(to right, #3354e7, slategray);">
          <h5>Masukkan Email</h5>
        </div>
        <div class="card-body">
          <form action="#" method="post">
            @csrf
            <div style="display: flex; flex-direction: column; gap: 10px;">
              <label for="email" style="color:black;">Email:</label>
              <input type="email" id="email" name="email" style="color:black;">
              <button type="submit" class="btn btn-primary" style="background-color:white; color:black">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Product Details Section -->
    <div class="col-lg-4">
      <div class="row">
        <div class="col">
          <div class="card" style="border:none; background:linear-gradient(to right, #3354e7, slategray); box-shadow: 5px 6px 6px 2px #e9ecef;">
            <div class="card-body card-yellow">
              @if(count($errors) > 0)
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
              @endif
              <span class="small">{{ $itemproduk->kategori->nama_kategori }}</span>
              <div class="row">
              <div class="col">
              <h4 class="font-weight-bold">{{ $itemproduk->nama_produk }}</h4>
              </div>
              <!-- cek apakah ada promo -->
              <div class="col">
              @if($itemproduk->promo != null)
              <p>
                Rp. <del>{{ number_format($itemproduk->promo->harga_awal, 2) }}</del>
                <br />
                Rp. {{ number_format($itemproduk->promo->harga_akhir, 2) }}
              </p>
              @else
              <p>
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
                <button type="submit" class="btn btn-sm" style="background-color:white">
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
                <button class="btn btn-sm" type="submit" style="margin-top:5px;  background-color: white;">
                  <i class="fa fa-shopping-cart"></i> Add to Cart
                  </button>
              </form>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Description -->
      <div class="row mt-4">
        <div class="col">
          <div class="card" style="border-color:linear-gradient(to right, #3354e7, slategray); box-shadow: 5px 6px 6px 2px #e9ecef;">
            <div class="card-header" style="border:none; background:linear-gradient(to right, #3354e7, slategray);">
              <h5 >Description</h5>
            </div>
            <div class="card-body" style="color:black">
              {{ $itemproduk->deskripsi_produk }}
            </div>
          </div>
        </div>
      </div>
      
      <!-- Comment -->
      <div class="row mt-4">
        <div class="col">
          <div class="card" style="border-color:linear-gradient(to right, #3354e7, slategray); box-shadow: 5px 6px 6px 2px #e9ecef;">
            <div class="card-header" style="border:none; background:linear-gradient(to right, #3354e7, slategray);">
              <h5>Add Review</h5>
            </div>
            <div class="card-body">
              <form method="post" action="{{ route('comments.store') }}">
              @csrf
              <div class="form-group">
                <div class="rating" style="margin-left: 5px">
                  <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                  <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> 
                  <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                  <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                  <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                  <img src="{{ asset('img/user1-128x128.jpg') }}" style="max-height: 40px;max-width: 40px;" class="user-img rounded-circle mr-2">
                </div>
              </div>
                <div class="form-group">
                  <textarea class="form-control" name="body"></textarea>
                  <input type="hidden" name="produk_id" value="{{ $itemproduk->id }}" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn-sm btn-outline-info py-0" style="font-size: 0.8em;" value="Submit" />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- DisplayComment -->
  <div class="row mt-4">
    <div class="col">
      <div class="card" style="border-color:linear-gradient(to right, #3354e7, slategray); box-shadow: 5px 6px 6px 2px #e9ecef;">
        <div class="card-header" style="border:none; background:linear-gradient(to right, #3354e7, slategray);">
          <h5 style="">Display Comment</h5>
        </div>
        <div class="card-body" style="color:black;">
        @include('homepage.commentsDisplay', ['comments' => $itemproduk->comments, 'produk_id' => $itemproduk->id])
        </div>
      </div>
    </div>
  </div>
</div>

<script>
document.querySelectorAll('.payment-radio').forEach(radio => {
  radio.addEventListener('change', () => {
    document.querySelectorAll('.payment-label').forEach(label => {
      label.style.backgroundColor = 'white';
      label.style.color = 'black';
    });
    if (radio.checked) {
      radio.closest('.payment-label').style.backgroundColor = '#3354e7';
      radio.closest('.payment-label').style.color = 'white';
    }
  });
});
</script>

<style>
  .payment-label {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    cursor: pointer;
  }

  .payment-radio:checked + .payment-label {
    background-color: #007bff;
    color: white;
  }

  .payment-logo {
    width: 20px;
    height: 20px;
  }

  /* Tambahkan di bagian CSS Anda */

/* Untuk layar dengan lebar kurang dari atau sama dengan 768px (misalnya, layar ponsel) */
@media (max-width: 768px) {
  .col-lg-8 {
    flex: 1 0 100%;
    max-width: 100%;
  }
  .col-lg-4 {
    flex: 1 0 100%;
    max-width: 100%;
  }
}

/* Untuk label pembayaran */
.payment-label {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
  cursor: pointer;
}

/* Untuk tombol pembayaran yang dipilih */
.payment-radio:checked + .payment-label {
  background-color: #3354e7;
  color: white;
}

/* Untuk logo pembayaran */
.payment-logo {
  width: 20px;
  height: 20px;
}

</style>
@endsection