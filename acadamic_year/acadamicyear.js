getacadamicyear();
///////////////
// ay_tab = $('#ay_tab').DataTable({
//     "datSrc": "data",
//     "columnDefs": [
//         { "orderable": false, "targets": [-1, -2] },
//         { "width": "20px", "targets": [-1, -2] }
//     ],
//     "columns": [
//         { "data":"acadamic_year_name" }
//         // { "data": "indtsp" },
//         // { "data": "indid" },
//         // {
//         //     "data": null,
//         //     "render": function (obj) {
//         //         return '<a id ="dele_sender_id_' + obj.indid + '" onclick="deleteIndustry(' + obj.indid + ')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>'
//         //     }

//         // },
//         // {
//         //     "data": null,
//         //     "render": function (obj) {
//         //         if (obj.indstat == 2)
//         //             return '<a id ="disable_sender_id_' + obj.indid + '" onclick="enableindustry(' + obj.indid + ')"><i class="fa fa-toggle-off" aria-hidden="true"></i></a>';
//         //         else if (obj.indstat == 1)
//         //             return '<a id ="enable_sender_id_' + obj.indid + '" onclick="disableindustry(' + obj.indid + ')"><i class="fa fa-toggle-on" aria-hidden="true"></i></a>';
//         //         else if (obj.indstat == 6)
//         //             return '<a id ="not_approved_sender_id_' + obj.indid + '"></i><i class="fa fa-pause" aria-hidden="true"></i></a>';
//         //         else if (obj.indstat == 7)
//         //             return '<a id ="rejected_sender_id_' + obj.indid + '"><i class="fa fa-ban" aria-hidden="true"></i></a>';
//         //     }
//         // }
//     ]


// });
////////////////// 
    function getacadamicyear() {
     $('.hi').append('athira');
        $.ajax({
            type: "POST",
            url: "../api/rest.php",
            data: { 'action': 'GetAcadamicYear' },
            dataType: "json",
            encode: true,
        }).done(function (datas) {
            if(datas.status)
            {
                $(document).ready(function(){
                $('#table_body').html(datas.data);
                });
                
            }
            else
            {  }
        });
}
function AddAcadamicYear()
{
    var validation = validationacadamic();
    if (validation)
    {
        if($('#active_acadamic_year').is(':checked'))
        {
            var ac_status = 1;
        }
        else{ var ac_status =0;}
        $.ajax({
            type:"POST",
            url:'../api/process.php',
            dataType:'json',
            data: {
                'action':'AddAcadamicYear',
                'data':{
            acadamic_name: $('#acadamic_name').val(),
            acadamic_desc: $('#acadamic_desc').val(),
            acadamic_start_date: $('#acadamic_start_date').val(),
            acadamic_end_date: $('#acadamic_end_date').val(),
            acadamic_status: ac_status}
                  },
            success:function(result)
            {
                if(result.status)
                {
                    alert("acadamic year added succesfully");
                    
                }
                else{
                    alert(result.message);
                }
            }      
        });
        getacadamicyear();
    }
}
function validationacadamic()
{
    var acadamic_name = $('#acadamic_name').val();
    var acadamic_start_date = $('#acadamic_start_date').val();
    var acadamic_end_date = $('#acadamic_end_date').val();
    var dateFormat ='/^(?=\d)(?:(?:31(?!.(?:0?[2469]|11))|(?:30|29)(?!.0?2)|29(?=.0?2.(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00)))(?:\x20|$))|(?:2[0-8]|1\d|0?[1-9]))([-.\/])(?:1[012]|0?[1-9])\1(?:1[6-9]|[2-9]\d)?\d\d(?:(?=\x20\d)\x20|$))?(((0?[1-9]|1[012])(:[0-5]\d){0,2}(\x20[AP]M))|([01]\d|2[0-3])(:[0-5]\d){1,2})?$/';
    if (acadamic_name == '' || acadamic_start_date == '' || acadamic_end_date=='')
    { alert('Fill all required fields');
        return false; }
    return true; 

}
function deleteAcadamicyr() {
    $('.hi').append('athira');
       $.ajax({
           type: "POST",
           url: "../api/process.php",
           data: { 'action': 'DeleteAcadamicYear' },
           dataType: "json",
           encode: true,
       }).done(function (datas) {
           if(datas.status)
           {
               $(document).ready(function(){
               $('#table_body').html(datas.data);
               });
               
           }
           else
           {  }
       });
}
