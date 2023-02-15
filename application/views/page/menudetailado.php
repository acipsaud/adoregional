<!-- Content Wrapper. Contains page content -->
<?php
if (empty($gbr))
	$gbr = 'reg7.png';
	
if (empty($witel))
	$witel = 'All';

if (empty($datel))
	$datel = 'All';

if (empty($hero))
	$hero = 'All';

if (empty($sto))
	$sto = 'All';


?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
		<div class="row mb-1">
          <div class="col-sm-6">
            <h4 class="m-0 p-0">Detail ADO </b></h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Detail Data ADO</a></li>
              <li class="breadcrumb-item active">index</li>
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
				<section class="col-lg-12 connectedSortable">
					<div class="card pb-0 bg-purple">
						<div class="card-body pb-0">
							<form action="<?php echo site_url("progressado/search/") ?>" method="POST">
								<div class="row">	
									<div class="col-md-3 connectedSortable">
										Witel :
										<select class="form-control" type="text" id="witelfilterado" name="witel">
											<option value='<?php echo $witel; ?>'><?php echo $witel; ?></option>
											<?php
												$getwitel=$this->db->query("SELECT DISTINCT witel FROM `teritory`")->result();
												$no=0;
												$key = $this->Modauth->current_user()->witel;
											if ($key == 'Egbis TR7') {
												foreach ($getwitel as $rowwitel):
													$no++;
													// $witwti = str_replace(" ", "-", $rowwitel->witel);
													?>
												<option value='<?php echo $rowwitel->witel; ?>'><?php echo $rowwitel->witel; ?></option>
											<?php
												endforeach;
											}
											?>
										</select>
									</div>
									<div class="col-md-3 connectedSortable">
										Datel :
										<select class="form-control" type="text" id="datelfilterado" name="datel">
											<option value='All'><?php echo $datel; ?></option>
											<?php
											$key1 = $this->Modauth->current_user()->witel;
											if ($key1 != 'Egbis TR7') {
												$getwitel1 = $this->db->query("SELECT DISTINCT datel FROM `teritory` where witel='$key1'")->result();
												$no = 0;
												foreach ($getwitel1 as $rowwitel1):
													$no++;
													?>
												<option value='<?php echo $rowwitel1->datel; ?>'><?php echo $rowwitel1->datel; ?></option>
											<?php
												endforeach;
											}
											?>
										</select>
									</div>
									<div class="col-md-3 connectedSortable">
										Hero :
										<select class="form-control" type="text" id="herofilterado" name="hero">
											<option value='All'><?php echo $hero; ?></option>
										</select>
									</div>
									<div class="col-md-3 connectedSortable">
										STO :
										<select class="form-control" type="text" id="stofilterado" name="sto">
											<option value='All'><?php echo $sto; ?></option>
										</select>
									</div>
									<!-- <div class="col-md-2 connectedSortable">
										<br>
										<button type="submit" class="btn btn-success" style="width:100%">
											Search
										</button>
									</div> -->
								</div>
							</form>
						</div>
					</div>
				</section>
			</div>
			<div class="row">
				<div class="col-12 col-sm-12">
					<div class="card">
						<div class="card-body">
							<table style="width:100%;font-size:10px;color: #6c757d;">
								<tr>
									<td >
										<table class='bandaracolor'>
											<tr>
												<td style="padding:5px;">
													<center>	
														<img style="width:50%" src="<?php  echo base_url(); ?>assets/iconku/bandara.png" class="">
													</center>
												</td>
											</tr>
											<tr>
												<td style="padding:5px;">
													<center>
														<h5 style="margin:0px;font-weight:bold" class="detailbandara">
															<b><?php echo number_format($bandara); ?></b>
														</h5>
														Bandara
													</center>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table class='hotelcolor'>
											<tr>
												<td style="padding:5px;">
													<center>	
														<img style="width:50%" src="<?php  echo base_url(); ?>assets/iconku/city.png" class="">
													</center>
												</td>
											</tr>
											<tr>
												<td style="padding:5px;">
													<center>
														<h5 style="margin:0px;font-weight:bold" class="detailhotel">
															<b><?php echo number_format($hotel); ?></b>
														</h5>
														Hotel
													</center>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table class='restaurantcolor'>
											<tr>
												<td style="padding:5px;">
													<center>	
														<img style="width:40%" src="<?php  echo base_url(); ?>assets/iconku/dining.png" class="">
													</center>
												</td>
											</tr>
											<tr>
												<td style="padding:5px;">
													<center>
														<h5 style="margin:0px;font-weight:bold" class="detailrestaurant">
															<b><?php echo number_format($restaurant); ?></b>
														</h5>
														Restaurant
													</center>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table class='apartemencolor'>
											<tr>
												<td style="padding:5px;">
													<center>	
														<img style="width:40%" src="<?php  echo base_url(); ?>assets/iconku/city.png" class="">
													</center>
												</td>
											</tr>
											<tr>
												<td style="padding:5px;">
													<center>
														<h5 style="margin:0px;font-weight:bold" class="detailapartemen">
															<b><?php echo number_format($apartemen); ?></b>
														</h5>
														Apartement
													</center>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table class='sekolahcolor'>
											<tr>
												<td style="padding:5px;">
													<center>	
														<img style="width:50%" src="<?php  echo base_url(); ?>assets/iconku/scholl.png" class="">
													</center>
												</td>
											</tr>
											<tr>
												<td style="padding:5px;">
													<center>
														<h5 style="margin:0px;font-weight:bold" class="detailsekolah">
															<b><?php echo number_format($sekolah); ?></b>
														</h5>
														Sekolah
													</center>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table class='faskescolor'>
											<tr>
												<td style="padding:5px;">
													<center>	
														<img style="width:55%" src="<?php  echo base_url(); ?>assets/iconku/hospital.png" class="">
													</center>
												</td>
											</tr>
											<tr>
												<td style="padding:5px;">
													<center>
														<h5 style="margin:0px;font-weight:bold" class="detailfaskes">
															<b><?php echo number_format($faskes); ?></b>
														</h5>
														Faskes
													</center>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table class='industrisedangcolor'>
											<tr>
												<td style="padding:5px;">
													<center>	
														<img style="width:50%" src="<?php  echo base_url(); ?>assets/iconku/factory.png" class="">
													</center>
												</td>
											</tr>
											<tr>
												<td style="padding:5px;">
													<center>
														<h5 style="margin:0px;font-weight:bold" class="detailindustri_sedang">
															<b><?php echo number_format($industri_sedang); ?></b>
														</h5>
														Industri Sedang
													</center>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table class='govtofficecolor'>
											<tr>
												<td style="padding:5px;">
													<center>	
														<img style="width:50%" src="<?php  echo base_url(); ?>assets/iconku/Kelurahan.png" class="">
													</center>
												</td>
											</tr>
											<tr>
												<td style="padding:5px;">
													<center>
														<h5 style="margin:0px;font-weight:bold" class="detailgovt_office">
															<b><?php echo number_format($govt_office); ?></b>
														</h5>
														Govt Office
													</center>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table class='kekcolor'>
											<tr>
												<td style="padding:5px;">
													<center>	
														<img style="width:50%" src="<?php  echo base_url(); ?>assets/iconku/House.png" class="">
													</center>
												</td>
											</tr>
											<tr>
												<td style="padding:5px;">
													<center>
														<h5 style="margin:0px;font-weight:bold" class="detailkawasan_ekonomi_khusus">
															<b><?php echo number_format($kawasan_ekonomi_khusus); ?></b>
														</h5>
														KEK
													</center>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table class='mallcolor'>
											<tr>
												<td style="padding:5px;">
													<center>	
														<img style="width:50%" src="<?php  echo base_url(); ?>assets/iconku/factory1.png" class="">
													</center>
												</td>
											</tr>
											<tr>
												<td style="padding:5px;">
													<center>
														<h5 style="margin:0px;font-weight:bold" class="detailmall">
															<b><?php echo number_format($mall); ?></b>
														</h5>
														Mall
													</center>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table class='industribesarcolor'>
											<tr>
												<td style="padding:5px;">
													<center>	
														<img style="width:40%" src="<?php  echo base_url(); ?>assets/iconku/perumahan.png" class="">
													</center>
												</td>
											</tr>
											<tr>
												<td style="padding:5px;">
													<center>
														<h5 style="margin:0px;font-weight:bold" class="detailindustri_besar">
															<b><?php echo number_format($industri_besar); ?></b>
														</h5>
														Industri Besar
													</center>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table class='industrikecilcolor'>
											<tr>
												<td style="padding:5px;">
													<center>	
														<img style="width:40%" src="<?php  echo base_url(); ?>assets/iconku/House.png" class="">
													</center>
												</td>
											</tr>
											<tr>
												<td style="padding:5px;">
													<center>
														<h5 style="margin:0px;font-weight:bold" class="detailindustri_kecil">
															<b><?php echo number_format($industri_kecil); ?></b>
														</h5>
														Industri Kecil
													</center>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table class='universitascolor'>
											<tr>
												<td style="padding:5px;">
													<center>	
														<img style="width:40%" src="<?php  echo base_url(); ?>assets/iconku/scholl.png" class="">
													</center>
												</td>
											</tr>
											<tr>
												<td style="padding:5px;">
													<center>
														<h5 style="margin:0px;font-weight:bold" class="detailuniversitas">
															<b><?php echo number_format($universitas); ?></b>
														</h5>
														Universitas
													</center>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table class='kawasanindustricolor'>
											<tr>
												<td style="padding:5px;">
													<center>	
														<img style="width:50%" src="<?php  echo base_url(); ?>assets/iconku/factory.png" class="">
													</center>
												</td>
											</tr>
											<tr>
												<td style="padding:5px;">
													<center>
														<h5 style="margin:0px;font-weight:bold" class="detailkawasan_industri">
															<b><?php echo number_format($kawasan_industri); ?></b>
														</h5>
														Kawasan Industri
													</center>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table class='bumncolor'>
											<tr>
												<td style="padding:5px;">
													<center>	
														<img style="width:40%" src="<?php  echo base_url(); ?>assets/iconku/House.png" class="">
													</center>
												</td>
											</tr>
											<tr>
												<td style="padding:5px;">
													<center>
														<h5 style="margin:0px;font-weight:bold" class="detailbumn">
															<b><?php echo number_format($bumn); ?></b>
														</h5>
														BUMN
													</center>
												</td>
											</tr>
										</table>
									</td>
								<tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">
							<!-- <i class="fas fa-chart-pie mr-1"></i> -->
							<table>
								<tr>
									<td>
										<select class="form-control" type="text" id="kategorifilterado" name="witel">
											<option value='All'>All Kategori</option>
											<?php
												$getkat=$this->db->query("SELECT DISTINCT kat FROM `dataado`")->result();
												foreach ($getkat as $rowkat):
													$no++;
													// $witwti = str_replace(" ", "-", $rowwitel->witel);
													?>
												<option value='<?php echo $rowkat->kat; ?>'><?php echo $rowkat->kat; ?></option>
											<?php
												endforeach;
											?>
										</select>
									</td>
									<td>
										<!-- <a href="<?=site_url('detailado/downloadfile')?>" id='btn-detail' class='btn btn-default btn-sm' style="height:38px;">
											<i class='fa fa-download'></i> Download
										</a> -->
										<button class="btn btn-default btn-sm" style="height:38px;">
											<i class='fa fa-download' id='downloadexcelku'></i> Download
										</button>
									</td>
								</tr>
							</table>
							</h3>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="table-responsive">
								<table id="tabel-permintaan" class="table table-hover table-responsive" style="width:100%;">
									<thead>
										<tr style="font-size:13px;">
											<th style="vertical-align:middle;"><center>#</th>
											<th style="vertical-align:middle;"><center>No</th>
											<th style="vertical-align:middle;"><center>Witel</th>
											<th style="vertical-align:middle;"><center>Datel</th>
											<th style="vertical-align:middle;"><center>Hero</th>
											<th style="vertical-align:middle;"><center>STO</th>
											<th style="vertical-align:middle;"><center>AM</th>
											<th style="vertical-align:middle;"><center>Nama Pelanggan</th>
											<th style="vertical-align:middle;"><center>Alamat</th>
											<th style="vertical-align:middle;"><center>Kategori</th>
											<th style="vertical-align:middle;"><center>Detail Kategori</th>
											<th style="vertical-align:middle;"><center>ODP</th>
											<th style="vertical-align:middle;"><center>Jarak Alpro (Km)</th>
											<th style="vertical-align:middle;"><center>Segment</th>
											<th style="vertical-align:middle;"><center>Nipnas</th>
											<th style="vertical-align:middle;"><center>Revenue</th>
											<th style="vertical-align:middle;"><center>Kabupaten</th>
											<th style="vertical-align:middle;"><center>Kecamatan</th>
											<th style="vertical-align:middle;"><center>Kota</th>
											<th style="vertical-align:middle;"><center>Lop Mytens</th>
										</tr>
									</thead>
									<tbody style="font-size:13px;vertical-align:middle">
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  