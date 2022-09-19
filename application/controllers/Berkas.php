<?php

class Berkas extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelBerkas");
	}

	public function index()
	{
		$dataBerkas = $this->ModelBerkas->getAll();
		$data = array(
			"berkas" => $dataBerkas
		);
		$this->load->view('header');
		$this->load->view('content/berkas/v_list_berkas', $data);
		$this->load->view('footer');
	}

	// untuk me-load tampilan form tambah barang
	public function tambah(){
		$this->load->view('header');
		$this->load->view("content/berkas/v_add_berkas");
		$this->load->view('footer');
	}

	public function insert()
	{
		$nama = $this->input->post('nama_berkas');
		$kategori = $this->input->post('kategori');
		$berkas =  $_FILES['file_berkas'];
		if($berkas=''){}else{
			$config['upload_path']          = './upload/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg|doc|docx|pdf';
			$this ->load->library('upload',$config);
			if(!$this->upload->do_upload('file_berkas')){
				echo "Upload Gagal"; die();
			}else{
				$berkas=$this->upload->data('file_name');
			}
		}
		$data = array(
			'nama_berkas'=>$nama,
			'kategori'=>$kategori,
			'file_berkas' =>$berkas
		);
		$this->ModelBerkas->insertGetId($data);
		redirect('berkas');
	}

	public function ubah($id)
	{
		$berkas = $this->ModelBerkas->getByPrimaryKey($id);
		$data = array(
			"berkas" => $berkas,
		);
		$this->load->view('header');
		$this->load->view('content/berkas/v_update_berkas',$data);
		$this->load->view('footer');
	}

	public function update()
	{
		$id = $this->input->post('id_berkas');
		$nama = $this->input->post('nama_berkas');
		$kategori = $this->input->post('kategori');
		$berkas =  $_FILES['file_berkas'];
		if($berkas=''){}else{
			$config['upload_path']          = './upload/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg|doc|docx|pdf';
			$this ->load->library('upload',$config);
			if(!$this->upload->do_upload('file_berkas')){
				echo "Upload Gagal"; die();
			}else{
				$berkas=$this->upload->data('file_name');
			}
		}
		$data = array(
			'nama_berkas'=>$nama,
			'kategori'=>$kategori,
			'file_berkas' =>$berkas
		);

		echo var_dump($data);
		echo var_dump($id);
		$this->ModelBerkas->update($id, $data);
		redirect('berkas');
	}

	public function delete()
	{
		$id = $this->input->post('id_berkas');
		$this->ModelBerkas->delete($id);
		redirect('berkas');
	}
}
