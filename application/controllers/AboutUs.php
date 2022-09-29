<?php

class AboutUs extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelAboutUs");
		$this->check_login();
		if ($this->session->userdata('id_role') != "1") {
			redirect('', 'refresh');
		}
	}

	public function index()
    {
        $dataAboutUs = $this->ModelAboutUs->getAll();
        $data = array(
            "aboutus" => $dataAboutUs
        ); 
        $this->load->view('header');
        $this->load->view('content/aboutus/v_list_aboutus', $data);
        $this->load->view('footer');
    }

    // untuk me-load tampilan form tambah barang
    public function tambah(){
        $this->load->view('header');
        $this->load->view("content/aboutus/v_add_aboutus");
        $this->load->view('footer');
    }
    
    public function insert() 
    { 
       
        $nama = $this->input->post('nama');
        $logo =  $_FILES['logo'];
        if($logo=''){}else{
            $config['upload_path']          = './upload/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this ->load->library('upload',$config);
            if(!$this->upload->do_upload('logo')){
                echo "Upload Gagal"; die();
            }else{
                $logo=$this->upload->data('file_name');
            }
        }
        $visi = $this->input->post('visi');
        $misi= $this->input->post('misi');
        $alamat = $this->input->post('alamat');
        $sejarah = $this->input->post('sejarah');
        $data = array( 
            'nama' =>$nama,
            'logo'=>$logo,
            'visi'=>$visi,
            'misi' =>$misi,
            'sejarah'=>$sejarah,
            'alamat'=>$alamat
            
        ); 
        $this->ModelAboutUs->insertGetId($data); 
        redirect('aboutus'); 
    } 

    public function ubah($id) 
    { 
        $aboutus = $this->ModelAboutUs->getByPrimaryKey($id); 
        $data = array( 
            "aboutus" => $aboutus, 
        ); 
        $this->load->view('header');
        $this->load->view('content/aboutus/v_update_aboutus',$data); 
        $this->load->view('footer');
    } 
 
    public function update() 
    { 

        $id = $this->input->post('id_aboutus');
        $nama = $this->input->post('nama');
        $logo =  $_FILES['logo'];
        if($logo=''){}else{
            $config['upload_path']          = './upload/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this ->load->library('upload',$config);
            if(!$this->upload->do_upload('logo')){
                echo "Upload Gagal"; die();
            }else{
                $logo=$this->upload->data('file_name');
            }
        }
        $visi = $this->input->post('visi');
        $misi= $this->input->post('misi');
        $alamat = $this->input->post('alamat');
        $sejarah = $this->input->post('sejarah');
        $data = array( 
            'nama' =>$nama,
            'logo'=>$logo,
            'visi'=>$visi,
            'misi' =>$misi,
            'sejarah'=>$sejarah,
            'alamat'=>$alamat
            
        ); 
        echo var_dump($data); 
        echo var_dump($id); 
        $this->ModelAboutUs->update($id, $data); 
        redirect('aboutus'); 
    } 
 
    public function delete() 
    { 
        $id = $this->input->post('id_aboutus'); 
        $this->ModelAboutUs->delete($id); 
        redirect('aboutus'); 
    } 
}
