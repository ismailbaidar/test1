@extends('layouts.DashboardLayout')
@section("content")
<link rel="stylesheet" href="{{asset('table.css')}}"  >

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
     <button class='show-modal' ><i class="fa-solid fa-plus"></i></button>
  </div>
  <div class="modal-holder hide" class>

  <div class="modal-custom">
  <div class="close-modal"><i class="fa-solid fa-xmark"></i></div>
<form method="POST" enctype="multipart/form-data"  action="{{route('Patients.store')}}" class="AjouterForm p-4  m-3" style="background-color: #fff;border-radius:5px" >

    @csrf
        <h3 class="text-center" >Ajouter Patient</h3>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Numéro</label>
            <input type="text"  required name="Numero" class="form-control" id="exampleFormControlInput1" >
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">CIN</label>
            <input  type="text" name="CIN"  required class="form-control" id="exampleFormControlInput1" >
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nom</label>
            <input  type="text" name="Nom" required class="form-control" id="exampleFormControlInput1" >
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Prenom</label>
            <input  type="text" name="Prenom"  required class="form-control" id="exampleFormControlInput1" >
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Adresse</label>
            <input  type="text" name="Adresse"  required class="form-control" id="exampleFormControlInput1" >
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tel</label>
            <input  type="text" name="Tel"  required class="form-control" id="exampleFormControlInput1" >
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input  type="email" name="Email"  required class="form-control" id="exampleFormControlInput1" >
          </div>
          <div class="row mb-5 ">
            <div class="col-6" class="cin">
                <label for="exampleFormControlInput1" >CIN RECTO</label>
                <div class="upload-icon-holder"  style="border: 3px dashed #646161d6;border-radius:5px" >
                <label id="ll"  for="cinrecto"><i    class="fa-solid fa-cloud-arrow-up icon-upload"></i></label>
                </div>
                <input  name="cinrecto" type="file" id="cinrecto" style="visibility:hidden" >
            </div>
            <div class="col-6" class="cin">
                <label for="exampleFormControlInput1" >CIN VERSO</label>
                <div class="upload-icon-holder"  style="border: 3px dashed #646161d6;border-radius:5px" >
                <label id="ll" for="cinverso"><i    class="fa-solid fa-cloud-arrow-up icon-upload"></i></label>
                </div>
                <input name="cinverso"  type="file" id="cinverso" style="display: none" >
            </div>
          </div>
          <button class="btn btn-danger ">Enregistrer</button>
        </form>

</div>
  </div>
<section>

  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
        <th>#</th>
        <th>Numéro</th>
        <th>CIN</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Adresse</th>
        <th>Tel</th>
        <th>Email</th>
        <th>Action</th>
        </tr>
      </thead>

  </div>



      <tbody>
      <tr>
        @foreach ($patients as $patient )

        <th>{{$patient->id}}</th>
        <td>{{$patient->Numero}}</td>
        <td>{{$patient->CIN}}</td>
        <td>{{$patient->Nom}}</td>
        <td>{{$patient->Prenom}}</td>
        <td>{{$patient->Adresse}}</td>
        <td>{{$patient->Tel}}</td>
        <td>{{$patient->Email}}</td>
        <td class="actions">
                <button class="custom-button" ><i class="fa-solid fa-calendar-days"></i></button>

                <a  href="{{route('Patients.edit',$patient->id)}}" class="custom-button" ><i class="fa-solid fa-pen-to-square"></i></a>
                <button class="custom-button text-warning" ><i class="fa-solid fa-eye"></i></button>
        </td>


    </tr>
    @endforeach



      </tbody>

    </table>
  </div>
</section>



</table>
<script>
const closeModalButton = document.querySelector(".close-modal")
const modal = document.querySelector(".modal-holder")
const showModal = document.querySelector(".show-modal")
console.log(showModal)
closeModalButton.addEventListener("click",()=>{
  modal.classList.add('hide')

})
showModal.addEventListener('click',()=>{
  modal.classList.remove("hide")
})


</script>
{{$patients->links()}}

@endsection
