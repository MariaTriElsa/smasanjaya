<?php

class Ekstrakurikuler extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelEkstrakurikuler");
		$this->check_login();
		if ($this->session->userdata('id_role') != "1") {
			redirect('', 'refresh');
		}
	}

	public function index()
    {
        $dataEkstrakurikuler = $this->ModelEkstrakurikuler->getAll();
        $data = array(
            "ekstrakurikuler" => $dataEkstrakurikuler
        ); 
        $this->load->view('header');
        $this->load->view('content/ekstrakurikuler/v_list_ekstrakurikuler', $data);
        $this->load->view('footer');
    }

    // untuk me-load tampilan form tambah barang
    public function tambah(){
        $this->load->view('header');
        $this->load->view("content/ekstrakurikuler/v_add_ekstrakurikuler");
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
        $this->ModelEkstrakurikuler->insertGetId($data); 
        redirect('ekstrakurikuler'); 
    } 

    public function ubah($id) 
    { 
        $ekstrakurikuler = $this->ModelEkstrakurikuler->getByPrimaryKey($id); 
        $data = array( 
            "ekstrakurikuler" => $ekstrakurikuler, 
        ); 
        $this->load->view('header');
        $this->load->view('content/ekstrakurikuler/v_update_ekstrakurikuler',$data); 
        $this->load->view('footer');
    } 
    public function update() 
    { 
        $id = $this->input->post('id_ekstrakurikuler'); 
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
        $this->ModelEkstrakurikuler->update($id, $data); 
        redirect('ekstrakurikuler'); 
    } 
    public function update1() 
    { 
        $id = $this->input->post('id_ekstrakurikuler'); 
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
        $this->ModelEkstrakurikuler->update($id, $data); 
        redirect('ekstrakurikuler'); 
    } 
 
    public function delete() 
    { 
        $id = $this->input->post('id_ekstrakurikuler'); 
        $this->ModelEkstrakurikuler->delete($id); 
        redirect('ekstrakurikuler'); 
    } 
}
