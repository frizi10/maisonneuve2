<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Models\Ville;
use Illuminate\Support\Facades\Hash;
use App\Models\User;




class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants =  Etudiant::all();
        return view('etudiant.index',['etudiants'=> $etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view('etudiant.create',['villes' => $villes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        //return $request;
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
        // False return redirect()->back()->withErrors();
        $user =  User::create([
            'name'=> $request->nom,
            'password'=> Hash::make($request->password),
            'email'=> $request->email,
        ]);
        //$user->fill($request->all());
       
       
        $newData =  Etudiant::create([
            'id'=>$user->id,
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'email' => $request->email,
            'ville_id' => $request->ville_id,
            'date_de_naissance' => $request->date_de_naissance,

        ]);

        
        return redirect(route('etudiant.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        return view('etudiant.show', ["etudiant"=> $etudiant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::all();
        return view('etudiant.edit', [
            'etudiant'=>$etudiant,
            'villes'=> $villes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $etudiant->update([
            "nom" =>  $request->nom,
            "adresse" => $request->adresse,
            "phone" => $request->phone,
            "email" => $request->email,
            "date_de_naissance" => $request->date_de_naissance,
            "ville_id" => $request->ville_id
        ]);

        return redirect (route('etudiant.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
       $etudiant->delete();
       return redirect(route('etudiant.index'));
    }



}
