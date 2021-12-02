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

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/DataMahasiswa/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

					<?php foreach ($DataMahasiswa as $kunci) : ?>

						<form action="<?php echo site_url('admin/DataMahasiswa/edit'); ?>" method="POST" enctype="multipart/form-data">
							<!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/DataMahasiswa/edit/ID --->
							
							<input type="hidden" name="id" value="<?php echo $kunci->id_mahasiswa; ?>" />
							
							<div class="form-group">
								<label for="nama_mahasiswa">Nama Mahasiswa</label>
								<input class="form-control <?php echo form_error('nama_mahasiswa') ? 'is-invalid':'' ?>" type="text" name="nama_mahasiswa" placeholder="Nama Mahasiswa" value="<?php echo $kunci->nama_mahasiswa; ?>" />
							</div>
							
							<div class="form-group">
								<label for="email">Email</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>" type="text" name="email" placeholder="Email" value="<?php echo $kunci->email ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('email') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="password">Password</label>
								<input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>" type="password" name="password" placeholder="Password" value="<?php echo $kunci->password; ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('password') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="kelas">Kelas</label>
								<div>
								 	<input type="radio" name="kelas" id="kelas" value="TI-A" <?php echo ($kunci->kelas == 'TI-A' ? ' checked' : ''); ?>> TI-A
								 	<input type="radio" name="kelas" id="kelas" value="TI-B" <?php echo ($kunci->kelas == 'TI-B' ? ' checked' : ''); ?>> TI-B
								 	<input type="radio" name="kelas" id="kelas" value="TI-C" <?php echo ($kunci->kelas == 'TI-C' ? ' checked' : ''); ?>> TI-C
								 	<input type="radio" name="kelas" id="kelas" value="AKUN-A" <?php echo ($kunci->kelas == 'AKUN-A' ? ' checked' : ''); ?>> AKUN-A
								 	<input type="radio" name="kelas" value="AKUN-B" <?php echo ($kunci->kelas == 'AKUN-B' ? ' checked' : ''); ?>> AKUN-B
								 	<input type="radio" name="kelas" value="AKUN-C" <?php echo ($kunci->kelas == 'AKUN-C' ? ' checked' : ''); ?>> AKUN-C
								 	<input type="radio" name="kelas" value="THP-A" <?php echo ($kunci->kelas == 'THP-A' ? ' checked' : ''); ?>> THP-A
								 	<input type="radio" name="kelas" value="THP-B" <?php echo ($kunci->kelas == 'THP-B' ? ' checked' : ''); ?>> THP-B
								 	<input type="radio" name="kelas" value="THP-C" <?php echo ($kunci->kelas == 'THP-C' ? ' checked' : ''); ?>> THP-C
								</div>
								<div class="invalid-feedback">
									<?php echo form_error('kelas') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="jurusan">Jurusan</label>
								<div>
									<select name="jurusan">
										<option value="Teknik Informatika" <?php echo ($kunci->jurusan == 'Teknik Informatika' ? ' selected' : ''); ?>>Teknik Informatika</option>
										<option value="Akuntansi" <?php echo ($kunci->jurusan == 'Akuntansi' ? ' selected' : ''); ?>>Akuntansi</option>
										<option value="Teknologi Hasil Pertanian" <?php echo ($kunci->jurusan == 'Teknologi Hasil Pertanian' ? ' selected' : ''); ?>>Teknologi Hasil Pertanian</option>
									</select>
								</div>
								<div class="invalid-feedback">
									<?php echo form_error('jurusan') ?>
								</div>
							</div>

							<?php
								$organisasi = explode(' , ', $kunci->organisasi);
							?>

							<div class="form-group">
								<label for="organisasi">Organisasi</label>
								<div>
									<input type="checkbox" id="organisasi" name="organisasi[]" value="BEM" <?php in_array ('BEM', $organisasi) ? print "checked" : ""; ?>> BEM
									<input type="checkbox" id="organisasi" name="organisasi[]" value="DEMA" <?php in_array ('DEMA', $organisasi) ? print "checked" : ""; ?>> DEMA
									<input type="checkbox" id="organisasi" name="organisasi[]" value="HIMA" <?php in_array ('HIMA', $organisasi) ? print "checked" : ""; ?>> HIMA
								</div>
								<div class="invalid-feedback">
									<?php echo form_error('organisasi') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="foto">Foto</label>
								<div><img src="<?php echo base_url('./assets/images/') . $kunci->foto?>" border="0" width="70px" height="70px"/></div>
								<input class="form-control <?php echo form_error('foto') ? 'is-invalid' : '' ?>" type="file" name="foto" placeholder="foto" />
								<input type="hidden" name="fotolama" value="<?php echo $kunci->foto; ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('foto') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="penjelasan">Penjelasan</label>
								<textarea class="form-control <?php echo form_error('penjelasan') ? 'is-invalid':'' ?>"
								 name="penjelasan" placeholder="Penjelasan"><?php echo $kunci->penjelasan ?></textarea>
								<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
            					<script>CKEDITOR.replace( 'penjelasan' );</script>
								<div class="invalid-feedback">
									<?php echo form_error('penjelasan') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="tanggal">Tanggal</label>
								<input class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>"
								type="date" name="tanggal" placeholder="Tanggal" value="<?php echo $kunci->tanggal ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('tanggal') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					<?php endforeach; ?>

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
