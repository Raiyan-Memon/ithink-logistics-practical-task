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
        $this->userService->create($request->all());
        return response([
            'header'  => 'Added!',
            'message' => 'Users added successfully',
            'table'   => 'users-table',
        ]);

    }
    public function edit($id)
    {
        $userDetails = $this->userService->get($id);
        return response($userDetails);
    }

    public function update(UpdateRequest $request)
    {
        $this->userService->update($request->all());
        return response([
            'header'  => 'Updated!',
            'message' => 'Users updated successfully',
            'table'   => 'users-table',
        ]);
    }

    public function destroy($id)
    {
        $this->userService->delete($id);
        return response([
            'header'  => 'Deleted!',
            'message' => 'users deleted successfully',
            'table'   => 'users-table',
        ]);
    }
}
