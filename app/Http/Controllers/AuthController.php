<?php

namespace App\Http\Controllers;

use App\Services\UsersServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $usersServices;

    public function __construct(UsersServices $usersServices)
    {
        $this->usersServices = $usersServices;
    }

    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {

        $user = $this->usersServices->find($request->input('email'),"email");

//        if (empty($user)) return redirect()->back()->withErrors(['email' => 'User tidak ditemukan !'])
//            ->withInput();

        if (empty($user))
        {
            $message = array('type' => "error", 'content' => "","title" =>"Gagal");
//            return redirect()->route('dashboard')
//                ->with('message',$message);
            return redirect()->back()->withErrors(['email' => 'User tidak ditemukan !'])
                ->with('message',$message)->withInput();
        }

        if (!Hash::check($request->input('password'),$user->password))
        {

            $message = array('type' => "error", 'content' => "","title" =>"Gagal");
//            return redirect()->route('dashboard')
//                ->with('message',$message);
            return redirect()->back()->withErrors(['password' => 'Password Salah !'])
                ->with('message',$message)->withInput();

        }
        auth()->login($user, $request->has('remember'));
        $message = array('type' => "success", 'content' => "Success");
        return redirect()->route('dashboard')
            ->with('message',$message);
    }

    public function logout()
    {
        // TODO: Implement logout() method.
        auth()->logout();
        $message = array('type' => "success", 'content' => "Berhasil Logout");
        return redirect()->route('login')
            ->with('message',$message);
    }

    public function profil()
    {

        $user = auth()->user();
        return view('auth.profil')
            ->with('data',$user);
//        return
    }


    public function profil_update(Request $request)
    {
        $password = $request->input('password') ?? "";

        if ($password)
        {
            $request->merge(["password" => Hash::make($password)]);
            $this->usersServices->update($request->all(),$request->id);
        }else{
            $this->usersServices->update($request->only(['name',"email"]),$request->id);
        }
        return back()->with('message', $this->sukses());
    }
}
