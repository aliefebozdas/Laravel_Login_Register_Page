<h1>Update User</h1>
<form action="{{route('edit')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$data['id']}}">
    <input type="text" name="name" value={{$data['name']}}> <br> <br>
    <input type="email" name="email" value={{$data['email']}}> <br> <br>
    <button type="submit">Update</button>
</form>

