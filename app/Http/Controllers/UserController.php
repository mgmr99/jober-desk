<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserRegisteration;
use App\Http\Requests\AuthValidationRequest;
use Illuminate\Support\Facades\DB as FacadesDB;
use App\Http\Requests\RegisterValidationRequest;

class UserController extends Controller
{
    public function index()
    {
        $latest_jobs = Job::where('status', 1)->latest()->take(5)->get();
        notify()->success('Welcome to Jober Desk ⚡️','Hello,');
        return view('index', compact('latest_jobs'));
    }

    public function home()
    {
        connectify('success', 'Hey, there', 'You are logged in successfully');
        $latest_jobs = Job::where('status',1)->latest()->take(5)->get();
        return view('user.home', compact('latest_jobs'));
    }

    public function authenticate(AuthValidationRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            if ($user->hasAnyRole(['admin', 'reviewer'])) {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('user.home');
        }
        return redirect()->route('login')->with('login_error', 'Invalid email or password.');
    }

    public function register()
    {

        return view('register');
    }

    public function registerUser(RegisterValidationRequest $request)
    {
        $user = User::create($request->validated());
        Auth::login($user);  
        $user->assignRole('user');
        if($user->hasRole('user'))
        { 
            $registerationData = [
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ];
            $admins = User::role('admin')->get();
            foreach($admins as $admin)
            {
                $admin->notify(new UserRegisteration($registerationData));
            }      
            return redirect()->route('user.home')->with('register_success', 'Registeration Successfull.');
        }
        else{
            return redirect()->route('register')->with('register_error', 'Registeration Unsuccessfull.');
        }
    }
    
    public function companies()
    {
        $companies = DB::table('jobs')
        ->select('company_name', DB::raw('count(*) as total'))
        ->groupBy('company_name')->where('status',1)
        ->get();
        return view('user.companies',compact('companies'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
