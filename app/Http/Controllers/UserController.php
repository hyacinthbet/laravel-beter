<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::leftJoin('genders', 'users.gender_id', '=', 'genders.gender_id')
            ->select('users.*', 'genders.gender')
            ->orderBy('users.first_name');

        if (request()->has('search')) {
            $searchTerm = request()->get('search');
            if ($searchTerm) {
                $users = $users->where(function($query) use ($searchTerm){
                    $query->where('users.first_name', 'like', "%$searchTerm")
                    ->orwhere('users.middle_name', 'like', "%$searchTerm")
                    ->orwhere('users.last_name', 'like', "%$searchTerm")
                    ->orwhere('genders.gender', 'like', "%$searchTerm");
                });
            }
        }

        $users = $users->paginate(10)
            ->appends(['search' => request()->get('search')]);

        return view('user.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_image' => ['nullable', 'mimes:jpg,png,jpeg,biff,bmp'],
            'first_name' => ['required', 'string'],
            'middle_name' => ['nullable', 'string'],
            'last_name' => ['required', 'string'],
            'suffix_name' => ['nullable', 'string'],
            'birth_date' => ['required', 'date'],
            'gender_id' => ['required', 'numeric', 'in:1,2'],
            'address' => ['required'],
            'contact_number' => ['required', 'numeric', 'digits:11'],
            'email_address' => ['required', 'email', 'unique:users'],
            'username' => ['required'],
            'password' => ['required_with:confirm_password', 'same:confirm_password']
        ]);

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);
        return redirect('/user/list')->with('message_success', "User successfuly created!");
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user, $id)
    {
        $validated = $request->validate([
            'user_image' => ['nullable', 'mimes:jpg,png,jpeg,biff,bmp'],
            'first_name' => ['required', 'string'],
            'middle_name' => ['nullable', 'string'],
            'last_name' => ['required', 'string'],
            'suffix_name' => ['nullable', 'string'],
            'birth_date' => ['required', 'date'],
            'gender_id' => ['required', 'numeric', 'in:1,2'],
            'address' => ['required'],
            'contact_number' => ['required', 'numeric', 'digits:11'],
            'email_address' => ['required', 'email'],
            'username' => ['required'],
            'password' => ['required_with:confirm_password', 'same:confirm_password']
        ]);

        if (request()->hasFile('user_image')) {
            $filenameWithExtension = $request->file('user_image');

            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

            $extension = $request->file('user_image')->getClientOriginalExtension();

            $filenameToStore = $filename . '_' . time() . '.' . $extension;

            $request->file('user_image')->storeAs('public/img/user/' . $filenameToStore);

            $validated['user_image'] = $filenameToStore;
        }

        $validated['password'] = bcrypt($validated['password']);

        User::find($id)->update($validated);
        return redirect('/user/list')->with('message_success', "User successfuly updated!");
    }

    public function delete($id)
    {
        $user = User::find($id);
        return view('user.delete', compact('user'));
    }

    public function destroy(Request $request, User $user)
    {
        if ($user->user_image && Storage::exists('public/img/user/' . $user->user_image)) {
            Storage::delete('public/img/user/' . $user->user_image);
        }

        $user->delete($request);
        return redirect('/user/list')->with('message_success', 'User successfuly deleted!');
    }

    public function login()
    {
        return view('login.index');
    }

    public function processLogin(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        $user = User::join('genders', 'users.gender_id', '=', 'genders.gender_id')
            ->where('username', $validated['username'])
            ->first();

        if ($user && auth()->attempt($validated)) {
            auth()->login($user);
            $request->session()->regenerate();
            return redirect('/user/list');
        }
        else{
            return redirect('/');
        }
    }

    public function processLogout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
