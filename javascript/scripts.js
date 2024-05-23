let isOpen = false;

function openAside() {
    isOpen = !isOpen;
    let x = document.getElementById("aside");

    x.style = "animation: 0.5s " + (isOpen ? "slideIn" : "slideOut") + " forwards;";
}

$.ajax({
    url: "php/logged.php",
    type: "GET",
    dataType: "json",
    success: function(user){
        if(user != null) {
            if (user.admin == 1) {
                $("#aside").append(`
                    <a href="table.html">
                        <button type="button">Tabla</button>
                    </a>
                    <a href="newUpdate.html">
                        <button type="button">Agregar versión</button>
                    </a>
                `);
            }

            $("#login").remove();
            $("#register").remove();
            $("#header").append(`
                    <a href="user.html">
                        <button type="button">${user.nickname}</button>
                    </a>        
                    <a href="php/signOff.php">
                        <button type="button">Cerrar sesión</button>
                    </a>
            `);
        }
    },
    error: function(error){
        
    }
});

function signOff() {
    $.ajax({
        url: "php/signOff.php",
        type: "GET",
        dataType: "json",
        success: function(user){
            console.log(user.admin);
            if (user.admin == 1) {
                $("#aside").append(`
                    <a href="table.html">
                        <button type="button">Tabla</button>
                    </a>
                    <a href="newUpdate.html">
                        <button type="button">Agregar versión</button>
                    </a>
                `);
            }
    
            $("#header").append(`
                    <a href="table.html">
                        <button type="button">Cerrar sesión</button>
                    </a>
                    <h5>
                        ${user.nickname}
                    </h5>
            `);
        },
        error: function(error){
            alert("error");
        }
    });
}