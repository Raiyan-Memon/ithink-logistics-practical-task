<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function store(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email|unique:users,email',
            'password' => 'required',
        ]);
        if (! Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return back()->with('status', 'invalid login details');
        }
        return redirect('admin');
    }
    public function index()
    {
        $pageConfigs = [
            'bodyClass' => "bg-full-screen-image",
            'blankPage' => true,
        ];
        return view('/auth/login', [
            'pageConfigs' => $pageConfigs,
        ]);
    }
}
