<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->adminFlag;
        if ($role == 0){
            $page = DB::table('que')->select('title','question')->get();
            return view('home',compact('page'));
        }else {
            $page = DB::table('que')->select('id','title','question')->get();
            return view('adminhome',compact('page'));
        }
    }

    public function made(Request $request)
    {
        return view('made');
    }

    public function kazoku(Request $request)
    {
        $validationdata = $request->validate([
            'title' => 'required|max:15',
            'question' => 'required|max:100',
        ],[
            'title.required' => ':attributeを入力してください。',
            'title.max' => ':attributeは15文字以内で入力してください。',
            'question.required' => ':attributeを入力してください。',
            'question.max' => ':attributeは100文字以内で入力してください。',
        ],[
            'title' => '件名',
            'question' => '質問内容'
        ]);

        $title = $request->input('title');
        $question = $request->input('question');
        $flag = 0;

        DB::table('que')->insert([
            'title' => $title,
            'question' => $question,
            'flag' => $flag,
        ]);

        return view('kazoku');
    }

    public function admin(Request $request)
    {
        return view('admin');
    }

    public function complete(Request $request)
    {
        //リクエストデータ取得
        $id = $request->input('id');
        //管理者フラグアップデート
        DB::table('users')
                ->where('user_id',$id)
                ->update(['adminFlag' => 1,]);

        return view('complete');
    }
}
