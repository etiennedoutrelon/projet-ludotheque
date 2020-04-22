<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Jeu;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commentaires = Commentaire::all();
        return view('commentaires.index', ['commentaires' => $commentaires]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('commentaires.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'titre' => 'required',
                'body' => 'required',
            ]
        );

        $commentaire = new Commentaire();
        $commentaire->jeu_id = $request->jeu_id;
        $commentaire->titre = $request->titre;
        $commentaire->body = $request->body;
        $commentaire->auteur = Auth::user()->name;
        $commentaire->auteur_id = Auth::user()->getAuthIdentifier();


        // insertion de l'enregistrement dans la base de données
        $commentaire->save();

        // redirection vers la page qui affiche la liste des tâches
        return redirect('/commentaires/'.$request->jeu_id)->with('success','Commentaire ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $action = $request->query('action', 'show');
        $commentaires = Jeu::findOrFail($id)->commentaires()->get()->all();
        $jeu = Jeu::findOrFail($id);
        return view('commentaires.show', ['commentaires' => $commentaires, 'jeu' => $jeu, 'action' => $action]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $commentaire = Commentaire::find($id);

        return view('commentaires.edit', ['commentaire' => $commentaire]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $commentaire = Commentaire::find($id);

        $this->validate(
            $request,
            [
                'titre' => 'required',
                'body' => 'required',
            ]
        );

        $commentaire->titre = $request->titre;
        $commentaire->body = $request->body;
        $idj = $commentaire->jeu_id;

        $commentaire->save();

        return redirect('/commentaires/'.$idj)->with('success','Commentaire modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id) {
        if ($request->delete == 'valide') {
            $commentaire = Commentaire::find($id);
            $commentaire->delete();
        }
        return redirect()->back()->with('drop','Commentaire supprimé !');
    }
}
