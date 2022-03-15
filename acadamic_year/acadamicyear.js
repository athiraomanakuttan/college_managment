$(document).ready(function(){
    getacadamicyear();
    function getacadamicyear() {
        

                $.post("../api/rest.php", { action: "GetAcadamicYear"}, function (result) 
                {
                    // data = JSON.parse(result);
                    console.log("athira omanakuttan");
                    console.log(result);
                    alert(result);
                    // console.log(data);
                    // industry_tab.clear().draw();
                    // industry_tab.rows.add(data).draw();
                })

}

});