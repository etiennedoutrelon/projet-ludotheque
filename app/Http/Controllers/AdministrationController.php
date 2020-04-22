<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Jeu;
use App\Models\Tag;
use App\User;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nbJeux = Jeu::all()->count();
        $nbCommentaires = Commentaire::all()->count();
        $nbTags = Tag::all()->count();
        $nbUsers = User::all()->count();
        return view('administration.index', ['nbJeux' => $nbJeux, 'nbCommentaires' => $nbCommentaires, 'nbTags' => $nbTags, 'nbUsers' => $nbUsers]);
    }

    public function utilisateurs()
    {
        $utilisateurs = User::all();
        return view('administration.utilisateurs', ['utilisateurs' => $utilisateurs]);
    }

    public function update(Request $request){
        $utilisateur = User::findOrFail($request->id);
        if($utilisateur->type === 'admin')
            $utilisateur->type = User::DEFAULT_TYPE;
        else
            $utilisateur->type = User::ADMIN_TYPE;
        $utilisateur->save();
        return redirect(route('administration.utilisateurs'))->with('success',"Changement de rang d'accès réussit !");
    }
}
