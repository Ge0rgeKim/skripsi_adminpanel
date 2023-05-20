<h1>Edit Guru</h1>

<form action="/transaksi_saldo/{{$transaksi_saldo->id}}" method="POST">
    @method('PUT')
    @csrf 
    <img src="{{asset($transaksi_saldo->bukti_pembayaran)}}" width="200" height="200" alt="image">
    <br>
    status:<input type="radio" name="status" value="1">{{$status[1]}}
    <input type="radio" name="status" value="2">{{$status[2]}}
    <br>
    <input type="submit" value="save">
</form>