@extends('base.master')
@section('title', 'Utilisateurs')

@section('navbar')
    @parent
@endsection

@section('content')

    <div style="background-color:rgba(232,231,231,0.4); border:  1px solid black; border-radius: 5px; width: 80%; margin: auto; margin-top: 2rem; margin-bottom: 5rem">
        <h2>Utilisateurs</h2>
        <div style="width: 80%; margin: auto; text-align: center;">
            <table class="table table-hover" style="font-size: larger;background-color: white;border-radius: 10px;margin-bottom: 100px;">
                <thead class="teal lighten-4">
                <tr class="table-secondary">
                    <th>Nom</th>
                    <th>E-mail</th>
                    <th>Rang d'accès</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($utilisateurs as $utilisateur)
                    <tr>
                        <td>{{$utilisateur->name}}</td>
                        <td>{{$utilisateur->email}}</td>
                        <td>{{$utilisateur->type}}</td>
                        <td>
                            <form method="POST" action="{{route('utilisateurs.update')}}">
                                @csrf
                                <input type="hidden" value="{{$utilisateur->id}}" name="id">
                                <button type="submit" class="btn @if($utilisateur->type === 'admin') btn-warning @else btn-success @endif">
                                    @if($utilisateur->type === 'admin')
                                        Restreindre
                                    @else
                                        Promouvoir
                                    @endif
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
