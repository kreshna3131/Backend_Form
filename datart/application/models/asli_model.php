<?php

if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class assss extends CI_Model
{
    // nama tabel
    private $tb_mahasiswa = "tb_mahasiswa";

    // nama kolom ditabel, harus sesuai hurufnya
    public $id_mahasiswa;
    public $nama_mahasiswa;
    public $email;
    public $password;
    public $kelas;
    public $jurusan;
    public $organisasi;
    public $foto;
    public $penjelasan;
    public $tanggal;

    public function rules()
    {
        // mengembalikan nilai array berisi rules untuk validasi
        return [            
            ['field' => 'nama_mahasiswa',
            'label' => 'Nama_Mahasiswa',
            'rules' => 'required'],
            
            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required'],

            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required'],

            ['field' => 'kelas',
            'label' => 'Kelas',
            'rules' => 'required'],

            ['field' => 'jurusan',
            'label' => 'Jurusan',
            'rules' => 'required'],

            ['field' => 'organisasi',
            'label' => 'Organisasi',
            'rules' => 'required'],

            ['field' => 'foto',
            'label' => 'Foto',
            'rules' => 'required'],

            ['field' => 'penjelasan',
            'label' => 'Penjelasan',
            'rules' => 'required'],
            
            ['field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required']
        ];
    }
    
    public function save()
    {
        // mengambil data dari form
        $post = $this->input->post();
        $this->id_mahasiswa = uniqid();
        $this->nama_mahasiswa = $post["nama_mahasiswa"];
        $this->email = $post["email"];
        $this->password = $post["password"];
        $this->kelas = $post["kelas"];
        $this->jurusan = $post["jurusan"];
        $this->organisasi = $post["organisasi"];
        $this->foto = $post["foto"];
        $this->penjelasan = $post["penjelasan"];
        $this->tanggal = $post["tanggal"];
        $this->db->insert($this->tb_mahasiswa, $this);
    }

    public function getAll()
    {
        // _table adalah nama tabel
		// untuk mengembalikan array yang berisi objek dari row
        return $this->db->get($this->tb_mahasiswa)->result();
    }
    
    public function getById($id)
    {
        // mengembalikan sebuah objek
		// mengambil semua dari tb_data-rt yang dimana id_nama = id
        return $this->db->get_where($this->tb_mahasiswa, ["id_mahasiswa" => $id_mahasiswa])->row();
    }

    function findAll()
    {
        return $this->db->get('tb_mahasiswa')->result();
    }

    function find($id_mahasiswa)
    {
        return $this->db->where('id_mahasiswa', $id_mahasiswa)
                        ->get('tb_mahasiswa')
                        ->row();
    }

    public function save()
    {
        // mengambil data dari form
        $post = $this->input->post();
        $this->id_mahasiswa = uniqid();
        $this->nama_mahasiswa = $post["nama_mahasiswa"];
        $this->email = $post["email"];
        $this->password = $post["password"];
        $this->kelas = $post["kelas"];
        $this->jurusan = $post["jurusan"];
        $this->organisasi = $post["organisasi"];
        $this->foto = $post["foto"];
        $this->penjelasan = $post["penjelasan"];
        $this->tanggal = $post["tanggal"];
        $this->db->insert($this->tb_mahasiswa, $this);
    }

    public function update()
    {
        // mengambil data dari form
        $post = $this->input->post();
        $this->id_mahasiswa = $post["id"];
        $this->nama_mahasiswa = $post["nama_mahasiswa"];
        $this->email = $post["email"];
        $this->password = $post["password"];
        $this->kelas = $post["kelas"];
        $this->jurusan = $post["jurusan"];
        $this->organisasi = $post["organisasi"];
        $this->foto = $post["foto"];
        $this->penjelasan = $post["penjelasan"];
        $this->tanggal = $post["tanggal"];
        $this->db->update($this->tb_mahasiswa, $this, array('id_mahasiswa' => $post['id_mahasiswa']));
    }

    public function delete($id)
    {
        // menjalankan dengan memanggil db dan tabel kemudian mencari id yang sesuai
        return $this->db->delete($this->tb_mahasiswa, array("id_mahasiswa" => $id_mahasiswa));
    }

    function update($tb_mahasiswa = array())
    {
        $this->db->where('id_mahasiswa', $tb_mahasiswa['id_mahasiswa']);
        $this->db->update('tb_mahasiswa', $tb_mahasiswa);
    }

    public function delete($id_mahasiswa)
    {
        // menjalankan dengan memanggil db dan tabel kemudian mencari id yang sesuai
        return $this->db->delete($this->tb_mahasiswa, array("id_mahasiswa" => $id_mahasiswa));
    }
}
