<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Patient;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::paginate(6);
     return view('Patients',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('PatientAjouter');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cinverso = Str::random(7).'.'.$request->file('cinrecto')->getClientOriginalExtension();
        $cinrecto = Str::random(7).'.'.$request->file('cinverso')->getClientOriginalExtension();
        $request->file('cinrecto')->storeAs('pics/',$cinrecto,'public');
        $request->file('cinverso')->storeAs('pics/',$cinverso,'public');
        $data=$request->except(['_token','cinrecto','cinverso']);
        $data['cinrecto']=$cinrecto;
        $data['cinverso']=$cinverso;
        $medecin = Medecin::withCount('patients')
        ->orderBy('patients_count')
        ->first();
        $data['medecin_id']=$medecin->id;
        Patient::create($data);
        return to_route('Patients.index')->with('message','Patient bien cree');
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
        $patient = Patient::find($id);
        return view('PatientModifier',compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $patient=Patient::find($id);
        if($request->filled('cinrecto')){
            $cinrecto = Str::random(7).'.'.$request->file('cinverso')->getClientOriginalExtension();
            $request->file('cinrecto')->storeAs('pics/',$cinrecto,'public');
        }
        if($request->filled('cinverso')){
            $cinverso = Str::random(7).'.'.$request->file('cinrecto')->getClientOriginalExtension();
            $request->file('cinverso')->storeAs('pics/',$cinverso,'public');
        }
        $data=$request->except(['_token','cinrecto','cinverso']);
        $data['cinrecto']=$cinrecto ?? $patient->cinrecto;
        $data['cinverso']=$cinverso ?? $patient->cinverso ;
        $patient->update($data);
        return to_route('Patients.index')->with('message','Patient bien modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
