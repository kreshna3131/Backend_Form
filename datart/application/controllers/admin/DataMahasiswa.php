<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DataMahasiswa extends CI_Controller
{
    // membuat class construct
    public function __construct()
    {
        // untuk menjalankan program pertama kali dieksekusi
        parent::__construct();
        // load model dan library
        $this->load->model('mahasiswa_model');
        $this->load->library('form_validation');

    }

    // mengambil data model dan di render
    public function index()
    {
        // untuk mengambil data dari model secara keseluruhan
        $data["DataMahasiswa"] = $this->mahasiswa_model->getAll();
        // meload data pada view yang sudah dibuat pada folder view
        $this->load->view("admin/mahasiswa/list", $data);
    }
    
    // Digunakan untuk memanggil form
    public function input()
    {
        // untuk meload tampilan newform pada bagian view
        $this->load->view('admin/mahasiswa/new_form');
    }

    // menambahkan data
    public function add()
    {
        // Configurasi File
        $config['upload_path'] = './assets/images';
        $config['allowed_types'] = 'jpg|png|jpeg';
        // Mengatur ukuran maksimal file
        $config['max_size'] = '2048';
        // mengatur ukuran lebar maksimal yang dilakukan
        $config['max_width'] = '2000';
        $config['max_height'] = '2000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->mahasiswa_model->save();
        // $this->load->view("admin/mahasiswa/new_form");
        $this->session->set_flashdata('berhasil', 'Berhasil ditambahkan');
    }

    // untuk fungsi edit dengan nilai defaultnya null
    public function edit( $id = NULL )
    {
        $this->form_validation->set_rules('nama_mahasiswa', 'Nama_Mahasiswa', 'required');
        $this->form_validation->set_rules('penjelasan', 'Penjelasan', 'required');

        $data['DataMahasiswa']  = $this->mahasiswa_model->getById($id);
        // Configurasi File
        $config['upload_path'] = './assets/images';
        $config['allowed_types'] = 'jpg|png|jpeg';
        // Mengatur ukuran maksimal file
        $config['max_size'] = '2048';
        // mengatur ukuran lebar maksimal yang dilakukan
        $config['max_width'] = '2000';
        $config['max_height'] = '2000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        if ($this->form_validation->run()) {
            $this->mahasiswa_model->update();

        }
        $this->load->view("admin/mahasiswa/edit_form", $data);
        $this->session->set_flashdata('success', 'Berhasil diupdate');
    }

    // untuk fungsi delete dengan nilai defaultnya null
    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->mahasiswa_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('admin/DataMahasiswa'));
        }
    }
}
