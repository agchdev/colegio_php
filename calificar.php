<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body id="bodyCalificar">
<header id="headerCalificar">
    <h1>ZONA DE CALIFICACION DE ALUMNOS</h1>
</header>
<main class="sectionModificar">
    <section class="modal alumnos">
        <h2>Alumnos</h2>
        <input type="text" id="buscador" placeholder="Buscar alumno">
        <?php
         
        foreach ($alumnos as $alumno) {
            echo "<form class='calificar' action='index.php?action=calificar' method='post'>";
            echo "<div class='viñetaAlum btnCalificar'>";
            echo "<div class='avatar'><img class='avatarIMG' src='img/avatar.png' alt='alumno'></div>";
            echo "<input type='hidden' name='alumno' value='" . $alumno["id"] . "'>"; 
            echo "<input type='hidden' name='dniAlum' value='" . $alumno["dni"] . "'>"; 
            echo "<input type='hidden' name='nomAlum' value='" . $alumno["nombre"] . "'>"; 
            echo "<div>
                <p id='nombresAlum' style='background: none; color: white; border: none; font-weight: bolder;'>" . $alumno["nombre"] . "</p>
                <p class='pDni'>" . $alumno["dni"] . "</p>
                </div>"; 
            echo "</div>";
            echo "</form>"; 
        };
        ?>
    </section>
    <section class="modal calificacion">
        <h2>Calificacion</h2>
        <?php
        if(isset($aluCalificaciones)){
            echo "<div class='perfilAlum'>
                    <div><img class='avatarIMG' src='img/avatar.png' alt='alumno'></div>
                    <div>
                        <h2>" . $aluNom . "</h2>
                        <h3>" . $aluDni . "</h3>
                    </div>
                </div>";
            echo "<form id='formCalificar' action='index?action=calificador' method='post'>";
                echo "<table class='tablaCalificar'>";
                echo "<tr>";
                echo "<th>Curso</th>";
                echo "<th>Modulo</th>";
                echo "<th>Asignatura</th>";
                echo "<th>Nota</th>";
                echo "</tr>";
                foreach ($aluCalificaciones as $alu) {
                    echo "<tr>";
                    echo "<td>" . $alu["curso"] . "</td>";
                    echo "<td>" . $alu["modulo"] . "</td>";
                    echo "<td>" . $alu["asignatura"] . "</td>";
                    echo "<td> <input class='nota' type='number' name='notaNueva' value='" . $alu["nota"] . "'> </td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "<input style='margin-top: 1rem;' type='submit' name='calificar' class='btn' value='GUARDAR'>";
            echo "</form>";
        }else{
            echo "<h2>NO HAY UN ALUMNO SELECCIONADO</h2>";
        }
        ?>
    </section>
    <script>
        const buscador = document.querySelector("#buscador");
        const alums = document.querySelectorAll(".btnCalificar");
        const form = document.querySelectorAll(".calificar");
        const calificacion =document.querySelector(".calificacion");
        const notas =document.querySelectorAll(".nota");
        const formCalificar = document.querySelector("#formCalificar");
        let alumnos = document.querySelectorAll("#nombresAlum");

        buscador.addEventListener("input", (e) => {
            let palabra = e.target.value;
            alumnos = document.querySelectorAll("#nombresAlum");
            alumnos.forEach(alumno => {
                if (alumno.value.toLowerCase().includes(palabra.toLowerCase())) {
                    alumno.parentElement.parentElement.style.display = "flex";
                } else {
                    alumno.parentElement.parentElement.style.display = "none";
                }
            })
        })

        form.forEach(alum => {
            alum.addEventListener("click", () => {
                alum.submit();
            })
        })

        console.log(notas);

        notas.forEach(nota => {
            nota.addEventListener("click", () => {
                console.log(nota)
                console.log("click");
                nota.disabled = false;
            })
        })
        notas.forEach(nota => {
            nota.addEventListener("change", () => {
                console.log("cambio")
                // formCalificar.submit();
            })
        })

        let r = Math.floor(Math.random() * 255);
        let g = Math.floor(Math.random() * 255);
        let b = Math.floor(Math.random() * 255);
        let color = "rgb(" + r + "," + g + "," + b + ")";
        calificacion.style.background = `linear-gradient(0deg, rgba(18,18,18,1) 65%, ${color} 100%)`;

    </script>
</main>
</body>
</html>