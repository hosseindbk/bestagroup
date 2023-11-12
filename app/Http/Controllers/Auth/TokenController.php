<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\ActiveCode;

class TokenController extends Controller
{
    public function showToken(Request $request)
    {


//        if(! $request->session()->has('auth')) {
//            return redirect(route('loginuser'));
//        }

        $request->session()->reflash();

        return view('Site.auth.token');
    }

    public function token(Request $request)
    {
        $request->validate([
            'code' => ['required','numeric','min:6','exists:active_codes,code']
        ]);
        $token = $request->input('code');
//        if(! $request->session()->has('auth')) {
//            return redirect(route('loginuser'));
//        }
        $times = ActiveCode::select('expired_at')->whereCode($token)->first();
        dd($times);
        $user = User::findOrFail($request->session()->get('auth.user_id'));
        $user = User::find($user);
        $status = ActiveCode::verifyCode($token , $user);

        if(auth()->loginUsingId($user->id) && $request->session()->get('auth.reg') == 1) {
            $user->activeCode()->delete();
            $user->phone_verify = 1;
            $user->update();
            return redirect(route('indexfilter'));
        } elseif(auth()->loginUsingId($user->id))
        {
                $user->activeCode()->delete();
                $user->phone_verify = 1;
                $user->update();
                return redirect(route('setpass'));
        }
        return redirect(route('loginuser'));
    }

}
