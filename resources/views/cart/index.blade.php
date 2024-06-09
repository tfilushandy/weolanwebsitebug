@extends('layouts.template')
@section('content')

<head>
</head>

<style>
  /* CSS for background */
  body {
    background-image: url('/images/bgmain.png'); /* Replace with the path to your background image */
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed; /* Ensure the background remains fixed when scrolling */
  }
  </style>
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
      <div class="card">
        <div class="card-header" style="background-color:#007bff;">
          Item
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Produk</th>
                  <th>Harga</th>
                  <th>Diskon</th>
                  <th>Subtotal</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @foreach($itemcart->detail as $detail)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>
                    {{ $detail->produk->nama_produk }}<br />
                    {{ $detail->produk->kode_produk }}
                  </td>
                  <td>{{ number_format($detail->harga, 2) }}</td>
                  <td>{{ number_format($detail->diskon, 2) }}</td>
                  <td>{{ number_format($detail->subtotal, 2) }}</td>
                  <td>
                    <form action="{{ route('cartdetail.destroy', $detail->id) }}" method="post" style="display:inline;">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-outline mb-2" style="background-color:#3399ff; color: white;">Hapus</button>
                    </form>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12 col-lg-4 mt-4 mt-lg-0">
      <div class="card">
        <div class="card-header" style="background-color:#007bff;">
          Ringkasan
        </div>
        <div class="card-body">
          <table class="table">
            <tr>
              <td>No Invoice</td>
              <td class="text-right">{{ $itemcart->no_invoice }}</td>
            </tr>
            <tr>
              <td>Subtotal</td>
              <td class="text-right subtotal">{{ number_format($itemcart->subtotal, 2) }}</td>
            </tr>
            <tr>
              <td>Diskon</td>
              <td class="text-right diskon">{{ number_format($itemcart->diskon, 2) }}</td>
            </tr>
            <tr>
              <td>Total</td>
              <td class="text-right total">{{ number_format($itemcart->total, 2) }}</td>
            </tr>
          </table>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-6">
              <a href="{{ URL::to('checkout') }}" class="btn btn-outline btn-block" style="background-color:#3399ff; color: white;">Checkout</a>
            </div>
            <div class="col-6 mt-2 mt-md-0">
              <form action="{{ url('kosongkan').'/'.$itemcart->id }}" method="post">
                @method('patch')
                @csrf
                <button type="submit" class="btn btn-outline btn-block" style="background-color:#3399ff; color: white;">Kosongkan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

<script>
  document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('form').forEach(form => {
          form.addEventListener('submit', function(e) {
              if (form.querySelector('input[name="param"]').value == 'kurang') {
                  const qtyElement = form.closest('td').querySelector('.btn-outline[disabled]');
                  const qty = parseFloat(qtyElement.textContent);
                  if (qty <= 1) {
                      if (!confirm('Quantity is about to reach 0. Do you want to remove this item from the cart?')) {
                          e.preventDefault();
                      }
                  }
              }
          });
      });
  });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.update-cart-form').on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        var data = form.serialize();
        var row = form.closest('tr');

        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            success: function(response) {
                if (response.success) {
                    row.find('.qty').text(response.qty.toFixed(2));
                    row.find('.subtotal').text(response.subtotal.toFixed(2));
                    $('.subtotal').text(response.cartSubtotal.toFixed(2));
                    $('.diskon').text(response.cartDiskon.toFixed(2));
                    $('.total').text(response.cartTotal.toFixed(2));
                } else {
                    alert('Failed to update cart.');
                }
            },
            error: function(response) {
                console.error(response.responseText);
                alert('An error occurred while updating the cart.');
            }
        });
    });
});
</script>
