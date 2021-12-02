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

				<?php if ($this->session->flashdata('success')): ?>
					<div class="alert alert-success" role="alert">
						<?php echo $this->session->flashdata('success'); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
							<span aria-hidden="true">&times;</span> 
						</button>
					</div>
				<?php endif; ?>
				
				<?php if ($this->session->flashdata('berhasil')): ?>
					<div class="alert alert-success" role="alert">
						<?php echo $this->session->flashdata('berhasil'); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
							<span aria-hidden="true">&times;</span> 
						</button>
					</div>
				<?php endif; ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/DataMahasiswa/input') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Mahasiswa</th>
										<th>Email</th>
										<th>Password</th>
										<th>Kelas</th>
										<th>Jurusan</th>
										<th>Organisasi</th>
										<th>Foto</th>
										<th>Penjelasan</th>
										<th>Tanggal</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$no = 1;
									foreach ($DataMahasiswa as $mahasiswa) : ?>
										<tr>
											<td class="10">
												<?php echo $no++ ?>
											</td>
											<td class="200">
												<?php echo $mahasiswa->nama_mahasiswa ?>
											</td>
											<td width="200">
												<?php echo $mahasiswa->email ?>
											</td>
											<td width="150">
												<?php echo $mahasiswa->password ?>
											</td>
											<td width="150">
												<?php echo $mahasiswa->kelas ?>
											</td>
											<td width="150">
												<?php echo $mahasiswa->jurusan ?>
											</td>
											<td width="150">
												<?php echo $mahasiswa->organisasi ?>
											</td>
											<td width="150">
												<img src="<?=base_url()?>assets/images/<?=$mahasiswa->foto?>" style="max-width:115%; max-height:100%; height:180px" alt="foto">
											</td>
											<td width="150">
												<?php echo $mahasiswa->penjelasan ?>
											</td>
											<td width="150">
												<?php echo $mahasiswa->tanggal ?>
											</td>
											<td width="250">
												<a href="<?php echo site_url('admin/DataMahasiswa/edit/' . $mahasiswa->id_mahasiswa) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
												<a onclick="deleteConfirm('<?php echo site_url('admin/DataMahasiswa/delete/' . $mahasiswa->id_mahasiswa) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
											</td>
										</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
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
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>
		function deleteConfirm(url) {
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}
	</script>
</body>

</html>
