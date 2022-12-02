<?php
// Répertoire courant (celui qui contient autoload.php)
spl_autoload_register(function ($className) {
    @include "classes/$className.php";
});
spl_autoload_register(function ($className) {
    @include "database/$className.php";
});
spl_autoload_register(function ($className) {
    @include "managers/$className.php";
});
spl_autoload_register(function ($className) {
    @include "phpMailer/$className.php";
});
