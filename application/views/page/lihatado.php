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
            <h4 class="m-0 p-0">Lihat ADO </b></h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Lihat ADO</a></li>
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
							<div id="map1" style="height:390px;width:100%"></div>
						</div>
					</div>
				</section>
				<section class="col-lg-7 connectedSortable">
					<div class="card">
						<div class="card-header bg-purple">
							<h3 class="card-title">
							<!-- <i class="fas fa-chart-pie mr-1"></i> -->
							<a href="<?php echo site_url('detailado/edit/'.$detail->id); ?>" class="btn btn-default"><i class="fas fa-edit"></i> Edit</a> Data ADO 
							</h3>
						</div><!-- /.card-header -->
						<div class="card-body">
							<form>
								<div class="card-body">
									<h4>Data Pelanggan</h4>
									<div class="form-group">
										<label for="exampleInputEmail1">Nama Pelanggan</label>
										<input type="text" class="form-control" value="<?php echo $detail->nama_cust; ?>" name="nama_cust" id="nama_cust" placeholder="Enter email" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">AM</label>
										<input type="text" class="form-control" value="<?php echo $detail->am; ?>" name="am" id="am" placeholder="Password" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Segment</label>
										<input type="text" class="form-control" value="<?php echo $detail->segment; ?>" name="segment" id="segment" placeholder="Segment" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Nipnas</label>
										<input type="text" class="form-control" value="<?php echo $detail->nipnas; ?>" name="nipnas" id="nipnas" placeholder="Nipnas" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Revenue</label>
										<input type="text" class="form-control" value="<?php echo $detail->revenue; ?>" name="revenue" id="revenue" placeholder="revenue" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Kategori</label>
										<input type="text" class="form-control" value="<?php echo $detail->kat; ?>" name="kat" id="kat"  placeholder="Password" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Detail Kategori</label>
										<input type="text" class="form-control" value="<?php echo $detail->det_kat; ?>" name="det_kat" id="det_kat" placeholder="Password" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Latitude</label>
										<input type="text" class="form-control" value="<?php echo $detail->lat; ?>"  name="lat" id="lat" placeholder="Password" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Longitude</label>
										<input type="text" class="form-control" value="<?php echo $detail->lng; ?>" name="lng" id="lng" placeholder="Password" readonly>
									</div>
									<br>
									<h4>Lokasi</h4>
									<div class="form-group">
										<label for="exampleInputPassword1">Kota/Kab</label>
										<input type="text" class="form-control" value="<?php echo $detail->kab; ?>" name="kab" id="kab" placeholder="Password" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Kecamatan</label>
										<input type="text" class="form-control" value="<?php echo $detail->kec; ?>" name="kec" id="kec" placeholder="Password" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Kelurahan/Desa</label>
										<input type="text" class="form-control" value="<?php echo $detail->kel; ?>" name="kel" id="kel" placeholder="Password" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Alamat</label>
										<input type="text" class="form-control" value="<?php echo $detail->alamat; ?>" name="alamat" id="alamat" placeholder="Password" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Witel</label>
										<input type="text" class="form-control" value="<?php echo $detail->witel; ?>" name="witel" id="witel" placeholder="Password" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Datel</label>
										<input type="text" class="form-control" value="<?php echo $detail->datel; ?>" name="datel" id="datel" placeholder="Password" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Hero</label>
										<input type="text" class="form-control" value="<?php echo $detail->hero; ?>" name="hero" id="hero" placeholder="Password" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">STO</label>
										<input type="text" class="form-control" value="<?php echo $detail->sto; ?>" name="sto" id="sto" placeholder="Password" readonly>
									</div>
									<br>
									<h4>Alat Produksi</h4>
									<div class="form-group">
										<label for="exampleInputEmail1">Nama ODP</label>
										<input type="text" class="form-control" value="<?php echo $detail->odp; ?>" name="odp" id="odp" placeholder="Enter email" readonly>
									</div>
									<?php
									if (($detail->odp != '') and ($detail->odp != '-')) {
										$cekodp = $this->db->query("select * from odp where odp_name='$detail->odp'")->row();
										$totalport = $cekodp->is_total;
										$totalready = $cekodp->avai;
									}
									else
									{
										$totalport = '';
										$totalready = '';
									}
									?>
									<div class="form-group">
										<label for="exampleInputEmail1">Total Port ODP</label>
										<input type="text" class="form-control" value="<?php echo $totalport; ?>" name="total_port" id="total_port" placeholder="Enter email" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Total Port Ready</label>
										<input type="text" class="form-control" value="<?php echo $totalready; ?>" name="port_ready" id="port_ready" placeholder="Enter email" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Jarak Alpro Terdekat</label>
										<input type="text" class="form-control" value="<?php echo $detail->jarak_alpro; ?>" name="jarak_alpro" id="jarak_alpro" placeholder="Enter email" readonly>
									</div>
									<br>
									<h4>Layanan</h4>
									<div class="form-group">
										<label for="exampleInputEmail1">Pelanggan Existing</label>
										<input type="text" class="form-control" value="<?php echo $detail->pelanggan_telkom; ?>" name="pelanggan_telkom" id="pelanggan_telkom" placeholder="Enter email" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Layanan Existing 1</label>
										<input type="text" class="form-control" value="<?php echo $detail->lay_existing; ?>" name="lay_existing" id="lay_existing" placeholder="Enter email" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Layanan Existing 2</label>
										<input type="text" class="form-control" value="<?php echo $detail->lay_existing_1; ?>" name="lay_existing_1" id="lay_existing_1" placeholder="Enter email" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Layanan Existing 3</label>
										<input type="text" class="form-control" value="<?php echo $detail->lay_existing_2; ?>" name="lay_existing_2" id="lay_existing_2" placeholder="Enter email" readonly>
									</div>
									<br>
									<h4>Prospek</h4>
									<div class="form-group">
										<label for="exampleInputEmail1">ID Lop Mytens</label>
										<input type="text" class="form-control" value="<?php echo $detail->id_lop; ?>" name="id_lop" id="id_lop" placeholder="Enter email" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Layanan Prospek</label>
										<input type="text" class="form-control" value="<?php echo $detail->prospek_lay; ?>" name="prospek_lay" id="prospek_lay" placeholder="Enter email" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Kompetitor</label>
										<input type="text" class="form-control" value="<?php echo $detail->kompetitor; ?>" name="kompetitor" id="kompetitor" placeholder="Enter email" readonly>
									</div>
								</div>
								<!-- /.card-body -->

								<!-- <div class="card-footer">
									<button type="submit" class="btn btn-primary">Submit</button>
								</div> -->
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



  