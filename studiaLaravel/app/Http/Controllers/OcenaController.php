<?php

namespace App\Http\Controllers;

use App\Ocena;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFormOcenyValidation;

class OcenaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oceny = Ocena::all();
        return view('ocenas.showAll', ['oceny'=>$oceny]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->edit(
            new Ocena(['id'=>-1, 'imie'=>'', 'nazwisko'=>'', 'przedmiot'=>'', 'ocena'=>0]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->update($request,
        new Ocena(['id'=>null, 'imie'=>'', 'nazwisko'=>'', 'przedmiot'=>'', 'ocena'=>0]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ocena  $ocena
     * @return \Illuminate\Http\Response
     */
    public function show(Ocena $ocena)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ocena  $ocena
     * @return \Illuminate\Http\Response
     */
    public function edit(Ocena $ocena)
    {
        /*
        if($ocena == null)
        $ocena = new Ocena(['id'=>-1, 'imie'=>'', 'nazwisko'=>'', 'przedmiot'=>'', 'ocena'=>0]);
        return view('ocenas.edit', ['ocena'=>$ocena]);
        */
        return view('ocenas.edit', ['ocena'=>$ocena]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ocena  $ocena
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFormOcenyValidation $request, Ocena $ocena)
    {
        /*
        if($ocena == null)
        $ocena = new Ocena(['id'=>-1, 'imie'=>'', 'nazwisko'=>'', 'przedmiot'=>'', 'ocena'=>0]);
        $ocena->imie = $request->get('imie');
        $ocena->nazwisko = $request->get('nazwisko');
        $ocena->przedmiot = $request->get('przedmiot');
        $ocena->ocena = $request->get('ocena');
        $ocena->save();
        return redirect('/ocenas');
        */


        $ocena->imie = $request->get('imie');
        $ocena->nazwisko = $request->get('nazwisko');
        $ocena->przedmiot = $request->get('przedmiot');
        $ocena->ocena = $request->get('ocena');
        $ocena->save();
        return redirect('/ocenas');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ocena  $ocena
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ocena $ocena)
    {
        $ocena->delete();
        return redirect('/ocenas');
    }
}
