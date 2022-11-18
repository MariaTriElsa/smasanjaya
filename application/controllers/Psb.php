<?php

class Psb extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelPsb");
		$this->check_login();
		if ($this->session->userdata('id_role') != "1") {
			redirect('', 'refresh');
		}
	}

	public function index()
    {
        $dataPsb = $this->ModelPsb->getAll();
        $data = array(
            "psb" => $dataPsb
        ); 
        $this->load->view('header');
        $this->load->view('content/psb/v_list_psb', $data);
        $this->load->view('footer');
    }

    // untuk me-load tampilan form tambah barang
    public function tambah(){
        $this->load->view('header');
        $this->load->view("content/psb/v_add_psb");
        $this->load->view('footer');
    }
    
    public function insert() 
    { 
        $tahun= $this->input->post('tahun');
        $deskripsi = $this->input->post('deskripsi_psb');
        $gambar =  $_FILES['gambar_psb'];
        if($gambar=''){}else{
            $config['upload_path']          = './upload/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this ->load->library('upload',$config);
            if(!$this->upload->do_upload('gambar_psb')){
                echo "Upload Gagal"; die();
            }else{
                $gambar=$this->upload->data('file_name');
            }
        }
        $data = array( 
            'tahun'=>$tahun,
            'deskripsi_psb'=>$deskripsi,
            'gambar_psb' =>$gambar
        ); 
        $this->ModelPsb->insertGetId($data); 
        redirect('psb'); 
    } 

    public function ubah($id) 
    { 
        $psb= $this->ModelPsb->getByPrimaryKey($id); 
        $data = array( 
            "psb" => $psb, 
        ); 
        $this->load->view('header');
        $this->load->view('content/psb/v_update_psb',$data); 
        $this->load->view('footer');
    } 
 
    public function update() 
    { 
        $id = $this->input->post('id_psb'); 
        $tahun= $this->input->post('tahun');
        $deskripsi = $this->input->post('deskripsi_psb');
        $gambar =  $_FILES['gambar_psb'];
        if($gambar=''){}else{
            $config['upload_path']          = './upload/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this ->load->library('upload',$config);
            if(!$this->upload->do_upload('gambar_psb')){
                $gambar= $_POST['gambar_psb'];
            }else{
                $gambar=$this->upload->data('file_name');
            }
        }
        $data = array( 
            'tahun'=>$tahun,
            'deskripsi_psb'=>$deskripsi,
            'gambar_psb' =>$gambar
        ); 
    
        echo var_dump($data); 
        echo var_dump($id); 
        $this->ModelPsb->update($id, $data); 
        redirect('psb'); 
    } 
 
    public function delete() 
    { 
        $id = $this->input->post('id_psb'); 
        $this->ModelPsb->delete($id); 
        redirect('psb'); 
    } 
}
