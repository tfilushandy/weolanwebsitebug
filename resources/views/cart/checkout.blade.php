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
  </style>


<div class="body">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8 mx-auto">
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
            <div class="row mb-2">
              <div class="col-12">
                <div class="card">
                  <div class="card-header" style="border:none; background:linear-gradient(to right, #3354e7, slategray);">
                    Item
                  </div>
                  <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-stripped table-responsive">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Produk</th>
                          <th>Harga</th>
                          <th>Diskon</th>
                          <th>Qty</th>
                          <th>Subtotal</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($itemcart->detail as $detail)
                        <tr>
                          <td>
                          {{ $no++ }}
                          </td>
                          <td>
                          {{ $detail->produk->nama_produk }}
                          <br />
                          {{ $detail->produk->kode_produk }}
                          </td>
                          <td>
                          {{ number_format($detail->harga, 2) }}
                          </td>
                          <td>
                          {{ number_format($detail->diskon, 2) }}
                          </td>
                          <td>
                          {{ number_format($detail->qty, 2) }}
                          </td>
                          <td>
                          {{ number_format($detail->subtotal, 2) }}
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                </div>
              </div>
              <div class="idgame col-12">
                <div class="card" style="margin-top:20px;">
                  <div class="card-header" style="border:none; background:linear-gradient(to right, #3354e7, slategray);">ID GAME</div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-stripped">
                        <thead>
                          <tr>
                            <th>Nama Penerima</th>
                            <th>ID GAME</th>
                            <th>No tlp</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                        @if($itemalamatpengiriman)
                          <tr>
                            <td>
                              {{ $itemalamatpengiriman->email}}
                            </td>
                            <td>
                              {{ $itemalamatpengiriman->idgame }}
                            </td>
                            <td>
                              {{ $itemalamatpengiriman->no_tlp }}
                            </td>
                            <td>
                              <a href="{{ route('alamatpengiriman.index') }}" class="btn btn-success btn-sm" style="background-color:#3399ff; color: white; BORDER:0PX;">
                                Ubah Alamat
                              </a>                        
                            </td>
                          </tr>
                        @endif
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer" style="color: white;">
                    <a href="{{ route('alamatpengiriman.index') }}" class="btn btn-sm" style="background-color:#3399ff; color: white;">
                      ID GAME SETTING
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-lg-4 mt-4 mt-lg-0">
            <div class="card">
              <div class="card-header" style="border:none; background:linear-gradient(to right, #3354e7, slategray);">
                Ringkasan
              </div>
              <div class="card-body">
                <table class="table">
                  <tr>
                    <td>No Invoice</td>
                    <td class="text-right">
                      {{ $itemcart->no_invoice }}
                    </td>
                  </tr>
                  <tr>
                    <td>Subtotal</td>
                    <td class="text-right">
                      {{ number_format($itemcart->subtotal, 2) }}
                    </td>
                  </tr>
                  <tr>
                    <td>Diskon</td>
                    <td class="text-right">
                      {{ number_format($itemcart->diskon, 2) }}
                    </td>
                  </tr>
                  <tr>
                    <td>Total</td>
                    <td class="text-right">
                      {{ number_format($itemcart->total, 2) }}
                    </td>
                  </tr>
                </table>
              </div>
              <div class="card-footer">
                <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#paymentModal" style="background-color:#3399ff; color: white; border: 0px;">Buat Pesanan</button>
              </div>
            </div>
          </div>
        </div>

  <!-- Modal -->
        <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header" style="border:none; background:linear-gradient(to right, #3354e7, slategray);">
                <h5 class="modal-title" id="paymentModalLabel">Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="paymentDetails" style="display: none;">
                <!-- Payment details content here -->
                <div class="text-center">
                  <img src="/images/QRTRY.png" alt="Payment QR Code" class="" style="max-width: 1000px;">
                </div>
                <p style="color: black">Nominal Total: <strong>{{ number_format($itemcart->total, 2) }}</strong></p>
                <ul class="list-unstyled">
                  <li style="color: black">Bank: Bank BCA</li>
                  <li style="position: relative; color: black;">
                    Nomor Rekening: <span id="accountNumber">1234567890</span>
                    <button class="btn btn-primary copy-btn" onclick="copyAccountNumber()">
                      <img src="/images/COPY.png" alt="Copy" style="max-width: 20px;">
                    </button>
                  </li>
                  <li>
                    <img src="/images/BCA.png" alt="Bank Logo" style="max-width: 100px;">
                  </li>
                </ul>
              </div>
              <div class="modal-footer" style="border:none; background:linear-gradient(to right, #3354e7, slategray);">
                <button type="button" class="btn btn-success" onclick="" style="background-color:#3399ff; color: white;">Konfirmasi Pembayaran</button>
                <button type="button" class="btn btn-secondary" onclick="showPaymentDetails()" style="background-color:#3399ff; color: white;">Lihat Detail Pembayaran</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color:#3399ff; color: white;">Batal</button>
              </div>
            </div>
          </div>
        </div>

      <!-- Modal Terima Kasih -->
      <div class="modal fade" id="thankYouMessage" tabindex="-1" role="dialog" aria-labelledby="thankYouMessageLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="thankYouMessageLabel" style="color: black">Terima Kasih!</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="text-center mt-5" style="color: black">
                <h4>Terima kasih sudah melakukan pembayaran, orderan mu segera kami proses mohon ditunggu.</h4>
                <p>Silakan klik "Siap" untuk melanjutkan.</p>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" style="background-color:#3399ff; color: white;" href="/">Siap</button>
            </div>
          </div>
        </div>
      </div>


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
</div>

  <form id="paymentForm" method="post" action="{{ route('produk.index') }}" style="display: none;">
    @csrf
  </form>

  <script>
    function showPaymentDetails() {
      document.getElementById("paymentDetails").style.display = "block";
    }

    function copyAccountNumber() {
      var accountNumber = document.getElementById("accountNumber").innerText;
      var tempInput = document.createElement("input");
      tempInput.setAttribute("value", accountNumber);
      document.body.appendChild(tempInput);
      tempInput.select();
      document.execCommand("copy");
      document.body.removeChild(tempInput);
      alert("Nomor Rekening telah disalin: " + accountNumber);
    }


    // In your Blade template file

    function showThankYouMessage() {
    // Send the order data to the server
    
    $.ajax({

    });
}


function submitPaymentForm() {
    // Menyembunyikan modal dan mengirim formulir pembayaran
    // Pengalihan URL ke halaman home/index
}

  </script>

  <style>
    .copy-btn {
      background-color: blue;
      border: none;
      padding: 0; /* Menghapus padding */
      cursor: pointer;
      top: -1;
      right: -400px; /* Sesuaikan jarak dari kanan sesuai kebutuhan */
      width: 20px; /* Menyesuaikan lebar tombol */
      height: 20px; /* Menyesuaikan tinggi tombol */
    }

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
.ringkasan{

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