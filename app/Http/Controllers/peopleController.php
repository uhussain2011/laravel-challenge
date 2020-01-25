<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\People;
use App\Role;
use Validator;

class peopleController extends Controller
{
    public function index()
    {
//        get all date form People table and also get data roles
        $people = People::latest()->get();
        return view('people', ['people' => $people]);
    }

    public function store(Request $request)
    {

        if($request->delete)
        {
            People::wherein('id',$request->delete)->delete();
        }
        $people = collect($request->people);

//        remove id ad that record is delete so no need to edit that data
        $people = $people->whereNotIn('id', $request->delete);

        $this->validate($request, [
            'people*.firstname' => 'required|string|max:255|distinct',
            'people*.lastname' => 'required|string|max:255|distinct',
            'people*.email'    => 'required|email|max:255|distinct',
            'people*.job_role'    => 'required|max:20',
        ]);

//        array validation form edit


//        validation for email and job role as all email must be be unique and emp role limit
        $peopleemail = $people->countBy(function ($email) {
            return $email['email'];
        });
         $peoplerole = $people->countBy(function ($email) {
            return $email['job_role'];
        });

        if ($peopleemail->max() >= 2) {
            return redirect()->back()->with('Message', 'all email must be be unique');
        }
        if ($peoplerole->max() >= 5) {
            return redirect()->back()->with('Message', 'Only 4 employees can have the same job role');
        }

//        edit all data with array
        foreach ($people as $value) {
            $value = (object)$value;
            $role = $this->Rolecheck($value->job_role);
            $people = People::find($value->id);
            $people->firstname = $value->firstname;
            $people->lastname = $value->lastname;
            $people->email = $value->email;
            $people->job_role = $role->id;
            $people->update();
        }

         $peoplecount = People::count();
         if($peoplecount >= 10)
         {
             return redirect()->back()->with('Message', 'Only 10 People register.');
         }

//         add new record
        if($request->firstname || $request->lastname ||$request->email || $request->job_role) {

            $role = $this->Rolecheck($request->job_role);

             $peoplecount = People::where('job_role',$role->id)->count();
            if ($peoplecount >= 4) {
                return redirect()->back()->with('Message', 'Only 4 employees can have the same job role');
            }

            $this->validate($request, [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email'    => 'required|email|max:255|unique:people',
                'job_role'    => 'required|max:20',
            ]);
            $people = new People();
            $people->firstname = $request->firstname;
            $people->lastname = $request->lastname;
            $people->email = $request->email;
            $people->job_role = $role->id;
            $people->save();
        }

        return redirect()->back()->with('Message', 'Action perform successfully');

    }
    public function Rolecheck($job_role)
    {
//         check  role as need to add new or get old record only
        $role = Role::where('role_name', $job_role)->first();
        if (!$role) {
            $role = new Role();
            $role->role_name = $job_role;
            $role->save();
        }
        return $role;
    }
}
