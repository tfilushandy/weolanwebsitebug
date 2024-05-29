@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-6 col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Form Jasa</h3>
          <div class="card-tools">
            <a href="{{ route('jasa.index') }}" class="btn btn-sm btn-danger">
              Tutup
            </a>
          </div>
        </div>
        <div class="card-body">
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
          <form action="{{ route('jasa.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="kode_jasa">Kode Jasa</label>
              <input type="text" name="kode_jasa" id="kode_jasa" class="form-control">
            </div>
            <div class="form-group">
              <label for="nama_jasa">Nama Jasa</label>
              <input type="text" name="nama_jasa" id="nama_jasa" class="form-control">
            </div>
            <div class="form-group">
              <label for="slug_jasa">Slug Jasa</label>
              <input type="text" name="slug_jasa" id="slug_jasa" class="form-control">
            </div>
            <div class="form-group">
              <label for="deskripsi_jasa">Deskripsi</label>
              <textarea name="deskripsi_jasa" id="deskripsi_jasa" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="jumlah">Jumlah</label>
              <input type="text" name="jumlah" id="jumlah" class="form-control">
            </div>
            <div class="form-group">
              <label for="harga">Harga</label>
              <input type="text" name="harga" id="harga" class="form-control">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn btn-warning">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection