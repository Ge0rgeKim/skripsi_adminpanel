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
                                    <h3>Create Mata Pelajaran</h3>
                                    <br>
                                    <form action="/mata_pelajaran" method="POST">
                                        @csrf
                                        <input class="form-control" placeholder="Input Mata Pelajaran" type="text" name="mata_pelajaran">
                                        <br>
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