@extends("layout.master-registry")
@section('title', 'Password Forget ?')
@section('content')
<form method="POST" action="{{route('storePassword')}}" autocomplete="off">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <p> <a href="{{route("login")}}">Retour</a></p>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
@stop