<?php
foreach ($_COOKIE['taocauhoi'] as $name => $value) {
    setcookie("taocauhoi[".$name."]", null, -1);
}
setcookie('num', null, -1);
?>