<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <a href="home">aaa</a>
                <a href="/mata_pelajaran/create">Create</a>
                <table>
                    <thead>
                        <th>ID Mata Pelajaran</th>
                        <th>Mata Pelajaran</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Status</th>
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
                                <a href="/mata_pelajaran/{{$mata_pelajaran->id}}/edit">Edit</a>
                                <form action="/mata_pelajaran/{{$mata_pelajaran->id}}" method="POST">
                                    @csrf 
                                    @method('delete')
                                    <input type="submit" value="Delete">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
