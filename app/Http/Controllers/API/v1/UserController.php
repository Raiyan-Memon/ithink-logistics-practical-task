<?php
namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateRequest;
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
    public function store(CreateRequest $createUser)
    {
        try {
            $this->userService->create($createUser->all());
        } catch (\Throwable $th) {
            return $this->userService->errorResponse("Failed To Create User", $th->getMessage());
        }
        return response([
            'success' => true,
            'message' => "User Created",
        ], 201);
    }
}
