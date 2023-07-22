<?php

$autoload = spl_autoload_register(function($classes){
    require "public/page/conf/$classes.class.php";
});
