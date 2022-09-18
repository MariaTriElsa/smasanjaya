<?php

class Staff extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("ModelStaff");
	}

	public function index() {
		$listStaff = $this->ModelStaff->getAll();
		$data = array(
			"staff" => $listStaff
		);
        $this->load->view('header');
		$this->load->view("content/staff/v_list_staff", $data);
        $this->load->view('footer');
	}
    public function tambah(){
        $this->load->view('header');
        $this->load->view("content/staff/v_add_staff");
        $this->load->view('footer');
    }
	public function update($id) {
		$staff = $this->ModelStaff->getByPrimaryKey($id);
		$data = array(
			"staff" => $staff
		);
        $this->load->view('header');
		$this->load->view("content/staff/v_update_staff", $data);
        $this->load->view('footer');
	}

	public function proses_update() {
		$id = $this->input->post("id");
		$aboutUs = array(
			"id_staff" => $this->input->post("id_staff"),
			"nama_staff" => $this->input->post("nama_staff"),
			"jabatan_staff" => $this->input->post("jabatan_staff"),
			"foto_staff" => $this->input->post("foto_staff"),
			"deskripsi" => $this->input->post("deskripsi"),
		);
		$id = $this->sModelStaff->update($id);
		if ($id > 0) {
			$uploadGambar = $this->uploadGambar("foto_staff");

			if ($uploadGambar["result"] == "success") {
				$dataUpdate = array(
					"foto_staff" => $uploadGambar["file"]["file_name"],
				);
				$this->ModelStaff->update($id,$dataUpdate);
			}
		}
		redirect("staff");
	}

	public function uploadGambar($field) {
		$config = array(
			"upload_path" => "upload/images/",
			"allowed_types" => "jpg|jpeg|png",
			"max_size" => "5000",
			"remove_space" => true,
			"encrypt_name" => true
		);
		$this->load->library("upload", $config);
		if ($this->upload->do_upload($field)) {
			$result = array("result" => "success", "file" => $this->upload->data(), "error" => "");
			return $result;
		} else {
			$result = array("result" => "failed", "file" => "", "error" => $this->upload->display_errors());
			return $result;
		}
	}
}