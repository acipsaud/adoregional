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

if (empty($universitas))
	$universitas = 0;

if (empty($industri_besar))
	$industri_besar = 0;

if (empty($kawasan_industri))
	$kawasan_industri = 0;

if (empty($kawasan_ekonomi_khusus))
	$kawasan_ekonomi_khusus = 0;

if (empty($mall))
	$mall = 0;

if (empty($bandara))
	$bandara = 0;
	
if (empty($bumn))
	$bumn = 0;

if (empty($industri_sedang))
	$industri_sedang = 0;

if (empty($faskes))
	$faskes = 0;

if (empty($hotel))
	$hotel = 0;

if (empty($sekolah))
	$sekolah = 0;

if (empty($govt_office))
	$govt_office = 0;

if (empty($industri_kecil))
	$industri_kecil = 0;
	
if (empty($restaurant))
	$restaurant = 0;

if (empty($apartemen))
	$apartemen = 0;

if (empty($organik_mgr))
	$organik_mgr = 0;

if (empty($organik_asman))
	$organik_asman = 0;

if (empty($organik_officer))
	$organik_officer = 0;

if (empty($organik_am))
	$organik_am = 0;

if (empty($non_organik_mgr))
	$non_organik_mgr = 0;

if (empty($non_organik_asman))
	$non_organik_asman = 0;

if (empty($non_organik_officer))
	$non_organik_officer = 0;

if (empty($non_organik_am))
	$non_organik_am = 0;

if (empty($cap))
	$cap = 0;

if (empty($used))
	$used = 0;

if (empty($avai))
	$avai = 0;

if (empty($occ))
	$occ = 0;

///////////////
if (empty($hsi))
	$hsi = 0;

if (empty($pots))
	$pots = 0;

if (empty($datin))
	$datin = 0;

if (empty($wifi))
	$wifi = 0;

if (empty($luas_wil))
	$luas_wil = 0;


if (empty($des))
$des = 0;

if (empty($dbs))
$dbs = 0;

if (empty($dgs))
$dgs = 0;

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
						<form action="<?php echo site_url("dashboard/search/") ?>" method="POST">
							<div class="row">	
								<div class="col-md-3 connectedSortable">
									Witel :
									<select class="form-control" type="text" id="witel" name="witel">
										<option value='<?php echo $witel; ?>'><?php echo $witel; ?></option>
										<?php
										$key = $this->Modauth->current_user()->witel;
										if ($key == 'Egbis TR7') {
											$getwitel = $this->db->query("SELECT DISTINCT witel FROM `teritory`")->result();
											$no = 0;
											foreach ($getwitel as $rowwitel):
												$no++;
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
									<select class="form-control" type="text" id="datel" name="datel">
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
								<div class="col-md-2 connectedSortable">
									Hero :
									<select class="form-control" type="text" id="hero" name="hero">
										<option value='All'><?php echo $hero; ?></option>
									</select>
								</div>
								<div class="col-md-2 connectedSortable">
									STO :
									<select class="form-control" type="text" id="sto" name="sto">
										<option value='All'><?php echo $sto; ?></option>
									</select>
								</div>
								<div class="col-md-2 connectedSortable">
									<br>
									<button type="submit" class="btn btn-success">
										Search
									</button>
								</div>
							</div>
						</form>
					</section>
				</div>

        <div class="row">
          <!-- Left col -->
          <section class="col-lg-8 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card" style="height:370px;">
              <div class="card-header bg-purple">
                <h3 class="card-title">
                  <!-- <i class="fas fa-chart-pie mr-1"></i> -->
                  Oppurtunity
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table style="width:100%;">
					<tr>
						<td>
							<a href="<?php echo site_url("detailado/list/$witel/$datel/$hero/$sto/BANDARA") ?>" style="color: #6c757d;">
							<table>
								<tr>
									<td>
										<center>	
											<img style="width:50%" src="<?php  echo base_url(); ?>assets/iconku/bandara.png" class="">
										</center>
									</td>
								</tr>
								<tr>
									<td>
										<center>
											<h5 style="margin:0px;">
												<b><?php echo number_format($bandara); ?></b>
											</h5>
											Bandara
										</center>
									</td>
								</tr>
							</table>
							</a>
						</td>
						<td>
							<a href="<?php echo site_url("detailado/list/$witel/$datel/$hero/$sto/HOTEL") ?>" style="color: #6c757d;">
							<table>
								<tr>
									<td >
										<center>	
											<img style="width:50%" src="<?php  echo base_url(); ?>assets/iconku/city.png" class="">
										</center>
									</td>
								</tr>
								<tr>
									<td>
										<center>
											<h5 style="margin:0px;">
												<b><?php echo number_format($hotel); ?></b>
											</h5>
											Hotel
										</center>
									</td>
								</tr>
							</table>
							</a>
						</td>
						<td>
							<a href="<?php echo site_url("detailado/list/$witel/$datel/$hero/$sto/RESTAURANT") ?>" style="color: #6c757d;">
							<table>
								<tr>
									<td >
										<center>	
											<img style="width:40%" src="<?php  echo base_url(); ?>assets/iconku/dining.png" class="">
										</center>
									</td>
								</tr>
								<tr>
									<td>
										<center>
											<h5 style="margin:0px;">
												<b><?php echo number_format($restaurant); ?></b>
											</h5>
											Restaurant
										</center>
									</td>
								</tr>
							</table>
							</a>
						</td>
						<td>
							<a href="<?php echo site_url("detailado/list/$witel/$datel/$hero/$sto/APARTEMEN") ?>" style="color: #6c757d;">
							<table>
								<tr>
									<td>
										<center>	
											<img style="width:40%" src="<?php  echo base_url(); ?>assets/iconku/city.png" class="">
										</center>
									</td>
								</tr>
								<tr>
									<td>
										<center>
											<h5 style="margin:0px;">
												<b><?php echo number_format($apartemen); ?></b>
											</h5>
											Apartement
										</center>
									</td>
								</tr>
							</table>
							</a>
						</td>
						<td>
							<a href="<?php echo site_url("detailado/list/$witel/$datel/$hero/$sto/SEKOLAH") ?>" style="color: #6c757d;">
							<table>
								<tr>
									<td>
										<center>	
											<img style="width:50%" src="<?php  echo base_url(); ?>assets/iconku/scholl.png" class="">
										</center>
									</td>
								</tr>
								<tr>
									<td>
										<center>
											<h5 style="margin:0px;">
												<b><?php echo number_format($sekolah); ?></b>
											</h5>
											Sekolah
										</center>
									</td>
								</tr>
							</table>
							</a>
						</td>
						<td>
							<a href="<?php echo site_url("detailado/list/$witel/$datel/$hero/$sto/FASKES") ?>" style="color: #6c757d;">
							<table>
								<tr>
									<td>
										<center>	
											<img style="width:55%" src="<?php  echo base_url(); ?>assets/iconku/hospital.png" class="">
										</center>
									</td>
								</tr>
								<tr>
									<td>
										<center>
											<h5 style="margin:0px;">
												<b><?php echo number_format($faskes); ?></b>
											</h5>
											Faskes
										</center>
									</td>
								</tr>
							</table>
							</a>
						</td>
						<td>
							<a href="<?php echo site_url("detailado/list/$witel/$datel/$hero/$sto/INDUSTRI-SEDANG") ?>" style="color: #6c757d;">
							<table>
								<tr>
									<td>
										<center>	
											<img style="width:50%" src="<?php  echo base_url(); ?>assets/iconku/factory.png" class="">
										</center>
									</td>
								</tr>
								<tr>
									<td>
										<center>
											<h5 style="margin:0px;">
												<b><?php echo number_format($industri_sedang); ?></b>
											</h5>
											Industri Sedang
										</center>
									</td>
								</tr>
							</table>
							</a>
						</td>
						<td>
							<a href="<?php echo site_url("detailado/list/$witel/$datel/$hero/$sto/GOVT-OFFICE") ?>" style="color: #6c757d;">
							<table>
								<tr>
									<td>
										<center>	
											<img style="width:50%" src="<?php  echo base_url(); ?>assets/iconku/Kelurahan.png" class="">
										</center>
									</td>
								</tr>
								<tr>
									<td>
										<center>
											<h5 style="margin:0px;">
												<b><?php echo number_format($govt_office); ?></b>
											</h5>
											Govt Office
										</center>
									</td>
								</tr>
							</table>
							</a>
						</td>
					<tr>
				</table>
				<br>
				<table style="width:100%;">
					<tr>
						<td>
							<a href="<?php echo site_url("detailado/list/$witel/$datel/$hero/$sto/KAWASAN-EKONOMI-KHUSUS") ?>" style="color: #6c757d;">
							<table>
								<tr>
									<td>
										<center>	
											<img style="width:50%" src="<?php  echo base_url(); ?>assets/iconku/House.png" class="">
										</center>
									</td>
								</tr>
								<tr>
									<td>
										<center>
											<h5 style="margin:0px;">
												<b><?php echo number_format($kawasan_ekonomi_khusus); ?></b>
											</h5>
											KEK
										</center>
									</td>
								</tr>
							</table>
							</a>
						</td>
						<td>
							<a href="<?php echo site_url("detailado/list/$witel/$datel/$hero/$sto/MALL") ?>" style="color: #6c757d;">
							<table>
								<tr>
									<td>
										<center>	
											<img style="width:50%" src="<?php  echo base_url(); ?>assets/iconku/factory1.png" class="">
										</center>
									</td>
								</tr>
								<tr>
									<td>
										<center>
											<h5 style="margin:0px;">
												<b><?php echo number_format($mall); ?></b>
											</h5>
											Mall
										</center>
									</td>
								</tr>
							</table>
							</a>
						</td>
						<td>
							<a href="<?php echo site_url("detailado/list/$witel/$datel/$hero/$sto/INDUSTRI-BESAR") ?>" style="color: #6c757d;">
							<table>
								<tr>
									<td>
										<center>	
											<img style="width:40%" src="<?php  echo base_url(); ?>assets/iconku/perumahan.png" class="">
										</center>
									</td>
								</tr>
								<tr>
									<td>
										<center>
											<h5 style="margin:0px;">
												<b><?php echo number_format($industri_besar); ?></b>
											</h5>
											Industri Besar
										</center>
									</td>
								</tr>
							</table>
							</a>
						</td>
						<td>
							<a href="<?php echo site_url("detailado/list/$witel/$datel/$hero/$sto/INDUSTRI-KECIL") ?>" style="color: #6c757d;">
							<table>
								<tr>
									<td>
										<center>	
											<img style="width:40%" src="<?php  echo base_url(); ?>assets/iconku/House.png" class="">
										</center>
									</td>
								</tr>
								<tr>
									<td>
										<center>
											<h5 style="margin:0px;">
												<b><?php echo number_format($industri_kecil); ?></b>
											</h5>
											Industri Kecil
										</center>
									</td>
								</tr>
							</table>
							</a>
						</td>
						<td>
							<a href="<?php echo site_url("detailado/list/$witel/$datel/$hero/$sto/UNIVERSITAS") ?>" style="color: #6c757d;">
							<table>
								<tr>
									<td>
										<center>	
											<img style="width:40%" src="<?php  echo base_url(); ?>assets/iconku/scholl.png" class="">
										</center>
									</td>
								</tr>
								<tr>
									<td>
										<center>
											<h5 style="margin:0px;">
												<b><?php echo number_format($universitas); ?></b>
											</h5>
											Universitas
										</center>
									</td>
								</tr>
							</table>
							</a>
						</td>
						<td>
							<a href="<?php echo site_url("detailado/list/$witel/$datel/$hero/$sto/KAWASAN-INDUSTRI") ?>" style="color: #6c757d;">
							<table>
								<tr>
									<td>
										<center>	
											<img style="width:50%" src="<?php  echo base_url(); ?>assets/iconku/factory.png" class="">
										</center>
									</td>
								</tr>
								<tr>
									<td>
										<center>
											<h5 style="margin:0px;">
												<b><?php echo number_format($kawasan_industri); ?></b>
											</h5>
											Kawasan Industri
										</center>
									</td>
								</tr>
							</table>
							</a>
						</td>
						<td>
							<a href="<?php echo site_url("detailado/list/$witel/$datel/$hero/$sto/BUMN") ?>" style="color: #6c757d;">
							<table>
								<tr>
									<td>
										<center>	
											<img style="width:40%" src="<?php  echo base_url(); ?>assets/iconku/House.png" class="">
										</center>
									</td>
								</tr>
								<tr>
									<td>
										<center>
											<h5 style="margin:0px;">
												<b><?php echo number_format($bumn); ?></b>
											</h5>
											BUMN
										</center>
									</td>
								</tr>
							</table>
							</a>
						</td>
					<tr>
				</table>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-4 connectedSortable">
						<div class="card" style="height:370px;">
              <div class="card-header bg-purple">
                <h3 class="card-title">
                  <!-- <i class="fas fa-chart-pie mr-1"></i> -->
                  Lokasi	
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body ">
								<center>	
									<img style="width:100%;height:260px;" src="<?php echo base_url(); ?>assets/iconku/mapado/<?php echo $gbr; ?>" class="">
								</center>
								Luas Wilayah : <?php echo number_format($luas_wil); ?> Km
              </div><!-- /.card-body -->
            </div>
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->

		<div class="row">
			<section class="col-lg-8 connectedSortable">
				<div class="row">
					<section class="col-lg-12 connectedSortable">
						<div class="card">
							<div class="card-header ">
								<h3 class="card-title">
									<!-- <i class="fas fa-chart-pie mr-1"></i> -->
									List Layanan 
								</h3>
							</div><!-- /.card-header -->
							<div class="card-body ">
								<div class="row">
									<table style="width:100%;">
										<tr>
											<td>
												<table>
													<tr>
														<td>	
															<center>	
																<img style="width:80%" src="<?php  echo base_url(); ?>assets/iconku/LIST_POTS.png" class="">
															</center>
														</td>
														<td>
															List Pots (SST)<br>
															<h4><b><?php echo number_format($pots); ?></b></h4>
														</td>
													</tr>
												</table>		
											</td>
											<td>
												<table>
													<tr>
														<td>	
															<center>	
																<img style="width:80%" src="<?php  echo base_url(); ?>assets/iconku/LISTDATIN.png" class="">
															</center>
														</td>
														<td>
															List Datin (SSL)<br>
															<h4><b><?php echo number_format($datin); ?></b></h4>
														</td>
													</tr>
												</table>		
											</td>
											<td>
												<table>
													<tr>
														<td>	
															<center>	
																<img style="width:80%" src="<?php  echo base_url(); ?>assets/iconku/LISTHSI.png" class="">
															</center>
														</td>
														<td>
															List HSI (SSL)<br>
															<h4><b><?php echo number_format($hsi); ?></b></h4>
														</td>
													</tr>
												</table>
											</td>
											<td>
												<table>
													<tr>
														<td>	
															<center>	
																<img style="width:80%" src="<?php  echo base_url(); ?>assets/iconku/LISTWIFI.png" class="">
															</center>
														</td>
														<td>
															List WIFI (AP)<br>
															<h4><b><?php echo number_format($wifi); ?></b></h4>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div><!-- /.card-body -->
					</section>
					<section class="col-lg-8 connectedSortable">
						<div class="card" style="height:280px;">
							<div class="card-header ">
								<h3 class="card-title">
									<!-- <i class="fas fa-chart-pie mr-1"></i> -->
									Alat Produksi
								</h3>
							</div><!-- /.card-header -->
							<div class="card-body ">
								<div class="row">
									<div class="col-6 col-sm-6 col-md-6">
										<div class="info-box">
											<span class="info-box-icon bg-info elevation-1"><i class="fas fa-check "></i></span>

											<div class="info-box-content">
												<span class="info-box-text">Capacity </span>
												<span class="info-box-number">
													<?php echo number_format($cap); ?>
												</span>
											</div>
											<!-- /.info-box-content -->
										</div>
										<!-- /.info-box -->
									</div>
									<!-- /.col -->
									<div class="col-6 col-sm-6 col-md-6">
										<div class="info-box mb-3">
											<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-check "></i></span>

											<div class="info-box-content">
												<span class="info-box-text">Used</span>
												<span class="info-box-number">
													<?php echo number_format($used); ?>
												</span>
											</div>
											<!-- /.info-box-content -->
										</div>
										<!-- /.info-box -->
									</div>
									<!-- /.col -->

									<!-- fix for small devices only -->
									<div class="clearfix hidden-md-up"></div>

									<div class="col-6 col-sm-6 col-md-6">
										<div class="info-box mb-3">
											<span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>
											<div class="info-box-content">
												<span class="info-box-text">Idle</span>
												<span class="info-box-number"><?php echo number_format($avai); ?></span>
											</div>
											<!-- /.info-box-content -->
										</div>
										<!-- /.info-box -->
									</div>
									<!-- /.col -->
									<div class="col-6 col-sm-6 col-md-6">
										<div class="info-box mb-3">
											<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-check "></i></span>
											<div class="info-box-content">
												<span class="info-box-text">OCC</span>
												<span class="info-box-number"><?php echo number_format($occ); ?> %</span>
											</div>
											<!-- /.info-box-content -->
										</div>
										<!-- /.info-box -->
									</div>
								</div>
							</div><!-- /.card-body -->
						</div>
					</section>
					<section class="col-lg-4 connectedSortable">
						<div class="card" style="height:280px;">
							<div class="card-header ">
								<h3 class="card-title">
									<!-- <i class="fas fa-chart-pie mr-1"></i> -->
									Workforce 
								</h3>
							</div><!-- /.card-header -->
							<div class="card-body ">
								<div class="row" style="padding-bottom:0px;">
									<!-- BGES <?php echo $witel; ?> -->
									<table style="width:100%;font-size:13px;margin-top:0px;">
										<tr style="height:40px;">
											<td></td>
											<td align="center"><b>Organik</b></td>
											<td align="center"><b>Non Organik</b></td>
										</tr>
										<tr style="background-color:#e8e8e8;height:30px;">
											<td>Manager</td>
											<td align="center"><?php echo $organik_mgr; ?></td>
											<td align="center"><?php echo $non_organik_mgr; ?></td>
										</tr>
										<tr style="height:30px;">
											<td>Asman</td>
											<td align="center"><?php echo $organik_asman; ?></td>
											<td align="center"><?php echo $non_organik_asman; ?></td>
										</tr>
										<tr style="background-color:#e8e8e8;height:30px;">
											<td>Support</td>
											<td align="center"><?php echo $organik_officer; ?></td>
											<td align="center"><?php echo $non_organik_officer; ?></td>
										</tr>
										<tr style="height:30px;">
											<td>AM</td>
											<td align="center"><?php echo $organik_am; ?></td>
											<td align="center"><?php echo $non_organik_am; ?></td>
										</tr>
										<tr style="background-color:#e8e8e8;">
											<td>Total</td>
											<td align="center"><b><?php echo $organik_mgr+$organik_asman+$organik_officer+$organik_am; ?></b></td>
											<td align="center"><b><?php echo $non_organik_mgr+$non_organik_asman+$non_organik_officer+$non_organik_am; ?></b></td>
										</tr>
									</table>
								</div>
							</div>
						</div><!-- /.card-body -->
					</section>
				</div>
			</section>
			<section class="col-lg-4 connectedSortable">
				<div class="card" style="height:450px;">
					<div class="card-header ">
						<h3 class="card-title">
							<!-- <i class="fas fa-chart-pie mr-1"></i> -->
							Revenue 
						</h3>
					</div><!-- /.card-header -->
					<div class="card-body ">
						<div class="row">
							<div class="col-md-12">
								<canvas id="myChartku"></canvas>
							</div>
						</div>
					</div>
				</div><!-- /.card-body -->
			</section>
		</div>

		
					
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  