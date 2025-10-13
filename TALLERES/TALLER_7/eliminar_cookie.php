<?php
//para eliminar una cookie la resstablecemos con una fecha de expiracion en el pasado.
setcookie("usuario", "", time() -3600, "/");
 echo "cookie 'usuario' eliminada.";
?>