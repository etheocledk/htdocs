@extends("layout.master-registry")
@section('title', 'Création de compte')
@section('content')
<form method="POST" action="{{route('storeUser')}}" autocomplete="off">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nom</label>
        <input type="text" name="nom" value="{{old('nom')}}" class="form-control" placeholder="">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Prénom</label>
        <input type="text" name="prenom" value="{{old('prenom')}}" class="form-control" placeholder="">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"> Date de Naissance</label>
        <input type="date"  class="form-control" value="{{old('naissance')}}" name="naissance" placeholder="">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" value="{{old('email')}}" class="form-control">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Confirmation de mot de Password</label>
        <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword1">
    </div>
    <p>Vous avez déjà un compte ? <a href="{{route("login")}}">Cliquez ici</a></p>
    <button type="submit" class="btn btn-primary">connexion</button>
</form>
@stop