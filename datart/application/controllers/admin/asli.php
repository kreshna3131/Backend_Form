<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        // untuk menjalankan program pertama kali dieksekusi
        parent::__construct();
        // load model dan library
        $this->load->model("mahasiswa_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        // untuk mengambil data dari model secara keseluruhan
        $data["Mahasiswa"] = $this->mahasiswa_model->getAll();
        // meload data pada view yang sudah dibuat pada folder view
        $this->load->view("admin/mahasiswa/list", $data);
    }

    public function add()
    {
        // menayatakan objek model
        $mahasiswa = $this->mahasiswa_model;
        // menayatakan form validasi untuk mempermudah
        $validation = $this->form_validation;
        $validation->set_rules($mahasiswa->rules());

        // percabangan nilai untuk melakukan validasi
        if ($validation->run()) {
            $mahasiswa->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        // untuk meload tampilan newform pada bagian view
        $this->load->view("admin/mahasiswa/index");
    }

    public function edit($id_mahasiswa = null)
    {
        // redirect jika tidak ada id
        if (!isset($id)) redirect('admin/Mahasiswa');
       
        // menayatakan objek model
        $mahasiswa = $this->$mahasiswa_model;
        // menayatakan form validasi untuk mempermudah
        $validation = $this->form_validation;
        $validation->set_rules($mahasiswa->rules());

        // percabangan nilai untuk melakukan validasi
        if ($validation->run()) {
            $mahasiswa->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        // mengambil data untuk ditampilkan pada form
        $data["mahasiswa"] = $mahasiswa->getById($id_mahasiswa);
        // jika tidak ada data
        if (!$data["mahasiswa"]) show_404();
        
        $this->load->view("admin/mahasiswa/edit", $data);
    }

    public function edit($id_mahasiswa)
    {
        $data['tb_mahasiswa'] = $this->mahasiswa_model->find($id_mahasiswa);
        $this->load->view('mahasiswa/edit', $data);
    }

    public function process_edit()
    {
        $this->form_validation->set_rules('nama_mahasiswa', 'Nama_mahasiswa', 'trim|required|min_length[1]|max_length[200]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[1]|max_length[200]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('foto', 'Foto', 'callback_file_check');
        $this->form_validation->set_rules('penjelasan', 'Penjelasan', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data['tb_mahasiswa'] = $this->mahasiswaModel->find($_POST['id_mahasiswa']);
            $this->load->view('mahasiswa/edit', $data);
        } else {
            if (isset($_FILES['foto']['nama_mahasiswa']) && $_FILES['foto']['nama_mahasiswa'] != "") {
                $config['upload_path'] = './assets/images/';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = '1024';
                $config['remove_spaces'] = TRUE;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    $photoInfo = $this->upload->data();
                    $_POST['foto'] = $photoInfo['nama_file'];
                    $_POST['status'] = isset($_POST['status']);
                    $this->mahasiswaModel->update($_POST);
                    redirect('tb_mahasiswa');
                } else {
                    $data['error_msg'] = $this->upload->display_errors();
                    $data['tb_mahasiswa'] = $this->mahasiswaModel->find($_POST['id_mahasiswa']);
                    $this->load->view('mahasiswa/edit', $data);
                }
            } else {
                $_POST['status'] = isset($_POST['status']);
                $this->mahasiswaModel->update($_POST);
                redirect('tb_mahasiswa');
            }
        }
    }

    function file_check()
    {
        $allowed_mime_type_arr = array(
            'image/jpeg',
            'image/jpg',
            'image/png'
        );
        $mime = get_mime_by_extension($_FILES['foto']['nama_mahasiswa']);
        if (isset($_FILES['foto']['nama_mahasiswa']) && $_FILES['foto']['nama_mahasiswa'] != "") {
            if (in_array($mime, $allowed_mime_type_arr)) {
                return true;
            } else {
                $this->form_validation->set_message('file_check', 'tolong gunakan file berjenis jpg/png ');
                return false;
            }
        }
        return true;
    }

    // untuk fungsi delete dengan nilai defaultnya null
    public function delete($id_mahasiswa=null)
    {
        if (!isset($id_mahasiswa)) show_404();
        
        if ($this->mahasiswa_model->delete($id_mahasiswa)) {
            redirect(site_url('admin/Mahasiswa'));
        }
    }
}