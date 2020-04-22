@extends('base.master')
@section('title', 'Modifier')

@section('navbar')
    @parent
@endsection

@section('content')
    <div style="background-color:rgba(232,231,231,0.4); border:  1px solid black; border-radius: 5px; width: 80%; margin: auto; margin-top: 2rem; margin-bottom: 5rem">
        <form action="{{route('jeux.update',$jeu->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="text-center" style="margin-top: 2rem">
                <h3>Modification de {{$jeu->nom}}</h3>
                <hr class="mt-2 mb-2">
            </div>
            <div class="form-group">
                <label for="nom"><strong>Nom : </strong></label>
                <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom du jeu"
                       value="{{ $jeu->nom }}">
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="date_sortie"><strong>Date de sortie : </strong></label>
                    <input type="date" class="form-control" id="date_sortie" name="date_sortie"
                           value="{{ $jeu->date_sortie }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="age_min"><strong>Age minimum : </strong></label>
                    <input type="number" class="form-control" id="age_min" name="age_min" placeholder="3, 7, 12, 18 ?"
                           value="{{ $jeu->age_min }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="nb_joueur"><strong>Nombre de joueurs : </strong></label>
                    <input type="number" class="form-control" id="nb_joueur" name="nb_joueur"
                           placeholder="Nombre entier entre 1 et 100"
                           value="{{ $jeu->nb_joueur }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="duree_partie"><strong>Durée d'une partie : </strong></label>
                    <input type="text" class="form-control" id="duree_partie" name="duree_partie" placeholder="XX min"
                           value="{{ $jeu->duree_partie }}">
                </div>
            </div>
            <select class="form-control" multiple="multiple" name="tags[]">
                @foreach ($tags as $tag)
                    <option value="{{$tag->id}}"
                    @if(\App\Http\Controllers\TagController::tagInJeu($tag,$jeu)) selected = "selected" @endif>
                    {{$tag->label}}</option>
                @endforeach
            </select>
            <div class="form-group">
                <label for="image">Image du jeu : </label>
                <input type="file" name="image" id="image">
            </div>
            <div class="form-group">
                <label for="description"><strong>Description :</strong></label>
                <textarea name="description" id="description" rows="6" class="form-control"
                          placeholder="Description..">{{ $jeu->description }}</textarea>
            </div>

            <div style="text-align: center;margin-top: 20px;">
                <button class="btn btn-success" type="submit" style="margin-right: 10px; font-size: larger;"><i class="fas fa-check-square" style="margin-right: 10px; font-size: larger;"></i>
                    Valider la modification
                </button>
                <a href="{{route('jeux.show', $jeu->id)}}" style="color: white; text-decoration: none;">
                    <button class="btn btn-danger" type="button" style="margin-right: 10px; font-size: larger;"><i class="fas fa-times" style="margin-right: 10px; font-size: larger;"></i>
                        Annuler la modification
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
