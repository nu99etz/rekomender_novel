<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// Route Khusus Novel

// Master NOvel
$route['ms_novel/ajax_select2'] = 'MS_NovelController/ajax_select2';
$route['ms_novel/ajax'] = 'MS_NovelController/ajax';
$route['ms_novel'] = 'MS_NovelController/index';
$route['ms_novel/store'] = 'MS_NovelController/store';
$route['ms_novel/edit/(:any)'] = 'MS_NovelController/edit/$1';
$route['ms_novel/update/(:any)'] = 'MS_NovelController/update/$1';
$route['ms_novel/destroy/(:any)'] = 'MS_NovelController/destroy/$1';

// Master Kategori
$route['ms_kategori/ajax_select2'] = 'MS_KategoriController/ajax_select2';
$route['ms_kategori/ajax'] = 'MS_KategoriController/ajax';
$route['ms_kategori'] = 'MS_KategoriController/index';
$route['ms_kategori/store'] = 'MS_KategoriController/store';
$route['ms_kategori/edit/(:any)'] = 'MS_KategoriController/edit/$1';
$route['ms_kategori/update/(:any)'] = 'MS_KategoriController/update/$1';
$route['ms_kategori/destroy/(:any)'] = 'MS_KategoriController/destroy/$1';