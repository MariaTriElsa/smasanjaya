<?php

class Testimoni extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelTestimoni");
		$this->check_login();
		if ($this->session->userdata('id_role') != "1") {
			redirect('', 'refresh');
		}
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
        $nama = $this->input->post('nama');
        $peran = $this->input->post('peran');
        $testimoni = $this->input->post('testimoni');
        $gambar =  $_FILES['gambar'];
        if($gambar=''){}else{
            $config['upload_path']          = './upload/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this ->load->library('upload',$config);
            if(!$this->upload->do_upload('gambar')){
                echo "Upload Gagal"; die();
            }else{
                $gambar=$this->upload->data('file_name');
            }
        }
        $data = array( 
            'nama'=>$nama,
            'peran'=>$peran,
            'testimoni' =>$testimoni,
            'gambar'=>$gambar
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
        $nama = $this->input->post('nama');
        $peran = $this->input->post('peran');
        $testimoni = $this->input->post('testimoni');
        $gambar =  $_FILES['gambar'];
        if($gambar=''){}else{
            $config['upload_path']          = './upload/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this ->load->library('upload',$config);
            if(!$this->upload->do_upload('gambar')){
                echo "Upload Gagal"; die();
            }else{
                $gambar=$this->upload->data('file_name');
            }
        }
        $data = array( 
            'nama'=>$nama,
            'peran'=>$peran,
            'testimoni' =>$testimoni,
            'gambar'=>$gambar
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
