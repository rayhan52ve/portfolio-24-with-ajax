<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experience::latest()->paginate(10);
        return view('Admin.experience.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|min:2|string',
                'sector' => 'required|string',
                'description' => 'required|max:500|min:10|string',
                'time' => 'required|integer',

            ],
            $message = [
                'title.required' => 'Please enter experience.',
                'sector.required' => 'Please enter your institute.',
                'time.required' => 'Please enter experience time.',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => '400',
                'errors' => $validator->messages()
            ]);
        } else {


            if ($request->isMethod('post')) {
                $experience  = new Experience;
                $experience->title = $request->title;
                $experience->sector = $request->sector;
                $experience->description = $request->description;
                $experience->time = $request->time;
                $experience->save();
            }

            return response()->json([
                'status' => '200',
                'msg' => 'Experience added successfully.',
                'cls' => 'success',
            ]);
        }
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
        return view('Admin.experience.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|min:2|string',
                'sector' => 'required|string',
                'description' => 'required|max:500|min:10|string',
                'time' => 'required|integer',
            ],

            $message = [
                'title.required' => 'Please enter experience.',
                'sector.required' => 'Please enter your institute.',
                'time.required' => 'Please enter time of your experience .',
            ]
        );


        if ($validator->fails()) {
            return response()->json([
                'status' => '400',
                'errors' => $validator->messages()
            ]);
        } else {


            if ($request->isMethod('PUT')) {
                $experience  = Experience::find($id);
                $experience->title = $request->title;
                $experience->sector = $request->sector;
                $experience->description = $request->description;
                $experience->time = $request->time;
                $experience->update();
            }

            return response()->json([
                'status' => '200',
                'msg' => 'Experience updated successfully.',
                'cls' => 'success',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $experience = Experience::find($id);
        $experience->delete();
        
        return response()->json([
            'status' => '200',
            'msg' => 'Experience deleted successfully.',
            'cls' => 'success'
        ]);
    }
}
