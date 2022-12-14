<?php

class Berita extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelBerita");
		$this->check_login();
		if ($this->session->userdata('id_role') != "1") {
			redirect('', 'refresh');
		}
	}

	public function index()
    {
        $dataBerita = $this->ModelBerita->getAll();
        $data = array(
            "berita" => $dataBerita
        ); 
        $this->load->view('header');
        $this->load->view('content/berita/v_list_berita', $data);
        $this->load->view('footer');
    }

    // untuk me-load tampilan form tambah barang
    public function tambah(){
        $this->load->view('header');
        $this->load->view("content/berita/v_add_berita");
        $this->load->view('footer');
    }
    
    public function insert() 
    { 
        $nama = $this->input->post('nama_berita');
        $deskripsi = $this->input->post('deskripsi_berita');
        $gambar =  $_FILES['gambar_berita'];
        if($gambar=''){}else{
            $config['upload_path']          = './upload/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this ->load->library('upload',$config);
            if(!$this->upload->do_upload('gambar_berita')){
                echo "Upload Gagal"; die();
            }else{
                $gambar=$this->upload->data('file_name');
            }
        }
        $tanggal = $this->input->post('tanggal');
        $data = array( 
            'nama_berita'=>$nama,
            'deskripsi_berita'=>$deskripsi,
            'gambar_berita' =>$gambar,
            'tanggal'=>$tanggal
        ); 
        $this->ModelBerita->insertGetId($data); 
        redirect('berita'); 
    } 

    public function ubah($id) 
    { 
        $berita = $this->ModelBerita->getByPrimaryKey($id); 
        $data = array( 
            "berita" => $berita, 
        ); 
        $this->load->view('header');
        $this->load->view('content/berita/v_update_berita',$data); 
        $this->load->view('footer');
    } 
 
    public function update() 
    { 
        $id = $this->input->post('id_berita'); 
        $nama = $this->input->post('nama_berita');
        $deskripsi = $this->input->post('deskripsi_berita');
        $gambar =  $_FILES['gambar_berita'];
        if($gambar=''){}else{
            $config['upload_path']          = './upload/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this ->load->library('upload',$config);
            if(!$this->upload->do_upload('gambar_berita')){
				$gambar= $_POST['gambar_berita'];
            }else{
                $gambar=$this->upload->data('file_name');
            }
        }
        $tanggal = $this->input->post('tanggal');
        $data = array( 
            'nama_berita'=>$nama,
            'deskripsi_berita'=>$deskripsi,
            'gambar_berita' =>$gambar,
            'tanggal'=>$tanggal
        ); 
    
        echo var_dump($data); 
        echo var_dump($id); 
        $this->ModelBerita->update($id, $data); 
        redirect('berita'); 
    } 
 
    public function delete() 
    { 
        $id = $this->input->post('id_berita');

		//delete from directory and db
		$data = $this->ModelBerita->getByPrimaryKey($id);
		$nama = './upload/'.$data->gambar_berita;
		error_reporting(E_ERROR);

		if(is_readable($nama) && unlink($nama)){
			$delete = $this->ModelBerita->delete($id);
			redirect(base_url('/berita'));
			error_reporting(E_ERROR);
		}else{
			$delete = $this->ModelBerita->delete($id);
			redirect(base_url('/aboutus1'));
			echo "Gagal";
		}
        redirect('berita'); 
    } 
}
