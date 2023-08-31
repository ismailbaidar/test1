@extends('layouts.DashboardLayout')
@section("content")
<link rel="stylesheet" href="{{asset('css/result.css')}}"  >

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



<div class="content">
    
    <div class="filters">
        <span>
        Filters:
        <select name="type" id="type">
            <option value="all">
                All
            </option>
            <option value="patients">
                Patients
            </option>
            <option value="medecin">
                Medecin
            </option>
            <option value="consultations">
                Consultations
            </option>
        </select>
    </span>

        <div class="date-filter hide" >
           from <input type="date" name="" id="">to<input type="date" name="" id="">
        </div>
    </div>
    <div class="result">

        <div class="peopleCard">
            <div class="avatar-info">

                <div class="avatar"></div>
                <div class="info">
                    <span>Name</span>
                    <span class="job">Medecin</span>
                </div>
            </div>
            <span>details</span>
        </div>
        <div class="peopleCard">
            <div class="avatar-info">

                <div class="avatar"></div>
                <div class="info">
                    <span>Name</span>
                    <span class="job">Patient</span>
                </div>
            </div>
            <span>details</span>
        </div>
        <div class="consultation">
            <div class="avatar-info">

                <div class="avatar"></div>
                <div class="info">
                    <span>Name</span>
                    <span>Consultation géneral</span>
                    <span class="job">11:00AM-11:30AM</span>
                </div>
            </div>
            <span>details</span>


        </div>
    </div>

</div>
<script>
    const select = document.querySelector("#type")
    const dateFilter = document.querySelector(".date-filter")

    select.addEventListener("change",()=>{
        console.log(select.value)
        if(select.value==="consultations"){
            dateFilter.classList.remove("hide")

        }else{
            dateFilter.classList.add("hide")
        }
    })
</script>
@endsection
