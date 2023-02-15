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
            <h1 class="m-0">Report Progress</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Progress ADO</a></li>
              <li class="breadcrumb-item active">Teritory</li>
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
						<div class="card pb-0">
							<div class="card-body pb-0">
								<form action="<?php echo site_url("progressado/witelsearch/") ?>" method="POST">
									<div class="row">	
										<div class="col-md-3 connectedSortable">
											Kategori ADO :
											<select class="form-control" type="text" id="kat" name="kat">
												<option value='ALL'><?php echo $kategori; ?></option>
												<?php
													$listkat = $this->db->query("select distinct(kat) as kat from dataado")->result();
													foreach ($listkat as $rowkat) :
												?>
														<option value='<?php echo $rowkat->kat; ?>'><?php echo $rowkat->kat; ?></option>
												<?php
													endforeach;
												?>
											</select>
										</div>
										<div class="col-md-3 connectedSortable">
											Teritory :
											<select class="form-control" type="text" id="teritory" name="teritory">
												<option value='<?php echo $teritory; ?>'><?php echo $teritory; ?></option>
												<option value='WITEL'>Witel</option>
												<option value='DATEL'>Datel</option>
												<option value='HERO'>Hero</option>
												<option value='STO'>STO</option>
											</select>
										</div>
										<div class="col-md-2 connectedSortable">
											<br>
											<button type="submit" class="btn btn-success" style="width:100%">
												Search
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</section>
				</div>

        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header bg-purple">
                <h3 class="card-title">
                  <!-- <i class="fas fa-chart-pie mr-1"></i> -->
                  Progress Data ADO <i style="font-size:11px;">Update : <?php echo date('d F, Y'); ?></i>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
				<table class="" style="width:100%;">
					<tr style="border-bottom:2px solid #ccc;">
						<td style="width:5%;height:50px;" align="center">No</td>
						<td style="width:10%;" align="center">Witel</td>
						<td style="width:8%;" align="center">Target</td>
						<td style="width:8%;" align="center">Total ADO</td>
						<td style="width:12%;" align="center">ADO Kordinat Lengkap</td>
						<td style="width:9%;" align="center">ADO ODP Ready</td>
						<td style="width:8%;" align="center">ADO to LOP</td>
						<td style="width:8%;" align="center">% ADO</td>
					</tr>
					<?php
					if ($teritory == 'WITEL') 
					{
						$listdata = $this->db->query("select distinct(witel) as listdata from profilesto")->result();
						$key = "witel";
					} 
					else if ($teritory == 'DATEL') 
					{
						$listdata = $this->db->query("select distinct(datel) as listdata from profilesto")->result();
						$key = "datel";
					} 
					else if ($teritory == 'HERO') 
					{
						$listdata = $this->db->query("select distinct(hero) as listdata from profilesto")->result();
						$key = "hero";
					} 
					else 
					{
						$listdata = $this->db->query("select distinct(sto) as listdata from profilesto")->result();
						$key = "sto";
					}

					if ($kategori=="ALL")
					{
						$key1 = '';
						$key2 = '';
					}
					else
					{
						$key1 = "kat='$kategori' and";
						$key2 = "where kat='$kategori'";
					}
					$no = 0;
					foreach ($listdata as $rowdata):
						$no++;
					?>
						<tr style="">
							<td style="height:40px;vertical-align:middle;text-align:center"> <?php echo $no; ?></td>
							<td style="height:40px;vertical-align:middle;"> <?php echo $rowdata->listdata; ?></td>
							<td align="center">
								<?php
									if ($kategori == "ALL") {
										$target = $this->db->query("SELECT sum(`sekolah`)+sum(`universitas`)+sum(`faskes`)+sum(`industri_besar`)+sum(`industri_sedang`)+sum(`industri_kecil`)+sum(`kawasan_industri`)+sum(`kek`)+sum(`hotel`)+sum(`apartemen`)+sum(`govt_office`)+sum(`restaurant`)+sum(`mall`)+sum(`bumn`)+sum(`bandara`) as tot FROM `optado` WHERE $key='$rowdata->listdata'")->row()->tot;
									}
									else
									{
										$namekat = strtolower($kategori);
										$namekat = str_replace(" ", "_", $namekat);
										if ($namekat=='kawasan_ekonomi_khusus')
											$target = $this->db->query("SELECT sum(kek) as tot FROM `optado` WHERE $key='$rowdata->listdata'")->row()->tot;
										else
											$target = $this->db->query("SELECT sum($namekat) as tot FROM `optado` WHERE $key='$rowdata->listdata'")->row()->tot;
									}
									echo number_format($target);
								?>
							</td>
							<td align="center">
								<?php 
									$dataadoku=$this->db->query("select count(*) as tot from dataado where $key1 $key='$rowdata->listdata'")->row()->tot;
									echo number_format($dataadoku);
								?>
							</td>
							<td align="center">
								<?php 
									$kordlengkap=$this->db->query("select count(*) as tot from dataado where $key1 $key='$rowdata->listdata' and (lat<>'' or lng<>'')")->row()->tot;
									echo number_format($kordlengkap);
								?>
							</td>
							<td align="center">
								<?php 
									$odpreadyado=$this->db->query("select count(*) as tot from dataado where $key1 $key='$rowdata->listdata' and odp<>''")->row()->tot;
									echo number_format($odpreadyado);
								?>
							</td>
							<td align="center">
								<?php 
									$adotolopku=$this->db->query("select count(*) as tot from dataado where $key1 $key='$rowdata->listdata' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
									echo number_format($adotolopku);
								?>
							</td>
							<td align="center">
								<?php 
									if ($target!=0) 
									{
										echo number_format(($dataadoku/$target)*100)."%"; 
									}
								?>
							</td>
						</tr>
					<?php
					endforeach;
					?>
						<tr style="border-top:2px solid #ccc;">
							<td style="height:40px;vertical-align:middle;text-align:center"> </td>
							<td style="height:40px;vertical-align:middle;"> Total</td>
							<td align="center">
								<?php
									if ($kategori == "ALL") {
										$target=$this->db->query("SELECT sum(`sekolah`)+sum(`universitas`)+sum(`faskes`)+sum(`industri_besar`)+sum(`industri_sedang`)+sum(`industri_kecil`)+sum(`kawasan_industri`)+sum(`kek`)+sum(`hotel`)+sum(`apartemen`)+sum(`govt_office`)+sum(`restaurant`)+sum(`mall`)+sum(`bumn`)+sum(`bandara`) as tot FROM `optado`")->row()->tot;
									}
									else
									{
										$namekat = strtolower($kategori);
										$namekat = str_replace(" ", "_", $namekat);
										if ($namekat=='kawasan_ekonomi_khusus')
											$target = $this->db->query("SELECT sum(kek) as tot FROM `optado` WHERE $key='$rowdata->listdata'")->row()->tot;
										else
											$target = $this->db->query("SELECT sum($namekat) as tot FROM `optado` WHERE $key='$rowdata->listdata'")->row()->tot;
									}
									echo number_format($target);
								?>
							</td>
							<td align="center">
								<?php 
									$dataadoku=$this->db->query("select count(*) as tot from dataado $key2")->row()->tot;
									echo number_format($dataadoku);
								?>
							</td>
							<td align="center">
								<?php 
									$kordlengkap=$this->db->query("select count(*) as tot from dataado where $key1 (lat<>'' or lng<>'')")->row()->tot;
									echo number_format($kordlengkap);
								?>
							</td>
							<td align="center">
								<?php 
									$odpreadyado=$this->db->query("select count(*) as tot from dataado where $key1 odp<>''")->row()->tot;
									echo number_format($odpreadyado);
								?>
							</td>
							<td align="center">
								<?php 
									$adotolopku=$this->db->query("select count(*) as tot from dataado where $key1 (id_lop<>'' and id_lop<>'-')")->row()->tot;
									echo number_format($adotolopku);
								?>
							</td>
							<td align="center">
								<?php 
									if ($target!=0) 
									{
										echo number_format(($dataadoku/$target)*100)."%"; 
									}
								?>
							</td>
						</tr>
				</table>
				<i style="font-size:12px;">Update : <?php echo date('d F, Y'); ?></i>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->

		
					
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  