<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;


class RegisterController extends Controller
{
    public function index()
    {
        return view('auten.register',[
            'title' => 'register',
            'active' => 'register',

        ]);
    }
        public function store(Request $request)
        {
            $validateData = $request->validate([
                'nama' => 'required|min:3', // Perbaikan penulisan
                'email' => 'required|email:dns', // Perbaikan sintaks dan penghapusan :dns
                'password' => 'required|min:5' // Perbaikan penulisan dan penambahan nilai minimum
            ]);

            $validateData['password'] = bcrypt($validateData['password']); //
           User::create($validateData);

           $request->session()->flash('success','REGIS BERHASIL');

           return redirect('/auten/login');
        }


}
