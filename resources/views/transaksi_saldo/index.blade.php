

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <a href="home">aaaa</a>
                <table>
                    <thead>
                        <th>ID</th>
                        <th>ID Murid</th>
                        <th>Nomor Transaksi</th>
                        <th>Nominal Saldo</th>
                        <th>Status Pembayaran</th>
                        <th>Bukti Pembayaran</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </thead>
                    <tbody>
                        @foreach($transaksi_saldo as $transaksi_saldo)

                        <tr>
                            <td>{{$transaksi_saldo->id}}</td>
                            <td>{{$transaksi_saldo->id_murid}}</td>
                            <td>{{$transaksi_saldo->id_transaksi}}</td>
                            <td>{{$transaksi_saldo->nominal_saldo}}</td>
                            <td>{{$status[$transaksi_saldo->status_pembayaran]}}</td>
                            <td>
                                <img src="{{asset($transaksi_saldo->bukti_pembayaran)}}" width="200" height="200" alt="image">
                            </td>

                            <td>{{$transaksi_saldo->created_at}}</td>
                            <td>{{$transaksi_saldo->updated_at}}</td>
                            <td> 
                                <a href="/transaksi_saldo/{{$transaksi_saldo->id}}/edit">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
