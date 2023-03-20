@extends('layouts.master')
@section(('styles'))
@endsection
@section('content')

    <form  method="post" enctype="multipart/form-data">
        @csrf
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="150px" src="../../../img/bg-img/d1.jpg">
                        <span class="font-weight-bold">   </span>
                    </div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Новый email: </label>
                                <input type="text" name="email" class="form-control" placeholder="enter new email" value="">
                            </div>
                            <div class="col-md-12 form-group"><label  for="city-select" class="labels">Город: </label>
                                <select class="form-control input-lg" name="id_сity" id="id_city" data-dependent="city" onchange="getClinic();">
                                    <option value="">-- Выберите город --</option>
                                    @foreach ($cities as $city)
                                        <option class="dynamic" value={{$city->id}}>{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <p></p>
                            <div class="col-md-12 form-group"><label  for="clinic-select" class="labels">Клиника: </label>
                                <select class="form-control input-lg dynamic" name="clinic" id="clinic" data-dependent="clinics">
                                    <option value="">-- Выберите клинику --</option>
{{--                                    <option>Выберите город</option>--}}
{{--                                    @foreach ($clinics as $clinic)--}}
{{--                                        <option value={{$clinic->id}}>{{$clinic->name}}</option>--}}
{{--                                    @endforeach--}}
                                </select>
                            </div>

                            {{ csrf_field() }}
                          <button class="btn medica-btn mt-15">Сохранить изменения</button>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </form>
        @endsection
        <!-- ***** Partners Area End ***** -->
        @section(('scripts'))
            <script>

                function displayVals() {
                    var singleValues = $( "#id_city" ).val();
                    // When using jQuery 3:
                    // var multipleValues = $( "#multiple" ).val();
                    $( "p" ).html( "<b>Single:</b> " + singleValues +
                        " <b>Multiple:</b> " );//+ singleValues.join( ", " )
                }
                $( "select" ).change( displayVals );
                displayVals();


                function getClinic(){
                    //alert(window.location.protocol + '//' + window.location.host + '/getClinic?select=' + $('.dynamic').val(),)
                    $.ajax({
                        url: window.location.protocol + '//' + window.location.host + '/getClinic?select=' + $('.dynamic').val()||[],
                        method:"GET",
                        success:function(result)
                        {


                            // //let results = JSON.encode(result)

                            // result.forEach((num) => {
                            //   //  const square = num * num
                            //     console.log('Квадрат числа равен: ' + num+'\n');
                            // })


                            //
                              alert(result.val());
                            for(result of res) {
                                alert(result[0]['name']);
                            };
                        }

                    })
                }
  /*
                $(document).ready(function(){
                    $('.dynamic').change(function(){
                        if($(this).val() != '')
                        {
                            var select = $(this).attr("id");
                           // console.log(select);
                            var value = $(this).val();
                            var dependent = $(this).data('dependent');
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: 'edit_profile',//"{{ route('ProfileDoctorController.fetch') }}",
                                method:"POST",
                                data:{select:select, value:value, _token:_token, dependent:dependent},
                                success:function(result)
                                {
                                    $('#'+dependent).html(result);
                                }

                            })
                        }
                    });


                    $('#id_city').change(function(){
                        $('#id_clinic').val('');
                    });

                });
                */
            </script>
        @endsection
