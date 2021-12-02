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

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/Mahasiswa/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
                                        <th>Id Mahasiswa</th>
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
									<?php foreach ($Mahasiswa as $tb_mahasiswa): ?>
									<tr>
										<td width="200">
											<?php echo $tb_mahasiswa->id_mahasiswa ?>
										</td>
										<td class="small">
											<?php echo $tb_mahasiswa->nama_mahasiswa ?>
										</td>
										<td width="200">
											<?php echo $tb_mahasiswa->email ?>
										</td>
										<td width="150">
											<?php echo $tb_mahasiswa->password ?>
										</td>
										<td width="150">
											<?php echo $tb_mahasiswa->kelas ?>
										</td>
										<td width="150">
											<?php echo $tb_mahasiswa->jurusan ?>
										</td>
										<td width="150">
											<?php echo $tb_mahasiswa->organisasi ?>
										</td>
										<td width="150">
                                            <img src="<?php echo base_url(); ?>assets/images/<?php echo $tb_mahasiswa->foto; ?>" width="50">
										</td>
                                        <td width="150">
                                            <?php echo $tb_mahasiswa->penjelasan ?>
                                        </td>
                                        <td width="150">
                                            <?php echo $tb_mahasiswa->tanggal ?>
                                        </td>
										<td width="250">
											<a href="<?php echo site_url('admin/Mahasiswa/edit/'.$tb_mahasiswa->id_mahasiswa) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/Mahasiswa/delete/'.$tb_mahasiswa->id_mahasiswa) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
</body>

</html>