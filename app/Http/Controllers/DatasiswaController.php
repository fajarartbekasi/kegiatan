<?php

namespace App\Http\Controllers;

use App\Role;
use App\Student;
use App\User;
use Illuminate\Http\Request;

class DatasiswaController extends Controller
{
    public function index()
    {
        $students = User::whereHas('roles', function ($q) {
                            $q->where('roles.name', '=', 'student');
                        })->paginate(6);

        return view('data.siswa.index', compact('students'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('data.siswa.create', compact('roles'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required',
            'phone'     => 'required',
            'password'  => 'required',
        ]);

        $request->merge(['password' => bcrypt($request->get('password'))]);

        if ($user = User::create($request->except('roles'))) {
            $user->syncRoles($request->get('roles'));
            if ($user->save()) {
                $siswa = Student::create([
                    'user_id'   => $user->id,
                    'nisn'      => $request->nisn,
                    'gender'    => $request->gender,
                    'religion'  => $request->religion,
                    'major'     => $request->major,
                    'class'     => $request->class,
                    'phone'     => $request->phone,
                    'status'    => $request->status,
                ]);
            };

        } else {
            flash()->error('Tidak dapat menambahkan pengguna baru');
        }

        return redirect()->back();
    }
    public function edit($id)
    {
        $student = User::findOrFail($id);
        return view('data.siswa.edit', compact('student'));
    }
    public function update(Request $request, $id)
    {
        $student = Student::where('user_id', '=' , $id)->firstOrFail();

        $student->update($request->all());

        return redirect()->back();
    }
}
