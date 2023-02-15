<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
	  	<a href="<?php echo site_url("dashboard/"); ?>" class="btn btn-success"><i class="fa fa-arrow-left"></i> Kembali</a>
        <br><br>
		<div class="row mb-1">
          <div class="col-sm-6">
            <h4 class="m-0 p-0">Detail ADO : <b><?php echo $kat; ?></b></h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Detail Data ADO</a></li>
              <li class="breadcrumb-item active">index</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
		<?php
			if ($sto=='All')
			{
				if ($hero=='All')
				{
					if ($datel=="All")
					{
						if ($witel=="All")
						{
							echo "Wilayah : Regional 7";
						}
						else
						{
							echo "Witel : <b>" . $witel."</b>";
						}
					}
					else
					{
						echo "Witel : <b>" . $witel . "</b> | Datel : <b>" . $datel."</b>";
					}
				}
				else
				{
					echo "Witel : <b>" . $witel . "</b> | Datel : <b>" . $datel . "</b> | Hero : <b>" . $hero."</b>";
				}
			}
			else
			{
				echo "Witel : <b>" . $witel."</b> | Datel : <b>".$datel."</b> | Hero : <b>".$hero."</b> | STO : <b>".$sto."</b>";
			}

		?>
	</div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

	<?php
		if ($sto=='All')
		{
			if ($hero=='All')
			{
				if ($datel=="All")
				{
					if ($witel=="All")
					{
						$allado = $this->db->query("select * from dataado where kat='$kat'")->result();
						$alladocount = $this->db->query("select count(*) as total from dataado where kat='$kat'")->row()->total;

						$adolengkapkor = $this->db->query("select * from dataado where kat='$kat' and (lat<>'' or lng<>'')")->result();
						$adolengkapkorcount = $this->db->query("select count(*) as total from dataado where kat='$kat' and (lat<>'' or lng<>'')")->row()->total;
						
						$adonotlengkapkor = $this->db->query("select * from dataado where kat='$kat' and (lat='' or lng='')")->result();
						$adonotlengkapkorcount = $this->db->query("select count(*) as total from dataado where kat='$kat' and (lat='' or lng='')")->row()->total;

						$adoodpready = $this->db->query("select * from dataado where kat='$kat' and odp<>''")->result();
						$adolodpreadycount = $this->db->query("select count(*) as total from dataado where kat='$kat' and odp<>''")->row()->total;

						$adolop = $this->db->query("select * from dataado where kat='$kat' and (id_lop<>'' and id_lop<>'-')")->result();
						$adolopcount = $this->db->query("select count(*) as total from dataado where kat='$kat' and (id_lop<>'' and id_lop<>'-')")->row()->total;
					}
					else
					{
						$allado = $this->db->query("select * from dataado where kat='$kat' and witel='$witel'")->result();
						$alladocount = $this->db->query("select count(*) as total from dataado where kat='$kat' and witel='$witel'")->row()->total;
					
						$adolengkapkor = $this->db->query("select * from dataado where kat='$kat' and witel='$witel' and (lat<>'' or lng<>'')")->result();
						$adolengkapkorcount = $this->db->query("select count(*) as total from dataado where kat='$kat' and witel='$witel' and (lat<>'' or lng<>'')")->row()->total;
						
						$adonotlengkapkor = $this->db->query("select * from dataado where kat='$kat' and witel='$witel' and (lat='' or lng='')")->result();
						$adonotlengkapkorcount = $this->db->query("select count(*) as total from dataado where kat='$kat' and witel='$witel' and (lat='' or lng='')")->row()->total;
						
						$adoodpready = $this->db->query("select * from dataado where kat='$kat' and witel='$witel' and odp<>''")->result();
						$adolodpreadycount = $this->db->query("select count(*) as total from dataado where kat='$kat' and witel='$witel' and odp<>''")->row()->total;
					
						$adolop = $this->db->query("select * from dataado where kat='$kat' and witel='$witel' and (id_lop<>'' and id_lop<>'-')")->result();
						$adolopcount = $this->db->query("select count(*) as total from dataado where kat='$kat' and witel='$witel' and (id_lop<>'' and id_lop<>'-')")->row()->total;
					}
				}
				else
				{
					$allado = $this->db->query("select * from dataado where kat='$kat' and datel='$datel'")->result();
					$alladocount = $this->db->query("select count(*) as total from dataado where kat='$kat' and datel='$datel'")->row()->total;

					$adolengkapkor = $this->db->query("select * from dataado where kat='$kat' and datel='$datel' and (lat<>'' or lng<>'')")->result();
					$adolengkapkorcount = $this->db->query("select count(*) as total from dataado where kat='$kat' and datel='$datel' and (lat<>'' or lng<>'')")->row()->total;

					$adonotlengkapkor = $this->db->query("select * from dataado where kat='$kat' and datel='$datel' and (lat='' or lng='')")->result();
					$adonotlengkapkorcount = $this->db->query("select count(*) as total from dataado where kat='$kat' and datel='$datel' and (lat='' or lng='')")->row()->total;
					
					$adoodpready = $this->db->query("select * from dataado where kat='$kat' and datel='$datel' and odp<>''")->result();
					$adolodpreadycount = $this->db->query("select count(*) as total from dataado where kat='$kat' and datel='$datel' and odp<>''")->row()->total;
				
					$adolop = $this->db->query("select * from dataado where kat='$kat' and datel='$datel and (id_lop<>'' and id_lop<>'-')")->result();
					$adolopcount = $this->db->query("select count(*) as total from dataado where kat='$kat' and datel='$datel and (id_lop<>'' and id_lop<>'-')")->row()->total;
				}
			}
			else
			{
				$allado = $this->db->query("select * from dataado where kat='$kat' and hero='$hero'")->result();
				$alladocount = $this->db->query("select count(*) as total from dataado where kat='$kat' and hero='$hero'")->row()->total;

				$adolengkapkor = $this->db->query("select * from dataado where kat='$kat' and hero='$hero' and (lat<>'' or lng<>'')")->result();
				$adolengkapkorcount = $this->db->query("select count(*) as total from dataado where kat='$kat' and hero='$hero' and (lat<>'' or lng<>'')")->row()->total;

				$adonotlengkapkor = $this->db->query("select * from dataado where kat='$kat' and hero='$hero' and (lat='' or lng='')")->result();
				$adonotlengkapkorcount = $this->db->query("select count(*) as total from dataado where kat='$kat' and hero='$hero' and (lat='' or lng='')")->row()->total;
				
				$adoodpready = $this->db->query("select * from dataado where kat='$kat' and hero='$hero' and odp<>''")->result();
				$adolodpreadycount = $this->db->query("select count(*) as total from dataado where kat='$kat' and hero='$hero' and odp<>''")->row()->total;
			
				$adolop = $this->db->query("select * from dataado where kat='$kat' and hero='$hero and (id_lop<>'' and id_lop<>'-')")->result();
				$adolopcount = $this->db->query("select count(*) as total from dataado where kat='$kat' and hero='$hero and (id_lop<>'' and id_lop<>'-')")->row()->total;
			}
		}
		else
		{
			$allado = $this->db->query("select * from dataado where kat='$kat' and sto='$sto'")->result();
			$alladocount = $this->db->query("select count(*) as total from dataado where kat='$kat' and sto='$sto'")->row()->total;

			$adolengkapkor = $this->db->query("select * from dataado where kat='$kat' and sto='$sto' and (lat<>'' or lng<>'')")->result();
			$adolengkapkorcount = $this->db->query("select count(*) as total from dataado where kat='$kat' and sto='$sto' and (lat<>'' or lng<>'')")->row()->total;

			$adonotlengkapkor = $this->db->query("select * from dataado where kat='$kat' and sto='$sto' and (lat='' or lng='')")->result();
			$adonotlengkapkorcount = $this->db->query("select count(*) as total from dataado where kat='$kat' and sto='$sto' and (lat='' or lng='')")->row()->total;
			
			$adoodpready = $this->db->query("select * from dataado where kat='$kat' and sto='$sto' and odp<>''")->result();
			$adolodpreadycount = $this->db->query("select count(*) as total from dataado where kat='$kat' and sto='$sto' and odp<>''")->row()->total;
		
			$adolop = $this->db->query("select * from dataado where kat='$kat' and sto='$sto' and (id_lop<>'' and id_lop<>'-')")->result();
			$adolopcount = $this->db->query("select count(*) as total from dataado where kat='$kat' and sto='$sto' and (id_lop<>'' and id_lop<>'-')")->row()->total;
		}
	?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
			<div class="row">
				<div class="col-12 col-sm-12">
					<!-- <div id="map" style="height:350px;width:100%;"></div> -->
					<div class="card card-default card-outline card-tabs">
						<div class="card-header p-4 border-bottom-0">
						<a href="<?php echo site_url("detailado/list1/$witel/$datel/$hero/$sto/$kat"); ?>" class="btn btn-default" target="_blank" style="border:none;"><img src="<?php  echo base_url(); ?>assets/assetsegbis/unggah/marker/marker2.png" class="img-circle elevation-2" alt="User Image"> Open Maps</a><br><br>
							<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true" style="font-size:13px;color:black">All <b>ADO</b> <font color="red">(<?php echo $alladocount; ?>)</font></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false" style="font-size:13px;color:black">ADO - <b>Kordinat Lengkap</b> <font color="red">(<?php echo $adolengkapkorcount; ?>)</font></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false" style="font-size:13px;color:black">ADO - <b>Kordinat Belum Lengkap</b> <font color="red">(<?php echo $adonotlengkapkorcount; ?>)</font></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false" style="font-size:13px;color:black">ADO - <b>ODP Ready</b> <font color="red">(<?php echo $adolodpreadycount; ?>)</font></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="custom-tabs-three-lop-tab" data-toggle="pill" href="#custom-tabs-three-lop" role="tab" aria-controls="custom-tabs-three-lop" aria-selected="false" style="font-size:13px;color:black">ADO to <b>LOP</b> <font color="red">(<?php echo $adolopcount; ?>)</font></a>
								</li>
							</ul>
						</div>
						<div class="card-body">
							<div class="tab-content" id="custom-tabs-three-tabContent">
							<div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
								<div class="table-responsive">
									<table id="tabel-permintaan-allado" class="table table-hover" style="width:100%;">
										<thead>
											<tr style="font-size:13px;">
												<th style="vertical-align:middle;"><center>No</th>
												<th style="vertical-align:middle;"><center>AM</th>
												<th style="vertical-align:middle;"><center>Witel</th>
												<th style="vertical-align:middle;"><center>Nama Pelanggan</th>
												<th style="vertical-align:middle;"><center>Alamat</th>
												<th style="vertical-align:middle;"><center>Detail<br> Kategori</th>
												<th style="vertical-align:middle;"><center>ODP</th>
												<th style="vertical-align:middle;"><center>Action</th>
											</tr>
										</thead>
										<tbody style="font-size:13px;">
										
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
								<table id="tabel-permintaan-kordlengado" class="table table-hover" style="width:100%;">
									<thead>
										<tr style="font-size:13px;">
											<th style="vertical-align:middle;"><center>No</th>
											<th style="vertical-align:middle;"><center>AM</th>
											<th style="vertical-align:middle;"><center>Witel</th>
											<th style="vertical-align:middle;"><center>Nama Pelanggan</th>
											<th style="vertical-align:middle;"><center>Alamat</th>
											<th style="vertical-align:middle;"><center>Detail<br> Kategori</th>
											<th style="vertical-align:middle;"><center>ODP</th>
											<th style="vertical-align:middle;"><center>Jarak Alpro</th>
											<th style="vertical-align:middle;"><center>Kordinat</th>
											<th style="vertical-align:middle;"><center>Action</th>
										</tr>
									</thead>
									<tbody style="font-size:13px;">
										
									</tbody>
								</table>
							</div>
							<div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
								<table id="tabel-permintaan-kordnotlengado" class="table table-hover" style="width:100%;">
									<thead>
										<tr style="font-size:13px;">
											<th style="vertical-align:middle;"><center>No</th>
											<th style="vertical-align:middle;"><center>AM</th>
											<th style="vertical-align:middle;"><center>Witel</th>
											<th style="vertical-align:middle;"><center>Nama Pelanggan</th>
											<th style="vertical-align:middle;"><center>Alamat</th>
											<th style="vertical-align:middle;"><center>Detail<br> Kategori</th>
											<th style="vertical-align:middle;"><center>ODP</th>
											<th style="vertical-align:middle;"><center>Action</th>
										</tr>
									</thead>
									<tbody style="font-size:13px;">
										
									</tbody>
								</table>
							</div>
							<div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
								<table id="tabel-permintaan-odpready" class="table table-hover" style="width:100%;">
									<thead>
										<tr style="font-size:13px;">
											<th style="vertical-align:middle;"><center>No</th>
											<th style="vertical-align:middle;"><center>AM</th>
											<th style="vertical-align:middle;"><center>Witel</th>
											<th style="vertical-align:middle;"><center>Nama Pelanggan</th>
											<th style="vertical-align:middle;"><center>Alamat</th>
											<th style="vertical-align:middle;"><center>Detail<br> Kategori</th>
											<th style="vertical-align:middle;"><center>ODP</th>
											<th style="vertical-align:middle;"><center>Layanan <br> Existing</th>
											<th style="vertical-align:middle;"><center>Action</th>
										</tr>
									</thead>
									<tbody style="font-size:13px;">
										
									</tbody>
								</table>
							</div>
							<div class="tab-pane fade" id="custom-tabs-three-lop" role="tabpanel" aria-labelledby="custom-tabs-three-lop-tab">
								<table id="tabel-permintaan-adolop" class="table table-hover" style="width:100%;">
									<thead>
										<tr style="font-size:13px;">
											<th style="vertical-align:middle;"><center>No</th>
											<th style="vertical-align:middle;"><center>AM</th>
											<th style="vertical-align:middle;"><center>Witel</th>
											<th style="vertical-align:middle;"><center>Nama Pelanggan</th>
											<th style="vertical-align:middle;"><center>Alamat</th>
											<th style="vertical-align:middle;"><center>Detail<br> Kategori</th>
											<th style="vertical-align:middle;"><center>ODP</th>
											<th style="vertical-align:middle;"><center>ID Lop</th>
											<th style="vertical-align:middle;"><center>Action</th>
										</tr>
									</thead>
									<tbody style="font-size:13px;">
										
									</tbody>
								</table>
							</div>
							</div>
						</div>
						<!-- /.card -->
					</div>
				</div>
			</div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  