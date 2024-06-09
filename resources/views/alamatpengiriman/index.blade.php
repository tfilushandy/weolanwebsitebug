@extends('layouts.template')
@section('content')
<div class="container">
  <div class="row">
    <div class="col col-12 mb-2">
      <div class="card">
        <div class="card-header" style="border:none; background:linear-gradient(to right, #3354e7, slategray);">
          <div class="row">
            <div class="col" >
            ID GAME SETTING
            </div>
            <div class="col-auto">
              <a href="{{ URL::to('checkout') }}" class="btn btn-sm btn-danger" style="color:white; background-color: #3399ff; border: 0px;">
                Tutup
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-stripped">
              <thead>
                <tr>
                  <th>ID GAME</th>
                  <th>NO WA</th>
                  <th>EMAIL</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @foreach($itemalamatpengiriman as $pengiriman)
                <tr>
        <td>
          {{ $pengiriman->idgame }}
        </td>
        <td>
          {{ $pengiriman->no_tlp }}
        </td>
        <td>
          {{ $pengiriman->email }}
        </td>
                  <td>
                    <form action="{{ route('alamatpengiriman.update',$pengiriman->id) }}" method="post">
                      @method('patch')
                      @csrf()
                      @if($pengiriman->status == 'utama')
                      <button type="submit" class="btnsetutama btn-sm" style="background-color:#0099ff; color:white; border: 0px;" disabled>Utama</button>
                      @else
                      <button type="submit" class="btnsetutama btn-sm" style="background-color:grey; color:white; border: 0px;">Set Utama</button>
                      @endif
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
    <div class="col col-12 mb-2">
      <div class="card">
        <div class="card-header" style="border:none; background:linear-gradient(to right, #3354e7, slategray);">
        ADD NEW ID GAME
        </div>
        <div class="card-body">
          @if(count($errors) > 0)
          @foreach($errors->all() as $error)
              <div class="alert alert-warning" >{{ $error }}</div>
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
          <form action="{{ route('alamatpengiriman.store') }}" method="post">
            @csrf()
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="IDGAME" style="color: black">ID GAME</label>
                  <input type="text" name="IDGAME" class="form-control" value={{old('IDGAME') }}>
                </div>
                <div class="form-group">
                  <label for="no_telp" style="color: black">NO WA</label>
                  <input type="text" name="no_tlp" class="form-control" value={{old('no_tlp') }}>
                </div>
                <div class="form-group">
                  <label for="EMAIL" style="color: black">EMAIL</label>
                  <input type="text" name="EMAIL" class="form-control" value={{old('EMAIL') }}>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary" style="background-color:#3399ff; color: white;">Simpan</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
