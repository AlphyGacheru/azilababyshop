<?php

namespace App\Http\Controllers;

use App\Models\Dress;
use Illuminate\Http\Request;

class DressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dresses = Dress::latest()->get();
        return view('dresses', compact('dresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dresses.create-dresses');
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
        $dress = new Dress();
        $dress->gender = $request->input('gender');
        $dress->age = $request->input('age');;
        $dress->filenames = $files;



        $dress->save();




        return redirect(route('dresses.create'))->with('flash', 'Dress Post Created Successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dress  $dress
     * @return \Illuminate\Http\Response
     */
    public function show(Dress $dress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dress  $dress
     * @return \Illuminate\Http\Response
     */
    public function edit(Dress $dress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dress  $dress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dress $dress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dress  $dress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dress $dress)
    {

        $dress->delete();
        return redirect(route('dresses.index'))->with('flash', 'Dress Deleted Successfully');
    }
}
