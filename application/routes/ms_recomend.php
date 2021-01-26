<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// Route Khusus Rekomendasi

// Master Rekomendasi
$route['ms_rekom/getRekom/(:any)'] = 'MS_RecommenderController/getRecomend/$1';
$route['ms_rekom'] = 'MS_RecommenderController/index';
$route['act_rekom'] = 'MS_RecommenderController/index2';