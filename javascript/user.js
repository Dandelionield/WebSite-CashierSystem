$.ajax({
    url: "php/logged.php",
    type: "GET",
    dataType: "json",
    success: function(user){
        $("#nickname").val(user.nickname);
        $("#email").val(user.email);
        $("#password").val(user.password);
    },
    error: function(error){
        alert("error");
    }
});