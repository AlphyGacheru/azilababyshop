<?php

namespace App\Http\Controllers;

use App\Models\Trouser;
use Illuminate\Http\Request;

class TrouserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trousers = Trouser::latest()->get();
        return view('trousers', compact('trousers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trousers.create-trousers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'gender' => 'required',
            'age' => 'required | numeric',
            'filenames' => 'required',
            'filenames.*' => 'image'


        ]);


        $files = [];
        if ($request->hasfile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('files'), $name);
                $files[] = $name;
            }
        }


        // $vehicle = new Vehicle();
        $trousers = new Trouser();
        $trousers->gender = $request->input('gender');
        $trousers->age = $request->input('age');;
        $trousers->filenames = $files;



        $trousers->save();




        return redirect(route('trousers.create'))->with('flash', 'Trousers Post Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trouser  $trouser
     * @return \Illuminate\Http\Response
     */
    public function show(Trouser $trouser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trouser  $trouser
     * @return \Illuminate\Http\Response
     */
    public function edit(Trouser $trouser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trouser  $trouser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trouser $trouser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trouser  $trouser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trouser $trousers)
    {
        $trousers->delete();
        return redirect(route('trousers.index'))->with('flash', 'Trouser Deleted Successfully');
    }
}
