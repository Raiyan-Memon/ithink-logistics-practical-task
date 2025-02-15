<?php
namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Api\UpdateRequest;
use App\Http\Requests\User\CreateRequest;
use App\Services\UserService;

class UserController extends Controller
{
    public $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function get()
    {
        try {
            $users = $this->userService->allUser();
        } catch (\Throwable $th) {
            return $this->userService->errorResponse("API - Failed To Get All Users", $th->getMessage());
        }
        return response([
            'success' => true,
            'message' => 'Updates after 60 Seconds',
            'data'    => $users,
        ]);
    }
    public function detail($userId)
    {
        try {
            $user = $this->userService->get($userId);
        } catch (\Throwable $th) {
            return $this->userService->errorResponse("API - Invalid User Id", $th->getMessage());
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
            return $this->userService->errorResponse("API - Failed To Create User", $th->getMessage());
        }
        return response([
            'success' => true,
            'message' => "User Created",
        ], 201);
    }

    public function update($id, UpdateRequest $updateRequest)
    {
        try {
            $this->userService->update($id, $updateRequest->all());
        } catch (\Throwable $th) {
            return $this->userService->errorResponse("API - Failed To Update User", $th->getMessage());
        }
        return response([
            'success' => true,
            'message' => "User Updated",
        ]);
    }

    public function delete($id)
    {
        try {
            $this->userService->delete($id);
        } catch (\Throwable $th) {
            return $this->userService->errorResponse("API - Failed To Delete User", $th->getMessage());
        }
        return response([
            'success' => true,
            'message' => "User Deleted",
        ]);
    }
}
