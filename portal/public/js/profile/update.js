
$(document).ready(function() 
{
    console.log("gsfdgsfgs");
    $("#profile_upadate").submit(function(e) {
        e.preventDefault(); 
    console.log("gsfdgsfgs");
        
        var formdata = new FormData(this); 
        
        $.ajax({
            url: 'profile_update', 
            method: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(response) 
            {
                console.log(response);
                var successAlert = '<div class="alert alert-success" role="alert">' + response.message + '</div>';
               $("#profile_update_message").html(successAlert);
               setTimeout(function() {
                location.reload(); 
            }, 3000);
            },
            error: function(xhr, status, error) 
            {
                console.log(xhr.responseText);
            }
        });
    });

    
});

$(document).ready(function() 
{
  
$('#change_password_form').submit(function(e) {
    e.preventDefault(); // Prevent default form submission

    var formdata = new FormData(this);

    $.ajax({
        url: 'update_password',
        method: 'POST',
        data: formdata,
        processData: false, // Important for FormData
        contentType: false, // Important for FormData
        success: function(response) {
            console.log(response);
            // Handle success response here
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            $('#change_password_message').html('<p style="color: red;">Failed to update password.</p>');
        }
    });
});
;
});
