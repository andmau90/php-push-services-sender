<?php

include __DIR__.'/src/sender.php';

$sender = new Sender($argv);
$sender->send();
