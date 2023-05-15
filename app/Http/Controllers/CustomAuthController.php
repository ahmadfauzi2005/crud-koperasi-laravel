<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;


class CustomAuthController extends Controller
{
    public function home()
    {
        $user=auth()->user();

        return view('login',compact('user'));
    }

    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ],                 [
        'email.required'=>'email harus terisi',
        'password.required'=>'password harus terisi',
    ]);

    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        return redirect()->intended('dashboard')
                    ->with('message', 'Signed in!');
    }

    return redirect('/login')->withErrors([
        'password' => ' password salahh  .',
    ]);
}

    public function signup()
    {
        return view('registration');
    }

    public function signupsave(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ],                 [
            'name.required'=>'nama harus terisi',
            'email.required'=>'email harus terisi',
            'password.required'=>'password harus terisi',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard");
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
        return redirect('/login');
    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }

    public function reset(){
        return view('reset-password');
    }
    public function resetUser(Request $request){
        $this->validate($request,[
        'email'=>'required|email',
        'password'=>'required|min:6',
        'konfirmasi'=>'required|same:password',

    ],                 [
        'email.required'=>'email harus terisi',
        'password.required'=>'password harus terisi',
        'konfirmasi.same'=>'konfirmasi pasword tidak sama',
    ]);
    $user=User::where('email',$request->email)->first();

    if(!$user){
        return back()->withErrors(['email'=>'Email tidak ditemukan']);
    }
    $user->password=bcrypt($request->password);
    $user->setRememberToken(Str::random(60));
    $user->save();

    event(new PasswordReset($user));

    return redirect('/login')->with('status','Password berhasil di reset.Silahkan masuk mengunakan password baru.');
    }
}
