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
                                <a class="btn btn-success" href="/mata_pelajaran/create">Create</a>
                                <table
                                    class=" table table-hover table-bordered convert-data-table display" width="100%">
                                    <thead>
                                        <th>ID Mata Pelajaran</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Status</th>
                                        <th></th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach($mata_pelajaran as $mata_pelajaran)
                                        <tr>
                                            <td>{{$mata_pelajaran->id}}</td>
                                            <td>{{$mata_pelajaran->mata_pelajaran}}</td>
                                            <td>{{$mata_pelajaran->created_at}}</td>
                                            <td>{{$mata_pelajaran->updated_at}}</td>
                                            <td>{{$status[$mata_pelajaran->status]}}</td>
                                            <td>
                                                <a class="btn btn-primary" href="/mata_pelajaran/{{$mata_pelajaran->id}}/edit">Edit</a>
                                            </td>
                                            <td>
                                                <form action="/mata_pelajaran/{{$mata_pelajaran->id}}" method="POST">
                                                    @csrf 
                                                    @method('delete')
                                                    <input class="btn btn-danger" type="submit" value="Delete">
                                                </form>
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
