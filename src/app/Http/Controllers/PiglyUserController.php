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
        return view('auth.register'); //登録画面を表示するだけ
    }

    public function storeStep1(RegisterRequest $request)
    {
        $validated = $request->validated();//バリデーション済みのデータを取得

        //ユーザーを作成、IDをセッションに保存する
        $user = PiglyUser::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        session(['registered_user_id' => $user->id]);//セッションに保存
    
        return redirect()->route('register.step2');
    }

    public function step2()
    {
        return view('step2');//step2の画面を表示するだけ
    }

    public function storeStep2(Step2Request $request)
    {
        $validated = $request->validated();

        //セッションからユーザーIDを取得
        $userId = session('registered_user_id');
        

        WeightLog::create([
            'user_id' => $userId,
            'weight' => $validated['weight'],
            'date' => now(),
            'calories' => 0,
            'exercise_time' => 0,
            'exercise_content' => '',

        ]);

        WeightTarget::create([
            'user_id' => $userId,
            'target_weight' => $validated['target_weight'],
        ]);

        session()->forget('registered_user_id');

        return redirect()->route('weight_logs'); //体重管理画面へ遷移
    }

    public function admin()
    {
        $weightlogs = WeightLog::all();
        return view('admin', compact('weightlogs'));
    }

    public function showAdminPage()
    {
        $target_weight = auth()->user()->target_weight;

        $latest_weight = auth()->user()->latest_weight;

        $dates = auth()->user()->dates;

        return view('admin', compact('target_weight', 'latest_weight', 'dates'));
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
        return view('goal');
    }

    public function storeGoalSetting(GoalRequest $request)
    {
        $validatedData = $request->validated();

        $user = auth()->user();
        $user->target_weight = $validatedData['target_weight'];
        $user->save();

        return redirect()->route('weight_logs');
        
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

        $logs = $query->get();
        $count = $logs->count();

        return view('admin', compact('weight_logs', 'count', 'start_date', 'end_date'));
    }
}


