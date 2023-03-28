<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonRequest;
use App\Models\BloodType;
use App\Models\Interest;
use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    public function create()
    {
        $interests = Interest::all();
        $blood_types = BloodType::all();

        return view('person.create', [
            'interests' => $interests,
            'blood_types' => $blood_types
        ]);
    }

    public function store(StorePersonRequest $request)
    {
//        dd($request->all());
        /** @var Person $person */
        $person = Person::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'birth_date' => $request['birth_date'],
            'birth_place' => $request['birth_place'],
            'has_newsletter' => (bool) $request->has_newsletter,
            'introduction' => $request['introduction'],
            'title' => $request['title'],
            'blood_type' => $request['blood_type'],
        ]);

        $person->interests()->sync($request->interests);

        return redirect(route('member.create'))
            ->with('success', 'Sikeres');
    }

    public function index()
    {
        return view('person.index', [
            'members' => Person::paginate(10)
        ]);
    }

    public function show(Person $person)
    {
        return view('person.show', [
            'person' => $person,
            'age' => $person->birth_date->diff(now())->format('%y'),
        ]);
    }

    public function destroy(Person $person)
    {
//        $person->interests()->detach();
//        $person->blood_type()->delete();
        $person->delete();

        return redirect(route('member.index'));
    }
}
