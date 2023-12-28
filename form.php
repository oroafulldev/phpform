<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="./css/estilo.css">
    <title>Formulario de Contacto</title>
</head>
<body>
    <?php
        $nombre = $email = $mensaje = "";

        function val($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
    <section class="hero is-info">
        <div class="hero-body">
        <h1 class="title">Formulario de Contacto</h1>
        <p class="subtitle">Desde aquí hasta su email</p>
        </div>
    </section>

    <section class="section column is-two-fifths">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["nombre"])) {
                    // Se valida nombre vacío
                    echo "<span class='error ml-5 mt-4'>Error: Se requiere el nombre</span>";

                } elseif (!preg_match("/^[a-zA-Z ]*$/", $_POST["nombre"])) {
                    // Se valida que nombre sean solo letras
                    echo "<span class='error ml-5 mt-4'>Error: Name can only contain letters</span>";

                } elseif (empty($_POST["email"])) {
                    // Se valida que email esté vacío
                    echo "<span class='error ml-5 mt-4'>Error: Se requiere el email</span>";

                } elseif (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $_POST["email"])) {
                    // Se valida que nombre sean solo letras
                    echo "<span class='error ml-5 mt-4'>Error: Formato incorrecto de email</span>";

                } elseif (empty($_POST["mensaje"])) {
                    // Se valida que mensaje esté vacío
                    echo "<span class='error ml-5 mt-4'>Error: Se requiere el mensaje</span>";

                } else {
                    $nombre = val($_POST["nombre"]);
                    $email = val($_POST["email"]);
                    $mensaje = val($_POST["mensaje"]);
                    $asunto = "Nuevo mensaje de $nombre";

                    $emailFinal = mail($email, $asunto, $mensaje);
                    if($emailFinal) {
                        header("Location: form.php");
                        echo "<p class='has-background-success-light has-text-success has-text-weight-bold ml-5 p-4'>¡Mensaje enviado!</p>";
                        echo "<p class='mt-4 ml-6'><a href='http://localhost/php-email-form/form.php'>&lt;&lt;&nbsp;Volver</a></p>";
                        exit();
                    } else {
                        echo "<p class='has-background-danger-light has-text-danger has-text-weight-bold ml-5 p-4'>Error al enviar el mensaje</p>";
                        print_r($_POST);
                    }
                }
            }
        ?>
        
        <form class="mt-5" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <div class="field">
            <label class="label" for="nombre">Nombre:</label>
            <input class="input" type="text" name="nombre" id="nombre">
        </div>
        <div class="field">
            <label class="label" for="email">Email Destino:</label>
            <input class="input" type="email" name="email" id="email">
        </div>
        <div class="field">
            <label class="label" for="mensaje">Mensaje:</label>
            <textarea class="textarea" name="mensaje" id="mensaje"></textarea>
        </div>

        <div class="field is-grouped">
            <div class="control">
                <input class="button is-link" type="submit" value="Enviar">
            </div>
        </div>
        </form>

    </section>
</body>
</html>
