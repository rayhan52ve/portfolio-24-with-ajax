<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experience::all();
        return view('Admin.experience.experience_list',compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.experience.add_experience');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

            $this->validate($request,[
            'title'=>'required|min:2|string',
            'sector'=>'required|string',
            'description'=>'required|max:500|min:10|string',
            'time'=>'required',
            
            ],
            $message=[
                'title.required' => 'Please enter experience.',
                'sector.required' => 'Please enter your institute.',
                'time.required' => 'Please enter experience time.',
            ]
            );

            if($request->isMethod('post')){
                $experience  = new Experience;
                $experience->title = $request->title;
                $experience->sector = $request->sector;
                $experience->description = $request->description;
                $experience->time = $request->time;
                $experience->save();
            }

        session()->flash('msg','Experience added successfully.');
        session()->flash('cls','success');
        return redirect()->route('experiences.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $experience = Experience::find($id);
        return view('Admin.experience.edit_experience',compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $request->validate([
            'title'=>'required|min:2|string',
            'sector'=>'required|string',
            'description'=>'required|max:500|min:10|string',
            'time'=>'required|integer',
        ],

        $message=[
            'title.required' => 'Please enter experience.',
            'sector.required' => 'Please enter your institute.',
            'time.required' => 'Please enter time of your experience .',
        ]
    
    );


        if($request->isMethod('PUT')){
            $experience  = Experience::find($id);
            $experience->title = $request->title;
            $experience->sector = $request->sector;
            $experience->description = $request->description;
            $experience->time = $request->time;
            $experience->update();
        }

        session()->flash('msg','Experience updated successfully.');
        session()->flash('cls','warning');
        return redirect()->route('experiences.index');
    
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $experience = Experience::find($id);
        $experience->delete();
        session()->flash('msg','Experience deleted successfully.');
        session()->flash('cls','danger');
        return redirect()->back();
    }
}
