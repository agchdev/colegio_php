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
            echo "<form class='calificar' action='index.php?action=calificar.php' method='post'>";
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
            echo "<h2>" . $aluNom . " - " . $aluDni . "</h2>";
            echo "<form action='index?action=calificar' method='post'>";
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
                    echo "<td> <input type='number' name='notaNueva' value='" . $alu["nota"] . " disabled'> </td>";
                    echo "</tr>";
                }
                echo "</table>";
            echo "</form>";
        }else{
            echo "<h2>NO HAY UN ALUMNO SELECCIONADO</h2>";
        }
        ?>
            
    </section>
    <script>
        const buscador = document.querySelector("#buscador");
        const alums = document.querySelectorAll(".btnCalificar");
        let alumnos = document.querySelectorAll("#nombresAlum");
        const form = document.querySelectorAll(".calificar");

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

    </script>
</main>
</body>
</html>