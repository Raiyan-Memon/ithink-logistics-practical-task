<?php
namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Services\UserService;

class UserController extends Controller
{
    public $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function get($userId)
    {
        try {
            $user = $this->userService->get($userId);
        } catch (\Throwable $th) {
            return $this->userService->errorResponse("API - Failed To Get User", $th->getMessage());
        }
        return response([
            'success' => true,
            'data'    => $user,
        ]);
    }
}
