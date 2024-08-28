<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Protfolio;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;

class ProtfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Protfolio::orderBy('order_by','ASC')->get();
        return view('Admin.portfolio.show_portfolio', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Admin.portfolio.add_portfolio");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate(
            $request,
            [
                'title' => 'required|min:2|string',
                'preview' => 'required',
            ]
        );
        // dd($request->all());

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

        session()->flash('msg', 'Portfolio Info Added Successfully');
        session()->flash('cls', 'success');
        return redirect()->route('portfolios.index');
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
        return view("Admin.portfolio.edit_portfolio", compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

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

        session()->flash('msg', 'Portfolio Info Updated Successfully');
        session()->flash('cls', 'warning');
        return redirect()->route('portfolios.index');
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

        session()->flash('msg', 'Portfolio Info Deleted Successfully');
        session()->flash('cls', 'danger');
        return redirect()->back();
    }
}
