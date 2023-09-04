<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Employe;
use App\Models\Patient;
use App\Models\Service;
use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Charts\ConsultationChart;
use Illuminate\Support\Facades\DB;

class StatiqtiqueController extends Controller
{
    function index(){
        $totalpatient  = Patient::count();
        $totalconsultations  = Consultation::count();
        $totalmedecin  = Employe::whereRoleId(4)->count();
        $totalinfermiere  = Employe::whereRoleId(3)->count();
        $totalasistant  = Employe::whereRoleId(2)->count();
        $totalotherEmploye  = Employe::whereNotIn('role_id',[1,2,3,4])->count();


        $services = Service::withCount('patients')->get();


        $currentYear = Carbon::now()->year;
            $data = Consultation::select(
                DB::raw("DATE_FORMAT(Date_consultation, '%Y-%m') as month"),
                DB::raw("COUNT(*) as count")
            )
            ->groupBy('month')
            ->orderBy('month')
            ->whereYear('Date_consultation', $currentYear)
            ->get();

            $incomes = DB::select('
            SELECT employes.id AS doctor_id,
                   YEAR(consultations.Date_consultation) AS year,
                   MONTH(consultations.Date_consultation) AS month,
                   SUM(employes.Tarif) AS total_tarif
            FROM employes
            INNER JOIN patients ON employes.id = patients.employe_id
            INNER JOIN consultations ON patients.id = consultations.patient_id
            WHERE employes.role_id = 4
                AND YEAR(consultations.Date_consultation) = YEAR(NOW())
            GROUP BY doctor_id, year, month
            ORDER BY year, month;
        ');



            return view('Statistique',
            compact('data','totalpatient',
            'totalconsultations','totalmedecin',
        'totalinfermiere','totalasistant','totalotherEmploye','incomes','services'));

    }
}
