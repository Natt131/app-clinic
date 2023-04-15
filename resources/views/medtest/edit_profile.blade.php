@extends('layouts.master')
@section(('styles'))
@endsection
@section('content')
    <div class="bg-gray" style="padding-top: 20px !important; padding-bottom: 20px !important;">
       <form  method="post"  enctype="multipart/form-data">
        @csrf
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="150px" src="/public/avatars/default.jpg">
                        <input type="file" name="file" id="inputfile">
                        <span class="font-weight-bold"> </span>
                    </div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="row mt-3">
                            <div class="col-md-12 form-group"><label class="labels">Новый email: </label>
                                <input type="text" name="email" class="form-control" placeholder="enter new email" value="">
                            </div>
                            <div class="col-md-12 form-group"><label  for="city-select" class="labels">Город: </label>
                                <select class="form-control input-lg" name="id_сity" id="id_city" data-dependent="city" onclick="getClinic();">
                                    <option value="">-- Выберите город --</option>
                                    @foreach ($cities as $city)
                                        <option class="dynamic" value={{$city->id}}>{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <p></p>
                            <div class="col-md-12 form-group"><label  for="clinic-select" class="labels">Клиника: </label>
                                <select class="form-control input-lg dynamic" name="clinic" id="clinic" data-dependent="clinics">
                                </select>
                            </div>

                            {{ csrf_field() }}
                          <button class="btn medica-btn mt-15">Сохранить изменения</button>
                        </div>

                   </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 py-5">
                        <div class="line">

                                <div class="col-md-12"><label class="labels">Сведения об образовании**: </label>
                                    <input type="text" name="education" class="form-control" placeholder="дополнительное образование.." value="">
                                </div>

                                <div class="col-md-12"><label class="labels">Сведения о повышении квалификации, курсах(вводятся через запятую): </label>
                                    <input type="text" name="certificate" class="form-control" placeholder="сертификаты.." value="">
                                </div>

                                <div class="col-md-12"><label class="labels">Дополнительные сведения о врачебной специализации: </label>
                                    <input type="text" name="spec" class="form-control" placeholder="специализация.." value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
       </form>
    </div>

    </div>
        @endsection
        <!-- ***** Partners Area End ***** -->
        @section(('scripts'))
            <script>
                var clinic= $('select[name="clinic"]');
                var s='<option value="">---Выберите клинику--</option>';
                clinic.change(function(){
                    var id = $(this).val();
                    if(!id){
                        clinic.attr('disabled','disabled')
                    }
                })

                function getClinic(){
                    s='<option value="">---Выберите клинику--</option>';
                    $.ajax({
                        url: window.location.protocol + '//' + window.location.host + '/getClinic?select=' + $('.dynamic').val()||[],
                        method:"GET",
                        success:function(result)
                        {
                            var jsonData = JSON.parse(result);
                            for (var i = 0; i < jsonData.length; i++) {
                                var counter = jsonData[i];
                                s +='<option value="'+counter['id']+'">'+counter['name']+'</option>'
                              //  console.log(counter['name']);
                                clinic.html(s);
                            }
                              //alert(result);
                        }
                    })
                }
            </script>
        @endsection
