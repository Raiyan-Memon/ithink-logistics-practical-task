<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Services\UserService;

class UserController extends Controller
{
    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('content.tables.users');
    }

    public function store(CreateRequest $request)
    {
        try {
            $this->userService->create($request->all());
        } catch (\Throwable $th) {
            return $this->userService->errorResponse("Failed To Create User", $th->getMessage());
        }
        return response([
            'header'  => 'Added!',
            'message' => 'Users added successfully',
            'table'   => 'users-table',
        ]);

    }
    public function edit($id)
    {
        try {
            $userDetails = $this->userService->get($id);
        } catch (\Throwable $th) {
            return $this->userService->errorResponse("Failed To Get User", $th->getMessage());
        }
        return response($userDetails);
    }

    public function update(UpdateRequest $request)
    {
        try {
            $this->userService->update($request->all());
        } catch (\Throwable $th) {
            return $this->userService->errorResponse("Failed To Update User", $th->getMessage());
        }
        return response([
            'header'  => 'Updated!',
            'message' => 'Users updated successfully',
            'table'   => 'users-table',
        ]);
    }

    public function destroy($id)
    {
        try {
            $this->userService->delete($id);
        } catch (\Throwable $th) {
            return $this->userService->errorResponse("Failed To Delete User", $th->getMessage());
        }
        return response([
            'header'  => 'Deleted!',
            'message' => 'users deleted successfully',
            'table'   => 'users-table',
        ]);
    }
}
