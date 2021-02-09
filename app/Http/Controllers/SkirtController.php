<?php

namespace App\Http\Controllers;

use App\Models\Skirt;
use Illuminate\Http\Request;

class SkirtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skirts = Skirt::latest()->get();
        return view('skirts', compact('skirts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skirts.create-skirts');
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
        $skirt = new Skirt();
        $skirt->gender = $request->input('gender');
        $skirt->age = $request->input('age');;
        $skirt->filenames = $files;



        $skirt->save();




        return redirect(route('skirts.create'))->with('flash', 'Skirt Post Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skirt  $skirt
     * @return \Illuminate\Http\Response
     */
    public function show(Skirt $skirt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skirt  $skirt
     * @return \Illuminate\Http\Response
     */
    public function edit(Skirt $skirt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skirt  $skirt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skirt $skirt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skirt  $skirt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skirt $skirt)
    {
        $skirt->delete();
        return redirect(route('skirts.index'))->with('flash', 'Skirt Deleted Successfully');
    }
}
