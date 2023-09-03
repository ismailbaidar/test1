<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Employe;
use App\Models\Patient;
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

        $currentYear = Carbon::now()->year;
            $data = Consultation::select(
                DB::raw("DATE_FORMAT(Date_consultation, '%Y-%m') as month"),
                DB::raw("COUNT(*) as count")
            )
            ->groupBy('month')
            ->orderBy('month')
            ->whereYear('Date_consultation', $currentYear)
            ->get();

            $income = Employe::whereRoleId(4)->whereHas('consultations')->with('consultations')->selectRaw('SUM(Tarif) as total_tarif')->get();
                dd($income);
            return view('Statistique',
            compact('data','totalpatient',
            'totalconsultations','totalmedecin',
        'totalinfermiere','totalasistant','totalotherEmploye'));

    }
}
