@extends('base.master')
@section('title', 'Commentaires')

@section('navbar')
    @parent
@endsection

@section('content')
    <div style="background-color:rgba(232,231,231,0.4); border:  1px solid black; border-radius: 5px; width: 80%; margin: auto; margin-top: 2rem; margin-bottom: 5rem">
        <div class="text-center" style="margin-top: 2rem">
            @if($action == 'delete')
                <h3>Suppression</h3>
            @else
                <h3>Commentaires du jeux {{$jeu->nom}}</h3>
            @endif
            <hr class="mt-2 mb-2" style="width: 90%">
        </div>

        @if(session()->has('success'))
            <div class="alert alert-success" role="alert" style="background-color: #6EEDA1; width: 90%; text-align: center; margin-left:auto; margin-right: auto; margin-bottom: 20px;">
                <i class="fas fa-check-square" style="font-size: 20px; margin-right: 15px; padding: auto; display: inline-block;"></i>{{ session()->get('success') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @elseif(session()->has('drop'))
            <div class="alert alert-danger" role="alert" style="background-color:#F18770; width: 90%; text-align: center;  margin-left:auto; margin-right: auto; margin-bottom: 20px;">
                <i class="fas fa-check-square" style="font-size: 20px; margin-right: 15px; padding: auto; display: inline-block;"></i>{{ session()->get('drop') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif

        @if(!empty($commentaires))
            <table class="table table-bordered table-hover" style="font-size: larger">
                <thead class="table-active">
                <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Description</th>
                    <th scope="col">Auteur</th>
                    <th>Actions</th>
                </tr>
                </thead>
                @foreach($commentaires as $commentaire)
                    <tbody>
                    <tr>
                        <td>{{$commentaire->titre}}</td>
                        <td>{{$commentaire->body}}</td>
                        <td>{{$commentaire->auteur}}</td>
                        <td>
                            @if(\Illuminate\Support\Facades\Auth::user()->getAuthIdentifier()==$commentaire->auteur_id)
                                <div style="width: 70%; height: 70%; text-align: center;">
                                    <form action="{{route('commentaires.destroy',[$commentaire->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" name="delete" value="valide" class="btn btn-danger" style="border-radius: 10px;"><i class="fas fa-trash" style="font-size: larger;text-align: center"></i></button>
                                    </form>
                                </div>
                                <div style="width: 70%; height: 70%; text-align: center;">
                                    <a href="{{route('commentaires.edit', $commentaire->id)}}">
                                        <button type="submit" name="edited" value="valide" class="btn btn-warning" style="border-radius: 10px;"><i class="fas fa-edit" style="font-size: larger; text-align: center"></i></button>
                                    </a>
                                </div>
                            @else
                                non autorisé
                            @endif
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        @else
            <h3>Aucun commentaires</h3>
        @endif


        <div style="text-align: center;margin-top: 20px;">

            <a href="{{url(route('commentaires.create')) . '?' . http_build_query(['id' => $jeu->id])}}" style="color: white; text-decoration: none;">
                <button type="submit" class="btn" style="margin: 20px;background-color:limegreen; color: white"><i class="fas fa-plus-square" style="margin-right: 10px; font-size: larger;"></i>Ajouter un commentaire</button>
            </a>

            <a href="{{route('jeux.index')}}" style="color: white; text-decoration: none;">
                <button type="submit" class="btn" style="margin: 20px;background-color:dodgerblue; color: white"><i class="fas fa-list" style="margin-right: 10px; font-size: larger;"></i>Retour à la liste</button>
            </a>

            <a href="{{route('jeux.show',$jeu->id)}}" style="color: white; text-decoration: none;">
                <button type="submit" class="btn" style="margin: 20px;background-color:blue; color: white"><i class="fas fa-undo" style="margin-right: 10px; font-size: larger;"></i>Retour à la fiche</button>
            </a>

        </div>
    </div>
@endsection
