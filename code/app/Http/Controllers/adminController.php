<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
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

    public function answer (Request $request)
    {
        $id = $request->input('id');
        $request->session()->put('id',$id);
        $que = DB::table('que')->where('id','=',$id)->get();
        return view ('adminanswer',compact('que'));
    }

    public function comp (Request $request)
    {
        $validationdata = $request->validate([
            'answer' => 'required|min:2',
        ],[
            'answer.min' => ':attributeは2文字以上で入力しようね。わかるかな？',
        ],[
            'answer' => '回答内容',
        ]);

        $ans = $request->input('answer');
        $id = $request->session()->get('id');
        DB::table('que')
                    ->where('id',$id)
                    ->update(['answer' => $ans,'flag' => 1]);

        return view ('admincomplete');
    }
}
