//$(document).ready(function() {
    alert("hhhh");

  //  $("#send").onclick(function(event) {
        function s (event) {
          //  alert("hhhh");
            // Отменяем стандартное поведение формы.
           // event.preventDefault();

            // Собираем данные с формы.
            // `_token` также будет здесь.
            var data = $('meta[name="csrf-token"]').attr('content');//$("#chatComplain").serializeArray();
//alert(data);
            $.ajaxSetup({
                headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Отправляем запрос.
            $.ajax({
                type: "POST",
                url: '/complain',
                data: {
                    _token: '{{csrf_token()}}',
                   // _token: @json(csrf_token()),
                    "id": "ssssss"
                },
                dataType: 'json',
                encode: true,
                success: function(data) {
                    alert(data.message);
                },
                error: function(response) {
                    alert('Ошибка отправки сообщения');

                    var json = response.responseJSON

                    // Обработка ошибок валидации.
                    if(422 === response.status) {
                        var errors = json.errors;
alert (422);
                        for (var error in errors) {
                            console.log(error, errors[error][0])
                        }
                    } else {
                        console.log(json.message)
                    }
                }
            })
        }
    //});//)
//});


/*
alert('js is here!');
function send() {
   // e.preventDefault();

    $.get('/complain',  function(response) {
        console.log(response);
    });
    /!*var value = "haha";
    var id = $('#reason option:selected').text();
    url = "{{url('/complain')}}" + "/" + id;
    console.log(url);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //console.log($('meta[name="csrf-token"]').attr('content'));
    $.ajax({
        /!* the route pointing to the post function *!/
        url:"/complain",
        type: 'get',
        /!* send the csrf-token and the input to the controller *!/
        data: {request: value},
        dataType: 'JSON',
        /!* remind that 'data' is the response of the AjaxController *!/
        success: function (data) {
            console.log(data)
            //$('.writeinfo').append(data.msg);
            //$('#ruleRow'+id).remove();
        },
        error: function () {
            alert('{{csrf_token()}}' + " xnjjj");
        }
    });
    return false;*!/
}
*/
