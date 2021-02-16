<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;

class PizzaController extends Controller
{
     private $pizzaValidation = [
        'name' => 'required|string|max:60',
        'price' => 'required|numeric',
        'ingredients' => 'required|string',
        'img_path' => 'required|string|max:255',
        'vegetarian' => 'boolean'
     ];   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // select * from pizzas;
        $pizzas = Pizza::all();
        // dd($pizzas);

        return view('pizzas.index', compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pizzas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->all();

        $request->validate($this->pizzaValidation);

        $pizza = new Pizza();
        // $pizza->name = $data["name"];
        $pizza->fill($data);
        $pizza->save();

        return redirect()
            ->route('pizzas.index')
            ->with('message', 'Pizza ' . $pizza->name . ' creata correttamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pizza $pizza)
    {
        // $pizza = Pizza::findOrFail($id);
        // $pizza = Pizza::find($id);

        // if(empty($pizza)) {
        //     abort('404');
        // }
        // dd($pizza);
        return view('pizzas.show', compact('pizza'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pizza $pizza)
    {
        return view('pizzas.edit', compact('pizza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pizza $pizza)
    {
        $data = $request->all();

        $request->validate($this->pizzaValidation);

        if(empty($data["vegetarian"])) {
            $data["vegetarian"] = 0;
        }

        $pizza->update($data);

        return redirect()
            ->route('pizzas.index')
            ->with('message', 'Pizza ' . $pizza->name . ' aggiornata correttamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pizza $pizza)
    {
        // dd($pizza);
        $pizza->delete();

        return redirect()
            ->route('pizzas.index')
            ->with('message', 'Pizza ' . $pizza->name . ' cancellata correttamente!');
    }
}
