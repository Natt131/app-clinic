$(function () {
    var loader = $('#loader'),
        city = $('select[name="city"]'),
        clinic = $('select[name="clinic"]');

    loader.hide();
    clinic.attr('disabled','disabled')

    clinic.change(function(){
        var id = $(this).val();
        if(!id){
            clinic.attr('disabled','disabled')
        }
    })

    city.change(function() {
        var id= $(this).val();
        if(id){
            loader.show();
            clinic.attr('disabled','disabled')

        //     $.get('{{url('/edit_profile-data?city_id=')}}'+id)
        //         .success(function(data){
        //             var s='<option value="">---select--</option>';
        //             data.forEach(function(row){
        //                 s +='<option value="'+row.id+'">'+row.name+'</option>'
        //             })
        //             clinic.removeAttr('disabled')
        //             clinic.html(s);
        //             loader.hide();
        //         })
         }

    })
})
