<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $nombreApellido = $_POST['nombreApellido'];
    $fechaActual = date("Y-m-d");
    $edad = date_diff(date_create($fechaNacimiento), date_create($fechaActual))->y;
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <title>Cálculo de Edad</title>
</head>
<body>
    <section class="hero is-primary">
        <div class="hero-body">
        <h1 class="title">Formulario de datos personales</h1>
        <p class="subtitle">Ingrese sus datos personales para calcular su edad.</p>
        </div>
    </section>

    <section class="section column is-two-fifths">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <div class="field">
            <label class="label" for="nombre">Nombre y Apellido</label>
            <input class="input" type="text" id="nombreApellido" name="nombreApellido" required>
        </div>

        <div class="field">
            <label class="label" for="fecha_nacimiento">Fecha de nacimiento</label>
            <input class="input" type="date" id="fechaNacimiento" name="fechaNacimiento" required>
        </div>

        <div class="field">
            <label class="label" for="nacionalidad">Nacionalidad</label>
            <input class="input" type="text" id="nacionalidad" name="nacionalidad" required>
        </div>

        <div class="field">
            <label class="label" for="profesion">Profesión</label>
            <input class="input" type="text" id="profesion" name="profesion" required>
        </div>
        
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-primary" type="submit">Enviar</button>
            </div>
        </div>

        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<p class='mt-4 is-size-4'>" . $nombreApellido . 
            " tiene <span class='has-text-weight-bold is-size-2'>" . $edad . "</span> años.</p>";
        }
        ?>
    </section>

</body>
</html>