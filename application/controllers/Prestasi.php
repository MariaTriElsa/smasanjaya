<?php

class Prestasi extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelPrestasi");
		$this->check_login();
		if ($this->session->userdata('id_role') != "1") {
			redirect('', 'refresh');
		}
	}

	public function index()
    {
        $dataPrestasi = $this->ModelPrestasi->getAll();
        $data = array(
            "prestasi" => $dataPrestasi
        ); 
        $this->load->view('header');
        $this->load->view('content/prestasi/v_list_prestasi', $data);
        $this->load->view('footer');
    }

    // untuk me-load tampilan form tambah barang
    public function tambah(){
        $this->load->view('header');
        $this->load->view("content/prestasi/v_add_prestasi");
        $this->load->view('footer');
    }
    
    public function insert() 
    { 
        $nama = $this->input->post('nama');
        $deskripsi = $this->input->post('deskripsi');
        $gambar =  $_FILES['gambar'];
        if($gambar=''){}else{
            $config['upload_path']          = './upload/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this ->load->library('upload',$config);
            if(!$this->upload->do_upload('gambar')){
				$gambar= $_POST['gambar'];
            }else{
                $gambar=$this->upload->data('file_name');
            }
        }
        $data = array( 
            'nama'=>$nama,
            'deskripsi'=>$deskripsi,
            'gambar' =>$gambar
        ); 
        $this->ModelPrestasi->insertGetId($data); 
        redirect('prestasi'); 
    } 

    public function ubah($id) 
    { 
        $prestasi = $this->ModelPrestasi->getByPrimaryKey($id); 
        $data = array( 
            "prestasi" => $prestasi, 
        ); 
        $this->load->view('header');
        $this->load->view('content/prestasi/v_update_prestasi',$data); 
        $this->load->view('footer');
    } 
 
    public function update() 
    { 
        $id = $this->input->post('id_prestasi'); 
        $nama = $this->input->post('nama');
        $deskripsi = $this->input->post('deskripsi');
        $gambar =  $_FILES['gambar'];
        if($gambar=''){}else{
            $config['upload_path']          = './upload/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this ->load->library('upload',$config);
            if(!$this->upload->do_upload('gambar')){
				$gambar= $_POST['gambar'];
            }else{
                $gambar=$this->upload->data('file_name');
            }
        }
        $data = array( 
            'nama'=>$nama,
            'deskripsi'=>$deskripsi,
            'gambar' =>$gambar
        ); 
    
        echo var_dump($data); 
        echo var_dump($id); 
        $this->ModelPrestasi->update($id, $data); 
        redirect('prestasi'); 
    } 
 
    public function delete() 
    { 
        $id = $this->input->post('id_prestasi'); 
        $this->ModelPrestasi->delete($id); 
        redirect('prestasi'); 
    } 
}
