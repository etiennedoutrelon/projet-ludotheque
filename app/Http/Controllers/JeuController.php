<?php

namespace App\Http\Controllers;

use App\Models\Jeu;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class JeuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function index(Request $request) {
        $cat = $request->query('cat', '');
        $value = $request->cookie('cat');
        if ($cat == 'All' || (empty($cat) && empty($value))) {
            if (empty($cat))
                $cat = 'All';
            else
                Cookie::queue('cat', '', 0, '/jeux');
            $jeux = Jeu::all();
        } elseif (!empty($cat) || !empty($value)) {
            if (empty($cat))
                $cat = $value;
            $jeux = Jeu::where('age_min', $cat)->get();
            Cookie::queue('cat', $cat, 10, '/jeux');
        }

        $age_mins = Jeu::distinct('age_min')->pluck('age_min');
        return view('jeux.index', ['jeux' => $jeux, 'cat' => $cat, 'age_mins' => $age_mins]);
    }
    */


    public function index(Request $request) {
        $cat = $request->query('cat', 'All');
        if ($cat != 'All') {
            $jeux = Jeu::where('age_min', $cat)->orderBy('id', 'desc')->get();
        } else {
            $jeux = Jeu::orderBy('id', 'desc')->get();
        }
        $age_mins = Jeu::distinct('age_min')->pluck('age_min');
        return view('jeux.index', ['jeux' => $jeux, 'cat' => $cat, 'age_mins' => $age_mins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jeux.create');
    }

    public function search(Request $request){
        $cat = $request->query('cat', 'All');
        if ($cat != 'All') {
            $jeux = Jeu::where('age_min', $cat)->orderBy('id', 'desc')->get();
        } else {
            $jeux = Jeu::orderBy('id', 'desc')->get();
        }
        $age_mins = Jeu::distinct('age_min')->pluck('age_min');
        $search = $request->get('search');
        $jeux = DB::table('jeux')->where('nom','like','%'.$search.'%')->paginate(5);
        return view('jeux.index',['jeux' => $jeux, 'cat' => $cat, 'age_mins' => $age_mins]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // validation des données de la requête
        $this->validate(
            $request,
            [
                'nom' => 'required',
                'date_sortie' => 'required',
                'age_min' => 'required',
                'nb_joueur' => 'required',
                'duree_partie' => 'required',
                'description' => 'required',
            ]
        );
        $image = $this->upload($request);
        // code exécuté uniquement si les données sont validaées
        // sinon un message d'erreur est renvoyé vers l'utilisateur

        // préparation de l'enregistrement à stocker dans la base de données
        $jeu = new Jeu;

        $jeu->nom = $request->nom;
        $jeu->date_sortie = $request->date_sortie;
        $jeu->age_min = $request->age_min;
        $jeu->nb_joueur = $request->nb_joueur;
        $jeu->duree_partie = $request->duree_partie;
        $jeu->description = $request->description;
        if($image !== null) $jeu->image = $image;
        // insertion de l'enregistrement dans la base de données
        $jeu->save();

        foreach ($request->tags as $tag){
            $jeu->tags()->attach($tag);
        }

        // redirection vers la page qui affiche la liste des tâches
        return redirect("/jeux")->with('success', 'Jeu ajouté avec succès à la liste !');
    }

    public function upload(Request $request) {
        if ($request->hasFile('image')  && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $base = 'image';
            $now = time();
            $nom = sprintf("%s_%d.%s",$base,$now,$file->extension());
            $file->storeAs('images',$nom);
            return $nom;
        }
        return null;
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id) {
        $action = $request->query('action', 'show');
        $jeu = Jeu::find($id);
        $tags = Jeu::find($id)->tags()->get();

        return view('jeux.show', ['jeu' => $jeu, 'action' => $action, 'tags' => $tags]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jeu = Jeu::find($id);
        $tags= Tag::all();

        return view('jeux.edit', ['jeu' => $jeu, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $jeu = Jeu::find($id);

        $this->validate(
            $request,
            [
                'nom' => 'required',
                'date_sortie' => 'required',
                'age_min' => 'required',
                'nb_joueur' => 'required',
                'duree_partie' => 'required',
                'description' => 'required',
            ]
        );
        $image = $this->upload($request);

        $jeu->nom = $request->nom;
        $jeu->date_sortie = $request->date_sortie;
        $jeu->age_min = $request->age_min;
        $jeu->nb_joueur = $request->nb_joueur;
        $jeu->duree_partie = $request->duree_partie;
        $jeu->description = $request->description;
        if($jeu->image !== null && $image !== null) Storage::delete('images/'.$jeu->image);
        if($image !== null) $jeu->image = $image;

        $tags = $request->tags;

        $jeu->save();

        $jeu->tags()->sync($tags);

        return redirect('/jeux')->with('success','Jeu modifié avec succès !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->delete == 'valide') {
            $jeu = Jeu::find($id);
            $jeu->delete();
        }
        return redirect('/jeux')->with('drop', 'Jeu supprimé !');
    }
}
