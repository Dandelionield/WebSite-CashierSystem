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
                <a href="php/signOff.php">
                    <button type="button">Cerrar sesión</button>
                </a>
                <h5 style="margin-left:10px;">
                    ${user.nickname}
                </h5>
        `);
    },
    error: function(error){
        alert("error");
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