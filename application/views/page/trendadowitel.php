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
            <h1 class="m-0">Trend Progress ADO</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trend Progress ADO</a></li>
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
          <!-- Left col -->
          <section class="col-lg-6 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <!-- <i class="fas fa-chart-pie mr-1"></i> -->
				  	<table>
						<tr>
							<td>Pilih Teritory&nbsp;&nbsp;: &nbsp;&nbsp;</td>
							<td>
								<select class="form-control" type="text" id="witelselectku" name="witelselectku" onchange="select_witel()">
									<option value='<?php echo $witel; ?>'><?php echo $witel; ?></option>
									<option value='Regional 7'>REGIONAL 7</option>
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
							</td>
						</tr>
						<tr>
							<td colspan='2'><i style="font-size:12px;"><br>Update : <?php echo date('d F, Y h:m:i'); ?></td>
						</tr>
					</table>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body" >
				<table class="" style="width:100%;">
					<tr style="border-bottom:2px solid #ccc;font-size:13px;">
						<td style="width:5%;height:50px;" align="center">No</td>
						<td style="width:10%;" align="center">Witel</td>
						<td style="width:8%;" align="center">Target</td>
						<td style="width:8%;" align="center">Total ADO <br>(W-1)</td>
						<td style="width:8%;" align="center">Total ADO <br>(HI)</td>
						<td style="width:8%;" align="center">% ADO</td>
						<td style="width:8%;" align="center">% Growt WoW</td>
					</tr>
					<?php
					
					$listdata = $this->db->query("select distinct(witel) as listdata from profilesto")->result();
					$key = "witel";
					$key1 = '';
					$key2 = '';
					
					
					$no = 0;
					foreach ($listdata as $rowdata):
						
						if ($witel != "Regional 7") 
						{
							$no = 1;
							if ($rowdata->listdata != $witel)
								continue;

							$color = "";
						}
						else
						{
							$no++;
							if ($no%2==0)
								$color = "background-color:#f1f1f1;";
							else
								$color = "background-color:#ffffff;";
						}
						
					?>
						<tr style="font-size:13px;<?php echo $color; ?>">
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
									$totaladow1=$this->db->query("select total as total from trendado where teritory='$rowdata->listdata'")->row()->total;
									echo number_format($totaladow1);
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
									if ($target!=0) 
									{
										$cektgt = ($dataadoku/$target)*100;
										if ($cektgt>=100)
											echo "<span style='color:green'>".number_format(($dataadoku/$target)*100)."%</span>";
										else
											echo "<span style='color:red'>".number_format(($dataadoku/$target)*100,1)."%</span>"; 
									}
								?>
							</td>
							<td align="center">
								<?php 
									if ($totaladow1!=0) 
									{
										$cekgrowth = (($dataadoku - $totaladow1) / $totaladow1) * 100;
										if ($cekgrowth>0)
											echo "<span style='color:green'>".number_format((($dataadoku-$totaladow1)/$totaladow1)*100)."%</span>"; 
										else
											echo "<span style='color:red'>".number_format((($dataadoku-$totaladow1)/$totaladow1)*100)."%</span>"; 
									}
								?>
							</td>
						</tr>
					<?php
					endforeach;
					?>
						<tr style="border-top:2px solid #ccc;font-size:13px;font-weight:bold;">
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
									$totaladow1=$this->db->query("select sum(total) as total from trendado")->row()->total;
									echo number_format($totaladow1);
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
									if ($target!=0) 
									{
										$cektgt = ($dataadoku/$target)*100;
										if ($cektgt>=100)
											echo "<span style='color:green'>".number_format(($dataadoku/$target)*100)."%</span>";
										else
											echo "<span style='color:red'>".number_format(($dataadoku/$target)*100,1)."%</span>"; 
									}
								?>
								
							</td>
							<td align="center">
								<?php 
									if ($totaladow1!=0) 
									{
										$cekgrowth = (($dataadoku - $totaladow1) / $totaladow1) * 100;
										if ($cekgrowth>0)
											echo "<span style='color:green'>".number_format((($dataadoku-$totaladow1)/$totaladow1)*100)."%</span>"; 
										else
											echo "<span style='color:red'>".number_format((($dataadoku-$totaladow1)/$totaladow1)*100)."%</span>"; 
									}
								?>
							</td>
						</tr>
				</table>
				<!-- <i style="font-size:12px;">Update : <?php echo date('d F, Y'); ?></i> -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
		  	<section class="col-lg-6 connectedSortable">
				<!-- Custom tabs (Charts with tabs)-->
				<div class="card">
					<div class="card-body" >
						<i style="font-size:12px;">Detail ADO : <font color="blue"><b><?php echo $witel; ?></b></font> | Update : <b><font color="blue"><?php echo date('d F, Y h:m:i'); ?></font></b><br><br></i>
						<table class="" style="width:100%;font-size:13px;">
							<tr>
								<td style="width:13%;"></td>
								<td style="width:18%;" align="center" valign="bottom"><img style="width:35%" src="<?php  echo base_url(); ?>assets/iconku/bandara.png" class=""> <br><b>Bandara</td>
								<td style="width:18%;" align="center" valign="bottom"><img style="width:35%" src="<?php  echo base_url(); ?>assets/iconku/city.png" class=""><br><b>Hotel</td>
								<td style="width:18%;" align="center" valign="bottom"><img style="width:35%" src="<?php  echo base_url(); ?>assets/iconku/dining.png" class=""><br><b>Restaurant</td>
								<td style="width:18%;" align="center" valign="bottom"><img style="width:35%" src="<?php  echo base_url(); ?>assets/iconku/city.png" class=""><br><b>Apartement</td>
								<td style="width:18%;" align="center" valign="bottom"><img style="width:35%" src="<?php  echo base_url(); ?>assets/iconku/scholl.png" class=""><br><b>Sekolah</td>
							</tr>
							<tr>
								<td>Target</td>
								<td align="center"><?php echo number_format($opt_bandara); ?></td>
								<td align="center"><?php echo number_format($opt_hotel); ?></td>
								<td align="center"><?php echo number_format($opt_restaurant); ?></td>
								<td align="center"><?php echo number_format($opt_apartemen); ?></td>
								<td align="center"><?php echo number_format($opt_sekolah); ?></td>
							</tr>
							<tr>
								<td>Realisasi</td>
								<td align="center"><?php echo number_format($bandara); ?></td>
								<td align="center"><?php echo number_format($hotel); ?></td>
								<td align="center"><?php echo number_format($restaurant); ?></td>
								<td align="center"><?php echo number_format($apartemen); ?></td>
								<td align="center"><?php echo number_format($sekolah); ?></td>
							</tr>
							<tr>
								<td>Ach</td>
								<td align="center">
									<?php 
										if ($opt_bandara!=0) 
										{
											$totbdr = ($bandara / $opt_bandara) * 100;
											if ($totbdr>=100)
												echo "<span style='color:green'>".number_format(($bandara/$opt_bandara)*100)."%</span>"; 
											else
												echo "<span style='color:red'>".number_format(($bandara/$opt_bandara)*100)."%</span>"; 
									?>
									<?php 
										} 
									?>
								</td>
								<td align="center">
									<?php 
										if ($opt_hotel!=0) 
										{
											$tothotel = ($hotel/$opt_hotel)*100;
											if ($tothotel>=100)
												echo "<span style='color:green'>".number_format(($hotel/$opt_hotel)*100)."%</span>";
											else
												echo "<span style='color:red'>".number_format(($hotel/$opt_hotel)*100)."%</span>"; 
									?>
									<?php 
										} 
									?>
								</td>
								<td align="center">
									<?php 
										if ($opt_restaurant!=0) 
										{
											$totresto = ($restaurant/$opt_restaurant)*100;
											if ($totresto>=100)
												echo "<span style='color:green'>".number_format(($restaurant/$opt_restaurant)*100)."%</span>"; 
											else
												echo "<span style='color:red'>".number_format(($restaurant/$opt_restaurant)*100)."%</span>"; 
									?>
									<?php 
										} 
									?>
								</td>
								<td align="center">
									<?php 
										if ($opt_apartemen!=0) 
										{
											$totapar = ($apartemen/$opt_apartemen)*100;
											if ($totapar>=100)
												echo "<span style='color:green'>".number_format(($apartemen/$opt_apartemen)*100)."%</span>"; 
											else
												echo "<span style='color:red'>".number_format(($apartemen/$opt_apartemen)*100)."%</span>"; 
									?>
									<?php 
										} 
									?>
								</td>
								<td align="center">
									<?php 
										if ($opt_sekolah!=0) 
										{
											$totsklh = ($sekolah/$opt_sekolah)*100;
											if ($totsklh>=100)
												echo "<span style='color:green'>".number_format(($sekolah/$opt_sekolah)*100)."%</span>"; 
											else
												echo "<span style='color:red'>".number_format(($sekolah/$opt_sekolah)*100)."%</span>";  
									?>
									<?php 
										} 
									?>
								</td>
							</tr>
							<tr>
								<td>Growth</td>
								<td align="center">
									<?php
										if ($trend_bandara>0)
											echo "<span style='color:green'>".number_format($trend_bandara)."%</span>"; 
										else
											echo "<span style='color:red'>".number_format($trend_bandara)."%</span>"; 
									?>
								</td>
								<td align="center">
									<?php
										if ($trend_hotel>0)
											echo "<span style='color:green'>".number_format($trend_hotel)."%</span>"; 
										else
											echo "<span style='color:red'>".number_format($trend_hotel)."%</span>"; 
									?>
								</td>
								<td align="center">
									<?php
										if ($trend_restaurant>0)
											echo "<span style='color:green'>".number_format($trend_restaurant)."%</span>"; 
										else
											echo "<span style='color:red'>".number_format($trend_restaurant)."%</span>"; 
									?>
								</td>
								<td align="center">
									<?php
										if ($trend_apartemen>0)
											echo "<span style='color:green'>".number_format($trend_apartemen)."%</span>"; 
										else
											echo "<span style='color:red'>".number_format($trend_apartemen)."%</span>"; 
									?>
								</td>
								<td align="center">
									<?php
										if ($trend_sekolah>0)
											echo "<span style='color:green'>".number_format($trend_sekolah)."%</span>"; 
										else
											echo "<span style='color:red'>".number_format($trend_sekolah)."%</span>"; 
									?>
								</td>
							</tr>
						</table>
						<hr>
						<table class="" style="width:100%;font-size:13px;">
							<tr>
								<td style="width:13%;"></td>
								<td style="width:18%;" align="center" valign="bottom"><img style="width:30%" src="<?php  echo base_url(); ?>assets/iconku/hospital.png" class=""><br><b>Faskes</td>
								<td style="width:18%;" align="center" valign="bottom"><img style="width:30%" src="<?php  echo base_url(); ?>assets/iconku/factory.png" class=""><br><b>Industri Sedang</td>
								<td style="width:18%;" align="center" valign="bottom"><img style="width:30%" src="<?php  echo base_url(); ?>assets/iconku/Kelurahan.png" class=""><br><b>Govt Office</td>
								<td style="width:18%;" align="center" valign="bottom"><img style="width:30%" src="<?php  echo base_url(); ?>assets/iconku/House.png" class=""><br><b>KEK</td>
								<td style="width:18%;" align="center" valign="bottom"><img style="width:30%" src="<?php  echo base_url(); ?>assets/iconku/factory1.png" class=""><br><b>Mall</td>
							</tr>
							<tr>
								<td>Target</td>
								<td align="center"><?php echo number_format($opt_faskes); ?></td>
								<td align="center"><?php echo number_format($opt_industri_sedang); ?></td>
								<td align="center"><?php echo number_format($opt_govt_office); ?></td>
								<td align="center"><?php echo number_format($opt_kawasan_ekonomi_khusus); ?></td>
								<td align="center"><?php echo number_format($opt_mall); ?></td>
							</tr>
							<tr>
								<td>Realisasi</td>
								<td align="center"><?php echo number_format($faskes); ?></td>
								<td align="center"><?php echo number_format($industri_sedang); ?></td>
								<td align="center"><?php echo number_format($govt_office); ?></td>
								<td align="center"><?php echo number_format($kawasan_ekonomi_khusus); ?></td>
								<td align="center"><?php echo number_format($mall); ?></td>
							</tr>
							<tr>
								<td>Ach</td>
								<td align="center">
									<?php 
										if ($opt_faskes!=0) 
										{
											$totfaskes = ($faskes/$opt_faskes)*100;
											if ($totfaskes>=100)
												echo "<span style='color:green'>".number_format(($faskes/$opt_faskes)*100)."%</span>"; 
											else
												echo "<span style='color:red'>".number_format(($faskes/$opt_faskes)*100)."%</span>"; 
									?>
									<?php 
										} 
									?>
								</td>
								<td align="center">
									<?php 
										if ($opt_industri_sedang!=0) 
										{
											$totinse = ($industri_sedang/$opt_industri_sedang)*100;
											if ($totinse>=100)
												echo "<span style='color:green'>".number_format(($industri_sedang/$opt_industri_sedang)*100)."%</span>"; 
											else
												echo "<span style='color:red'>".number_format(($industri_sedang/$opt_industri_sedang)*100)."%</span>"; 
									?>
									<?php 
										} 
									?>
								</td>
								<td align="center">
									<?php 
										if ($opt_govt_office!=0) 
										{
											$totgov = ($govt_office/$opt_govt_office)*100;
											if ($totgov>=100)
												echo "<span style='color:green'>".number_format(($govt_office/$opt_govt_office)*100)."%</span>"; 
											else
												echo "<span style='color:red'>".number_format(($govt_office/$opt_govt_office)*100)."%</span>"; 
									?>
									<?php 
										} 
									?>
								</td>
								<td align="center">
									<?php 
										if ($opt_kawasan_ekonomi_khusus!=0) 
										{
											$totkek = ($kawasan_ekonomi_khusus/$opt_kawasan_ekonomi_khusus)*100;
											if ($totkek>=100)
												echo "<span style='color:green'>".number_format(($kawasan_ekonomi_khusus/$opt_kawasan_ekonomi_khusus)*100)."%</span>"; 
											else
												echo "<span style='color:red'>".number_format(($kawasan_ekonomi_khusus/$opt_kawasan_ekonomi_khusus)*100)."%</span>"; 
									?>
								<?php 
										} ?>
								</td>
								<td align="center">
									<?php 
										if ($opt_mall!=0) 
										{
											$totmall = ($mall/$opt_mall)*100;
											if ($totmall>=100)
												echo "<span style='color:green'>".number_format(($mall/$opt_mall)*100)."%</span>"; 
											else
												echo "<span style='color:red'>".number_format(($mall/$opt_mall)*100)."%</span>"; 
									?>
									<?php 
										} ?>
								</td>
							</tr>
							<tr>
								<td>Growth</td>
								<td align="center">
									<?php
										if ($trend_faskes>0)
											echo "<span style='color:green'>".number_format($trend_faskes)."%</span>"; 
										else
											echo "<span style='color:red'>".number_format($trend_faskes)."%</span>"; 
									?>
								</td>
								<td align="center">
									<?php
										if ($trend_industri_sedang>0)
											echo "<span style='color:green'>".number_format($trend_industri_sedang)."%</span>"; 
										else
											echo "<span style='color:red'>".number_format($trend_industri_sedang)."%</span>"; 
									?>
								</td>
								<td align="center">
									<?php
										if ($trend_govt_office>0)
											echo "<span style='color:green'>".number_format($trend_govt_office)."%</span>"; 
										else
											echo "<span style='color:red'>".number_format($trend_govt_office)."%</span>"; 
									?>
								</td>
								<td align="center">
									<?php
										if ($trend_kawasan_ekonomi_khusus>0)
											echo "<span style='color:green'>".number_format($trend_kawasan_ekonomi_khusus)."%</span>"; 
										else
											echo "<span style='color:red'>".number_format($trend_kawasan_ekonomi_khusus)."%</span>"; 
									?>
								</td>
								<td align="center">
									<?php
										if ($trend_mall>0)
											echo "<span style='color:green'>".number_format($trend_mall)."%</span>"; 
										else
											echo "<span style='color:red'>".number_format($trend_mall)."%</span>"; 
									?>
								</td>
							</tr>
						</table>
						<hr>
						<table class="" style="width:100%;font-size:13px;">
							<tr>
								<td style="width:13%;"></td>
								<td style="width:18%;" align="center" valign="bottom"><img style="width:30%" src="<?php  echo base_url(); ?>assets/iconku/perumahan.png" class=""><br><b>Industri Besar</td>
								<td style="width:18%;" align="center" valign="bottom"><img style="width:30%" src="<?php  echo base_url(); ?>assets/iconku/House.png" class=""><br><b>Industri Kecil</td>
								<td style="width:18%;" align="center" valign="bottom"><img style="width:30%" src="<?php  echo base_url(); ?>assets/iconku/scholl.png" class=""><br><b>Universitas</td>
								<td style="width:18%;" align="center" valign="bottom"><img style="width:30%" src="<?php  echo base_url(); ?>assets/iconku/factory.png" class=""><br><b>Kawasan Industri</td>
								<td style="width:18%;" align="center" valign="bottom"><img style="width:30%" src="<?php  echo base_url(); ?>assets/iconku/House.png" class=""><br><b>BUMN</td>
							</tr>
							<tr>
								<td>Target</td>
								<td align="center"><?php echo number_format($opt_industri_besar); ?></td>
								<td align="center"><?php echo number_format($opt_industri_kecil); ?></td>
								<td align="center"><?php echo number_format($opt_universitas); ?></td>
								<td align="center"><?php echo number_format($opt_kawasan_industri); ?></td>
								<td align="center"><?php echo number_format($opt_bumn); ?></td>
							</tr>
							<tr>
								<td>Realisasi</td>
								<td align="center"><?php echo number_format($industri_besar); ?></td>
								<td align="center"><?php echo number_format($industri_kecil); ?></td>
								<td align="center"><?php echo number_format($universitas); ?></td>
								<td align="center"><?php echo number_format($kawasan_industri); ?></td>
								<td align="center"><?php echo number_format($bumn); ?></td>
							</tr>
							<tr>
								<td>Ach</td>
								<td align="center">
									<?php 
										if ($opt_industri_besar!=0) 
										{
											$totinbes = ($industri_besar/$opt_industri_besar)*100;
											if ($totinbes>=100)
												echo "<span style='color:green'>".number_format(($industri_besar/$opt_industri_besar)*100)."%</span>";
											else
												echo "<span style='color:red'>".number_format(($industri_besar/$opt_industri_besar)*100)."%</span>";  
									?>
									<?php 
										} 
									?>
								</td>
								<td align="center">
									<?php 
										if ($opt_industri_kecil!=0) 
										{
											$totinkec = ($industri_kecil/$opt_industri_kecil)*100;
											if ($totinkec>=100)
												echo "<span style='color:green'>".number_format(($industri_kecil/$opt_industri_kecil)*100)."%</span>"; 
											else
												echo "<span style='color:red'>".number_format(($industri_kecil/$opt_industri_kecil)*100)."%</span>"; 
									?>
									<?php 
										} 
									?>
								</td>
								<td align="center">
									<?php 
										if ($opt_universitas!=0) 
										{
											$totuni = ($universitas/$opt_universitas)*100;
											if ($totuni>=100)
												echo "<span style='color:green'>".number_format(($universitas/$opt_universitas)*100)."%</span>"; 
											else
												echo "<span style='color:red'>".number_format(($universitas/$opt_universitas)*100)."%</span>"; 

									?>
									<?php 
										} 
									?>
								</td>
								<td align="center">
									<?php 
										if ($opt_kawasan_industri!=0) 
										{
											$totki = ($kawasan_industri/$opt_kawasan_industri)*100;
											if ($totki>=100)
												echo "<span style='color:green'>".number_format(($kawasan_industri/$opt_kawasan_industri)*100)."%</span>";
											else
												echo "<span style='color:red'>".number_format(($kawasan_industri/$opt_kawasan_industri)*100)."%</span>"; 
									?>
									<?php 
										} 
									?>
								</td>
								<td align="center">
									<?php 
										if ($opt_bumn!=0) 
										{
											$totbumn = ($bumn/$opt_bumn)*100;
											if ($totbumn>=100)
												echo "<span style='color:green'>".number_format(($bumn/$opt_bumn)*100)."%</span>";
											else
												echo "<span style='color:red'>".number_format(($bumn/$opt_bumn)*100)."%</span>"; 
									?>
									<?php 
										} 
									?>
								</td>
							</tr>
							<tr>
								<td>Growth</td>
								<td align="center">
									<?php
										if ($trend_industri_besar>0)
											echo "<span style='color:green'>".number_format($trend_industri_besar)."%</span>"; 
										else
											echo "<span style='color:red'>".number_format($trend_industri_besar)."%</span>"; 
									?>
								</td>
								<td align="center">
									<?php
										if ($trend_industri_kecil>0)
											echo "<span style='color:green'>".number_format($trend_industri_kecil)."%</span>"; 
										else
											echo "<span style='color:red'>".number_format($trend_industri_kecil)."%</span>"; 
									?>
								</td>
								<td align="center">
									<?php
										if ($trend_universitas>0)
											echo "<span style='color:green'>".number_format($trend_universitas)."%</span>"; 
										else
											echo "<span style='color:red'>".number_format($trend_universitas)."%</span>"; 
									?>
								</td>
								<td align="center">
									<?php
										if ($trend_kawasan_industri>0)
											echo "<span style='color:green'>".number_format($trend_kawasan_industri)."%</span>"; 
										else
											echo "<span style='color:red'>".number_format($trend_kawasan_industri)."%</span>"; 
									?>
								</td>
								<td align="center">
									<?php
										if ($trend_bumn>0)
											echo "<span style='color:green'>".number_format($trend_bumn)."%</span>"; 
										else
											echo "<span style='color:red'>".number_format($trend_bumn)."%</span>"; 
									?>
								</td>
							</tr>
						</table>
						<br>
						
					</div>
				</div>
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



  