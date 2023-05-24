@extends('layouts.app')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="row top_tiles">
            <div class="wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <section class="panel">
                            <div class="panel-body">
                                <table
                                    class=" table table-hover table-bordered convert-data-table display" width="100%">
                                    <thead>
                                        <th>ID</th>
                                        <th>ID Murid</th>
                                        <th>Nomor Transaksi</th>
                                        <th>Nominal Saldo</th>
                                        <th>Status Pembayaran</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach($transaksi_saldo as $transaksi_saldo)
                                        <tr>
                                            <td>{{$transaksi_saldo->id}}</td>
                                            <td>{{$transaksi_saldo->id_murid}}</td>
                                            <td>{{$transaksi_saldo->id_transaksi}}</td>
                                            <td>{{$transaksi_saldo->nominal_saldo}}</td>
                                            <td>{{$status[$transaksi_saldo->status_pembayaran]}}</td>
                                            @if($transaksi_saldo->bukti_pembayaran != 0)
                                            <td>
                                                <img src="{{asset($transaksi_saldo->bukti_pembayaran)}}" width="200" height="200" alt="image">
                                            </td>
                                            @else
                                                <td>Klaim Gratis</td>
                                            @endif
                                            <td>{{$transaksi_saldo->created_at}}</td>
                                            <td>{{$transaksi_saldo->updated_at}}</td>
                                            @if($transaksi_saldo->status_pembayaran != 1)
                                            <td> 
                                                <a class="btn btn-primary" href="/transaksi_saldo/{{$transaksi_saldo->id}}/edit">Edit</a>
                                            </td>
                                            @else
                                                <td></td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection