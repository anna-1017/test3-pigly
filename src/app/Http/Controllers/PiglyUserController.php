<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PiglyUser;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\Step2Request;

class PiglyUserController extends Controller
{
    public function register()
    {
        return view('register'); //登録画面を表示するだけ
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

    public function login()
    {
        return view('login');
    }
    
}
