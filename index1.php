<?php
if (!empty($_POST['submit'])) {
    $action = $_POST['submit'];
} else if (!empty($_GET['do'])) {
    $action = $_GET['do'];
} else {
    $action = "login";
}
if (is_file("controlador/controlador_" . $action . ".php")) {
    include_once("controlador/controlador_" . $action . ".php");
} else {
    echo "Error 404 : Pagina no encontrada";
}
