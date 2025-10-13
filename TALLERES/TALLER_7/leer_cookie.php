<?php

if (isset($_COOKIE['usuario'])) {
    echo "bienvenido ,".htmlspecialchars($_COOKIE['usuario']."!");
}else {
    echo "No se ha encontrado la cookie'usuario'. ";
}
?>