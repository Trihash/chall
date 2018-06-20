<?php

setcookie("kirua_logged_in",base64_encode("no"));
echo base64_decode($_COOKIE["kirua_logged_in"]);
if(!isset($_COOKIE["kirua_logged_in"]))
{

}
?>
