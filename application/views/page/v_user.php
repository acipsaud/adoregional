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
					<h1 class="m-0">Table User</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">User</a></li>
						<li class="breadcrumb-item active">Table User</li>
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
					if (empty($this->session->flashdata('add'))) {

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

								<div class="input-group input-group-sm">


									<div class="input-group-append">
										<a class="btn btn-default" data-toggle="modal" data-target="#modal-add">
											<i class="fas fa-plus"></i>
										</a>
									</div>
								</div>
							</div>
						</div><!-- /.card-header -->
						<div class="card-body">
							<table id="user-tbl" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Nama</th>
										<th>Username</th>
										<th>Witel</th>
										<th>Last Login</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>

									<?php
									foreach ($user_data as $value) {
										?>

										<tr>
											<td>
												<?= $value->nama; ?>
											</td>
											<td>
												<!-- sensor username -->
												<?php
												$replace = str_replace(substr($value->username, 3, 4), str_repeat('*', 4), $value->username);
												echo $replace;
												?>
											</td>
											<td>
												<?= $value->witel; ?>
											</td>
											<td>
												<?= $value->last_login; ?>
											</td>
											<td class="attrib-modal">
												<input type="hidden" name="id_user" value="<?= $value->id_user ?>">
												<div class="btn-group">
													<button type="button" class="btn btn-info" data-toggle="modal"
														data-target="#modal-default">
														<i class="fas fa-eye"></i>
													</button>
													<button type="button" class="btn btn-primary" data-toggle="modal"
														data-target="#modal-edit">
														<i class="fas fa-edit"></i>
													</button>
													<button type="button" class="btn btn-danger">
														<i class="fas fa-times-circle"></i>
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

	<div class="modal fade" id="modal-add">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" id="form-add-user" action="<?php echo site_url('User/addUser'); ?>"
						method="POST">
						<div class="card-body">
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="modal_add_username"
										name="modal_add_username" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Witel</label>
								<div class="col-sm-10">
									<select class="form-control" type="text" id="modal_add_witel" name="witel">
										<?php foreach ($witel_data as $rowwitel):

											?>
											<option value='<?php echo $rowwitel->witel; ?>'><?php echo $rowwitel->witel; ?>
											</option>
											<?php
										endforeach;
										?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="modal_add_nama" name="modal_add_nama"
										required>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" id="modal_add_password"
										name="modal_add_password" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Konfirmasi Password</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" id="modal_add_konfirmasi_password"
										name="modal_add_konfirmasi_password" required>
								</div>
							</div>
						</div>

					</form>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="modal_add_button">Submit</button>
				</div>
			</div>
		</div>

		<!-- /.content -->
	</div>


	<div class="modal fade" id="modal-default">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Judul</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="form-horizontal">
						<div class="card-body">
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" id="modal_username" disabled>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Witel</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" id="modal_witel" disabled>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" id="modal_nama" disabled>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Last Login</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" id="modal_last_login" disabled>
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

	<div class="modal fade" id="modal-edit">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" action="<?php echo site_url('User/editUser'); ?>" method="POST">
						<div class="card-body">
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="modal_edit_username"
										name="edit_username" readonly>
									<input type="hidden" class="form-control" id="modal_edit_id_user" name="edit_id"
										readonly>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Witel</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="modal_edit_witel" name="edit_witel">
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="modal_edit_nama" name="edit_nama">
								</div>
							</div>

							<div class="form-group row">

								<label for="inputEmail3" class="col-sm-2 col-form-label">Last Login</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="modal_edit_last_login" readonly>
								</div>
							</div>
							<div class="clearfix">
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<label class="form-check-label" for="exampleCheck1">Rubah Password ? </label>
								</div>
							</div>
							<div id="form-pass">
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Old Password</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="edit_old" id="edit_old">
									</div>
								</div>
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">New Password</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="edit_new" id="edit_new">
									</div>
								</div>
							</div>
						</div>

				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
				</form>
			</div>
		</div>

	</div>