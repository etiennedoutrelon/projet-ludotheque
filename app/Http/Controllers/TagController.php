<?php

namespace App\Http\Controllers;

use App\Models\Jeu;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', ['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
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
                'label' => 'required',
            ]
        );

        $tag = new Tag();
        $tag->label = $request->label;

        $tag->save();

        return redirect('/tags')->with('success','Tag ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if ($request->delete == 'valide') {
            $tag = Tag::find($id);
            $tag->delete();
        }
        return redirect()->back()->with('drop','Tag supprimé !');
    }

    static function tagInJeu(Tag $tag, Jeu $jeu){
        $tagInJeu = $jeu->tags;
        $idTags = [];
        foreach ($tagInJeu as $t){
            $idTags[] = $t->id;
        }
        return in_array($tag->id, $idTags);
    }
}
