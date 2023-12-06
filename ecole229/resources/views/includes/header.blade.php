
<div class="container">
    @if (session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div>
            <strong>Message succès</strong><br>{{ session('message') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif




    <h2>Liste des blogs de {{ $nom }}  {{ $prenom }} {{-- @if (isset($id))
            N_{{ $id }}
        @endif --}}
    </h2>
    <p class="lead text-muted">Il s'agit de la page qui permettra d'explorer les contours de Laravel avec les
        étudiants !</p>
</div>
<a href="{{route('createblog')}}" class="btn btn-primary">Ajouter un article</a>


<a href="{{ route('all') }}" class="btn btn-primary">Tous les articles</a>
<a href="{{ route('index') }}" class="btn btn-primary">mes articles</a>
<a href="{{route('printBlog')}}" target="_blank" class="btn btn-primary">Imprimer les blogs</a>
 