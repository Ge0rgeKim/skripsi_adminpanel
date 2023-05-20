<h1>Edit Matpel</h1>

<form action="/mata_pelajaran/{{$mata_pelajaran->id}}" method="POST">
    @method('PUT')
    @csrf 
    
    status:<input type="radio" name="status" value="1">{{$status[1]}}
    <input type="radio" name="status" value="2">{{$status[2]}}
    <br>
    <input type="submit" value="save">
</form>