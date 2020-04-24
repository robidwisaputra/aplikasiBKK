<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'/libraries/PHPWord/src/PhpWord/Autoloader.php';
use phpOffice\phpWord\Autoloader as Autoloader;
Autoloader::register();
class word extends Autoloader {
}
?>