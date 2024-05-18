<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GenderController extends Controller
{
   
    public function index()
    {
      
        $genders = Gender::all(); // SELECT * FROM genders;
        return view('gender.index', compact('genders'));
    }

    public function show($id)
    {
        
        $gender = Gender::find($id); // SELECT * FROM genders WHERE gender_id = $id;
        return view('gender.show', compact('gender'));
    }

    public function create()
    {
        // Redirect to add gender web page
        return view('gender.create');
    }

    public function store(Request $request)
    {
        // Validate values that fetch from form in add gender web page.
        $validated = $request->validate([
            'gender' => ['required']
        ]);

        // Save the gender in genders table in database.
        Gender::create($validated);

        // After saving gender in genders table in database, redirect to list of genders web page with message success.
        return redirect('/genders')->with('message_success', 'Gender successfully saved.');
    }

    public function edit($id)
    {
        // Fetch the gender from genders table in database by gender_id.
        $gender = Gender::find($id);

        // Redirect to edit gender web page with variable gender.
        return view('gender.edit', compact('gender'));
    }

    public function update(Request $request, Gender $gender)
    {
        // Validate values that fetch from form in edit gender web page.
        $validated = $request->validate([
            'gender' => ['required'],
            'gender_image' => ['nullable', 'mimes:jpg,png,jpeg,biff,bmp'],
        ]);

        if (request()->hasFile('gender_image')) {
            $filenameWithExtension = $request->file('gender_image');

            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

            $extension = $request->file('gender_image')->getClientOriginalExtension();

            $filenameToStore = $filename . '_' . time() . '.' . $extension;

            $request->file('gender_image')->storeAs('public/img/gender/' . $filenameToStore);

            $validated['gender_image'] = $filenameToStore;
        }

        // Update the gender in genders table in database.
        $gender->update($validated);

        // After updating the gender, redirect to list of genders web page with message success.
        return redirect('/genders')->with('message_success', 'Gender successfully updated.');
    }

    public function delete($id)
    {
        // Fetch gender from genders table in database by gender_id.
        $gender = Gender::find($id);

        // Redirect to confirmation delete web page with variable gender.
        return view('gender.delete', compact('gender'));
    }

    public function destroy(Request $request, Gender $gender)
    {
        if ($gender->gender_image && Storage::exists('public/img/gender/' . $gender->gender_image)) {
            Storage::delete('public/img/gender/' . $gender->gender_image);
        }

        $gender->delete($request);
        return redirect('/genders')->with('message_success', 'Gender successfully deleted.');
    }
}
