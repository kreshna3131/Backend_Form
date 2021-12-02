<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

  <?php $this->load->view("admin/_partials/navbar.php") ?>
  <div id="wrapper">

    <?php $this->load->view("admin/_partials/sidebar.php") ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <?php $this->load->view("admin/_partials/breadcrumb.php") ?>

        <div class="card mb-3">
          <div class="card-header">
            <a href="<?php echo site_url('admin/DataMahasiswa/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
          </div>
          <div class="card-body">

            <form action="<?php echo site_url('admin/DataMahasiswa/add'); ?>" method="POST" enctype="multipart/form-data">

              <div class="form-group">
                <label for="id_mahasiswa">Id Mahasiswa</label>
                <input class="form-control" type="text" name="id_mahasiswa" placeholder="ID mahasiswa" />
              </div>

              <div class="form-group">
                <label for="nama_mahasiswa">Nama Mahasiswa</label>
                <input class="form-control" type="text" name="nama_mahasiswa" placeholder="Nama mahasiswa" />
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Email" />
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" />
              </div>

              <div class="form-group">
                <label for="kelas">Kelas</label>
                <div>
                    <label><input type="radio" name="kelas" id="kelas" value="TI-A"> TI-A</label>
                    <label><input type="radio" name="kelas" id="kelas" value="TI-B"> TI-B</label>
                    <label><input type="radio" name="kelas" id="kelas" value="TI-C"> TI-C</label>
                    <label><input type="radio" name="kelas" id="kelas" value="AKUN-A"> AKUN-A</label>
                    <label><input type="radio" name="kelas" id="kelas" value="AKUN-B"> AKUN-B</label>
                    <label><input type="radio" name="kelas" id="kelas" value="AKUN-C"> AKUN-C</label>
                    <label><input type="radio" name="kelas" id="kelas" value="THP-A"> THP-A</label>
                    <label><input type="radio" name="kelas" id="kelas" value="THP-B"> THP-B</label>
                    <label><input type="radio" name="kelas" id="kelas" value="THP-C"> THP-C</label>
                </div>
              </div>

              <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <div>
                  <select name="jurusan" id="jurusan">
                    <option>Pilih Jurusan</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Akuntansi">Akuntansi</option>
                    <option value="Teknologi Hasil Pertanian">Teknologi Hasil Pertanian</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="organisasi">Organisasi</label>
                <div>
                  <label><input type="checkbox" id="organisasi" name="organisasi[]" value="BEM"> BEM</label>
                  <label><input type="checkbox" id="organisasi" name="organisasi[]" value="DEMA"> DEMA</label>
                  <label><input type="checkbox" id="organisasi" name="organisasi[]" value="HIMA"> HIMA</label>
                </div>
              </div>

              <div class="form-group">
                <label for="foto">Foto</label>
                <input class="form-control" type="file" name="foto" placeholder="foto" />
              </div>

              <div class="form-group">
                <label for="penjelasan">Penjelasan</label>
                <div class="form-group">
                  <textarea id="penjelasan" name="penjelasan"></textarea>
                  <script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
                  <script>
                    CKEDITOR.replace('penjelasan');
                  </script>
                </div>
              </div>

              <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input class="form-control" type="date" name="tanggal" placeholder="Tanggal" />
              </div>

              <input class="btn btn-success" type="submit" name="btn" value="Save" />
            </form>

          </div>

          <div class="card-footer small text-muted">
            * required fields
          </div>


        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php $this->load->view("admin/_partials/footer.php") ?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->


    <?php $this->load->view("admin/_partials/scrolltop.php") ?>

    <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
