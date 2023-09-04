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

@include('layouts.AjouterConsultation')

@push('search')
    <form action="">
        <input type="text" placeholder="search" >
    </form>
@endpush





  <div class="tbl-header">
    {{-- @can('add-consultation') --}}
    <button id="item" type="button" class="btn btn-primary btnAjouter" data-bs-toggle="modal" data-bs-target="#ajouterconsultation" >
        <i class="fa-solid fa-plus"></i>
    </button>
    {{-- @endcan     --}}

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
            <div class="d-flex  ">
                <a  href="{{route('Consultations.edit',$consulatation->id)}}" class="btn me-1 btn-warning" ><i class="fa-solid fa-pen-to-square"></i></a>
                <button data-bs-toggle="modal" data-bs-target="#modal{{ $consulatation->id }}" class="detail-consultation text-primary"><i class="fa-solid fa-eye"></i></button>
            </div>
        </td>
    </tr>


  <div class="modal fade" id="modal{{ $consulatation->id }}" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail consultation <b>#{{ $consulatation->id }}</b></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body consultation-modal">
            <div>
                <span>Number Consultation</span><span>{{ $consulatation->NumeroConsultation }}</span>
            </div>
            <div>
                <span>Patient</span><span>{{ $consulatation->patient->Nom }}</span>
            </div>
            <div>
                <span>Objet</span><span>{{ $consulatation->Objet }}</span>
            </div>
            <div>
                <span>Number Consultation</span><span>{{ $consulatation->Observation }}</span>
            </div>
            <div>

                <span>Type Consultation</span><span>{{ $consulatation->TypeCosultation }}</span>
            </div>
        </div>

      </div>
    </div>
  </div>

    @endforeach

    </tbody>
</table>
{{$consultations->links()}}
</div>

@endsection
