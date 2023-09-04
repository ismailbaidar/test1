<div class="modal fade" id="ajouterconsultation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">



        <form method="POST" enctype="multipart/form-data"  action="{{route('Consultations.store')}}" class="AjouterForm p-2  m-3" style="background-color: #fff;border-radius:5px" >

            @csrf
                <div class="row">

                    <div class="col-6">

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Numéro Consultation</label>
                            <div class="d-flex" >
                                <input required type="text"  name="NumeroConsultation" class="form-control" id="exampleFormControlInput1" >
                                <button  type="button" class="btn btn-success"  id="generateAjouter" >
                                    <i class="fa-solid fa-lightbulb"></i>
                                </button>
                            </div>
                        </div>
                    </div>
            <div class="col-6">

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Patient</label>
                    <select required name="patient_id"  id="patientAjouter" class="form-select " aria-label=".form-select-lg example">
                        <option value="" selected>Choisir Patient</option>
                        @foreach ($patients as $patient )
                        <option value="{{$patient->id}}">{{$patient->Nom}} - {{$patient->Prenom}} - {{$patient->Numero}} </option>
                        @endforeach
                      </select>
                </div>
            </div>

            <div class="col-6">

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Object</label>
                    <input required name="Objet" class="form-control" id="exampleTextarea" />
                </div>
            </div>

            <div class="col-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Observation</label>
                    <input required name="Observation" class="form-control" id="exampleTextarea" />
                </div>
            </div>

                  <div class="col-6">

                      <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Type consultation</label>
                          <select required name="TypeCosultation" id="operationAjouter" class="form-select " aria-label=".form-select-lg example">
                            <option selected>Choisir Patient</option>
                            <option value="Consultationgénéral ">Consultation général  </option>
                            <option value="operation ">Une Opération  </option>
                          </select>
                        </div>
                </div>


                    <div class="col-6 hide  pmedcinAjouter ">
                        <label for="exampleFormControlInput1" class="form-label">Date </label>
                        <input required id="dateconsul"  type="date" name="Date_consultation"  required class="form-control" id="exampleFormControlInput1" >
                    </div>

                    <div class="col-6 hide pdate">
                        <label for="exampleFormControlInput1" class="form-label">Time</label>
                    <select required class="form-select "  name="time" aria-label=".form-select-lg example">
                        <option selected>Choisir Time</option>
                      </select>
                     </div>


                    <div class="col-12 operationInputs hide">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Equipe</label>
                            <div class="search-wrapper">
                                <div class="selected">result</div>
                                <input type="text" class="search-field">
                                <ul class="result" style="height: 150px;
                                overflow-y: scroll;
                                padding-top: 190px;" ></ul>
                                <div class="selected-team ">

                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="col-6  operationInputs hide">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Bloc operation</label>
                            <select name="blocoperation_id" class="form-select " aria-label=".form-select-lg example">
                                <option selected>Choisir un Block</option>
                                @foreach ($blocs as $bloc )
                                <option value="{{$bloc->id}}"> - {{$bloc->id}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12 einfoAjouter ">

                    </div>

                    <div class="col-6 operationInputs hide">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Date de Debut</label>
                            <input  type="datetime-local" name="DateDebut"   class="form-control" id="exampleFormControlInput1" >
                        </div>
                    </div>

                    <div class="col-6 operationInputs hide">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Date de Fin</label>
                            <input  type="datetime-local" name="DateFin"   class="form-control" id="exampleFormControlInput1" >
                        </div>
                    </div>

                    <div class="mb-3 operationInputs hide">
                        <label for="exampleFormControlInput1" class="form-label">Operation observation</label>
                        <input name="ObservationOperation"  class="form-control" id="exampleTextarea" />
                    </div>

                </div>

                  <button type="submit" class="btn btn-danger ">Enregistrer</button>
                </form>





    </div>
</div>
</div>

<script>

    var equipes ={{ Js::from($equipes)}}
    var patients ={{ Js::from($patients)}}
    var patientselect = document.querySelector('#patientAjouter')
    var inputsdate = document.querySelectorAll('.pmedcinAjouter')
    var pselect;
    let result = document.querySelector(".result")
    let searchField = document.querySelector(".search-field")
    let searchwrapper = document.querySelector(".search-wrapper")
    let resultItems = document.querySelectorAll(".role")
    let info = [{role:"Medecin",employees:[{"id":1,'name':"ibn ta2hiliya"},{"id":1,'name':"ibn ta2hiliya"},{"id":1,'name':"ibn ta2hiliya"},{"id":1,'name':"ibn ta2hiliya"},{"id":1,'name':"ibn ta2hiliya"},{"id":2,"name":'kho ibn ta2hiliya'}]},{role:"Assistant",employees:[{id:3,name:"ibn ta2hiliya"},{id:4,name:'some'}]}]


    draw();
    console.log(info)

    searchField.addEventListener("focus",()=>{
        console.log("hello")
        result.style.display = "flex"
    })

    document.addEventListener('click',(e)=>{
        console.log(e.target.closest('div'))
        if(!e.target.closest('div').classList.contains('search-wrapper')){
            result.blur();
            result.style.display='none'
        }
    })

    searchwrapper.addEventListener('click',()=>{
        searchField.focus();
    })

    result.addEventListener("click",()=>{
        console.log("bye")
        result.style.display = "flex"
        searchField.focus()
    })




    resultItems.forEach(resultItem=>{
        resultItem.addEventListener("click",()=>{
            console.log(resultItem.textContent)
        })
    })

    searchField.addEventListener('change',(item)=>{
      let p= info.map(e=>e.employees.filter(i=>i.name.includes(item.target.value)))
    })



    patientselect.onchange=(e)=>{
        var idp = e.target.options[e.target.selectedIndex].value

        if(idp){
             pselect = patients.find(e=>e.id==idp)
            inputsdate.forEach(item=>item.classList.remove('hide'))
        }
        else{
            inputsdate.forEach(item=>item.classList.add('hide'))
        }
    }


    function draw(){

        
        info.forEach(role=>{
        console.log(role.role)
        result.innerHTML += `<li class="role">
                                        <span class="role-name">${role.role}</span>

                                        <ul class="names">
                                                `+
                                                role.employees.map(e=>"<li class='name'>"+e.name+"</li>").join("")
                                                +`
                                        </ul>
                                        
                                        </li>`
                                    })
    }





    var btngenerer = document.querySelector('#generateAjouter')
    btngenerer.onclick=(e)=>{
        var data = ['A','B','C',1,2,3,'D','E','F','H','J',5,6,'K','L','M','V',4,,7,9]
        var generatedvalue = data.sort(()=>0.75-Math.random()).splice(0,10).join('')
        var input = e.target.closest('div').firstElementChild
        input.value=generatedvalue
    }


    var operation = document.querySelector('#operationAjouter');

    operation.onchange=(e=>{
        console.log(e.target.options[e.target.selectedIndex].value)
        var operationsInputs=document.querySelectorAll('.operationInputs')
        if(e.target.options[e.target.selectedIndex].value.trim()=='operation'){
            operationsInputs.forEach(operation=>{operation.classList.remove('hide')
        operation.setAttribute('required','required')
        })

        }
        else{
        operationsInputs.forEach(operation=>{operation.classList.add('hide')
        operation.removeAttribute('required');
    })
        }
    })


    // var equipe = document.querySelector('#equipeAjouter')
    // equipe.onchange=(e=>{
    //     var idequipe = e.target.options[e.target.selectedIndex].value.trim()
    //    var result =  equipes.find(eq=>eq.id==idequipe)
    //    var targetdiv = e.target.closest('div').nextElementSibling
    //    var medcin=[];
    //    var infermiere=[];
    //    var einfo = document.querySelector('.einfoAjouter')
    //     result.equipemember.forEach(e=>{
    //     if(e?.medecin){
    //         medcin.push(e.medecin)
    //     }
    //     if(e?.infermiere){
    //         infermiere.push(e.infermiere)
    //     }
    //    } )
    //    einfo.innerHTML=`
    //    <textarea readonly class='form-control' > ${medcin.map(e=>`- medcin : ${ e.Matricule } ${ e.Nom } `)} </textarea>
    //    `

    // })



</script>
<script src="{{asset('js/CheckDate.js')}}"></script>
