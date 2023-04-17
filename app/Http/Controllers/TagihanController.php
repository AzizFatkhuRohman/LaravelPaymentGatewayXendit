<?php

namespace App\Http\Controllers;
use App\Models\Tagihan;
use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Mime\Message;
use Auth;
class TagihanController extends Controller
{
    public function list(){
        $user = Auth::user()->name;
        $tagihan = Tagihan::where('name', $user)->get();
            return view('tagihan', compact(['tagihan']));
    }
    public function bayar($id){
        $barang = barang::find($id);
        return view('bayar', compact(['barang']));
    }
    public function store(Request $request)
    {
        $secret_key = 'Basic '.config('xendit.key_auth');
        $external_id = Str::random(10);
        $data_request = Http::withHeaders([
            'Authorization' => $secret_key
        ])->post('https://api.xendit.co/v2/invoices', [
            'external_id' => $external_id,
            'amount' => request('amount')
        ]);
        $response = $data_request->object();
        Tagihan::create([
            "name"=> $request->name,
            'doc_no' => $external_id,
            'amount' => $request->amount,
            'description' => $request->description,
            'payment_status' => $response->status,
            'payment_link' => $response->invoice_url
        ]);
        return redirect('/listTagihan');
    }
    public function callback()
{
    $data = request()->all();
    $status = $data['status'];
    $external_id = $data['external_id'];
    Tagihan::where('doc_no', $external_id)->update([
        'payment_status' => $status
    ]);
    return response()->json($data);
}
}
