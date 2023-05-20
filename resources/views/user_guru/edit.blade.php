<h1>Edit Guru</h1>

<form action="/user_guru/{{$user_guru->id}}" method="POST">
    @method('PUT')
    @csrf 
    <h1>{{$user_guru->email}}</h1><br>
    <img src="{{asset($user_guru->ktp)}}" width="200" height="200" alt="image">
    <br>
    status:<input type="radio" name="status" value="1">{{$status[1]}}
    <input type="radio" name="status" value="2">{{$status[2]}}
    <br>
    <input type="submit" value="save">
</form>