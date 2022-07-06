<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index() {
        $user = DB::table('users')->select('id', 'name', 'email');
        $user = $user->get();

        return view('/users')->with('user', $user);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:6',
            'email' => 'required|email:rfc,dns|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json($validator,400);
        }

        $storeUser = new User();
        $storeUser->id = null;
        $storeUser->name = $request->name;
        $storeUser->email = $request->email;
        $storeUser->save();

        $users = DB::table('users')->select('id', 'name', 'email');
        $users = $users->get();

        return view('/users', [
            'user' => $users,
            'msg' => "Success"
        ]);

    }
    public function update(Request $request, $id) {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $users = DB::table('users')->select('id', 'name', 'email');
        $users = $users->get();

        return view('users', [
            'user' => $users,
            'msg' => "Success"
        ]);
    }
    public function destroy($id) {
        $user = DB::table('users')->where('id', '=' , $id);
        $user = $user->delete();

        $users = DB::table('users')->select('id', 'name', 'email');
        $users = $users->get();
        return view('users', [
            'user' => $users,
            'msg' => "Success"
        ]);
    }
}
