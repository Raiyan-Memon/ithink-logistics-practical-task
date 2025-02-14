<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('content.tables.users');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required',
        ]);
        $data           = new User;
        $data->name     = $request->name;
        $data->email    = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();

        return response([
            'header'  => 'Added!',
            'message' => 'Users added successfully',
            'table'   => 'users-table',
        ]);

    }
    public function edit($id)
    {
        $data = User::findOrFail($id);
        return response($data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
            'id'    => 'required|exists:users,id',
        ]);
        $data        = User::findOrFail($request->id);
        $data->name  = $request->name;
        $data->email = $request->email;
        $data->save();

        return response([
            'header'  => 'Updated!',
            'message' => 'Users updated successfully',
            'table'   => 'users-table',
        ]);
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return response([
            'header'  => 'Deleted!',
            'message' => 'users deleted successfully',
            'table'   => 'users-table',
        ]);
    }
}
