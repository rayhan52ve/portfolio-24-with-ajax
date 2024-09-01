<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Protfolio;
use App\Models\Visitor;
use App\Models\WebInfo;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        // Get device and browser information
        $agent = new Agent();
        $browser = $agent->browser();

        $isDesktop = $agent->isDesktop();
        $isMobile = $agent->isMobile();
        $isTablet = $agent->isTablet();
        if ($isDesktop) {
            $device = 'Computer';
        } elseif ($isMobile) {
            $device = 'Mobile';
        } elseif ($$isTablet) {
            $device = 'Tablet';
        }

        // Get location and IP address
        $ipAddress = $request->ip();
        $position = Location::get($ipAddress);

        if ($position) {
            $location = $position->cityName . ', ' . $position->regionName;
        } else {
            $location = 'Unknown';
        }

        $visitedBefore = Visitor::where('ip_address', $ipAddress)->first();

        if ($visitedBefore) {
            // Update the existing visitor record
            $visitedBefore->update([
                'home_page' => $visitedBefore->home_page + 1,
                'updated_at' => now(),
            ]);
        } else {
            // Store information in the custom table for a new visitor
            DB::table('visitors')->insert([
                'ip_address' => $ipAddress,
                'location' => $location,
                'device' => $device,
                'browser' => $browser,
                'referer' => request()->headers->get('referer'),
                'home_page' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $user = User::get()->first();
        return view('Frontend.home', compact('user'));
    }

    public function about(Request $request)
    {

        // Get IP address
        $ipAddress = $request->ip();

        $visitedBefore = Visitor::where('ip_address', $ipAddress)->first();

        if ($visitedBefore) {
            // Update the existing visitor record
            $visitedBefore->update([
                'about_page' => $visitedBefore->about_page + 1,
                'updated_at' => now(),
            ]);
        }

        $educations = Education::all();
        $experiences = Experience::all();
        $experience = Experience::first();
        $skills = Skill::all();
        $users = User::get()->first();
        // dd($education);
        return view('Frontend.about', compact('educations', 'experiences', 'users', 'experience', 'skills'));
    }

    public function portfolio(Request $request)
    {
        // Get IP address
        $ipAddress = $request->ip();

        $visitedBefore = Visitor::where('ip_address', $ipAddress)->first();

        if ($visitedBefore) {
            // Update the existing visitor record
            $visitedBefore->update([
                'project_page' => $visitedBefore->project_page + 1,
                'updated_at' => now(),
            ]);
        }

        $portfolios = Protfolio::orderBy('order_by', 'ASC')->get();
        return view('Frontend.portfolio', compact('portfolios'));
    }

    public function contact(Request $request)
    {
        // Get IP address
        $ipAddress = $request->ip();

        $visitedBefore = Visitor::where('ip_address', $ipAddress)->first();

        if ($visitedBefore) {
            // Update the existing visitor record
            $visitedBefore->update([
                'contact_page' => $visitedBefore->contact_page + 1,
                'updated_at' => now(),
            ]);
        }

        $user = User::get()->first();
        $portfolio = Protfolio::first();
        return view('Frontend.contact', compact('user', 'portfolio'));
    }

    public function switchStyle(Request $request)
    {
        $webInfo = WebInfo::first();

        if ($webInfo) {
            $webInfo->update([
                'front_color' => $request->color,
            ]);
        } else {
            WebInfo::create([
                'front_color' => $request->color,
            ]);
        }

        return response()->json([
            'status' => '200',
            'msg' => 'Colour Updated By Ajax.',
            'cls' => 'success',
        ]);
    }
}
