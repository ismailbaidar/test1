<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Roles;
use App\Models\Equipe;
use App\Models\Employe;
use App\Models\Medecin;
use App\Models\Patient;
use App\Models\Operation;
use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Models\Blocoperation;
use Illuminate\Support\Carbon;
use App\Http\Resources\EventCollection;

class RendezVousController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultations = Consultation::with(['patient','operation'])->paginate(5);
        $patients = Patient::with('medecin.consultations')->get();
        $equipes = Equipe::all();
        $blocs = Blocoperation::all();
        return view('Consultation',compact('consultations','patients','equipes','blocs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $consultations = Consultation::all();
        $medecins = Medecin::with('consultations')->get();
        $patients = Patient::with('medecin.consultations')->get();
        $equipes = Equipe::with('equipemember.medecin')->get();
        $blocs = Blocoperation::all();
        return view('ConsultationAjouter',compact('consultations','medecins','patients','equipes','blocs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date =  $request->Date_consultation;
        $time = $request->time;
        $dateTimeString = $date . ' ' . $time;
       /*  $dateTime = DateTime::createFromFormat('Y/m/d H:i', $dateTimeString);
        dd($dateTime);
        // Set the time portion of the date object to match the time object
        $date->setTime($time->format('H'), $time->format('i'));
        $datetime = $date;
 */
        $consultation = Consultation::create(['NumeroConsultation'=>$request->NumeroConsultation,
        'patient_id'=>$request->patient_id,
        'Objet'=>$request->Objet,
        'Observation'=>$request->Observation,
        'TypeCosultation'=>$request->TypeCosultation,
        'Date_consultation'=>$dateTimeString
        ]);
        if($request->get('TypeCosultation')=='operation'){
            Operation::create([
                'equipe_id'=>$request->equipe_id,
                'blocoperation_id'=>$request->blocoperation_id,
                'DateDebut'=>$request->DateDebut,
                'DateFin'=>$request->DateFin,
                'Observation'=>$request->ObservationOperation,
                'consultation_id'=>$consultation->id
            ]);
        }
        return back();
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
        $consultation = Consultation::with(['patient','operation','operation.blocoperation','operation.equipe'])->where('id',$id)->first();
        $medecins = Medecin::with('consultations')->get();
        $patients = Patient::with('medecin.consultations')->get();
        $equipes = Equipe::with('equipemember.medecin')->get();
        $blocs = Blocoperation::all();
        return view('ConsultationModifier',compact('consultation','medecins','patients','equipes','blocs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $date =  $request->Date_consultation;
        $time = $request->time;
        $dateTimeString = $date . ' ' . $time;
       /*  $dateTime = DateTime::createFromFormat('Y/m/d H:i', $dateTimeString);
        dd($dateTime);
        // Set the time portion of the date object to match the time object
        $date->setTime($time->format('H'), $time->format('i'));
        $datetime = $date;
 */
        $consultation = Consultation::find($id);
        $consultation->update(['NumeroConsultation'=>$request->NumeroConsultation,
        'patient_id'=>$request->patient_id,
        'Objet'=>$request->Objet,
        'Observation'=>$request->Observation,
        'TypeCosultation'=>$request->TypeCosultation,
        'Date_consultation'=>$dateTimeString
        ]);
        if($request->get('TypeCosultation')=='operation'){
            $operation = Operation::find($consultation->operation->id);
            $operation->update([
                'equipe_id'=>$request->equipe_id,
                'blocoperation_id'=>$request->blocoperation_id,
                'DateDebut'=>$request->DateDebut,
                'DateFin'=>$request->DateFin,
                'Observation'=>$request->ObservationOperation,
                'consultation_id'=>$consultation->id
            ]);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
