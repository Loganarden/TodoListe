<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $taches = \App\Models\Tache::all();
       $taches = Tache::orderBy('date')->get();

       return view('welcome',['taches' => $taches,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ajoutertache');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request-> validate([
            'titre' => ['required'],
            'description' => ['required'],
            'date' => ['required'],
        ]);

        Tache::create($request->all());

        return redirect('/')->with('success','tache crée avec succés !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function show(Tache $tache, $id)
    {
        $taches = \App\Models\Tache::all();

        return view('tache',['taches' => $taches,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function edit(Tache $tache, $id)
    {
        $tache = Tache::find($id);
        return view('modificationtache',['tache' => $tache,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tache $tache, $id)
    {
        $updatetache = $request-> validate([
            'titre' => ['required'],
            'description' => ['required'],
            'date' => ['required'],
        ]);

        Tache::whereId($id)->update($updatetache);

        return redirect('/')->with('success','tache modifer avec succés !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tache $tache, $id)
    {
        \App\Models\Tache::destroy($id);

        return redirect('/')->with('success','tache suprimer !');
    }
}
