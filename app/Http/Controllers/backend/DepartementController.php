<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $departement = department::all();
        return view('backend.admin.departement.index', compact('departement'));
    }

    public function create()
    {
        return view('backend.admin.departement.create');
    }

    public function show(department $user)
    {
        $title = 'Category Show #' . $user->id;
        return view('backend.user.show', compact('user', 'title'));
    }

    public function create_process(Request $request)
    {
        $rule = [
            'name' => 'required',
            'slug' => 'required',
        ];

        $messages = [
            'name.required' => 'The field <strong>name</strong> is required!',
            'slug.required' => 'The field <strong>name</strong> is required!',
        ];

        $validator = Validator::make($request->all(), $rule, $messages);

        if ($validator->fails()) {
            return redirect()->route('b.manage.create.departement')->withErrors($validator)->withInput();
        } else {
            department::create($request->all());
            return redirect()->route('b.manage.departement')->with('succes', "The Departement <strong>{$request->name}</strong> created successfully");
        }
    }

    public function edit($id)
    {
        if ($id == null) {
            return redirect()->route('b.manage.departement')->with('error', 'The ID is empty!');
        } else {
            $departement = department::find($id);

            if ($departement) {
                return view('backend.admin.departement.edit', compact('departement'));
            } else {
                return redirect()->route('b.manage.departement')->with('error', "The #ID {$id} not found in Database!");
            }
        }
    }

    public function edit_process(Request $request, department $departement)
    {
        $rule = [
            'name' => 'required',
            'slug' => 'required',
        ];

        $messages = [
            'name.required' => 'The field <strong>name</strong> is required!',
            'slug.required' => 'The field <strong>name</strong> is required!',
        ];

        $validator = Validator::make($request->all(), $rule, $messages);

        if ($validator->fails()) {
            return redirect()->route('b.manage.edit.departement', $departement->id)->withErrors($validator)->withInput();
        } else {
            department::where('id', $request->id)->update(([
                'name'         => $request->name,
                'slug'         => $request->slug,
            ]));
            return redirect()->route('b.manage.departement')
                ->with('success', "The Departement <strong>{$request->name}</strong> updated successfully");
        }
    }

    public function destroy($id)
    {
        $departement = department::find($id);

        $departement->delete();

        return redirect()->route('b.manage.departement')->with('success', "departement <strong>{$departement->name}</strong> deleted successfully");
    }
}
