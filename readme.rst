## Installation

> composer require chriskacerguis/codeigniter-restserver

$chown www:www application/controllers/*
$chown www:www public/
$chmod 755 public    // make sure is writeable

open localhost:xx/index.php/install/
















rest.php at application/config

use chriskacerguis\RestServer\RestController;

class Example extends RestController

