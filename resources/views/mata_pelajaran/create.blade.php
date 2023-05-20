<h1>Create Matpel</h1>

<form action="/mata_pelajaran" method="POST">
    @csrf 
    mata pelajaran : <input type="text" name="mata_pelajaran"><br>

    <input type="submit" value="save">
</form>