@extends("layout.master-registry")
@section('title', 'Authentification')
@section('content')
<form method="POST" action="{{route('authentification')}}" autocomplete="off">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3 form-check">
        <a href="{{route("forget")}}">Mot de passe oublié ?</a>
    </div>
    <p>Vous n'avez pas un compte ? <a href="{{route("register")}}">Cliquez ici</a></p>
    <button type="submit" class="btn btn-primary">connexion</button>
</form>
@stop