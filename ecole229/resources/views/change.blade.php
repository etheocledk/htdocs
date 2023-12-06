@extends("layout.master-registry")
@section('title', 'Modifier mot de passe')
@section('content')

<form method="POST" action="{{route('updatePwd',['id'=>$id])}}" autocomplete="off">
    @csrf
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
  
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Confirmation de mot de Password</label>
        <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
@stop
