@extends('base.master')
@section('title', 'Liste des jeux')

@section('navbar')
    @parent
@endsection

@section('content')

    <h1 style="margin-top: 60px; text-align: center">Ludothèque de l'Université d'Artois<br>-<br>Les jeux</h1>


    <div class="ligne"></div>

    @if(session()->has('success'))
        <div class="alert alert-success" role="alert" style="background-color: #6EEDA1; width: 90%; text-align: center; margin: auto;">
            <i class="fas fa-check-square" style="font-size: 20px; margin-right: 15px; padding: auto; display: inline-block;"></i>{{ session()->get('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @elseif(session()->has('drop'))
        <div class="alert alert-danger" role="alert" style="background-color:#F18770; width: 90%; text-align: center; margin: auto;">
            <i class="fas fa-check-square" style="font-size: 20px; margin-right: 15px; padding: auto; display: inline-block;"></i>{{ session()->get('drop') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    @if(!empty($jeux))
        <fieldset>
            <div class="form-group">
                <form action="{{route('jeux.index')}}" method="get" class="form-inline my-2 my-lg-0">
                    <select class="custom-select" name="cat" style="width: 200px;">
                        <option value="All" @if($cat == 'All') selected @endif>Trier par age...</option>
                        @foreach($age_mins as $age_min)
                            <option value="{{$age_min}}"  @if($cat == $age_min) selected @endif>{{$age_min}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary my-2 my-sm-0" style="margin-left: 20px;">OK</button>
                </form>
            </div>
            <div class="form-group">
                <form action="{{route('search')}}" method="get" class="form-inline my-2 my-lg-0">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control mr-sm-2" type="text" placeholder="Rechercher un jeu..." style="width: 200px;">
                        <span class="input-group-prepend">
                            <button type="submit" class="btn btn-primary my-2 my-sm-0">Rechercher</button>
                            <a href="/jeux">
                                <button type="submit" class="btn btn-primary my-2 my-sm-0">Revenir</button>
                            </a>
                        </span>
                    </div>
                </form>
            </div>
        </fieldset>

        <table class="table table-bordered table-hover" style="font-size: larger">
            <thead class="table-active">
            <tr>
                <th scope="col" style="width: 150px;" >Nom</th>
                <th scope="col" style="width: 120px;">Date de sortie</th>
                <th scope="col" style="width: 120px;">Age</th>
                <th scope="col" style="width: 120px;">Nombres </br>de joueurs</th>
                <th scope="col" style="width: 120px;">Durée</th>
                <th scope="col">Description</th>
                <th scope="col">Affichage</th>
            </tr>
            </thead>
            @foreach($jeux as $jeu)
                <tr>
                    <td>{{$jeu->nom}}</td>
                    <td>{{$jeu->date_sortie}}</td>
                    <td>{{$jeu->age_min}}</td>
                    <td>{{$jeu->nb_joueur}}</td>
                    <td>{{$jeu->duree_partie}}</td>
                    <td style="text-align: left">{{$jeu->description}}</td>
                    <td><a style="text-decoration: none;" href="{{route('jeux.show',$jeu->id)}})}}">Plus d'informations</a></td>
                </tr>
            @endforeach
        </table>
    @else
        <h3>Aucuns jeux</h3>
    @endif

    <div style="text-align: center;">
        <a href="{{route('jeux.create')}}" style="color: white; text-decoration: none;">
            <button type="submit" class="btn btn-primary"><i class="fas fa-plus-square" style="margin-right: 10px; font-size: larger;"></i>Ajouter un nouveau jeu</button>
        </a>
    </div>

@endsection
