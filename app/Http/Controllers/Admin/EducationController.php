<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = Education::latest()->paginate(10);
        return view('Admin.education.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string',
                'sector' => 'required|string',
                'description' => 'required|max:1000|min:10|string',
                'time' => 'required',
            ],
            $message = [
                'title.required' => 'Please enter degree.',
                'sector.required' => 'Please enter your institute.',
                'time.required' => 'Please enter education year.',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => '400',
                'errors' => $validator->messages()
            ]);
        } else {
            if ($request->isMethod('post')) {
                $education  = new Education;
                $education->title = $request->title;
                $education->sector = $request->sector;
                $education->description = $request->description;
                $education->time = $request->time;
                $education->save();

                return response()->json([
                    'status' => '200',
                    'msg' => 'Education info added successfully.',
                    'cls' => 'success'
                ]);
            }
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
        $education = Education::find($id);
        return view('Admin.education.edit', compact('education'));
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
                'description' => 'required|max:1000|min:10|string',
                'time' => 'required',
            ],
            $message = [
                'title.required' => 'Please enter degree.',
                'sector.required' => 'Please enter your institute.',
                'time.required' => 'Please enter education year.',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => '400',
                'errors' => $validator->messages()
            ]);
        } else {
            if ($request->isMethod('PUT')) {
                $education  = Education::find($id);
                $education->title = $request->title;
                $education->sector = $request->sector;
                $education->description = $request->description;
                $education->time = $request->time;
                $education->update();

                return response()->json([
                    'status' => '200',
                    'msg' => 'Education info Updated successfully.',
                    'cls' => 'success'
                ]);
            }
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $education = Education::find($id);
        $education->delete();

        return response()->json([
            'status' => '200',
            'msg' => 'Education info deleted successfully.',
            'cls' => 'success'
        ]);
    }
}
