<?php

namespace App\Http\Controllers;

use App\Przedmiot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFormPrzedmiotyValidation;


class PrzedmiotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $przedmioty = Przedmiot::all();
        return view('courses.showAll', ['przedmioty' => $przedmioty]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->edit
            (new Przedmiot(['id'=>-1, 'nazwa'=>'', 'godzin'=>0]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->update($request, new Przedmiot(['id'=>null, 'nazwa'=>'', 'godzin'=>0]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Przedmiot  $przedmiot
     * @return \Illuminate\Http\Response
     */
    public function show(Przedmiot $przedmiot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Przedmiot  $przedmiot
     * @return \Illuminate\Http\Response
     */
     public function edit(Przedmiot $przedmiot)
     {
         //pierwsza wersja metody
         /*
         if($przedmiot == null)
         $przedmiot = new Przedmiot(['id'=>-1, 'nazwa'=>'', 'godzin'=>0]);
         return view('courses.edit', ['przedmiot'=>$przedmiot]);
         */

         //metoda po uproszczeniu
        // return view('courses.edit', ['przedmiot'=>$przedmiot]);
         return view('courses.edit', ['przedmiot'=>$przedmiot]);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Przedmiot  $przedmiot
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Przedmiot $przedmiot)
    public function update(StoreFormPrzedmiotyValidation $request, Przedmiot $przedmiot)
    {
        //stara wersja metody
        /*
        if($przedmiot == null)
        $przedmiot = new Przedmiot(['id'=>null, 'nazwa'=>'', 'godzin'=>0]);

        $przedmiot->nazwa = $request->get('nazwa');
        $przedmiot->godzin = $request->get('godzin');
        $przedmiot->save();

        return redirect('/przedmiots');
        */

        //dopisuje validacje!
        /*
        $this->validate($request, [
            'nazwa' =>'required|alpha',
            'godzin' =>'required|numeric'
        ]);
        */

        //metoda po uproszczeniu
        $przedmiot->nazwa = $request->get('nazwa');
        $przedmiot->godzin = $request->get('godzin');



        $przedmiot->save();
        return redirect('/przedmiots');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Przedmiot  $przedmiot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Przedmiot $przedmiot)
    {
        $przedmiot->delete();
        return redirect('/przedmiots');
    }
}
