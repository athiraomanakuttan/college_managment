getCollegeDratails();
function getCollegeDratails()
{
    $.ajax({
        type: "POST",
        url: "../api/rest.php",
        data:{'action':'getcollegedata'},
        dataType: "json",
        encode: true,
    }).done(function (data) {
        if(data.status)
        {
            var i=0;
            var college_name =data.data.rows;
            for (var i = 0; i < 1; i++) {
                $('#profile_college').html(college_name[i].college_registration_name);
            }
           
        }
        else
        {
            alert(data.message)
        }
    });
}