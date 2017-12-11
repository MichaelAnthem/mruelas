$(document).ready(function(){
    $('#submit').click(function(event){
        event.preventDefault();
        $.ajax({
            type: "get",
            url: "//cst352-michaelanthem.c9users.io/finalproject/hotelSearch.php",
            // dataType: "json",
            data: {"title": $('#title').val()},
            success: function(data, status) {
                alert ("Success:" + data);   // display what feedback from server php code
                var records = JSON.parse(data);
                // alert ("Title: " + records['title']);
                $('#title').val(records['title']);
                // alert ("Cost: " + records['year']);
                $('#year').text(records['cost']);
                // alert ("Category: " + records['rated']);
                $('#rated').text(records['rated']);
                // alert ("CategoryId: " + records['category']);
                $('#category').text(records['category']);
                
            },
            complete: function(data, status) {
                // alert ("Complete:" + status);
            }
            
        });    
            
    });
});
