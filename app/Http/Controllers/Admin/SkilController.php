<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class SkilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::latest()->paginate(10);
        return view('Admin.skill.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Admin.skill.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'program' => 'required',
                'percentage' => 'required|integer|between:1,100',
            ],
            $message = [
                'program.required' => 'Please Enter Your Program.',
                'percentage.required' => 'Please Enter Percentage.',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {

            if ($request->isMethod('post')) {
                $data = $request->all();
                $skill = new Skill;
                $skill->program = $data['program'];
                $skill->percentage = $data['percentage'];
                $skill->save();
            }

            return response()->json([
                'status' => 200,
                'msg' => 'Skills Info Added Successfully.',
                'icon' => 'success'
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
        $skill = Skill::find($id);
        return  view("Admin.skill.edit", compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'program' => 'required',
                'percentage' => 'required|integer|between:1,100',
            ],
            $message = [
                'program.required' => 'Please Enter Your Program.',
                'percentage.required' => 'Please Enter Percentage.',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => '400',
                'errors' => $validator->messages()
            ]);
        } else {

            if ($request->isMethod('PUT')) {
                $skill = Skill::find($id);
                $skill->program = $request->program;
                $skill->percentage = $request->percentage;
                $skill->update();
            }

            return response()->json([
                'status' => '200',
                'msg' => 'Skills Info updated Successfully.',
                'icon' => 'success'
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skill = Skill::find($id);
        $skill->delete();

        return response()->json([
            'status' => '200',
            'msg' => 'Skills Info Deleted Successfully.',
            'icon' => 'success'
        ]);
    }
}
