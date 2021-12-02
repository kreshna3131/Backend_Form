<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
	// nama tabel
	private $tb_mahasiswa = "tb_mahasiswa";

	public function getAll()
	{
		// tb_mahasiswa adalah nama tabel
		// untuk mengembalikan array yang berisi objek dari row
		return $this->db->get($this->tb_mahasiswa)->result();
	}

	public function getById($id)
	{
		// mengembalikan sebuah objek
		// mengambil semua dari tb_data-rt yang dimana id_nama = id
		return $this->db->get_where($this->tb_mahasiswa, ["id_mahasiswa" => $id])->result();
	}

	public function save()
    {
        $organisasi = implode(" , ", $this->input->post('organisasi'));
        $foto = $this->upload->do_upload('foto');

        if ($foto) {
			$foto = $this->upload->data('file_name');
			$this->session->flashdata('success', 'Berhasil Disimpan');
			
        } else {
            echo "else terjalankan";
            $file = '';
        }

        $data = array(
            'id_mahasiswa' => $this->input->post('id_mahasiswa'), 
            'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
            'email' => $this->input->post('email'), 
            'password' => $this->input->post('password'), 
            'kelas' => $this->input->post('kelas'), 
            'jurusan' => $this->input->post('jurusan'), 
            'organisasi' => $organisasi, 
            'foto' => $foto,
            'penjelasan' =>  $this->input->post("penjelasan"), 
            'tanggal' => $this->input->post("tanggal"),

        );
		
        $this->db->insert($this->tb_mahasiswa, $data);
		$this->session->set_flashdata('success', 'Berhasil ditambahkan');
		redirect(site_url('admin/DataMahasiswa/index'));
		redirect($this->load->view('admin/mahasiswa/new_form'));
        
    }

	public function update($id = NULL)
    {
		$organisasi = implode(" , ", $this->input->post('organisasi'));
        $foto = $this->upload->do_upload('foto');

        if ($foto) {
            $data = $this->upload->data();
            $foto = $data['file_name'];
			
        } else {
            $foto = $this->input->post('fotolama');
        }
        
        $id = $this->input->post('id');
        if (empty($organisasi)) $organisasi = "Kosong"; 

        $data = array(
            'id_mahasiswa' => $id, 
            'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
            'email' => $this->input->post('email'), 
            'password' => $this->input->post('password'), 
            'kelas' => $this->input->post('kelas'), 
            'jurusan' => $this->input->post('jurusan'), 
            'organisasi' => $organisasi, 
            'foto' => $foto,
            'penjelasan' =>  $this->input->post("penjelasan"), 
            'tanggal' => $this->input->post("tanggal"),

        );

        $this->db->update($this->tb_mahasiswa, $data, array('id_mahasiswa' => $id));
		redirect(site_url('admin/DataMahasiswa/index'));
    }

	public function delete($id)
	{
		// menjalankan dengan memanggil db dan tabel kemudian mencari id yang sesuai
		return $this->db->delete($this->tb_mahasiswa, array("id_mahasiswa" => $id));
	}
}
