
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <a href="home">aaaa</a>
                <table>
                    <thead>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Mata Pelajaran</th>
                        <th>KTP</th>
                        <th>Lokasi</th>
                        <th>Status Sesi</th>
                        <th>Status Akun</th>
                        <th>ID Admin</th>
                        <th>Created At</th>
                        <th>Updated At</th>
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
                                <a href="/user_guru/{{$user_guru->id}}/edit">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
