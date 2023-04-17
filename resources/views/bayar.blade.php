@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
              Pembayaran
            </div>
            <div class="card-body">
        <form action="/store" method="post">
            @method('POST')
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">User</label>
                <input class="form-control" name="name" type="text" value="{{ Auth::user()->name }}" aria-label="readonly input example" readonly>   
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                <input class="form-control" name="description" type="text" value="{{$barang->nama}} {{$barang->keterangan}}" aria-label="readonly input example" readonly>   
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Harga Barang</label>
                <input class="form-control" name="amount" type="text" value="{{$barang->harga}}" aria-label="readonly input example" readonly>   
            </div> 
            <div class="button">
            <button type="submit" name="submit" class="btn btn-primary">Deal</button>    
            </div>   
        </form>
            </div>
          </div>
    </div>
@endsection