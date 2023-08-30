<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.8/index.min.js" integrity="sha512-xCMh+IX6X2jqIgak2DBvsP6DNPne/t52lMbAUJSjr3+trFn14zlaryZlBcXbHKw8SbrpS0n3zlqSVmZPITRDSQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="{{asset('css/s.css')}}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="DashbordMain  ">

<div class="sidebar">
    <div class="toggle"><i class="fa-solid fa-chevron-left"></i></div>
    <div class="top-part">
        <div class="avatar"></div>
        <div class="name-job">
            <span>name</span><span class="job">Doctor</span>
        </div>

    </div>
    <div class="bottom-part">
    @can('patient')
    <a  href="/Patients" class="link">
        <i class="fa-solid fa-head-side-cough"></i>
        <span class="name" > Patients</span>
    </a>
    @endcan

    @can('consultation')

    <a href="/Consultations"  class="link">
        <i class="fa-regular fa-calendar-check"></i>
        <span class="name" > Consultations</span>
    </a>
    @endcan

    <a href="/Medecin"  class="link">
        <i class="fa-solid fa-user-doctor"></i>
        <span class="name" > Medecin</span>
    </a>

    @can('Admin')

    <a  href="/Roles"  class="link">
        <i class="fa-solid fa-users"></i>
        <span class="name" > Roles</span>
    </a>

    <a  href="/Statistiques"  class="link">
        <i class="fa-solid fa-chart-line"></i>
        <span class="name" > Statistiques</span>
    </a>
    <a  href="/Employe"  class="link">
        <i class="fa-solid fa-hospital-user"></i>
        <span class="name" > Employé</span>
    </a>
    @endcan
</div>
</div>

<div class="WrapperAdmim">


<div class="navigation_bar">
<div class="InputSearch">
    <i class="fa-solid fa-magnifying-glass"></i>
    <input type="text"  placeholder="Chercher ..." name="search" />
</div>

<div class="actionsDashboard">
    <i class="fa-solid fa-user"></i>
    <form  style="width: fit-content;display:inline-block"  method="POST"  action="{{route('logout')}}" >
        @csrf
        <button style="all:unset;display:inline-block;cursor:pointer" >
    <i class="fa-solid fa-right-from-bracket"></i>
        </button>
    </form>
    <i class="fa-solid fa-circle-half-stroke"></i>
    <i class="fa-solid fa-calendar-days"></i>
</div>
</div>

<div class="content">

    @yield('content')

</div>


</div>


</div>

<script>

    const sidebar = document.querySelector(".sidebar")
    const toggle = document.querySelector(".toggle")
    const names = document.querySelectorAll(".name")
    const nameJob = document.querySelector(".name-job")
    const avatar = document.querySelector(".avatar")

    console.log(names)
    fullSize = true

    toggle.addEventListener("click",()=>{

        if(fullSize){
            sidebar.style.width = "60px"
            names.forEach(name=>{
                console.log(name)
                name.classList.toggle("hide")
            })
            avatar.style.width = "20px";
            avatar.style.height = "20px";
            toggle.innerHTML='<i class="fa-solid fa-chevron-right"></i>'

        }else{
            names.forEach(name=>{
                console.log(name)
                name.classList.toggle("hide")
            })
            sidebar.style.width="200px"
            avatar.style.width = "40px";
            avatar.style.height = "40px";
            toggle.innerHTML='<i class="fa-solid fa-chevron-left"></i>'
        }
        nameJob.classList.toggle("hide")



        fullSize = !fullSize
    })

</script>
