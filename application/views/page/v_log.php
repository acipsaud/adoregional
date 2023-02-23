<?php

if (empty($teritory))
	$teritory = 'WITEL';

if (empty($kategory))
	$kategory = 'ALL';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Table Log Perubahan ADO</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Log</a></li>
						<li class="breadcrumb-item active">Table Log</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->



	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Main row -->

			<div class="row">
				<!-- Left col -->
				<section class="col-lg-12">
					<!-- Custom tabs (Charts with tabs)-->

					<?php
					if (empty($this->session->flashdata('notify'))) {
						
					} else {
						?>
						<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h5>Success</h5>
							Berhasil mengubah data user
						</div>
						<?php
					}
					?>

					<?php
					if (empty($this->session->flashdata('success'))) {
						
					} else {
						?>
						<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h5>Success</h5>
							Berhasil menambah user
						</div>
						<?php
					}
					?>

					<?php
					if (empty($this->session->flashdata('wrong'))) {

					} else {
						?>
						<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h5>Gagal</h5>
							Password lama anda salah
						</div>
						<?php
					}
					?>

					<div class="card">
						<div class="card-header">
							<h3 class="card-title">
								<i class="fas fa-chart-pie mr-1"></i>
							</h3>
							<div class="card-tools">

							
							</div>
						</div><!-- /.card-header -->


						
						<div class="card-body">
							<table id="user-tbl" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Modified By</th>
										<th>CC</th>
										<th>Witel ADO</th>
										<th>Tanggal Aktivitas</th>
										<th>Jenis Aktivitas</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>

									<?php
									foreach ($log as $value) {
										?>
										<tr>
											<td>
												<?= $value->nama; ?>
											</td>
											<td>
												<?= $value->nama_cust; ?>
											</td>
											<td>
												<?= $value->WITEL_ADO; ?>
											</td>
											<td>
												<?= $value->WAKTU; ?>
											</td>
											<td>
											<?= $value->tipe; ?>
											</td>
											<td class="attrib-modal">
												<input type="hidden" name="log" value="<?php echo htmlspecialchars($value->log) ?>">
												<div class="btn-group">
													<button type="button" class="btn btn-info" data-toggle="modal"
														data-target="#modal-log">
														<i class="fas fa-eye"></i>
													</button>
												</div>
											</td>
										</tr>

									<?php }
									?>

								</tbody>
							</table>
						</div>
					</div>
					<!-- /.card -->
				</section>
				<section class="col-lg-6 connectedSortable">
					<!-- Custom tabs (Charts with tabs)-->
					<div class="card">

					</div>
				</section>
				<!-- /.Left col -->
				<!-- right col (We are only adding the ID to make the widgets sortable)-->
				<!-- right col -->
			</div>
			<!-- /.row (main row) -->
		</div><!-- /.container-fluid -->
	</section>

	
	<div class="modal fade" id="modal-log">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">View</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="form-horizontal">
						<div class="card-body">
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Nama Customer</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" id="modal_cc" disabled>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Waktu Log</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" id="modal_waktu" disabled>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Witel ADO</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" id="modal_witel" disabled>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Modifier</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" id="modal_modifier" disabled>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Log Aktivitas</label>
								<div class="col-sm-10" id="log">
									
								</div>
							</div>
						</div>

					</form>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>

		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
</div>
	