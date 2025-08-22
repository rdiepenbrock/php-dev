<?php

require "vendor/autoload.php";

use App\Storage;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

Storage::resolve()->put('new_file.txt', 'this is a new file.');
