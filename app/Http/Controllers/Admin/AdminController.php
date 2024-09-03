<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Protfolio;
use App\Mail\Websitemail;
use App\Mail\ContactUS;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Retrieve all visitors
        $visitors = Visitor::orderBy('updated_at', 'desc')->get();

        // Define date ranges and formats
        $thisMonthName = Carbon::now()->format('F');
        $thisMonth = Carbon::now()->month;
        $thisYear = Carbon::now()->year;
        $today = Carbon::now()->toDateString();

        // Calculate statistics
        $totalVisitors = $visitors->count();

        $yearlyVisitors = $visitors->filter(function ($visitor) use ($thisYear) {
            return $visitor->updated_at->year == $thisYear;
        })->count();

        $monthlyVisitors = $visitors->filter(function ($visitor) use ($thisMonth) {
            return $visitor->updated_at->month == $thisMonth;
        })->count();

        $dailyVisitors = $visitors->filter(function ($visitor) use ($today) {
            return $visitor->updated_at->toDateString() == $today;
        })->count();

        $computerVisits = $visitors->where('device', 'Computer')->count();
        $mobileVisits = $visitors->where('device', 'Mobile')->count();

        // Pass data to the view
        return view('Admin.dashboard', compact(
            'visitors',
            'totalVisitors',
            'yearlyVisitors',
            'monthlyVisitors',
            'dailyVisitors',
            'computerVisits',
            'mobileVisits',
            'thisMonthName',
            'thisYear'
        ));
    }

    public function support()
    {
        return view("Admin.support.support");
    }

    public function ForgetPassword()
    {
        return view("auth.forget");
    }
    public function ForgetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',

        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Email Address not found');
        }

        $token = hash('sha256', time());

        $user->remember_token = $token;
        $user->update();

        $reset_link = url('admin/reset-password/' . $token . '/' . $request->email);
        $subject = 'Reset Password';
        $message = 'Please clik on this link: <br>';
        $message = '<a href="' . $reset_link . '">Click here</a>';

        Mail::to($request->email)->send(new Websitemail($subject, $message));
        return redirect()->route('login')->with('success', 'Please check your email and follow the step');
    }

    public function ForgetResetPassword($remember_token, $email)
    {
        $user = User::where('remember_token', $remember_token)->where('email', $email)->first();
        if (!$user) {
            return redirect()->route('login');
        }

        return view('auth.reset_password', compact('remember_token', 'email'));
    }

    public function ResetPasswordPost(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'confrim_password' => 'required|same:password',

        ]);

        $user = User::where('remember_token', $request->remember_token)->where('email', $request->email)->first();

        $user->password = Hash::make($request->password);
        $user->remember_token = '';
        $user->update();

        return redirect()->route('login')->with('success', 'Password is Reset Successefully');
    }

    public function profile()
    {
        $user = User::where('id', auth()->user()->id)->first();
        return view('Admin.profile.profile', compact('user'));
    }

    public function profile_update(Request $request, string $id)
    {
        if ($request->isMethod('PUT')) {
            $user  = User::find($id);
            if ($request->hasFile('image')) {
                $image_tmp = $request->file('image');

                if (file_exists($user->image)) {
                    @unlink($user->image);
                }
                $image_name = $image_tmp->getClientOriginalName();
                // $extension = $image_tmp->getClientOriginalExtension();
                // $fileName = $image_name . '-' . rand(111, 99999) . '.' . $extension;
                $image_path = 'uploads/profile' . '/' . $image_name;

                if ($request->image_crop) {
                    Image::make($image_tmp)->crop(720, 720)->save($image_path);
                } else {
                    Image::make($image_tmp)->save($image_path);
                }

                $user->image = $image_path;
            } elseif (Auth::user()->image) {
                $image_path = Auth::user()->image;
            }



            if ($request->file('cv')) {

                if (file_exists($user->cv)) {
                    @unlink($user->cv);
                }

                $file = $request->file('cv');
                // $filename = time() . '.' . $request->file('cv')->extension();
                $filename = $file->getClientOriginalName();
                $filePath = 'uploads/CV/';
                // $filePath = public_path() . '/uploads/profile/';
                $filePath = $file->move($filePath, $filename);
                $user->cv = $filePath;
            }


            $user->name = $request->name;
            $user->description = $request->description;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->designation = $request->designation;
            $user->address = $request->address;
            $user->age = $request->age;
            $user->nationality = $request->nationality;
            $user->freelance = $request->freelance;
            $user->languages = $request->languages;
            $user->experience = $request->experience;
            $user->linkedin = $request->linkedin;
            $user->complete_project = $request->complete_project;
            $user->save();

            return response()->json([
                'status' => '200',
                'msg' => 'Profile updated Successfully.',
                'cls' => 'success',
            ]);
        }
    }

    public function changePassword()
    {
        return view('Admin.profile.change_password');
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'current_password' => 'required|string',
                'new_password' => 'required|string|min:4|confirmed',
            ],
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => '400',
                'msg' => $validator->messages()->first(),
                'cls' => 'error',
            ]);
        }

        if (Hash::check($request->current_password, Auth::user()->password)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->new_password);  // Fix this line
            $user->save();

            return response()->json([
                'status' => '200',
                'msg' => 'Password updated successfully.',
                'cls' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => '400',
                'msg' => 'Current password does not match.',
                'cls' => 'error',
            ]);
        }
    }



    public function contactUS(Request $request)
    {
        // dd($request->all());
        if ($request->isMethod("post")) {
            $name = $request->name;
            $email = $request->email;
            $subject = $request->subject;
            $message = $request->message;

            Mail::to($email)->send(new ContactUS($name, $email, $subject, $message));
        }
    }

    public function emptyVisitors()
    {
        $visitorsCount = Visitor::count();

        if ($visitorsCount >= 1) {
            Visitor::truncate(); // Empty the table

            return response()->json([
                'status' => '200',
                'msg' => 'All Visitors Info Cleared.',
                'cls' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => '400',
                'msg' => 'No data found.',
                'cls' => 'error',
            ]);
        }
    }
}
