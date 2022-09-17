<?php

class Testimoni extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelTestimoni");
	}

	public function index()
    {
        $dataTestimoni = $this->ModelTestimoni->getAll();
        $data = array(
            "testimoni" => $dataTestimoni
        ); 
        $this->load->view('header');
        $this->load->view('content/testimoni/v_list_testimoni', $data);
        $this->load->view('footer');
    }

    // untuk me-load tampilan form tambah barang
    public function tambah(){
        $this->load->view('header');
        $this->load->view("content/testimoni/v_add_testimoni");
        $this->load->view('footer');
    }
    
    public function insert() 
    { 
        $data = array( 
            "nama" => $this->input->post("nama"), 
            "peran" => $this->input->post("peran"), 
            "testimoni" => $this->input->post("testimoni") 
        ); 
        $id = $this->ModelTestimoni->insertGetId($data); 
        redirect('testimoni'); 
    } 

    public function ubah($id) 
    { 
        $testimoni = $this->ModelTestimoni->getByPrimaryKey($id); 
        $data = array( 
            "testimoni" => $testimoni, 
        ); 
        $this->load->view('header');
        $this->load->view('content/testimoni/v_update_testimoni',$data); 
        $this->load->view('footer');
    } 
 
    public function update() 
    { 
        $id = $this->input->post('id_testimoni'); 
        $data = array( 
            "nama" => $this->input->post('nama'), 
            "peran" => $this->input->post('peran'), 
            "testimoni" => $this->input->post('testimoni') 
        ); 
        echo var_dump($data); 
        echo var_dump($id); 
        $this->ModelTestimoni->update($id, $data); 
        redirect('testimoni'); 
    } 
 
    public function delete() 
    { 
        $id = $this->input->post('id_testimoni'); 
        $this->ModelTestimoni->delete($id); 
        redirect('testimoni'); 
    } 
}
