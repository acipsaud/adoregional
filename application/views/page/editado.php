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
            <h4 class="m-0 p-0">Edit Data ADO </b></h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit ADO</a></li>
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
				<section class="col-lg-5 connectedSortable">
					<div class="card">
						<div class="card-header bg-purple">
							<h3 class="card-title">
							<!-- <i class="fas fa-chart-pie mr-1"></i> -->
							MAPS
							</h3>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div id="map2" style="height:390px;width:100%"></div>
						</div>
					</div>
				</section>
				<section class="col-lg-7 connectedSortable">
					<div class="card">
						<div class="card-header bg-purple">
							<h3 class="card-title">
							<!-- <i class="fas fa-chart-pie mr-1"></i> -->
							Data ADO
							</h3>
						</div><!-- /.card-header -->
						<div class="card-body">
							<form action="<?php echo site_url('Detailado/updateado'); ?>" method="POST">
								<div class="card-body">
									<h4>Data Pelanggan</h4>
									<div class="form-group">
										<label for="exampleInputEmail1">Nama Pelanggan</label>
										<input type="hidden" class="form-control" value="<?php echo $detail->id; ?>" name="id" id="id" placeholder="Nama Pelanggan">
										<input type="text" class="form-control" value="<?php echo $detail->nama_cust; ?>" name="nama_cust" id="nama_cust" placeholder="Nama Pelanggan">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">AM</label>
										<input type="text" class="form-control" value="<?php echo $detail->am; ?>" name="am" id="am" placeholder="Accout Manager">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Segment</label>
										<input type="text" class="form-control" value="<?php echo $detail->segment; ?>" name="segment" id="segment" placeholder="Segment">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Nipnas</label>
										<input type="text" class="form-control" value="<?php echo $detail->nipnas; ?>" name="nipnas" id="nipnas" placeholder="Nipnas">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Revenue</label>
										<input type="text" class="form-control" value="<?php echo $detail->revenue; ?>" name="revenue" id="revenue" placeholder="revenue">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Kategori</label>
										<select name="kat" id="kat"  class="form-control">
											<option value="<?php echo $detail->kat; ?>"><?php echo $detail->kat; ?></option>
											<?php
											$listkat = $this->db->query("select distinct kat from dataado")->result();
											foreach ($listkat as $rowkat) :
											?>
												<option value="<?php echo $rowkat->kat; ?>"><?php echo $rowkat->kat; ?></option>
											<?php
											endforeach;
											?>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Detail Kategori</label>
										<select name="det_kat" id="det_kat"  class="form-control">
											<option value="<?php echo $detail->det_kat; ?>"><?php echo $detail->det_kat; ?></option>
											<?php
											$listdetkat = $this->db->query("select distinct det_kat from dataado where kat='$detail->kat'")->result();
											foreach ($listdetkat as $rowdetkat) :
											?>
												<option value="<?php echo $rowdetkat->det_kat; ?>"><?php echo $rowdetkat->det_kat; ?></option>
											<?php
											endforeach;
											?>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Latitude</label>
										<input type="text" class="form-control" value="<?php echo $detail->lat; ?>"  name="lat" id="lat" placeholder="Latitude">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Longitude</label>
										<input type="text" class="form-control" value="<?php echo $detail->lng; ?>" name="lng" id="lng" placeholder="Longitude">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Alamat</label>
										<input type="text" class="form-control" value="<?php echo $detail->alamat; ?>" name="alamat" id="alamat" placeholder="Alamat">
									</div>
									
									<br>
									<h4>Lokasi</h4>
									<div class="form-group">
										<label for="exampleInputPassword1">Kota/Kab</label>
										<input type="text" class="form-control" value="<?php echo $detail->kab; ?>" name="kab" id="kab" placeholder="Kabupaten">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Kecamatan</label>
										<input type="text" class="form-control" value="<?php echo $detail->kec; ?>" name="kec" id="kec" placeholder="Kecamatan">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Kelurahan/Desa</label>
										<input type="text" class="form-control" value="<?php echo $detail->kel; ?>" name="kel" id="kel" placeholder="Kelurahan/Desa">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Witel</label>
										<input type="text" class="form-control" value="<?php echo $detail->witel; ?>" name="witel" id="witel" placeholder="Witel">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Datel</label>
										<select name="datel" id="datel"  class="form-control">
											<option value="<?php echo $detail->datel; ?>"><?php echo $detail->datel; ?></option>
											<?php
											$listdatelku = $this->db->query("select distinct datel from optado where witel='$detail->witel'")->result();
											foreach ($listdatelku as $rowdatelku) :
											?>
												<option value="<?php echo $rowdatelku->datel; ?>"><?php echo $rowdatelku->datel; ?></option>
											<?php
											endforeach;
											?>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Hero</label>
										<select name="hero" id="hero" class="form-control">
											<option value="<?php echo $detail->hero; ?>"><?php echo $detail->hero; ?></option>
											<?php
											$listheroku = $this->db->query("select distinct hero from optado where witel='$detail->witel'")->result(); foreach ($listheroku as $rowheroku):
												$cekcek = explode(" ",$rowheroku->hero);
												if ($cekcek[0] == 'INNER')
													continue;
											?>
												<option value="<?php echo $rowheroku->hero; ?>"><?php echo $rowheroku->hero; ?></option>
											<?php
											endforeach;
											?>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">STO</label>
										<select name="sto" id="sto" class="form-control">
											<option value="<?php echo $detail->sto; ?>"><?php echo $detail->sto; ?></option>
											<?php
											$liststoku = $this->db->query("select distinct sto from optado where witel='$detail->witel'")->result(); 
											foreach ($liststoku as $rowstoku):
											?>
												<option value="<?php echo $rowstoku->sto; ?>"><?php echo $rowstoku->sto; ?></option>
											<?php
											endforeach;
											?>
										</select>
									</div>
									<br>
									<h4>Alat Produksi</h4>
									<div class="form-group">
										<label for="exampleInputEmail1">Nama ODP</label>
										<input type="text" class="form-control" value="<?php echo $detail->odp; ?>" name="odp" id="odp" placeholder="Nama ODP">
									</div>
									<br>
									<h4>Layanan</h4>
									<div class="form-group">
										<label for="exampleInputEmail1">Pelanggan Existing</label>
										<select name="pelanggan_telkom" id="pelanggan_telkom" class="form-control">
											<option value="<?php echo $detail->pelanggan_telkom; ?>"><?php echo $detail->pelanggan_telkom; ?></option>
											<option value="YA">YA</option>
											<option value="TIDAK">TIDAK</option>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Layanan Existing 1</label>
										<input type="text" class="form-control" value="<?php echo $detail->lay_existing; ?>" name="lay_existing" id="lay_existing" placeholder="Layanan Existing 1">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Layanan Existing 2</label>
										<input type="text" class="form-control" value="<?php echo $detail->lay_existing_1; ?>" name="lay_existing_1" id="lay_existing_1" placeholder="Layanan Existing 2">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Layanan Existing 3</label>
										<input type="text" class="form-control" value="<?php echo $detail->lay_existing_2; ?>" name="lay_existing_2" id="lay_existing_2" placeholder="Layanan Existing 3">
									</div>
									<br>
									<h4>Prospek</h4>
									<div class="form-group">
										<label for="exampleInputEmail1">ID Lop Mytens</label>
										<input type="text" class="form-control" value="<?php echo $detail->id_lop; ?>" name="id_lop" id="id_lop" placeholder="ID LOP">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Layanan Prospek</label>
										<input type="text" class="form-control" value="<?php echo $detail->prospek_lay; ?>" name="prospek_lay" id="prospek_lay" placeholder="Prospek Layanan">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Kompetitor</label>
										<input type="text" class="form-control" value="<?php echo $detail->kompetitor; ?>" name="kompetitor" id="kompetitor" placeholder="Kompetitor">
									</div>
								</div>
								<!-- /.card-body -->

								<div class="card-footer">
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</section>
			</div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  