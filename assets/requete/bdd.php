<?php
// connection à la base de donnée
$bdd = new PDO ('mysql:host=localhost;dbname=formulaire', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
