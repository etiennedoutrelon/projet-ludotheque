@extends('base.master')
@section('title', 'Liste des tags')

@section('navbar')
    @parent
@endsection

@section('content')

    <h1 style="margin-top: 60px; text-align: center">Ludothèque de l'Université d'Artois<br>-<br>Les tags</h1>

    <div class="ligne"></div>

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

    @if(session()->has('message'))
        <div class="alert alert-success" role="alert" style="background-color: #6EEDA1; width: 90%; text-align: center; margin-right: auto; margin-left: auto; margin-top: auto; margin-bottom: auto;">
            <i class="fas fa-check-square" style="font-size: 20px; margin-right: 15px; padding: auto; display: inline-block;">&times;</i>{{ session()->get('message') }}
        </div>
    @endif

    @if(!empty($tags))
        <table class="table table-bordered table-hover" style="font-size: larger">
            @foreach($tags as $tag)
                <tr>
                    <td>
                        {{$tag->label}}
                        <form action="{{route('tags.destroy',[$tag->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="delete" value="valide" class="btn btn-danger"><i class="fas fa-trash" style="font-size: larger;"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <h3>Aucuns commentaires</h3>
    @endif

    <div style="text-align: center;margin-top: 20px;">
        <a href="{{route('tags.create')}}" style="color: white; text-decoration: none;">
            <button type="submit" class="btn btn-success"><i class="fas fa-plus-square"style="margin-right: 10px; font-size: larger;"></i>Ajouter un nouveau tag</button>
        </a>
    </div>

@endsection
