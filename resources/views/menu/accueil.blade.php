@extends('base.master')
@section('title', 'Accueil')

@section('navbar')
    @parent
@endsection

@section('content')
    <div>
        <h2 style="font-family: 'Andale Mono'">Tu veux connaître toute l'actu des jeux vidéo ?<br>C'est ici que ça se passe !</h2>
    </div>
    <img class="mb-5 img-responsive" src="https://cdn.pixabay.com/photo/2017/03/18/16/42/video-game-2154473_1280.png" style="display: block; margin: auto; max-width: 100%;max-height: 40vh;border-radius: 10px;">

    <div style="width: 90%; margin-right: auto;margin-left: auto;margin-bottom: 50px; text-align: center;">
        <a href="{{route('jeux.index')}}" style="color: white; text-decoration: none;">
            <button type="submit" class="btn btn-primary" style="margin: 20px; width: 300px;height: 150px;font-size: xx-large">Jeux</button>
        </a>
        <a href="{{route('commentaires.index')}}" style="color: white; text-decoration: none;">
            <button type="submit" class="btn btn-primary" style="margin: 20px;width: 300px;height: 150px;font-size: xx-large" >Commentaires</button>
        </a>
        <a href="{{route('tags.index')}}" style="color: white; text-decoration: none;">
            <button type="submit" class="btn btn-primary" style="margin: 20px;width: 300px;height: 150px;font-size: xx-large">Tags</button>
        </a>
    </div>
@endsection
