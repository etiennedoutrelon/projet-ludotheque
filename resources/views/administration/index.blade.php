@extends('base.master')
@section('title', 'Statistiques')

@section('navbar')
    @parent
@endsection

@section('content')
    <div style="background-color:rgba(232,231,231,0.4); border:  1px solid black; border-radius: 5px; width: 80%; margin: auto; margin-top: 2rem; margin-bottom: 5rem">
        <h2>Statistiques</h2>
        <div style="width: 50%; margin: auto; text-align: center;">
            <table class="table table-hover" style="font-size: larger;background-color: white;border-radius: 10px;margin-bottom: 100px;">
                <tbody>
                <tr>
                    <th scope="row"><a href="{{route('administration.utilisateurs')}}">Utilisateur</a> </th>
                    <td>{{$nbUsers}}</td>
                </tr>
                <tr>
                    <th scope="row"><a href="{{route('jeux.index')}}">Jeux</a></th>
                    <td>{{$nbJeux}}</td>
                </tr>
                <tr>
                    <th scope="row"><a href="{{route('commentaires.index')}}">Commentaires</a></th>
                    <td>{{$nbCommentaires}}</td>
                </tr>
                <tr>
                    <th scope="row"><a href="{{route('tags.index')}}">Tags</a> </th>
                    <td>{{$nbTags}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
