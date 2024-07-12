<?php

setcookie("lang[1]", "PHP");
setcookie("lang[2]", "C#");
setcookie("lang[3]", "Java");

if (isset($_COOKIE["lang"])) {
    foreach ($_COOKIE["lang"] as $name => $value) {
        $name = htmlspecialchars($name);
        $value = htmlspecialchars($value);
        echo "$name. $value <br />";
    }
}
