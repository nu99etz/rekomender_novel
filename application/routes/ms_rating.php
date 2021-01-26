<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// Route Khusus Rating Master

// Master Rating Master
$route['ms_rating/ajax'] = 'MS_RatingController/ajax';
$route['ms_rating'] = 'MS_RatingController/index';
$route['ms_rating/destroy/(:any)'] = 'MS_RatingController/destroy/$1';

// Master Rating Master
$route['go_rating/ajax'] = 'ACT_RatingController/ajax';
$route['go_rating'] = 'ACT_RatingController/index';
$route['go_rating/destroy/(:any)'] = 'ACT_RatingController/destroy/$1';
$route['go_rating/store/(:any)/(:any)/(:any)'] = 'ACT_RatingController/goRating/$1/$2/$3';