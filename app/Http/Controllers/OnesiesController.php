<?php

namespace App\Http\Controllers;

use App\Models\Onesies;
use Illuminate\Http\Request;


class OnesiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $onesies = Onesies::latest()->get();
        return view('onesies', compact('onesies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('onesies.create-onesies');
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
        $onesies = new Onesies();
        $onesies->gender = $request->input('gender');
        $onesies->age = $request->input('age');;
        $onesies->filenames = $files;



        $onesies->save();




        return redirect(route('onesies.create'))->with('flash', 'Onesies Post Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Onesies  $onesies
     * @return \Illuminate\Http\Response
     */
    public function show(Onesies $onesies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Onesies  $onesies
     * @return \Illuminate\Http\Response
     */
    public function edit(Onesies $onesies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Onesies  $onesies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Onesies $onesies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Onesies  $onesies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Onesies $onesy)
    {
        $onesy->delete();
        return redirect(route('onesies.index'))->with('flash', 'Onesie Deleted Successfully');
    }
}
