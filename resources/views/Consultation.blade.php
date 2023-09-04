@extends('layouts.DashboardLayout')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@if (session('message'))
<div class="alert alert-success mt-3 " role="alert">
    <script>
    setTimeout(function() {
        Swal.fire({
            icon: 'success',
            title: 'Product Added',
            text: 'The product has been added successfully!',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
    }, 1000);
    </script>
@endif
<div class="d-flex  justify-content-between  align-items-center p-2  my-2">
    <div >
        <h2>Consultation</h2>
    </div>
</div>
@include('layouts.AjouterConsultation')
  <div class="tbl-header">
    @can('add-consultation')
    <button id="item" type="button" class="btn btn-primary btnAjouter" data-bs-toggle="modal" data-bs-target="#ajouterconsultation" >
        <i class="fa-solid fa-plus"></i>
    </button>
    @endcan

      <table cellpadding="0" cellspacing="0" border="0" >
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
            @can('update', $consulatation)

            <button type="button" class="btn btn-light " data-bs-toggle="modal" data-bs-target={{"#modifier".$consulatation->id}} >
                <i    class="text-warning fa-solid fa-pen-to-square"></i>
            </button>

            @if ($consulatation->paiment)
            <a   href="{{route('print',$consulatation->id)}}"  class="btn btn-light "   >
                <i class="fa-solid fa-print"></i>
            </a>
            @else
            <button type="button" class="btn btn-light " data-bs-toggle="modal" data-bs-target={{"#Paiment".$consulatation->id}} >
                <i class="fa-regular fa-credit-card"></i>
            </button>
            @endif
            @endcan

            @include('layouts.AjouterPaiment',['consultation'=>$consulatation])
            @include('layouts.modifierConsultation',['consultation'=>$consulatation,'equipes'=>$equipes,'patients'=>$patients])
        </td>
    </tr>
    @endforeach

    </tbody>
</table>
{{$consultations->links()}}
</div>

@endsection
