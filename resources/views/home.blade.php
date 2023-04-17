@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        Selamat Datang Kak, {{ Auth::user()->name }}
    </div>
    <div class="barang mt-3" style="display:flex; justify-content:center;">
        @foreach ($barang as $b)
        <div class="card" style="width: 18rem; margin-right:3px;">
            <div class="card-body">
              <h5 class="card-title">{{$b->nama}}</h5>
              <p class="card-text">{{$b->keterangan}}</p>
              <p class="card-text">{{$b->harga}}</p>
              <a href="/bayar/{{$b->id}}" class="btn btn-primary">Beli</a>
            </div>
          </div>
          @endforeach
    </div>  
        
        
</div>
@endsection
