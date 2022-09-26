<?php

class Staffuser extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelStaff");
	}

	public function index()
    {
        $dataStaff = $this->ModelStaff->getAll();
        $data = array(
            "staff" => $dataStaff
        );
        $this->load->view('content/staffuser/v_list_staff', $data);
    }

    // untuk me-load tampilan form tambah barang
    public function tambah(){
        $this->load->view('header');
        $this->load->view("content/staff/v_add_staff");
        $this->load->view('footer');
    }
    
    public function insert() 
    { 
        $nama = $this->input->post('nama_staff');
        $jabatan = $this->input->post('jabatan');
        $foto =  $_FILES['foto'];
        if($foto=''){}else{
            $config['upload_path']          = './upload/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this ->load->library('upload',$config);
            if(!$this->upload->do_upload('foto')){
                echo "Upload Gagal"; die();
            }else{
                $foto=$this->upload->data('file_name');
            }
        }
        $deskripsi = $this->input->post('deskripsi');
        $data = array( 
            'nama_staff'=>$nama,
            'jabatan'=>$jabatan,
            'foto' =>$foto,
            'deskripsi' =>$deskripsi
        ); 
        $this->ModelStaff->insertGetId($data); 
        redirect('staff'); 
    } 

    public function ubah($id) 
    { 
        $staff= $this->ModelStaff->getByPrimaryKey($id); 
        $data = array( 
            "staff" => $staff, 
        ); 
        $this->load->view('header');
        $this->load->view('content/staff/v_update_staff',$data); 
        $this->load->view('footer');
    } 
 
    public function update() 
    { 
        $id = $this->input->post('id_staff'); 
        $nama = $this->input->post('nama_staff');
        $jabatan = $this->input->post('jabatan');
        $foto =  $_FILES['foto'];
        if($foto=''){}else{
            $config['upload_path']          = './upload/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this ->load->library('upload',$config);
            if(!$this->upload->do_upload('foto')){
                echo "Upload Gagal"; die();
            }else{
                $foto=$this->upload->data('file_name');
            }
        }
        $deskripsi = $this->input->post('deskripsi');
        $data = array( 
            'nama_staff'=>$nama,
            'jabatan'=>$jabatan,
            'foto' =>$foto,
            'deskripsi' =>$deskripsi
        ); 
    
        echo var_dump($data); 
        echo var_dump($id); 
        $this->ModelStaff->update($id, $data); 
        redirect('staff'); 
    } 
 
    public function delete() 
    { 
        $id = $this->input->post('id_staff'); 
        $this->ModelStaff->delete($id); 
        redirect('staff'); 
    } 
}
