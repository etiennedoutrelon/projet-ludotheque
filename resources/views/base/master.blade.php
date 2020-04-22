<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @section('head')
        <meta charset="UTF-8">
    @show
    <title>@yield('title', 'Accueil')</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://bootswatch.com/4/pulse/bootstrap.min.css">
    <style>
        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .masthead {
            padding-top: calc(6rem + 74px);
            padding-bottom: 6rem;
            height: 100%;
        }

        .masthead .masthead-heading {
            font-size: 2.75rem;
            line-height: 2.75rem;
            color: black;
        }

        .masthead .masthead-subheading {
            font-size: 1.25rem;
        }

        .masthead .masthead-avatar {
            height: 350px;
            background-color: white;
        }

        @media (min-width: 992px) {
            .masthead {
                padding-top: calc(6rem + 104px);
                padding-bottom: 6rem;
            }
            .masthead .masthead-heading {
                font-size: 4rem;
                line-height: 3.5rem;
            }
            .masthead .masthead-subheading {
                font-size: 1.5rem;
            }
        }
        .img-nav{
            width: 50px;
            background-color: white;
            border-radius: 3px;
            margin-right: 20px;
        }

        h2 {
            text-align: center;
            margin: 40px;
        }

        body {
            font-family: 'Nunito', sans-serif;
            position: relative;
        }
        footer {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
        }

        table {
            margin: auto;
            padding: auto;
            width: 90% !important;
        }

        th, td {
            text-align: center;
        }

        .ligne {
            border: solid black 1px;
            margin-right: auto;
            margin-left: auto;
            margin-bottom: 30px;
            padding: auto;
            width: 85%;
        }

        .imgJeu{
            margin: 20px;
        }

        .bouttons_accueil{
            text-align: center;
            margin: auto;
            background-color: #636b6f;
            border-radius: 10px;
            width: 40%;
        }
        button{
            margin: 10px;
        }
        button:hover {
            -webkit-transform:scale(1.05);
            -moz-transform:scale(1.05);
            -ms-transform:scale(1.05);
            -o-transform:scale(1.05);
            transform:scale(1.05);
        }
        form{
            margin: auto;
            padding: auto;
            width: 80% !important;
        }
        .formulaire{
            border-radius: 8px;
            border: solid black 1px;
            width: 80%;
            margin-top: 30px;
            margin-right: auto;
            margin-left: auto;
            padding: 30px;
        }
        .titre{
            margin-bottom: 40px;
            margin-top: 20px;
        }

        .btn_ajout{
            display: inline-block;
            margin:20px
        }
        .btn_retour{
            display: inline-block;
            margin:20px
        }
        .btn_annuler{
            display: inline-block;
            margin:20px
        }
        .section_btn{
            text-align: center;
        }

    </style>
</head>
<body>
@section('navbar')
    @include('base.navbar')
@show

<div class="contenu">
    @yield('content')
</div>

@section('footer')
    <p style="text-align: center;">IUT de Lens - Département Info - Projet Ludothèque -  &copy;Etienne Doutrelon</p>
@show

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
