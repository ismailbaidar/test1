@extends('layouts.DashboardLayout')
@section("content")
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
      <a  href="{{route('Patients.create')}}" class="btn btn-danger  text-end " >Ajouter Patient</a>
  </div>

  <table  style="background-color: #fff;margin-bottom:0" class="table table-hover shadow-sm p-3 mb-5 bg-white rounded">
    <thead>
      <tr class="p-2  "  >
        <th scope="col">#</th>
        <th scope="col">Numéro</th>
        <th scope="col">CIN</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Adresse</th>
        <th scope="col">Tel</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @foreach ($patients as $patient )

        <th scope="row">{{$patient->id}}</th>
        <td>{{$patient->Numero}}</td>
        <td>{{$patient->CIN}}</td>
        <td>{{$patient->Nom}}</td>
        <td>{{$patient->Prenom}}</td>
        <td>{{$patient->Adresse}}</td>
        <td>{{$patient->Tel}}</td>
        <td>{{$patient->Email}}</td>
        <td>
            <div class="d-flex  ">
                <button class="btn  me-1 btn-success" >Rendez vous</button>
                <a  href="{{route('Patients.edit',$patient->id)}}" class="btn me-1 btn-warning" ><i class="fa-solid fa-pen-to-square"></i></a>
                <button class="btn btn-primary" ><i class="fa-solid fa-eye"></i></button>
            </div>
        </td>
    </tr>
    @endforeach

    </tbody>
</table>
{{$patients->links()}}

@endsection
