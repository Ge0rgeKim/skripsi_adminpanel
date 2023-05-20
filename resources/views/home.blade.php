@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> -->
            <div>
                <p>{{ Auth::user()->id }}</p>
                <a href="user_guru">Guru</a>
                <a href="mata_pelajaran">Mata Pelajaran</a>
                <a href="user_murid">Murid</a>
                <a href="transaksi_saldo">Top Up</a>
            </div>
        </div>
    </div>
</div>
@endsection
