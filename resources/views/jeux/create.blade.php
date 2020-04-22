@extends('base.master')
@section('title', 'Ajout')

@section('navbar')
    @parent
@endsection

@section('content')
    <div style="background-color:rgba(232,231,231,0.4); border:  1px solid black; border-radius: 5px; width: 80%; margin: auto; margin-top: 2rem; margin-bottom: 5rem">
        <form action="{{route('jeux.store')}}" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="text-center" style="margin-top: 2rem">
                <h3>Ajouter un jeu</h3>
                <hr class="mt-2 mb-2">
            </div>
            <div class="form-group">
                {{-- le nom du jeu  --}}
                <label for="nom"><strong>Nom : </strong></label>
                <input type="text" class="form-control" name="nom" id="nom"
                       value="{{ old('nom') }}"
                       placeholder="Nom du jeu">
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    {{-- la date de sortie  --}}
                    <label for="date_sortie"><strong>Date de sortie : </strong></label>
                    <input type="date" class="form-control" id="date_sortie" name="date_sortie"
                           value="{{ old('date_sortie') }}"
                           placeholder="AAAA-MM-JJ">
                </div>
                <div class="form-group col-md-3">
                    {{-- l'age minimum requis  --}}
                    <label for="age_min"><strong>Age minimum : </strong></label>
                    <select class="form-control" id="age_min" name="age_min">
                        <option selected>Age min</option>
                        <option>3</option>
                        <option>7</option>
                        <option>12</option>
                        <option>18</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    {{-- le nombre de joueur  --}}
                    <label for="nb_joueur"><strong>Nombre de joueurs : </strong></label>
                    <input type="number" class="form-control" id="nb_joueur" name="nb_joueur"
                           value="{{ old('nb_joueur') }}"
                           placeholder="Nombre entier entre 1 et 100">
                </div>
                <div class="form-group col-md-3">
                    {{-- la durée d'une partie  --}}
                    <label for="duree_partie"><strong>Durée d'une partie : </strong></label>
                    <input type="text" class="form-control" id="duree_partie" name="duree_partie"
                           value="{{ old('duree_partie') }}"
                           placeholder="XX min">
                </div>
            </div>
            <div class="form-group">
                <label for="image">Image du jeu : </label>
                <input type="file" name="image" id="image">
            </div>

            <select class="form-control" multiple="'multiple" name="tags[]">
                @php
                    $tags= \App\Models\Tag::all();
                    if (!is_null(old('tags'))) $tab = old('tags');
                    foreach ($tags as $tag){
                        echo "<option value='".$tag->id."'".(isset($tab) ? (in_array($tab->id,$tab) ? "selected" : "") : "").">".$tag->label."</option>";
                    }
                @endphp
            </select>

            <div class="form-group">
                <label for="description"><strong>Description :</strong></label>
                <textarea name="description" id="description" rows="6" class="form-control"
                          placeholder="Description..">{{ old('description') }}</textarea>
            </div>

            <div style="text-align: center;margin-top: 20px;">

                <button class="btn btn-success" type="submit" style="margin-right: 10px; font-size: larger;"><i class="fas fa-plus-square" style="margin-right: 10px; font-size: larger;"></i>
                    Ajouter
                </button>

                <a href="{{route('jeux.index')}}" style="color: white; text-decoration: none;">
                    <button class="btn btn-danger" type="button" style="margin-right: 10px; font-size: larger;"><i class="fas fa-times" style="margin-right: 10px; font-size: larger;"></i>
                        Annuler
                    </button>
                </a>

            </div>
        </form>
    </div>

    @if ($errors->any())
        <div style="width: 40%; margin: auto; background-color: rgba(232,231,231,0.4); border-radius: 10px; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);">
            <div style="width: 100%; background-color: #F01330; color: white; height: 80px;  text-align: center; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                <i class="fas fa-exclamation-triangle" style="font-size: 50px; margin-top: 15px; padding: auto;"></i>
            </div>
            <div style="padding-bottom: 20px;">
                <h5 style="text-align: center; margin-top: 10px; color: #F01330;">Les erreurs suivantes doivent être corrigées :</h5>
                <ul style="margin-top: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
@endsection
