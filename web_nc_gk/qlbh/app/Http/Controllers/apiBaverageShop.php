<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drink;

class apiBaverageShop extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     
        
        $drink = Drink::all();
        $data = json_decode($drink, true);
        return response()->json($data);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function postDrink(Request $request)
    {
        //form value 
        //body http form value

        $drinkCode = $request->input('drinkCode');
        $drinkName = $request->input('drinkName');
      

 

        Drink::create([
            "drinkCode" => $drinkCode,
            "drinkName" => $drinkName
          
        ]);



        return response()->json(
            [
                'Post success ' => true,
                "drinkCode" => $drinkCode,
                "drinkName" => $drinkName
            
            ]
        );
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
