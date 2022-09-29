<?php

class Fasilitas extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelFasilitas");
		$this->check_login();
		if ($this->session->userdata('id_role') != "1") {
			redirect('', 'refresh');
		}
	}

	public function index()
    {
        $dataFasilitas = $this->ModelFasilitas->getAll();
        $data = array(
            "fasilitas" => $dataFasilitas
        ); 
        $this->load->view('header');
        $this->load->view('content/fasilitas/v_list_fasilitas', $data);
        $this->load->view('footer');
    }

    // untuk me-load tampilan form tambah barang
    public function tambah(){
        $this->load->view('header');
        $this->load->view("content/fasilitas/v_add_fasilitas");
        $this->load->view('footer');
    }
    
    public function insert() 
    { 
        $nama = $this->input->post('nama_fasilitas');
        $deskripsi = $this->input->post('deskripsi_fasilitas');
        $gambar =  $_FILES['gambar_fasilitas'];
        if($gambar=''){}else{
            $config['upload_path']          = './upload/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this ->load->library('upload',$config);
            if(!$this->upload->do_upload('gambar_fasilitas')){
                echo "Upload Gagal"; die();
            }else{
                $gambar=$this->upload->data('file_name');
            }
        }
        $data = array( 
            'nama_fasilitas'=>$nama,
            'deskripsi_fasilitas'=>$deskripsi,
            'gambar_fasilitas' =>$gambar
        ); 
        $this->ModelFasilitas->insertGetId($data); 
        redirect('fasilitas'); 
    } 

    public function ubah($id) 
    { 
        $fasilitas = $this->ModelFasilitas->getByPrimaryKey($id); 
        $data = array( 
            "fasilitas" => $fasilitas, 
        ); 
        $this->load->view('header');
        $this->load->view('content/fasilitas/v_update_fasilitas',$data); 
        $this->load->view('footer');
    } 
 
    public function update() 
    { 
        $id = $this->input->post('id_fasilitas'); 
        $nama = $this->input->post('nama_fasilitas');
        $deskripsi = $this->input->post('deskripsi_fasilitas');
        $gambar =  $_FILES['gambar_fasilitas'];
        if($gambar=''){}else{
            $config['upload_path']          = './upload/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this ->load->library('upload',$config);
            if(!$this->upload->do_upload('gambar_fasilitas')){
                echo "Upload Gagal"; die();
            }else{
                $gambar=$this->upload->data('file_name');
            }
        }
        $data = array( 
            'nama_fasilitas'=>$nama,
            'deskripsi_fasilitas'=>$deskripsi,
            'gambar_fasilitas' =>$gambar
        ); 
    
        echo var_dump($data); 
        echo var_dump($id); 
        $this->ModelFasilitas->update($id, $data); 
        redirect('fasilitas'); 
    } 
 
    public function delete() 
    { 
        $id = $this->input->post('id_fasilitas'); 
        $this->ModelFasilitas->delete($id); 
        redirect('fasilitas'); 
    } 
}
