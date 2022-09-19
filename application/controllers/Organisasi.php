<?php

class Organisasi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelOrganisasi");
	}

	public function index()
    {
        $dataOrganisasi = $this->ModelOrganisasi->getAll();
        $data = array(
            "organisasi" => $dataOrganisasi
        ); 
        $this->load->view('header');
        $this->load->view('content/organisasi/v_list_organisasi', $data);
        $this->load->view('footer');
    }

    // untuk me-load tampilan form tambah barang
    public function tambah(){
        $this->load->view('header');
        $this->load->view("content/organisasi/v_add_organisasi");
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
                echo "Upload Gagal"; die();
            }else{
                $gambar=$this->upload->data('file_name');
            }
        }
        $data = array( 
            'nama'=>$nama,
            'deskripsi'=>$deskripsi,
            'gambar' =>$gambar
        ); 
        $this->ModelOrganisasi->insertGetId($data); 
        redirect('organisasi'); 
    } 

    public function ubah($id) 
    { 
        $organisasi = $this->ModelOrganisasi->getByPrimaryKey($id); 
        $data = array( 
            "organisasi" => $organisasi, 
        ); 
        $this->load->view('header');
        $this->load->view('content/organisasi/v_update_organisasi',$data); 
        $this->load->view('footer');
    } 
 
    public function update() 
    { 
        $id = $this->input->post('id_organisasi'); 
        $nama = $this->input->post('nama');
        $deskripsi = $this->input->post('deskripsi');
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
            'deskripsi'=>$deskripsi,
            'gambar' =>$gambar
        ); 
    
        echo var_dump($data); 
        echo var_dump($id); 
        $this->ModelOrganisasi->update($id, $data); 
        redirect('organisasi'); 
    } 
 
    public function delete() 
    { 
        $id = $this->input->post('id_organisasi'); 
        $this->ModelOrganisasi->delete($id); 
        redirect('organisasi'); 
    } 
}
