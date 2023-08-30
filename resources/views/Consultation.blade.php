@extends('layouts.DashboardLayout')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@if (session('message'))
<div class="alert alert-success mt-3 " role="alert">
    {{session('message')}}
  </div>

@endif
<div class="d-flex  justify-content-between  align-items-center p-2  my-2">
    <div >
      <h2>Patients</h2>
    </div>
      <a  href="{{route('Consultations.create')}}" class="btn btn-danger  text-end " >Ajouter Consultation</a>
  </div>

  <table  style="background-color: #fff;margin-bottom:0" class="table table-hover shadow-sm p-3 mb-5 bg-white rounded">
    <thead>
      <tr class="p-2  "  >
        <th scope="col">NumeroConsultation</th>
        <th scope="col">Objet</th>
        <th scope="col">Observation</th>
        <th scope="col">Date_consultation</th>
        <th scope="col">TypeCosultation</th>
        <th scope="col">Patient</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @foreach ($consultations as $consulatation )

        <th scope="row">{{$consulatation->NumeroConsultation}}</th>
        <td>{{$consulatation->Objet}}</td>
        <td>{{$consulatation->Observation}}</td>
        <td>{{$consulatation->Date_consultation}}</td>
        <td>{{$consulatation->TypeCosultation}}</td>
        <td>{{$consulatation->patient->CIN}} - {{$consulatation->patient->Nom}} </td>

        <td>
            <div class="d-flex  ">
                <a  href="{{route('Consultations.edit',$consulatation->id)}}" class="btn me-1 btn-warning" ><i class="fa-solid fa-pen-to-square"></i></a>
            </div>
        </td>
    </tr>
    @endforeach

    </tbody>
</table>
{{$consultations->links()}}


@endsection
