@extends('base.master')
@section('title', 'Liste des commentaires')

@section('navbar')
    @parent
@endsection

@section('content')

    <h1 style="margin-top: 60px; text-align: center">Ludothèque de l'Université d'Artois<br>-<br>Les commentaires</h1>

    <div class="ligne"></div>

    @if(!empty($commentaires))
        <table class="table table-bordered table-hover" style="font-size: larger">
            @foreach($commentaires as $commentaire)
                <tr>
                    <td>{{$commentaire->titre}}</td>
                    <td>{{$commentaire->body}}</td>
                    <td>{{$commentaire->auteur}}</td>
                    <td>{{$commentaire->jeu_id}}</td>
                </tr>
            @endforeach
        </table>
    @else
        <h3>Aucuns commentaires</h3>
    @endif
@endsection
