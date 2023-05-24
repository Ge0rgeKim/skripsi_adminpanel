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
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                    </thead>
                                    <tbody>
                                        @foreach($user_murid as $user_murid)
                                            <tr>
                                                <td>{{$user_murid->id}}</td>
                                                <td>{{$user_murid->username}}</td>
                                                <td>{{$user_murid->email}}</td>
                                                <td>{{$user_murid->password}}</td>
                                                <td>{{$user_murid->created_at}}</td>
                                                <td>{{$user_murid->updated_at}}</td>
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