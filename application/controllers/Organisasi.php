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

        $data = array( 
            "nama_organisasi" => $this->input->post("nama_organisasi"), 
            "deskripsi_organisasi" => $this->input->post("deskripsi_organisasi"), 
            "gambar" => $this->input->post("gambar") 
        ); 
        $id = $this->ModelOrganisasi->insertGetId($data);
        if($id>0){
            $uploadGambar = $this->uploadGambar("gambar");
            if($uploadGambar["result"]=="success"){
                $dataUpdate=array(
                    "gambar"=>$uploadGambar["file"]["file_name"],
                );
            }
        } 
        redirect('organisasi'); 
    } 
    public function uploadGambar($field){
        $config['upload_path']          = './upload/organisasi/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['file_name']             = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);
        $this->load->library('upload', $config);
        if($this->upload->do_upload($field)){
            $result =array("result"=>"success","file"=>$this->upload->data(),"error"=>"");
            return $result;
        }else{
            $result =array("result"=>"failed","file"=>"","error"=>$this->upload->display_errors());
            return $result;
        }
    }

    public function ubah($id) 
    { 
        $testimoni = $this->ModelTestimoni->getByPrimaryKey($id); 
        $data = array( 
            "testimoni" => $testimoni, 
        ); 
        $this->load->view('header');
        $this->load->view('content/organisasi/v_update_organisasi',$data); 
        $this->load->view('footer');
    } 
 
    public function update() 
    { 
        $id = $this->input->post('id_organisasi'); 
        $data = array( 
            "nama" => $this->input->post('nama'), 
            "peran" => $this->input->post('peran'), 
            "testimoni" => $this->input->post('testimoni') 
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
