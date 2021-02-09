<?php

namespace App\Http\Controllers;

use App\Models\Short;
use Illuminate\Http\Request;

class ShortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shorts = Short::latest()->get();
        return view('shorts', compact('shorts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shorts.create-shorts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { {
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
            $short = new Short();
            $short->gender = $request->input('gender');
            $short->age = $request->input('age');;
            $short->filenames = $files;



            $short->save();




            return redirect(route('shorts.create'))->with('flash', 'Short Post Created Successfully');
        } //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Short  $short
     * @return \Illuminate\Http\Response
     */
    public function show(Short $short)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Short  $short
     * @return \Illuminate\Http\Response
     */
    public function edit(Short $short)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Short  $short
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Short $short)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Short  $short
     * @return \Illuminate\Http\Response
     */
    public function destroy(Short $short)
    {
        $short->delete();
        return redirect(route('trousers.index'))->with('flash', 'Short Deleted Successfully');
    }
}
