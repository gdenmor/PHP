<?php

    $cadena=new PDO("mysql:host=localhost;dbname=proyecto",'root','Root');

    $version=$cadena->getAttribute(PDO::ATTR_SERVER_VERSION);

    echo $version;


?>