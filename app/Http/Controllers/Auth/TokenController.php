<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ActiveCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

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

        if (jdate($times->expired_at)->getTimestamp() - jdate()->now()->getTimestamp() <= 0) {
            alert()->error('عملیات ناموفق', 'زمان سوال امنیتی به پایان رسیده لطفا از نو انجام دهید ');
            return Redirect::back();
        }

        $user = User::findOrFail($request->session()->get('auth.user_id'));
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
    public function setpassshow()
    {
        return view('Site.auth.passwordset');
    }

    public function update(Request $request){
        if (!Auth::check())
        {
            return redirect(route('/'));
        }else {
            $user = User::findOrfail(Auth::user()->id);
            $request->validate(['password' => 'required|string|min:8|confirmed']);
            $user->password = Hash::make($request->input('password'));
            $user->update();
            return redirect(route('/'));
        }
    }

}
