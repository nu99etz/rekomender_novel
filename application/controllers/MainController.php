<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MainController extends CI_Controller
{

  public function __construct()
  {

    parent::__construct();

    if (!$this->session->userdata('logged')) {
      redirect('gate/');
    }
  }

  public function getLayout($layout, $data = null)
  {
    $data['sidebar'] = [
      'User' => [
        'name' => 'User',
        'icon' => 'fa fa-user',
        'url' => base_url() . 'ms_user'
      ],
      'Kategori' => [
        'name' => 'Kategori',
        'icon' => 'fa fa-database',
        'url' => base_url() . 'ms_kategori'
      ],
      'Novel' => [
        'name' => 'Novel',
        'icon' => 'fa fa-book',
        'url' => base_url() . 'ms_novel'
      ],
      'Rating' => [
        'name' => 'Master Rating',
        'icon' => 'fa fa-star',
        'url' => base_url() . 'ms_rating'
      ],
      'Rekom' => [
        'name' => 'Master Rekom',
        'icon' => 'fa fa-database',
        'url' => base_url() . 'ms_rekom'
      ]
    ];
    $this->load->view('dashboard/_partial/_header', $data);
    $this->load->view('dashboard/_partial/_sidebar', $data);
    $this->load->view('dashboard/_partial/_topbar', $data);
    if (is_array($layout)) {
      foreach ($layout as $layouts) {
        $this->load->view('dashboard/content/' . $layouts, $data);
      }
    } else {
      $this->load->view('dashboard/content/' . $layout, $data);
    }
    $this->load->view('dashboard/_partial/_footer', $data);
    // $this->load->view('dashboard/_partial/_script',$data);
  }

  public function error404()
  {
    $this->getLayout('error404');
  }
}
