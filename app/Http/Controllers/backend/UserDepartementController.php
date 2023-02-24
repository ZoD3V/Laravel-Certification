<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\department;
use App\Models\User;
use App\Models\user_department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserDepartementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $departement = user_department::all();
        return view('backend.admin.userDepartement.index', compact('departement'));
    }

    public function create()
    {
        $user = User::all();
        $departement = department::all();
        return view('backend.admin.userDepartement.create', compact('user', 'departement'));
    }

    public function show(User $user)
    {
        $title = 'Category Show #' . $user->id;
        return view('backend.user.show', compact('user', 'title'));
    }

    public function create_process(Request $request)
    {
        $rule = [
            'user' => 'required',
            'departement' => 'required',
        ];

        $messages = [
            'user.required' => 'The field <strong>User</strong> is required!',
            'departement.required' => 'The field <strong>Departement</strong> is required!',
        ];

        $validator = Validator::make($request->all(), $rule, $messages);

        if ($validator->fails()) {
            return redirect()->route('b.manage.create.user_departement')->withErrors($validator)->withInput();
        } else {
            user_department::create([
                'users_id'         => $request->user,
                'department_id' => $request->departement,
            ]);
            return redirect()->route('b.manage.user_departement')->with('succes', "The User <strong>{$request->name}</strong> created successfully");
        }
    }

    public function edit($id)
    {
        if ($id == null) {
            return redirect()->route('b.manage.user')->with('error', 'The ID is empty!');
        } else {
            $user_departement = user_department::find($id);
            $user = User::all();
            $departement = department::all();

            if ($user_departement) {
                return view('backend.admin.userDepartement.edit', compact('user_departement', 'departement', 'user'));
            } else {
                return redirect()->route('b.manage.user')->with('error', "The #ID {$id} not found in Database!");
            }
        }
    }

    public function edit_process(Request $request)
    {
        $rule = [
            'user' => 'required',
            'departement' => 'required',
        ];

        $messages = [
            'user.required' => 'The field <strong>User</strong> is required!',
            'departement.required' => 'The field <strong>Departement</strong> is required!',
        ];

        $validator = Validator::make($request->all(), $rule, $messages);

        if ($validator->fails()) {
            return redirect()->route('b.manage.user_departement')->withErrors($validator)->withInput();
        } else {
            user_department::where('id', $request->id)
                ->update(([
                    'users_id'         => $request->user,
                    'department_id' => $request->departement,
                ]));
            return redirect()->route('b.manage.user_departement')
                ->with('success', " user <strong>{$request->name}</strong> updated successfully");
        }
    }

    public function destroy($id)
    {
        $user = user_department::find($id);

        $user->delete();

        return redirect()->route('b.manage.user_departement')->with('success', "User <strong>{$user->name}</strong> deleted successfully");
    }
}
