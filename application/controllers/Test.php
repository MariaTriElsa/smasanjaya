<?php


class Test extends CI_Controller{

public function index(){
    $this->load->view('header');

    $this->load->view('content/testimoni/v_list_testimoni');

    $this->load->view('footer');
}

}