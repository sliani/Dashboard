<?php

$pdo = new PDO('mysql:dbname=altran;host=localhost', 'root', '');

/* A chaque fois qu'il y a une erreur PDO renvoie une exception !
Car PDO par défaut ne dis rien */
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
