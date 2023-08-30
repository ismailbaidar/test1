<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{asset('css/s.css')}}">

<div class="DashbordMain  ">

<div class="sidebar">
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
