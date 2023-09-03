@extends('layouts.DashboardLayout')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <div class="stateItems">

    <div class='ItemsStateComponent' >
        <div class='H-ItemsStateComponent' >
        <span class='NameState' >Total Patient</span>
        </div>
        <div class='C-ItemsStateComponent' >
        <div class='T-ItemsStateComponent' >{{$totalpatient}}</div>
        <div class='I-ItemsStateComponent  bg-warning '  ><i class="  text-light fa-solid fa-user"></i></div>
        </div>
    </div>



    <div class='ItemsStateComponent' >
        <div class='H-ItemsStateComponent' >
        <span class='NameState' >Total consultations</span>
        </div>
        <div class='C-ItemsStateComponent' >
        <div class='T-ItemsStateComponent' >{{$totalconsultations}}</div>
        <div class='I-ItemsStateComponent bg-success  '><i class="fa-solid  text-light fa-user"></i></div>
        </div>
    </div>


    <div class='ItemsStateComponent' >
        <div class='H-ItemsStateComponent' >
        <span class='NameState' >Total medecin</span>
        </div>
        <div class='C-ItemsStateComponent' >
        <div class='T-ItemsStateComponent' >{{$totalmedecin}}</div>
        <div class='I-ItemsStateComponent  bg-danger '  ><i class="fa-solid  text-light  fa-user"></i></div>
        </div>
    </div>



    <div class='ItemsStateComponent' >
        <div class='H-ItemsStateComponent' >
        <span class='NameState' >Total infermiere</span>
        </div>
        <div class='C-ItemsStateComponent' >
        <div class='T-ItemsStateComponent' >{{$totalinfermiere}}</div>
        <div class='I-ItemsStateComponent bg-primary '  ><i class="fa-solid text-light fa-user"></i></div>
        </div>
    </div>


    <div class='ItemsStateComponent' >
        <div class='H-ItemsStateComponent' >
        <span class='NameState' >Total asistant</span>
        </div>
        <div class='C-ItemsStateComponent' >
        <div class='T-ItemsStateComponent' >{{$totalasistant}}</div>
        <div class='I-ItemsStateComponent bg-primary '  ><i class="fa-solid text-light fa-user"></i></div>
        </div>
    </div>

    <div class='ItemsStateComponent' >
        <div class='H-ItemsStateComponent' >
        <span class='NameState' >Total Other Employe</span>
        </div>
        <div class='C-ItemsStateComponent' >
        <div class='T-ItemsStateComponent' >{{$totalotherEmploye}}</div>
        <div class='I-ItemsStateComponent bg-primary '  ><i class="fa-solid text-light fa-user"></i></div>
        </div>
    </div>


</div>


    <canvas id="consultationsChart"  style='background-color:#fff;border-radius:10px' width="400" height="200"></canvas>

    <script>
        var data = @json($data);

        var labels = data.map(function(item) {
            return item.month;
        });

        var counts = data.map(function(item) {
            return item.count;
        });

        var colors = [
            '#3498db', // Light Blue
    '#2980b9', // Medium Blue
    '#1f618d', // Dark Blue
    '#2ecc71', // Light Green
    '#27ae60', // Medium Green
    '#229954', // Dark Green
    '#3498db', // Blue (Positive)
    '#e74c3c', // Red (Negative)
    '#3498db', // Light Blue
    '#2980b9', // Medium Blue
    '#1f618d', // Dark Blue
    '#3498db', // Blue (Category A)
    '#e67e22', // Orange (Category B)
    '#2ecc71', // Green (Category C)
    '#9b59b6', // Purple (Category D)
        ];

        var backgroundColors = colors.slice(0, data.length);

        var ctx = document.getElementById('consultationsChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Consultations Count',
                    data: counts,
                    backgroundColor: backgroundColors,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Count'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        }
                    }
                }
            }
        });
    </script>
@endsection
