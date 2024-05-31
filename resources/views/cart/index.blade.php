@extends('layouts.template')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 col-lg-8 mx-auto"> <!-- Centering the columns -->
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
                  <th>Qty</th>
                  <th>Subtotal</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($itemcart->detail as $detail)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>
                    {{ $detail->produk->nama_produk }}<br />
                    {{ $detail->produk->kode_produk }}
                  </td>
                  <td>{{ number_format($detail->harga, 2) }}</td>
                  <td>{{ number_format($detail->diskon, 2) }}</td>
                  <td>
                    <div class="btn-group" role="group">
                      <form action="{{ route('cartdetail.update', $detail->id) }}" method="post">
                          @method('patch')
                          @csrf
                          <input type="hidden" name="param" value="kurang">
                          <button class="btn btn-outline btn-sm" style="background-color:#3399ff; color: white;">-</button>
                      </form>
                      <button class="btn-outline btn-sm" style="margin: 0px 5px;" disabled="true">{{ number_format($detail->qty, 2) }}</button>
                      <form action="{{ route('cartdetail.update', $detail->id) }}" method="post">
                          @method('patch')
                          @csrf
                          <input type="hidden" name="param" value="tambah">
                          <button class="btn btn-outline btn-sm" style="background-color:#3399ff; color: white;">+</button>
                      </form>
                    </div>
                  </td>
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
    <div class="col-md-12 col-lg-4 mt-4 mt-lg-0"> <!-- Margin top for large screens -->
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
              <td class="text-right">{{ number_format($itemcart->subtotal, 2) }}</td>
            </tr>
            <tr>
              <td>Diskon</td>
              <td class="text-right">{{ number_format($itemcart->diskon, 2) }}</td>
            </tr>
            <tr>
              <td>Total</td>
              <td class="text-right">{{ number_format($itemcart->total, 2) }}</td>
            </tr>
          </table>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-6">
              <a href="{{ URL::to('checkout') }}" class="btn btn-outline btn-block" style="background-color:#3399ff; color: white;">Checkout</a>
            </div>
            <div class="col-6 mt-2 mt-md-0"> <!-- Margin top for small screens -->
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
