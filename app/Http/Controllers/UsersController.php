<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\JsonResponse;
use App\DataTables\UsersDataTable;
use App\Http\Requests\UsersRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    /**
     * Display all users 
     */
    public function index(UsersDataTable $dataTable): JsonResponse|View
    {
        return $dataTable->render('users.index');
    }

    /**
     * Add User to the application
     */
    public function add(int|nul $userId = null): View
    {
        $mode = 'add';
        $user = null;
        if(!empty($userId)){
            $user = User::findOrFail($userId);
            $user->myRole = $user->getRoleNames()?->last(); 
            $mode = 'edit';
        }
        return view('users.add', [
            'mode'=>$mode,
            'user'=>$user
        ]);
    }

    /**
     * Store User to the application
     */
    public function store(UsersRequest $request): RedirectResponse
    {
        $mode = $request->mode;
        if($mode == 'edit' && !empty($request->id)){
            $user = User::findOrFail($request->id);
            $mode = 'edit';
        }else{
            $user = new User();
        }
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        if($mode == 'add' && empty($request->id)){
            $user->assignRole($request->role);
        }
        $user->save();
        return Redirect::route('users.index')->with('success', 'User saved succefully.');
    }

    /**
     * delete User to the application
     */
    public function destroy(int $id): RedirectResponse|JsonResponse
    {
        $user = User::findOrFail($id);
        //$user->delete();
        return response()->json(['message'=>'User deleted successfully']);
    }
}
