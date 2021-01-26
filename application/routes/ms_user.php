<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// Route Khusus User

// Master User
$route['ms_user/ajax_select2'] = 'MS_UserController/ajax_select2';
$route['ms_user/ajax'] = 'MS_UserController/ajax';
$route['ms_user'] = 'MS_UserController/index';
$route['ms_user/store'] = 'MS_UserController/store';
$route['ms_user/edit/(:any)'] = 'MS_UserController/edit/$1';
$route['ms_user/update/(:any)'] = 'MS_UserController/update/$1';
$route['ms_user/destroy/(:any)'] = 'MS_UserController/destroy/$1';

// Role
$route['role/ajax_select2'] = 'MS_UserController/role_select2';