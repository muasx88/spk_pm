<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'pages/home';
$route['perumahan'] = 'pages/perumahan';
$route['about'] = 'pages/about';

// admin
$route['admin'] = 'admin/dashboard';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
