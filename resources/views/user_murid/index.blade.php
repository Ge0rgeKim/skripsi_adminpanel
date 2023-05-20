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
        </div>
    </div>
</div>