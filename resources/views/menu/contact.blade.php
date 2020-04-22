@extends('base.master')
@section('title', 'Contact')

@section('navbar')
    @parent
@endsection

@section('content')
    <div class="formulaire" style="font-size: larger;">
        <h3 style="text-align: center; padding-bottom: 30px;">Formulaire de contact</h3>
        <form>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Nom</label>
                    <input type="#" class="form-control" >
                </div>
                <div class="form-group col-md-4">
                    <label>Prenom</label>
                    <input type="#" class="form-control" >
                </div>
                <div class="form-group col-md-4">
                    <label>Sexe</label>
                    <select class="form-control">
                        <option selected>Choisissez</option>
                        <option>Homme</option>
                        <option>Femme</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Message</label>
                <textarea class="form-control" rows="3" placeholder="Votre message..."></textarea>
            </div>
            <div  style="text-align: center; margin: auto;">
                <button type="submit" class="btn btn-primary" style="font-size: larger">Envoyer</button>
            </div>
        </form>
    </div>
@endsection
