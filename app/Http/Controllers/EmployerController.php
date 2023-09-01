<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use App\Models\Employe;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\MailAcountInformations;
use Illuminate\Support\Facades\Mail;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Roles::all();
        $services = Service::all();
        $employes = Employe::with('role')->paginate(5);
        return view('Employer',compact('roles','services','employes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        Employe::create($data);
        if(in_array($request->role_id,Roles::ROLES)){
            $password = Str::random(8);
            $npassword = bcrypt($password);
            $user = User::create(['name'=>$request->Nom,'email'=>$request->Email,'role_id'=>$request->role_id,'password'=>$password]);
            Mail::to($user->email)->send(new MailAcountInformations(['email'=>$user->email,'password'=>$password]));
        }
        return back()->with('success','Employer bien crée');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employe = Employe::find($id);
        $data = ($request->except('_token','_method'));
        $employe->update($data);
        return back()->with('success','employe birn modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Employe::destroy($id);
        return response()->json(['status'=>'bien supprimmer']);
    }
}
