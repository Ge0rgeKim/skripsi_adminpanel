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
                                    <h3>Validasi Mata Pelajaran</h3>
                                    <form action="/mata_pelajaran/{{$mata_pelajaran->id}}" method="POST">
                                        @method('PUT')
                                        @csrf 
                                        <h6>
                                        Status <br>
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

