<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
	  	<a href="<?php echo site_url("detailado/list/$witel/$datel/$hero/$sto/$kat"); ?>" class="btn btn-success"><i class="fa fa-arrow-left"></i> Kembali</a>
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
					<div id="map" style="height:350px;width:100%;"></div>
				</div>
			</div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  