@extends('layouts.template')
@section('content')
<div class="container-fluid">
  <div class="row justify-content-center" style="margin: 20px 0;">
    <div class="col-md-10">

      <h3 class="text-left mb-4" style="color:white;">Wishlist</h3>

      @if ($message = Session::get('error'))
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Warning!</strong> {{ $message }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      @endif
      @if ($message = Session::get('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> {{ $message }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      @endif

      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead class="thead-dark">
            <tr>
              <th>No</th>
              <th>Kode Produk</th>
              <th>Nama Produk</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($itemwishlist as $wish)
            <tr>
              <td style="color: white; text-decoration: none;">{{ ++$no }}</td>
              <td style="color: white; text-decoration: none;">{{ $wish->produk->kode_produk }}</td>
              <td>
                <a href="{{ URL::to('product/'.$wish->produk->slug_produk ) }}" style="color: white; text-decoration: none;">{{ $wish->produk->nama_produk }}</a>
              </td>
              <td>
                <form action="{{ route('wishlist.destroy', $wish->id) }}" method="post" style="display:inline;">
                  @csrf
                  {{ method_field('delete') }}
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to remove this item from the wishlist?')" style="background-color: #3757e1; border-color; #3757e1">
                    Hapus
                  </button>                    
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="d-flex justify-content-center">
          {{ $itemwishlist->links() }}
        </div>
      </div>

    </div>
  </div>
</div>
@endsection

<style>
/* Style for alert boxes */
.alert {
  margin-bottom: 20px;
}

/* Table styling */
.table {
  border: 1px solid #dee2e6;
  border-radius: 5px;
  overflow: hidden;
}

.table thead th {
  background-color: #343a40;
  color: white;
  border: none;
}

.table tbody tr {
  transition: background-color 0.3s;
}

.table tbody tr:hover {
  background-color: #f1f1f1;
}

.table td, .table th {
  vertical-align: middle;
  text-align: center;
}

/* Button styling */
.btn-danger {
  background-color: #dc3545;
  border: none;
  transition: background-color 0.3s;
}

.btn-danger:hover {
  background-color: #c82333;
}

/* Pagination styling */
.pagination {
  margin-top: 20px;
}

.pagination .page-item .page-link {
  color: #343a40;
}

.pagination .page-item.active .page-link {
  background-color: #343a40;
  border-color: #343a40;
}
</style>
