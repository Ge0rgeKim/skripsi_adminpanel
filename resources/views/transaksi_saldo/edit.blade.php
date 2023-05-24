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
                                <center>
                                    <h3>Validasi Top Up</h3>
                                    <br>
                                    <form action="/transaksi_saldo/{{$transaksi_saldo->id}}" method="POST">
                                        @method('PUT')
                                        @csrf 
                                        <img src="{{asset($transaksi_saldo->bukti_pembayaran)}}" width="15%" height="15%" alt="image">
                                        <br>
                                        <h6>
                                        Status<br>
                                        <input type="radio" name="status" value="1"> {{$status[1]}}
                                        <input type="radio" name="status" value="2"> {{$status[2]}}
                                        </h6>
                                        <input class="btn btn-success" type="submit" value="save">
                                    </form>
                                </center>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection