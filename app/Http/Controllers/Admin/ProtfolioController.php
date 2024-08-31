<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Protfolio;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProtfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Protfolio::orderBy('order_by', 'ASC')->get();
        return view('Admin.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Admin.portfolio.create");
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
                'client' => 'required',
                'technology' => 'required',
                'preview' => 'required',
                'order_by' => 'required|integer',
                'image' => 'required',
            ],
            $message = [
                'title.required' => 'Please enter project name.',
                'technology.required' => 'Please enter Technology.Ex:- Laravel,Ajax',
                'preview.required' => 'Please enter project link as preview.',
                'order_by.required' => 'Please enter project list order or serial number.',
                'order_by.integer' => 'Please enter project list order or serial number.Ex:-1',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => '400',
                'errors' => $validator->messages()
            ]);
        } else {


            if ($request->isMethod('post')) {
                if ($request->hasFile('image')) {
                    $image_tmp = $request->file('image');

                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = time() . '-' . rand(111, 99999) . '.' . $extension;
                    $image_path = 'uploads/portfolio' . '/' . $fileName;

                    Image::make($image_tmp)->resize(1000, 700)->save($image_path);
                }

                $portfolio = new Protfolio;
                $portfolio->title = $request->title;
                $portfolio->client = $request->client;
                $portfolio->technology = $request->technology;
                $portfolio->preview = $request->preview;
                $portfolio->order_by = $request->order_by;
                $portfolio->image = $image_path;
                $portfolio->save();
            }

            return response()->json([
                'status' => '200',
                'msg' => 'Project Info Added Successfully.',
                'cls' => 'success',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $portfolio = Protfolio::find($id);
        return view("Admin.portfolio.edit", compact('portfolio'));
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
                'client' => 'required',
                'technology' => 'required',
                'preview' => 'required',
                'order_by' => 'required|integer',
                'image' => 'nullable',
            ],
            $message = [
                'title.required' => 'Please enter project name.',
                'technology.required' => 'Please enter Technology.Ex:- Laravel,Ajax',
                'preview.required' => 'Please enter project link as preview.',
                'order_by.required' => 'Please enter project list order or serial number.',
                'order_by.required' => 'Please enter project list order or serial number.Ex:-1',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => '400',
                'errors' => $validator->messages()
            ]);
        } else {


            if ($request->isMethod('PUT')) {
                $portfolio  = Protfolio::find($id);
                if ($request->hasFile('image')) {
                    $image_tmp = $request->file('image');

                    if (File::exists($portfolio->image)) {
                        File::delete($portfolio->image);
                    }

                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = time() . '-' . rand(111, 99999) . '.' . $extension;
                    $image_path = 'uploads/portfolio' . '/' . $fileName;

                    Image::make($image_tmp)->resize(1000, 700)->save($image_path);
                    $portfolio->image = $image_path;
                }


                $portfolio->title = $request->title;
                $portfolio->client = $request->client;
                $portfolio->technology = $request->technology;
                $portfolio->preview = $request->preview;
                $portfolio->order_by = $request->order_by;
                $portfolio->update();
            }

            return response()->json([
                'status' => '200',
                'msg' => 'Project Info Updated Successfully.',
                'cls' => 'success',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portfolio = Protfolio::find($id);

        if (file_exists($portfolio->image)) {
            unlink($portfolio->image); // Delete the image file
        }

        $portfolio->delete();

        return response()->json([
            'status' => '200',
            'msg' => 'Project Deleted Successfully.',
            'cls' => 'success'
        ]);
    }
}
