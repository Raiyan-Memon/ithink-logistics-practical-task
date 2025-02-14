<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function create($userData)
    {
        User::create([
            'name'     => $userData['name'],
            'email'    => $userData['email'],
            'password' => Hash::make($userData['password']),
        ]);
    }

    public function get($userId)
    {
        return User::findOrFail($userId);
    }

    public function update($userData)
    {
        $this->get($userData['id'])->update(['name' => $userData['name'], 'email' => $userData['email']]);
    }

    public function delete($id)
    {
        $this->get($id)->delete();
    }
}
