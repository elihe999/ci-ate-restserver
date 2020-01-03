<?php

header("Connection: Keep-Alive");
header("Proxy-Connection: Keep-Alive");
set_time_limit(0);

if (file_exists('./setup.lock')) {
    echo 'System seem been setup before' . "<br>";
}

?>
