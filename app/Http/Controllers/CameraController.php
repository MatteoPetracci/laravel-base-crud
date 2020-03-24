<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Camera;


class CameraController extends Controller
{
    private $validation = [
        'model'=>'required|string|max:30',
        'resolution'=>'required|string|max:10',
        'price'=>'required|numeric|min:1|max:5000',
        'memory'=>'required|string|max:30',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cameras = Camera::all();
        // dd($cameras);
        return view('cameras.index', compact('cameras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cameras.create');
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

         $request->validate($this->validation);
        // dd($request->validate());

        $newCamera = new Camera;
        // $newCamera->model = $data['model'];
        // $newCamera->resolution = $data['resolution'];  
        // $newCamera->price = $data['price'];  
        // $newCamera->memory = $data['memory'];  
        $newCamera->fill($data);
        
        $saveCamera = $newCamera->save();


        if ($saveCamera) {

            // Prendo l'ultimo elemento inserito

            $camera = Camera::orderBy('id','desc')->first();

            //Se chiamo show devo passare l'elemento in compact
            return redirect()->route('cameras.show', compact('camera'));
            // return redirect()->route('cameras.index');

        } else {
            dd('error save');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Passo l'oggetto come parametro
    public function show(Camera $camera)
    {

        if (empty($camera)) {
            abort('404');
        }

        return view('cameras.show', compact('camera'));
    }
    // ***********************************************************

    // public function show($id)
    // {
    //     $camera = Camera::find($id);

    //     if (empty($camera)) {
    //         abort('404');
    //     }

    //     return view('cameras.show', compact('camera'));
    // }
  
    
    // ***********************************************************


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Camera $camera)
    {
        if (empty($camera)) {
           abort('404');
        }
        return view('cameras.edit', compact('camera'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $camera = Camera::find($id);
        if (empty($camera)) {
            abort('404');
         }

         $data = $request->all();
        //  dd($data);

         $request->validate($this->validation);

         //Sovrascrive il record a differenza di save che 
         // creerebbe un nuovo id
         $updated = $camera->update($data);
        //  dd($updated);
        if ($updated) {
            $camera = Camera::find($id);
            return redirect()->route('cameras.show', compact('camera'));
        } else {
            dd('error UPDATE');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Passo l'oggetto come argomento
    public function destroy(Camera $camera)
    {
        $camera->delete();
        return view('cameras.index');
    }
}
