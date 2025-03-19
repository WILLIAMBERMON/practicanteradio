<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

$tnsname = "(DESCRIPTION = 
        (ADDRESS = 
        (PROTOCOL = TCP)
        (HOST = 1)
        (PORT = 1)) 
        (CONNECT_DATA = 
        (SERVER = DEDICATED) 
        (SERVICE_NAME = 1)))";

$config['database2']['hostname'] = $tnsname;
$config['database2']['username'] = '1';
$config['database2']['password'] = '1';
$config['database2']['database'] = '1';
$config['database2']['char_set'] = 'utf8';