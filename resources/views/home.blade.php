@extends('layouts.app')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="row top_tiles">
            <div class="wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <h1>
                            Data Sesi
                        </h1>
                        <section class="panel">
                            <div class="panel-body">
                                <table
                                    class=" table table-hover table-bordered convert-data-table display" width="100%">
                                    <thead>
                                        <th>ID</th>
                                        <th>ID Guru</th>
                                        <th>Tanggal Sesi</th>
                                        <th>Waktu Sesi</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                    </thead>
                                    <tbody>
                                        @foreach($sesi as $sesi)
                                            <tr>
                                                <td>{{$sesi->id}}</td>
                                                <td>{{$sesi->id_guru}}</td>
                                                <td>{{$sesi->tanggal_sesi}}</td>
                                                <td>{{$sesi->waktu_sesi}}</td>
                                                <td>{{$sesi->nominal_saldo}}</td>
                                                <td>{{$status[$sesi->status_sesi]}}</td>
                                                <td>{{$sesi->created_at}}</td>
                                                <td>{{$sesi->updated_at}}</td>
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
        <div class="row top_tiles">
            <div class="wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <h1>
                            Data Transaksi Sesi
                        </h1>
                        <section class="panel">
                            <div class="panel-body">
                                <table
                                    class=" table table-hover table-bordered convert-data-table display" width="100%">
                                    <thead>
                                        <th>ID</th>
                                        <th>Nomor Transaksi</th>
                                        <th>ID Guru</th>
                                        <th>ID Sesi</th>
                                        <th>ID Murid</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                    </thead>
                                    <tbody>
                                        @foreach($transaksi_sesi as $transaksi_sesi)
                                            @if($transaksi_sesi->id_sesi != 0)
                                                <tr>
                                                    <td>{{$transaksi_sesi->id}}</td>
                                                    <td>{{$transaksi_sesi->id_transaksi}}</td>
                                                    <td>{{$transaksi_sesi->id_guru}}</td>
                                                    <td>{{$transaksi_sesi->id_sesi}}</td>
                                                    <td>{{$transaksi_sesi->id_murid}}</td>
                                                    <td>{{$transaksi_sesi->created_at}}</td>
                                                    <td>{{$transaksi_sesi->updated_at}}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="row top_tiles">
            <div class="wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <h1>
                            Data Report
                        </h1>
                        <section class="panel">
                            <div class="panel-body">
                                <table
                                    class=" table table-hover table-bordered convert-data-table display" width="100%">
                                    <thead>
                                        <th>ID</th>
                                        <th>ID Guru</th>
                                        <th>ID Sesi</th>
                                        <th>ID Murid</th>
                                        <th>Keterangan</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                    </thead>
                                    <tbody>
                                        @foreach($report as $report)
                                            <tr>
                                                <td>{{$report->id}}</td>
                                                <td>{{$report->id_guru}}</td>
                                                <td>{{$report->id_sesi}}</td>
                                                <td>{{$report->id_murid}}</td>
                                                <td>{{$report->keterangan}}</td>
                                                <td>{{$report->created_at}}</td>
                                                <td>{{$report->updated_at}}</td>
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
        <div class="row top_tiles">
            <div class="wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <h1>
                            Data Review
                        </h1>
                        <section class="panel">
                            <div class="panel-body">
                                <table
                                    class=" table table-hover table-bordered convert-data-table display" width="100%">
                                    <thead>
                                        <th>ID</th>
                                        <th>ID Guru</th>
                                        <th>ID Sesi</th>
                                        <th>ID Murid</th>
                                        <th>Penilaian Sesi</th>
                                        <th>Komentar Sesi</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                    </thead>
                                    <tbody>
                                        @foreach($review as $review)
                                            <tr>
                                                <td>{{$review->id}}</td>
                                                <td>{{$review->id_guru}}</td>
                                                <td>{{$review->id_sesi}}</td>
                                                <td>{{$review->id_murid}}</td>
                                                <td>{{$review->penilaian_sesi}}</td>
                                                <td>{{$review->komentar_sesi}}</td>
                                                <td>{{$review->created_at}}</td>
                                                <td>{{$review->updated_at}}</td>
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