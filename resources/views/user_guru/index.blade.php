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
                                        <th scope="col">ID</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Mata Pelajaran</th>
                                        <th scope="col">KTP</th>
                                        <th scope="col">Lokasi</th>
                                        <th scope="col">Status Sesi</th>
                                        <th scope="col">Status Akun</th>
                                        <th scope="col">ID Admin</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col" >Updated At</th>
                                        <th scope="col" ></th>
                                    </thead>
                                    <tbody>
                                        @foreach($user_guru as $user_guru)
                                        <tr>
                                        <td>{{$user_guru->id}}</td>
                                            <td>{{$user_guru->username}}</td>
                                            <td>{{$user_guru->email}}</td>
                                            <td>{{$user_guru->password}}</td>
                                            <td>{{$user_guru->mata_pelajaran}}</td>
                                            <td><img src="{{asset($user_guru->ktp)}}" width="200" height="200" alt="image"></td>
                                            <td>{{$user_guru->lokasi}}</td>
                                            <td>{{$status_sesi[$user_guru->status_sesi]}}</td>
                                            <td>{{$status[$user_guru->status_akun]}}</td>
                                            <td>{{$user_guru->id_admin}}</td>
                                            <td>{{$user_guru->created_at}}</td>
                                            <td>{{$user_guru->updated_at}}</td>
                                            <td>           
                                                <a class="btn btn-primary" href="/user_guru/{{$user_guru->id}}/edit">Edit</a>
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