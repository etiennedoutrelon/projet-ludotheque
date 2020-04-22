@extends('base.master')
@if($action == 'delete')
    <title>Suppression</title>
@else
    <title>{{$jeu->nom}}</title>
@endif

@section('navbar')
    @parent
@endsection

@section('content')
    <div style="background-color:rgba(232,231,231,0.4); border:  1px solid black; border-radius: 5px; width: 80%; margin: auto; margin-top: 2rem; margin-bottom: 5rem">
        <div class="text-center" style="margin-top: 2rem">
            @if($action == 'delete')
                <h3>Suppression de {{$jeu->nom}}</h3>
            @else
                <h3>{{$jeu->nom}}</h3>
            @endif
            <hr class="mt-2 mb-2" style="width: 90%">
        </div>
        @if($jeu->image != null)
            <div class="imgJeu">
                <img src="{{url('storage/images/'.$jeu->image)}}" style="display: block; margin: auto; max-width: 100%;max-height: 40vh;border-radius: 10px;">
            </div>
        @endif

        <table class="table table-bordered" style="font-size: larger">
            <thead class="table-active">
            <tr>
                <th scope="col" style="width: 150px;">Nom</th>
                <th scope="col" style="width: 150px;">Date de sortie</th>
                <th scope="col">Age minimum</th>
                <th scope="col">Nombre de joueurs</th>
                <th scope="col">Durée d'une partie</th>
                <th scope="col">Descritpion</th>
                <th scope="col">Tags</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$jeu->nom}}</td>
                <td>{{$jeu->date_sortie}}</td>
                <td>{{$jeu->age_min}}</td>
                <td>{{$jeu->nb_joueur}}</td>
                <td>{{$jeu->duree_partie}}</td>
                <td style="text-align: left">{{ $jeu->description}}</td>
                <td>
                @foreach($tags as $tag)
                {{$tag->label}}
                @endforeach
                </td>
            </tr>
            </tbody>
        </table>

        @if($action == 'delete')
            <form action="{{route('jeux.destroy',$jeu->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="text-center" style="margin-top: 20px;">
                    <button style="margin: 20px;" type="submit" class="btn btn-success" name="delete" value="valide"><i class="fas fa-check-square" style="margin-right: 10px; font-size: larger;"></i>Valider</button>
                    <button style="margin: 20px;" type="submit" class="btn btn-danger" name="delete" value="annule">
                        <a href="{{route('jeux.show',$jeu->id)}}" style="color: white; text-decoration: none;"><i class="fas fa-times" style="margin-right: 10px; font-size: larger;"></i>Annuler</a>
                    </button>
                </div>
            </form>
        @else
            <div style="text-align: center;margin-top: 20px;">

                <a href="{{route('jeux.index')}}" style="color: white; text-decoration: none;">
                    <button type="submit" class="btn" style="margin: 20px;background-color:dodgerblue; color: white"><i class="fas fa-list" style=" margin-right: 10px; font-size: larger;"></i>Retour à la liste</button>
                </a>

                <a href="{{route('jeux.edit',$jeu->id)}}" style="color: white; text-decoration: none;">
                    <button type="submit" class="btn" style="margin: 20px;background-color:orange; color: white" ><i class="fas fa-edit" style="margin-right: 10px; font-size: larger;"></i>Modifier</button>
                </a>

                <a href="{{route('jeux.show',$jeu->id)}}?action=delete" style="color: white; text-decoration: none;">
                    <button type="submit" class="btn" style="margin: 20px;background-color:red; color: white "><i class="fas fa-trash-alt" style="margin-right: 10px; font-size: larger;"></i>Supprimer</button>
                </a>

                <a href="{{route('commentaires.show',$jeu->id)}}" style="color: white; text-decoration: none;">
                    <button type="submit" class="btn" style="margin: 20px;background-color:blue; color: white "><i class="fas fa-quote-right" style="margin-right: 10px; font-size: larger;"></i>Commentaires</button>
                </a>

            </div>
        @endif
    </div>
@endsection
