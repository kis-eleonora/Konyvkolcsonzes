<?php

$conn = new mysqli("localhost", "root", "", "konyvkolcsonzes");

if ($conn->errno > 0) {
    die("Adatbázis nem elérhető!");
}

$conn-> set_charset("utf-8");


