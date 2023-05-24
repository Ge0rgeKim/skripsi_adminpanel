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
                                        <th>ID Guru</th>
                                        <th>ID Sesi</th>
                                        <th>ID Admin</th>
                                        <th>Foto Dokumentasi</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach($dokumentasi as $dokumentasi)
                                            <tr>
                                                <td>{{$dokumentasi->id}}</td>
                                                <td>{{$dokumentasi->id_guru}}</td>
                                                <td>{{$dokumentasi->id_sesi}}</td>
                                                <td>{{$dokumentasi->id_admin}}</td>
                                                <td><img src="{{asset($dokumentasi->foto_dokumentasi)}}" width="200" height="200" alt="image"></td>
                                                <td>{{$dokumentasi->keterangan}}</td>
                                                <td>{{$status[$dokumentasi->status_dokumentasi]}}</td>
                                                <td>{{$dokumentasi->created_at}}</td>
                                                <td>{{$dokumentasi->updated_at}}</td>
                                                <td>           
                                                    <a class="btn btn-primary" href="/dokumentasi/{{$dokumentasi->id}}/edit">Edit</a>
                                                </td>
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