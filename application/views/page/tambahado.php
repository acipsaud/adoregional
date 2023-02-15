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
            <h4 class="m-0 p-0">Tambah Data ADO </b></h4>
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
				
				<section class="col-lg-12 connectedSortable">
					<div class="card">
						<div class="card-header bg-purple">
							<h3 class="card-title">
							<!-- <i class="fas fa-chart-pie mr-1"></i> -->
							Data ADO
							</h3>
						</div><!-- /.card-header -->
						<div class="card-body">
							<form action="<?php echo site_url('Detailado/simpanado'); ?>" method="POST">
								<div class="card-body">
									<h4>Data Pelanggan</h4>
									<div class="form-group">
										<label for="exampleInputEmail1">Nama Pelanggan</label>
										<input type="text" class="form-control" value="" name="nama_cust" id="nama_cust" placeholder="Nama Pelanggan">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">AM</label>
										<input type="text" class="form-control" value="" name="am" id="am" placeholder="Accout Manager">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Segment</label>
										<select name="segment" id="segment" class="form-control">
											<option value="DES">DES</option>
											<option value="DBS">DBS</option>
											<option value="DGS">DGS</option>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Nipnas</label>
										<input type="text" class="form-control" value="" name="nipnas" id="nipnas" placeholder="Nipnas">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Revenue</label>
										<input type="text" class="form-control" value="" name="revenue" id="revenue" placeholder="revenue">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Kategori</label>
										<select name="kat" id="kat"  class="form-control">
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
											<?php
											$listdetkat = $this->db->query("select distinct det_kat from dataado")->result();
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
										<input type="text" class="form-control" value=""  name="lat" id="lat" placeholder="Latitude">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Longitude</label>
										<input type="text" class="form-control" value="" name="lng" id="lng" placeholder="Longitude">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Alamat</label>
										<input type="text" class="form-control" value="" name="alamat" id="alamat" placeholder="Alamat">
									</div>
									
									<br>
									<h4>Lokasi</h4>
									<div class="form-group">
										<label for="exampleInputPassword1">Kota/Kab</label>
										<input type="text" class="form-control" value="" name="kab" id="kab" placeholder="Kabupaten">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Kecamatan</label>
										<input type="text" class="form-control" value="" name="kec" id="kec" placeholder="Kecamatan">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Kelurahan/Desa</label>
										<input type="text" class="form-control" value="" name="kel" id="kel" placeholder="Kelurahan/Desa">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Witel</label>
										<select class="form-control" type="text" id="witel" name="witel">
											<option value=''><?php echo $witel; ?></option>
											<?php
												$getwitel=$this->db->query("SELECT DISTINCT witel FROM `teritory`")->result();
												$no=0;
												foreach ($getwitel as $rowwitel) : $no++;
											?>
												<option value='<?php echo $rowwitel->witel; ?>'><?php echo $rowwitel->witel; ?></option>
											<?php
												endforeach;
											?>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Datel</label>
										<select class="form-control" type="text" id="datel" name="datel">
											<option value=''><?php echo $datel; ?></option>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Hero</label>
										<select class="form-control" type="text" id="hero" name="hero">
											<option value=''><?php echo $hero; ?></option>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">STO</label>
										<select class="form-control" type="text" id="sto" name="sto">
											<option value=''><?php echo $sto; ?></option>
										</select>
									</div>
									<br>
									<h4>Alat Produksi</h4>
									<div class="form-group">
										<label for="exampleInputEmail1">Nama ODP</label>
										<input type="text" class="form-control" value="" name="odp" id="odp" placeholder="Nama ODP">
									</div>
									<br>
									<h4>Layanan</h4>
									<div class="form-group">
										<label for="exampleInputEmail1">Pelanggan Existing</label>
										<select name="pelanggan_telkom" id="pelanggan_telkom" class="form-control">
											<option value="YA">YA</option>
											<option value="TIDAK">TIDAK</option>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Layanan Existing 1</label>
										<input type="text" class="form-control" value="" name="lay_existing" id="lay_existing" placeholder="Layanan Existing 1">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Layanan Existing 2</label>
										<input type="text" class="form-control" value="" name="lay_existing_1" id="lay_existing_1" placeholder="Layanan Existing 2">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Layanan Existing 3</label>
										<input type="text" class="form-control" value="" name="lay_existing_2" id="lay_existing_2" placeholder="Layanan Existing 3">
									</div>
									<br>
									<h4>Prospek</h4>
									<div class="form-group">
										<label for="exampleInputEmail1">ID Lop Mytens</label>
										<input type="text" class="form-control" value="" name="id_lop" id="id_lop" placeholder="ID LOP">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Layanan Prospek</label>
										<input type="text" class="form-control" value="" name="prospek_lay" id="prospek_lay" placeholder="Prospek Layanan">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Kompetitor</label>
										<input type="text" class="form-control" value="" name="kompetitor" id="kompetitor" placeholder="Kompetitor">
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



  