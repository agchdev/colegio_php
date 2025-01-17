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
        echo "<form class='calificar' action='index?action=calificar.php' method='post'>"; 
        foreach ($alumnos as $alumno) {
            echo "<div class='viñetaAlum btnCalificar'>";
            echo "<div class='avatar'><img class='avatarIMG' src='img/avatar.png' alt='alumno'></div>";
            echo "<input type='hidden' name='alumno' value='" . $alumno["id"] . "'>"; 
            echo "<div>
                <input id='nombresAlum' style='background: none; color: white; border: none; font-weight: bolder;' type='submit' value='" . $alumno["nombre"] . "'>
                <p>" . $alumno["dni"] . "</p>
                </div>"; 
            echo "</div>";
        };
        echo "</form>"; 
        ?>
    </section>
    <section class="modal calificacion">
        <h2>Calificacion</h2>
        <table>
            <?php
            echo "<form action='index?action=calificar.php' method='post'>";
            foreach ($asignaturas as $asignatura) {
                echo "<tr>";
                echo "<td><input type='hidden' name='calificacion' value='" . $asignatura["id"] . "'></td>";
                echo "<td>" . $calificacion["nombre"] . "</td>";
                echo "</tr>";
            }
            echo "</form>";
            ?>
        </table>
            
    </section>
    <script>
        const buscador = document.querySelector("#buscador");
        buscador.addEventListener("input", (e) => {
            let palabra = e.target.value;
            let alumnos = document.querySelectorAll("#nombresAlum");
            alumnos.forEach(alumno => {
                if (alumno.value.toLowerCase().includes(palabra.toLowerCase())) {
                    alumno.parentElement.parentElement.style.display = "flex";
                } else {
                    alumno.parentElement.parentElement.style.display = "none";
                }
            })
        })
    </script>
</main>
</body>
</html>