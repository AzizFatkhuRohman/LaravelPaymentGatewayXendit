@extends('layouts.app')

@section('content')
<div class="container text-center">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Doc No</th>
            <th scope="col">Harga</th>
            <th scope="col">keterangan</th>
            <th scope="col">Status</th>
            <th scope="col">Bayar</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($tagihan as $t)
          <tr>
            <td>{{$t->doc_no}}</td>
            <td>{{$t->amount}}</td>
            <td>{{$t->description}}</td>
            <td>{{$t->payment_status}}</td>
            <td><a class='btn btn-primary' href="{{$t->payment_link}}">Checkout</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>
@endsection