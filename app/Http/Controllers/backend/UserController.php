<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();

        return view('backend.admin.user.index', compact('user'));
    }

    public function create()
    {
        return view('backend.admin.user.create');
    }

    public function show(User $user)
    {
        $title = 'Category Show #' . $user->id;
        return view('backend.user.show', compact('user', 'title'));
    }

    public function create_process(Request $request)
    {
        $rule = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'is_admin' => 'required',
        ];

        $messages = [
            'name.required' => 'The field <strong>name</strong> is required!',
            'email.required' => 'The field <strong>email</strong> is required!',
            'password.required' => 'The field <strong>email</strong> is required!',
            'is_admin.required' => 'The field <strong>admin</strong> is required!',
        ];

        $validator = Validator::make($request->all(), $rule, $messages);

        if ($validator->fails()) {
            return redirect()->route('b.manage.create.user')->withErrors($validator)->withInput();
        } else {
            User::create([
                'name'         => $request->name,
                'email' => $request->email,
                'is_admin' => $request->is_admin,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('b.manage.user')->with('succes', "The User <strong>{$request->name}</strong> created successfully");
        }
    }

    public function edit($id)
    {
        if ($id == null) {
            return redirect()->route('b.manage.user')->with('error', 'The ID is empty!');
        } else {
            $user = User::find($id);
            $userAll = User::all();

            if ($user) {
                return view('backend.admin.user.edit', compact('user', 'userAll'));
            } else {
                return redirect()->route('b.manage.user')->with('error', "The #ID {$id} not found in Database!");
            }
        }
    }

    public function edit_process(Request $request)
    {
        $rule = [
            'name' => 'required',
            'email' => 'required',
            'is_admin' => 'required',
        ];

        $messages = [
            'name.required' => 'The field <strong>name</strong> is required!',
            'email.required' => 'The field <strong>email</strong> is required!',
            'is_admin.required' => 'The field <strong>admin</strong> is required!',
        ];

        $validator = Validator::make($request->all(), $rule, $messages);

        if ($validator->fails()) {
            return redirect()->route('b.manage.user')->withErrors($validator)->withInput();
        } else {
            if ($request->password) {
                User::where('id', $request->id)
                    ->update(([
                        'name'         => $request->name,
                        'email'         => $request->email,
                        'is_admin'         => $request->is_admin,
                        'password'         => Hash::make($request->password),
                    ]));
            } else {
                User::where('id', $request->id)
                    ->update(([
                        'name'         => $request->name,
                        'email'         => $request->email,
                        'is_admin'         => $request->is_admin,
                    ]));
            }
            return redirect()->route('b.manage.user')
                ->with('success', " user <strong>{$request->name}</strong> updated successfully");
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->route('b.manage.user')->with('success', "User <strong>{$user->name}</strong> deleted successfully");
    }
}
