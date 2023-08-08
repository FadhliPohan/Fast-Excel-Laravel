<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

// use Rap2hpoutre\FastExcel\Facades\FastExcel;

class UserController extends Controller
{
    public function index()
    {
        return view('user');
    }

    public function import(Request $request)
    {
        // return $request->all();

        $user = (new FastExcel())->import($request->file('file'), function ($line) {
            $input = [
                'name' => $line['Name'],
                'email' => $line['Email'],
                'password' => $line['password'],
            ];
            return User::create($input);
        });

        return $user;
        // return view('user');
    }
}
