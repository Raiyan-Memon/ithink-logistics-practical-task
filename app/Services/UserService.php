<?php
namespace App\Services;

use App\Models\User;
use Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserService
{
    public $userCacheName = "user_";

    public function create($userData)
    {
        $storeUser           = new User;
        $storeUser->name     = $userData['name'];
        $storeUser->email    = $userData['email'];
        $storeUser->password = Hash::make($userData['password']);
        $storeUser->save();
    }

    public function get($userId)
    {
        $cache = $this->userCacheName;
        return Cache::rememberForever("$cache$userId", function () use ($userId) {
            return User::find($userId);
        });
    }

    public function update($userData)
    {
        $userId = $userData['id'];
        $this->get($userId)->update(['name' => $userData['name'], 'email' => $userData['email']]);
        $this->clearUserCache($userId);
    }

    public function delete($id)
    {
        $this->get($id)->delete();
        $this->clearUserCache($id);
    }

    private function clearUserCache($userId)
    {
        $cache = $this->userCacheName;
        Cache::forget("$cache$userId");
    }

    public function errorResponse($message, $e)
    {
        Log::info("user service error: $message - $e");
        return response([
            'success' => false,
            'message' => $message,
            'error'   => $e,
        ], 500);
    }
}
