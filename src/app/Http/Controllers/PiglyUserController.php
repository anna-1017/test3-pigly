<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PiglyUser;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\Step2Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\GoalRequest;
use App\Http\Requests\UpdateRequest;
use Illuminate\Support\Facades\Auth;


class PiglyUserController extends Controller
{
    public function register()
    {
        return view('auth.register'); 
    }

    public function storeStep1(RegisterRequest $request)
    {
        $validated = $request->validated();

        $user = PiglyUser::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        session(['registered_user_id' => $user->id]);

        \Log::info('Step1: Set registered_user_id in session', ['user_id' => session('registered_user_id')]);
    
        return redirect()->route('register.step2');
    }

    public function step2()
    {
        \Log::info('Step2: Session user_id before displaying form', ['user_id' => session('registered_user_id')]);

        return view('step2');
    }

    public function storeStep2(Step2Request $request)
    {
        $validated = $request->validated();
        $userId = session('registered_user_id');

        \Log::info('Session user_id:', ['user_id' => $userId]);

        if ($userId){
        
            WeightLog::create([
            'user_id' => $userId,
            'weight' => $validated['weight'],
            'date' => now(),
            'calories' => $validated['calories'] ?? 0,
            'exercise_time' => $validated['exercise_time'] ?? 0,
            'exercise_content' => $validated['exercise_content'] ?? '',

            ]);

            WeightTarget::create([
            'user_id' => $userId,
            'target_weight' => $validated['target_weight'],
            ]);

            Auth::loginUsingId($userId);
            
            \Log::info('User logged in manually', ['user_id' => $userId]);

            session()->forget('registered_user_id');

            \Log::info('Redirecting to weight_logs', ['user_id' => $userId]);

            return redirect()->route('weight_logs'); 

        }else{

            return redirect()->route('register.step1');
        }
        

    }

    public function admin()
    {
        $weightlogs = WeightLog::all();
        return view('admin', compact('weightlogs'));
    }

    public function showAdminPage()
    {
        \Log::info('Checking auth status', ['auth' => auth()->check()]);

        $logs = WeightLog::latest()->paginate(10);

        return view('admin', [
            'logs' => $logs,
            'target_weight' => 60,
            'latest_weight' => 65,
        ]);


        if (auth()->check()){

            $target_weight = auth()->user()->target_weight;

            $latest_weight = auth()->user()->latest_weight;

            $dates = auth()->user()->dates;

            return view('admin', compact('target_weight', 'latest_weight', 'dates'));

        }else{

            \Log::info('Redirecting to login (auth check failed)');

            return redirect()->route('login');
        }
        
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){

            return redirect()->route('weight_logs');
        }
    }

    public function edit($weightLogId)
    {
        $weightLog = WeightLog::findOrFail($weightLogId);
        return view('update', compact('weightLog'));
    }

    public function update(UpdateRequest $request, $weightLogId)
    {
        $weightLog = WeightLog::findOrFail($weightLogId);

        $validatedData = $request->validated();

        $weightLog->update($validatedData);

        return redirect()->route('weight_logs');
    }

    public function targetUpdate()
    {
        if (auth()->check()){
            return view('goal');
        } else{
            return redirect()->route('login');
        }
    }

    public function storeGoalSetting(GoalRequest $request)
    {
        if (auth()->check()){

            $validatedData = $request->validated();

            $user = auth()->user();
            $user->target_weight = $validatedData['target_weight'];
            $user->save();

            return redirect()->route('weight_logs');

        }else{

            return redirect()->route('login');
        }
        
    }

    public function add()
    {
        return view('add');
    }

    public function search(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $query = WeightLog::query()->filterByDate($start_date, $end_date);

        $logs = $query->paginate(8);
        $count = $logs->count();

        $latest_weight = WeightLog::latest()->first()->weight;

        $target_weight =50;

        return view('admin', compact('logs', 'count', 'start_date', 'end_date', 'target_weight', 'latest_weight'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}


