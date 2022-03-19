getCollegeDratails();
function getCollegeDratails()
{
    $.ajax({
        type: "POST",
        url: "../api/rest.php",
        dataType: "json",
        encode: true,
    }).done(function (data) {
    
    });
}