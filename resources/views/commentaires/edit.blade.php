@extends('base.master')
@section('title', 'Modifier commentaire')

@section('navbar')
    @parent
@endsection

@section('content')
    <div style="background-color:rgba(232,231,231,0.4); border:  1px solid black; border-radius: 5px; width: 80%; margin: auto; margin-top: 2rem; margin-bottom: 5rem">
        <form action="{{route('commentaires.update',$commentaire->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="text-center" style="margin-top: 2rem">
                <h3>Modification du commentaire {{$commentaire->id}}</h3>
                <hr class="mt-2 mb-2">
            </div>
            <div class="form-group">
                <label for="titre"><strong>Titre : </strong></label>
                <input type="text" class="form-control" name="titre" id="titre" placeholder="Titre du commentaire"
                       value="{{ $commentaire->titre }}">
            </div>

            <div class="form-group">
                <label for="body"><strong>Commentaire :</strong></label>
                <textarea name="body" id="body" rows="6" class="form-control"
                          placeholder="Description..">{{ $commentaire->body }}</textarea>
            </div>
            <div style="text-align:center;">
                <button type="submit" class="btn btn-warning" style="color: white; text-decoration: none;"><i
                        class="fas fa-edit" style="margin-right: 10px; font-size: larger;"></i>Modifier
                </button>
                <a href="{{route('commentaires.show',$commentaire->jeu_id)}}" style="color: white; text-decoration: none;">
                    <button class="btn btn-danger" type="button" style="margin-right: 10px; font-size: larger;"><i class="fas fa-times" style="margin-right: 10px; font-size: larger;"></i>
                        Annuler
                    </button>
                </a>
            </div>
        </form>
    </div>

    @if ($errors->any())
        <div
            style="width: 40%; margin: auto; background-color: rgba(232,231,231,0.4); border-radius: 10px; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);">
            <div
                style="width: 100%; background-color: #F01330; color: white; height: 80px;  text-align: center; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                <i class="fas fa-exclamation-triangle" style="font-size: 50px; margin-top: 15px; padding: auto;"></i>
            </div>
            <div style="padding-bottom: 20px;">
                <h5 style="text-align: center; margin-top: 10px; color: #F01330;">Les erreurs suivantes doivent être
                    corrigées :</h5>
                <ul style="margin-top: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
@endsection
