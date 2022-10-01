<?php

class Pengumuman extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelPengumuman");
		$this->check_login();
		if ($this->session->userdata('id_role') != "1") {
			redirect('', 'refresh');
		}
	}

	public function index()
    {
        $dataPengumuman = $this->ModelPengumuman->getAll();
        $data = array(
            "pengumuman" => $dataPengumuman
        ); 
        $this->load->view('header');
        $this->load->view('content/pengumuman/v_list_pengumuman', $data);
        $this->load->view('footer');
    }

    // untuk me-load tampilan form tambah barang
    public function tambah(){
        $this->load->view('header');
        $this->load->view("content/pengumuman/v_add_pengumuman");
        $this->load->view('footer');
    }
    
    public function insert() 
    {
		$nama = $this->input->post('nama');
		$deskripsi = $this->input->post('deskripsi');
		$tanggal = $this->input->post('tanggal');
		$berkas =  $_FILES['file'];
		if($berkas=''){}else{
			$config['upload_path']          = './upload/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg|doc|docx|pdf';
			$this ->load->library('upload',$config);
			if(!$this->upload->do_upload('file')){
				echo "Upload Gagal"; die();
			}else{
				$berkas=$this->upload->data('file_name');
			}
		}
		$data = array(
			'nama'=>$nama,
			'deskripsi'=>$deskripsi,
			'tanggal'=>$tanggal,
			'file' =>$berkas
		);
		$this->ModelPengumuman->insertGetId($data);
		redirect('pengumuman');
    } 

    public function ubah($id) 
    { 
        $pengumuman = $this->ModelPengumuman->getByPrimaryKey($id); 
        $data = array( 
            "pengumuman" => $pengumuman, 
        ); 
        $this->load->view('header');
        $this->load->view('content/pengumuman/v_update_pengumuman',$data); 
        $this->load->view('footer');
    } 
 
    public function update() 
    { 
        $id = $this->input->post('id_pengumuman'); 
        $nama = $this->input->post('nama');
        $deskripsi = $this->input->post('deskripsi');
		$tanggal = $this->input->post('tanggal');
        $berkas =  $_FILES['file'];
        if($berkas=''){}else{
            $config['upload_path']          = './upload/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|doc|docx|pdf';
            $this ->load->library('upload',$config);
            if(!$this->upload->do_upload('file')){
                echo "Upload Gagal"; die();
            }else{
                $berkas=$this->upload->data('file_name');
            }
        }
        $data = array(
			'nama'=>$nama,
			'deskripsi'=>$deskripsi,
			'tanggal'=>$tanggal,
			'file' =>$berkas
        ); 

		echo var_dump($data);
		echo var_dump($id);
		$this->ModelPengumuman->update($id, $data);
		redirect('pengumuman');
    } 
 
    public function delete() 
    { 
        $id = $this->input->post('id_pengumuman'); 
        $this->ModelPengumuman->delete($id); 
        redirect('pengumuman'); 
    } 
}
