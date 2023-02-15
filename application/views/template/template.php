<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data ADO | Regional 7</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/dist/css/adminlte.min.css">
   <!-- daterange picker -->
   <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/daterangepicker/daterangepicker.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

	    <!-- Leflet -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/assetsegbis/js/leaflet-search/dist/leaflet-search.min.css')?>">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
			integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
			crossorigin="" />
	<link rel="stylesheet" href="<?=base_url()?>assets/assetsegbis/js/leaflet-panel-layers-master/src/leaflet-panel-layers.css" />
	<style type="text/css">
		#map {
				height: 100vh;
		}

		.icon {
				display: inline-block;
				margin: 2px;
				height: 16px;
				width: 16px;
				background-color: #ccc;
		}

		.icon-bar {
				background: url('assets/assetsegbis/js/leaflet-panel-layers-master/examples/images/icons/bar.png') center center no-repeat;
		}

		.leaflet-tooltip.no-background {
				background: transparent;
				border: 0;
				box-shadow: none;
				color: #fff;
				font-weight: bold;
				text-shadow: 1px 1px 1px #000, -1px 1px 1px #000, 1px -1px 1px #000, -1px -1px 1px #000;
		}

		.leaflet-container {
				background: transparent;
		}
	</style>

</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <?php echo $header; ?>
  <?php echo $sidebar; ?>
  <?php echo $konten; ?>
  

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0 <?php //echo $blnku; ?>
    </div>
    <strong>Copyright &copy; EGBIS <a href="https://adminlte.io">Regional 7</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="<?php  echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php  echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php  echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php  echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php  echo base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php  echo base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php  echo base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php  echo base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php  echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php  echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php  echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php  echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php  echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php  echo base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php  echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php  echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
<!-- date-range-picker -->
<script src="<?php  echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- InputMask -->
<script src="<?php  echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php  echo base_url(); ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>




<!-- Select2 -->
<script src="<?php  echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php  echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php  echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php  echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php  echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php  echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php  echo base_url(); ?>assets/lugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php  echo base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?php  echo base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php  echo base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php  echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php  echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php  echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script> -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })
  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>


<!-- <script src="<?php  echo base_url(); ?>assets/chart.js/vendor.bundle.base.js"></script> -->
<!-- <script src="<?php  echo base_url(); ?>assets/chart.js/Chart.min.js"></script> -->


<script>
  const ctx3 = document.getElementById('myChartku');

  new Chart(ctx3, {
    type: 'pie',
    data: {
      labels: ['DES','DBS','DGS'],
      datasets: [{
        label: 'Revenue',
        data: ['<?php echo $des ?>','<?php echo $dbs ?>','<?php echo $dgs ?>'],
        borderWidth: 1
      }]
    },
    options: {
      aspectRatio:1 
    }
  });
</script>


<script type="text/javascript">
	
  $(function () {
		const table = $("#tabel-permintaan").DataTable({
				"bPaginate": true,
				"searching": true,
				"processing": true,
				"serverSide": true,
				"autoWidth": false,
				"lengthMenu": [
					[5, 50, 99999],
        	[5, 50, "All"]
				],
				"ajax": {
						url: "<?php echo base_url('detailado/get_data_ado/')?>",
						type: "post",
						error: function() {
								console.log('error');
						}
				}
		});

	// 	$("#example1").DataTable({
    //   "responsive": true, "lengthChange": false, "autoWidth": false,
    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

		const table1 = $("#tabel-permintaan-allado").DataTable({
				"bPaginate": true,
				"searching": true,
				"processing": true,
				"serverSide": true,
				"autoWidth": false,
				"lengthMenu": [
					[5, 50, 99999],
        	[5, 50, "All"]
				],
				"ajax": {
						url: "<?php echo base_url('detailado/get_data_ado_dashboard_allado/'.$kat.'/'.$witel.'/'.$datel.'/'.$hero.'/'.$sto)?>",
						type: "post",
						error: function() {
								console.log('error');
						}
				}
		});

		const table2 = $("#tabel-permintaan-kordlengado").DataTable({
				"bPaginate": true,
				"searching": true,
				"processing": true,
				"serverSide": true,
				"autoWidth": false,
				"lengthMenu": [
					[5, 50, 99999],
        	[5, 50, "All"]
				],
				"ajax": {
						url: "<?php echo base_url('detailado/get_data_ado_dashboard_kordlengado/'.$kat.'/'.$witel.'/'.$datel.'/'.$hero.'/'.$sto)?>",
						type: "post",
						error: function() {
								console.log('error');
						}
				}
		});

		const table3 = $("#tabel-permintaan-kordnotlengado").DataTable({
				"bPaginate": true,
				"searching": true,
				"processing": true,
				"serverSide": true,
				"autoWidth": false,
				"lengthMenu": [
					[5, 50, 99999],
        	[5, 50, "All"]
				],
				"ajax": {
						url: "<?php echo base_url('detailado/get_data_ado_dashboard_kordnotlengado/'.$kat.'/'.$witel.'/'.$datel.'/'.$hero.'/'.$sto)?>",
						type: "post",
						error: function() {
								console.log('error');
						}
				}
		});

		const table4 = $("#tabel-permintaan-odpready").DataTable({
				"bPaginate": true,
				"searching": true,
				"processing": true,
				"serverSide": true,
				"autoWidth": false,
				"lengthMenu": [
					[5, 50, 99999],
        	[5, 50, "All"]
				],
				"ajax": {
						url: "<?php echo base_url('detailado/get_data_ado_dashboard_odpready/'.$kat.'/'.$witel.'/'.$datel.'/'.$hero.'/'.$sto)?>",
						type: "post",
						error: function() {
								console.log('error');
						}
				}
		});

		const table5 = $("#tabel-permintaan-adolop").DataTable({
				"bPaginate": true,
				"searching": true,
				"processing": true,
				"serverSide": true,
				"autoWidth": false,
				"lengthMenu": [
					[5, 50, 99999],
        	[5, 50, "All"]
				],
				"ajax": {
						url: "<?php echo base_url('detailado/get_data_ado_dashboard_adolop/'.$kat.'/'.$witel.'/'.$datel.'/'.$hero.'/'.$sto)?>",
						type: "post",
						error: function() {
								console.log('error');
						}
				}
		});

	// 	 $("tabel-permintaan1").DataTable({
    //   "responsive": true, "lengthChange": false, "autoWidth": false,
    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


		$('#witelfilterado').change(function() {
				var witelfilterado=$("#witelfilterado").val();
				// alert(witelfilterado);
				$('#tabel-permintaan').DataTable().clear().destroy();
				$("#tabel-permintaan").DataTable({
						"bPaginate": true,
						"searching": true,
						"processing": true,
						"serverSide": true,
						"autoWidth": false,
						"lengthMenu": [
							[10, 50, 99999],
        			[10, 50, "All"]
						],
						"ajax": {
								url: "<?php echo base_url('detailado/get_data_ado/witel/')?>"+witelfilterado,
								type: "post",
								error: function() {
										console.log('error');
								}
						}
				});	
		});

		$('#witelfilterado').change(function(){
			var witel=$(this).val();
			$.ajax({
					url : "<?php echo base_url();?>dashboard/datel",
					method : "POST",
					data : {witel: witel},
					async : false,
					dataType : 'json',
					success: function(data){
							var html = '';
							var i;
							html += '<option value="All">All Datel</option>';
							for(i=0; i<data.length; i++){
									html += '<option value="'+data[i].datel+'">'+data[i].datel+'</option>';
							}
							$('#datelfilterado').html(html);
							$('#herofilterado').html('<option value="All">All Datel</option>');
							$('#stofilterado').html('<option value="All">All Datel</option>');
							
					}
			});
		});

		$('#witelfilterado').change(function(){
			var key=$(this).val();
			$.ajax({
					url : "<?php echo base_url();?>detailado/get_data_ado_detail/witel/"+key,
					method : "POST",
					data : {key: key},
					async : false,
					dataType : 'json',
					success: function(data){
							// var html = '';
							// var i;
							// html += '<option value="All">All Datel</option>';
							// for(i=0; i<data.length; i++){
							// 		html += '<option value="'+data[i].datel+'">'+data[i].datel+'</option>';
							// }
							// $('#datelfilterado').html(html);
							// $('#herofilterado').html('<option value="All">All Datel</option>');
							// $('#stofilterado').html('<option value="All">All Datel</option>');
							// alert(data.universitas);
							$('.detailbandara').html(data.bandara);
							$('.detailhotel').html(data.hotel);
							$('.detailrestaurant').html(data.restaurant);
							$('.detailapartemen').html(data.apartemen);
							$('.detailsekolah').html(data.sekolah);
							$('.detailfaskes').html(data.faskes);
							$('.detailindustri_sedang').html(data.industri_sedang);
							$('.detailgovt_office').html(data.govt_office);
							$('.detailkawasan_ekonomi_khusus').html(data.kawasan_ekonomi_khusus);
							$('.detailmall').html(data.mall);
							$('.detailindustri_besar').html(data.industri_besar);
							$('.detailindustri_kecil').html(data.industri_kecil);
							$('.detailuniversitas').html(data.universitas);
							$('.detailkawasan_industri').html(data.kawasan_industri);
							$('.detailbumn').html(data.bumn);
					}
			});
		});

		$('#datelfilterado').change(function() {
				var datelfilterado=$("#datelfilterado").val();
				// alert(witelfilterado);
				$('#tabel-permintaan').DataTable().clear().destroy();
				$("#tabel-permintaan").DataTable({
						"bPaginate": true,
						"searching": true,
						"processing": true,
						"serverSide": true,
						"autoWidth": false,
						"lengthMenu": [
							[10, 50, 99999],
        			[10, 50, "All"]
						],
						"ajax": {
								url: "<?php echo base_url('detailado/get_data_ado/datel/')?>"+datelfilterado,
								type: "post",
								error: function() {
										console.log('error');
								}
						}
				});	
		});

		$('#datelfilterado').change(function(){
			var key=$(this).val();
			$.ajax({
					url : "<?php echo base_url();?>detailado/get_data_ado_detail/datel/"+key,
					method : "POST",
					data : {key: key},
					async : false,
					dataType : 'json',
					success: function(data){
							// var html = '';
							// var i;
							// html += '<option value="All">All Datel</option>';
							// for(i=0; i<data.length; i++){
							// 		html += '<option value="'+data[i].datel+'">'+data[i].datel+'</option>';
							// }
							// $('#datelfilterado').html(html);
							// $('#herofilterado').html('<option value="All">All Datel</option>');
							// $('#stofilterado').html('<option value="All">All Datel</option>');
							// alert(data.universitas);
							$('.detailbandara').html(data.bandara);
							$('.detailhotel').html(data.hotel);
							$('.detailrestaurant').html(data.restaurant);
							$('.detailapartemen').html(data.apartemen);
							$('.detailsekolah').html(data.sekolah);
							$('.detailfaskes').html(data.faskes);
							$('.detailindustri_sedang').html(data.industri_sedang);
							$('.detailgovt_office').html(data.govt_office);
							$('.detailkawasan_ekonomi_khusus').html(data.kawasan_ekonomi_khusus);
							$('.detailmall').html(data.mall);
							$('.detailindustri_besar').html(data.industri_besar);
							$('.detailindustri_kecil').html(data.industri_kecil);
							$('.detailuniversitas').html(data.universitas);
							$('.detailkawasan_industri').html(data.kawasan_industri);
							$('.detailbumn').html(data.bumn);
					}
			});
		});

		$('#datelfilterado').change(function(){
			var datel=$(this).val();
			$.ajax({
					url : "<?php echo base_url();?>dashboard/hero",
					method : "POST",
					data : {datel: datel},
					async : false,
					dataType : 'json',
					success: function(data){
							var html = '';
							var i;
							html += '<option value="All">All Hero</option>';
							for(i=0; i<data.length; i++){
									html += '<option value="'+data[i].hero+'">'+data[i].hero+'</option>';
							}
							$('#herofilterado').html(html);
					}
			});
		});

		$('#datelfilterado').change(function(){
			var datel=$(this).val();
			$.ajax({
					url : "<?php echo base_url();?>dashboard/stodatel",
					method : "POST",
					data : {datel: datel},
					async : false,
					dataType : 'json',
					success: function(data){
							var html = '';
							var i;
							html += '<option value="All">All STO</option>';
							for(i=0; i<data.length; i++){
									html += '<option value="'+data[i].sto+'">'+data[i].sto+'</option>';
							}
							$('#stofilterado').html(html);
					}
			});
		});

		$('#herofilterado').change(function() {
				var herofilterado=$("#herofilterado").val();
				// alert(witelfilterado);
				$('#tabel-permintaan').DataTable().clear().destroy();
				$("#tabel-permintaan").DataTable({
						"bPaginate": true,
						"searching": true,
						"processing": true,
						"serverSide": true,
						"autoWidth": false,
						"lengthMenu": [
							[10, 50, 99999],
        			[10, 50, "All"]
						],
						"ajax": {
								url: "<?php echo base_url('detailado/get_data_ado/hero/')?>"+herofilterado,
								type: "post",
								error: function() {
										console.log('error');
								}
						}
				});	
		});

		$('#herofilterado').change(function(){
			var key=$(this).val();
			$.ajax({
					url : "<?php echo base_url();?>detailado/get_data_ado_detail/hero/"+key,
					method : "POST",
					data : {key: key},
					async : false,
					dataType : 'json',
					success: function(data){
							// var html = '';
							// var i;
							// html += '<option value="All">All Datel</option>';
							// for(i=0; i<data.length; i++){
							// 		html += '<option value="'+data[i].datel+'">'+data[i].datel+'</option>';
							// }
							// $('#datelfilterado').html(html);
							// $('#herofilterado').html('<option value="All">All Datel</option>');
							// $('#stofilterado').html('<option value="All">All Datel</option>');
							// alert(data.universitas);
							$('.detailbandara').html(data.bandara);
							$('.detailhotel').html(data.hotel);
							$('.detailrestaurant').html(data.restaurant);
							$('.detailapartemen').html(data.apartemen);
							$('.detailsekolah').html(data.sekolah);
							$('.detailfaskes').html(data.faskes);
							$('.detailindustri_sedang').html(data.industri_sedang);
							$('.detailgovt_office').html(data.govt_office);
							$('.detailkawasan_ekonomi_khusus').html(data.kawasan_ekonomi_khusus);
							$('.detailmall').html(data.mall);
							$('.detailindustri_besar').html(data.industri_besar);
							$('.detailindustri_kecil').html(data.industri_kecil);
							$('.detailuniversitas').html(data.universitas);
							$('.detailkawasan_industri').html(data.kawasan_industri);
							$('.detailbumn').html(data.bumn);
					}
			});
		});

		$('#herofilterado').change(function(){
			var hero=$(this).val();
			$.ajax({
					url : "<?php echo base_url();?>dashboard/stohero",
					method : "POST",
					data : {hero: hero},
					async : false,
					dataType : 'json',
					success: function(data){
							var html = '';
							var i;
							html += '<option value="All">All STO</option>';
							for(i=0; i<data.length; i++){
									html += '<option value="'+data[i].sto+'">'+data[i].sto+'</option>';
							}
							$('#stofilterado').html(html);
					}
			});
		});

		$('#stofilterado').change(function() {
				var stofilterado=$("#stofilterado").val();
				// alert(witelfilterado);
				$('#tabel-permintaan').DataTable().clear().destroy();
				$("#tabel-permintaan").DataTable({
						"bPaginate": true,
						"searching": true,
						"processing": true,
						"serverSide": true,
						"autoWidth": false,
						"lengthMenu": [
							[10, 50, 99999],
        			[10, 50, "All"]
						],
						"ajax": {
								url: "<?php echo base_url('detailado/get_data_ado/sto/')?>"+stofilterado,
								type: "post",
								error: function() {
										console.log('error');
								}
						}
				});	
		});

		$('#stofilterado').change(function(){
			var key=$(this).val();
			$.ajax({
					url : "<?php echo base_url();?>detailado/get_data_ado_detail/sto/"+key,
					method : "POST",
					data : {key: key},
					async : false,
					dataType : 'json',
					success: function(data){
							// var html = '';
							// var i;
							// html += '<option value="All">All Datel</option>';
							// for(i=0; i<data.length; i++){
							// 		html += '<option value="'+data[i].datel+'">'+data[i].datel+'</option>';
							// }
							// $('#datelfilterado').html(html);
							// $('#herofilterado').html('<option value="All">All Datel</option>');
							// $('#stofilterado').html('<option value="All">All Datel</option>');
							// alert(data.universitas);
							$('.detailbandara').html(data.bandara);
							$('.detailhotel').html(data.hotel);
							$('.detailrestaurant').html(data.restaurant);
							$('.detailapartemen').html(data.apartemen);
							$('.detailsekolah').html(data.sekolah);
							$('.detailfaskes').html(data.faskes);
							$('.detailindustri_sedang').html(data.industri_sedang);
							$('.detailgovt_office').html(data.govt_office);
							$('.detailkawasan_ekonomi_khusus').html(data.kawasan_ekonomi_khusus);
							$('.detailmall').html(data.mall);
							$('.detailindustri_besar').html(data.industri_besar);
							$('.detailindustri_kecil').html(data.industri_kecil);
							$('.detailuniversitas').html(data.universitas);
							$('.detailkawasan_industri').html(data.kawasan_industri);
							$('.detailbumn').html(data.bumn);
					}
			});
		});

		$('#kategorifilterado').change(function() {
				var witelfilterado=$("#witelfilterado").val();
				var datelfilterado=$("#datelfilterado").val();
				var herofilterado=$("#herofilterado").val();
				var stofilterado=$("#stofilterado").val();
				var kat=$(this).val();

				$('#tabel-permintaan').DataTable().clear().destroy();
				$("#tabel-permintaan").DataTable({
						"bPaginate": true,
						"searching": true,
						"processing": true,
						"serverSide": true,
						"autoWidth": false,
						"lengthMenu": [
							[10, 50, 99999],
        			[10, 50, "All"]
						],
						"ajax": {
								url: "<?php echo base_url('detailado/get_data_ado_lengkap/')?>"+witelfilterado+"/"+datelfilterado+"/"+herofilterado+"/"+stofilterado+"/"+kat,
								type: "post",
								error: function() {
										console.log('error');
								}
						}
				});	
		});

		// $('.downloadexcel').click(function() {
		// 	var witelfilterado=$("#witelfilterado").val();
		// 	var datelfilterado=$("#datelfilterado").val();
		// 	var herofilterado=$("#herofilterado").val();
		// 	var stofilterado=$("#stofilterado").val();
		// 	var kat=$("#kategorifilterado").val();
		// 	alert(witelfilterado+datelfilterado+herofilterado+stofilterado+kat);
		// });

		$("#downloadexcel").click(function(){
			alert("The paragraph was clicked.");
		});

		$('#kategorifilterado').change(function() {
			var kat=$(this).val();
			if (kat=='BANDARA')
			{$(".bandaracolor").css("background-color", "#dedede");}else{$(".bandaracolor").css("background-color", "#fff");}

			if (kat=='HOTEL')
			{$(".hotelcolor").css("background-color", "#dedede");}else{$(".hotelcolor").css("background-color", "#fff");}

			if (kat=='RESTAURANT')
			{$(".restaurantcolor").css("background-color", "#dedede");}else{$(".restaurantcolor").css("background-color", "#fff");}

			if (kat=='APARTEMEN')
			{$(".apartemencolor").css("background-color", "#dedede");}else{$(".apartemencolor").css("background-color", "#fff");}

			if (kat=='SEKOLAH')
			{$(".sekolahcolor").css("background-color", "#dedede");}else{$(".sekolahcolor").css("background-color", "#fff");}

			if (kat=='FASKES')
			{$(".faskescolor").css("background-color", "#dedede");}else{$(".faskescolor").css("background-color", "#fff");}

			if (kat=='INDUSTRI SEDANG')
			{$(".industrisedangcolor").css("background-color", "#dedede");}else{$(".industrisedangcolor").css("background-color", "#fff");}

			if (kat=='GOVT OFFICE')
			{$(".govtofficecolor").css("background-color", "#dedede");}else{$(".govtofficecolor").css("background-color", "#fff");}

			if (kat=='KAWASAN EKONOMI KHUSUS')
			{$(".kekcolor").css("background-color", "#dedede");}else{$(".kekcolor").css("background-color", "#fff");}

			if (kat=='MALL')
			{$(".mallcolor").css("background-color", "#dedede");}else{$(".mallcolor").css("background-color", "#fff");}

			if (kat=='INDUSTRI BESAR')
			{$(".industribesarcolor").css("background-color", "#dedede");}else{$(".industribesarcolor").css("background-color", "#fff");}

			if (kat=='INDUSTRI KECIL')
			{$(".industrikecilcolor").css("background-color", "#dedede");}else{$(".industrikecilcolor").css("background-color", "#fff");}

			if (kat=='UNIVERSITAS')
			{$(".universitascolor").css("background-color", "#dedede");}else{$(".universitascolor").css("background-color", "#fff");}

			if (kat=='KAWASAN INDUSTRI')
			{$(".kawasanindustricolor").css("background-color", "#dedede");}else{$(".kawasanindustricolor").css("background-color", "#fff");}

			if (kat=='BUMN')
			{$(".bumncolor").css("background-color", "#dedede");}else{$(".bumncolor").css("background-color", "#fff");}

			// $('.detailbandara').html(data.bandara);
			// $('.detailhotel').html(data.hotel);
			// $('.detailrestaurant').html(data.restaurant);
			// $('.detailapartemen').html(data.apartemen);
			// $('.detailsekolah').html(data.sekolah);
			// $('.detailfaskes').html(data.faskes);
			// $('.detailindustri_sedang').html(data.industri_sedang);
			// $('.detailgovt_office').html(data.govt_office);
			// $('.detailkawasan_ekonomi_khusus').html(data.kawasan_ekonomi_khusus);
			// $('.detailmall').html(data.mall);
			// $('.detailindustri_besar').html(data.industri_besar);
			// $('.detailindustri_kecil').html(data.industri_kecil);
			// $('.detailuniversitas').html(data.universitas);
			// $('.detailkawasan_industri').html(data.kawasan_industri);
			// $('.detailbumn').html(data.bumn);
		});

    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
		$('#examplemenudetailado').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": false,
    });
		$('#example3').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
		$('#example4').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
		$('#example5').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
		$('#example6').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });

	$('#witel').change(function(){
			var witel=$(this).val();
			$.ajax({
					url : "<?php echo base_url();?>dashboard/datel",
					method : "POST",
					data : {witel: witel},
					async : false,
					dataType : 'json',
					success: function(data){
							var html = '';
							var i;
							html += '<option value="All">All Datel</option>';
							for(i=0; i<data.length; i++){
									html += '<option value="'+data[i].datel+'">'+data[i].datel+'</option>';
							}
							$('#datel').html(html);
							$('#hero').html('<option value="All">All Datel</option>');
							$('#sto').html('<option value="All">All Datel</option>');
					}
			});
	});

	function select_witel(){
		location.href="<?php echo site_url('progressado/trend/'); ?>"+$("#witelselectku").val();
	}

	$('#datel').change(function(){
			var datel=$(this).val();
			$.ajax({
					url : "<?php echo base_url();?>dashboard/hero",
					method : "POST",
					data : {datel: datel},
					async : false,
					dataType : 'json',
					success: function(data){
							var html = '';
							var i;
							html += '<option value="All">All Hero</option>';
							for(i=0; i<data.length; i++){
									html += '<option value="'+data[i].hero+'">'+data[i].hero+'</option>';
							}
							$('#hero').html(html);
					}
			});
	});

	$('#datel').change(function(){
			var datel=$(this).val();
			$.ajax({
					url : "<?php echo base_url();?>dashboard/stodatel",
					method : "POST",
					data : {datel: datel},
					async : false,
					dataType : 'json',
					success: function(data){
							var html = '';
							var i;
							html += '<option value="All">All STO</option>';
							for(i=0; i<data.length; i++){
									html += '<option value="'+data[i].sto+'">'+data[i].sto+'</option>';
							}
							$('#sto').html(html);
					}
			});
	});

	$('#hero').change(function(){
			var hero=$(this).val();
			$.ajax({
					url : "<?php echo base_url();?>dashboard/stohero",
					method : "POST",
					data : {hero: hero},
					async : false,
					dataType : 'json',
					success: function(data){
							var html = '';
							var i;
							html += '<option value="All">All STO</option>';
							for(i=0; i<data.length; i++){
									html += '<option value="'+data[i].sto+'">'+data[i].sto+'</option>';
							}
							$('#sto').html(html);
					}
			});
	});
</script>


<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
		integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
		crossorigin=""></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHqhgVQmhdp3XAJ91LHRdXJ3YOjP1V2Gs" async defer>
</script>
<script src="<?=base_url('assets/assetsegbis/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js')?>"></script>
<script src="<?=base_url('assets/assetsegbis/js/leaflet.ajax.js')?>"></script>
<script src="<?=base_url('assets/assetsegbis/js/Leaflet.GoogleMutant.js')?>"></script>
<script src="<?=base_url('assets/assetsegbis/node_modules/leaflet-easyprint/dist/bundle.js')?>"></script>
<script src="<?=base_url('assets/assetsegbis/js/leaflet-search/dist/leaflet-search.src.js')?>"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet-canvas-markers@1.0.7/leaflet-canvas-markers.js"></script>

<?php
	if (!empty($kat))	
		$kat=str_replace(" ","-",$kat);
else
	$kat = '';
?>
<script src="<?=site_url("detailado/katado/kategoriado/point/$witel/$datel/$hero/$sto/$kat")?>"></script>

<script>
	var KategoriADO = [];
	// var layerodp = [];

	// var KategoriADO = [];
	// // var layerodp = [];
	var map = L.map('map', {
					zoom: 6,
					center: L.latLng([-1.6005708475757672, 128.7130096457418]),
					attributionControl: false,
			}),
			osmLayer = new L.tileLayer(
					'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
							attribution: '',
							maxZoom: 20,
							id: 'mapbox/streets-v11',
							accessToken: 'sk.eyJ1Ijoicmlwa2V5IiwiYSI6ImNrbWdhaTQwYzNkN3AycGp4bnJ4d2I3azIifQ.8mAi-tVZ5Ys-Af1djujFFQ'
					});

	map.addLayer(osmLayer);


	var baseLayers = [{
			name: "Open Street Map",
			layer: osmLayer
	}];

	//sto
	for (i = 0; i < katado.length; i++) {
			var data = katado[i];
			var layer = {
					name: data.kat,
					layer: new L.GeoJSON.AJAX(["<?=site_url("detailado/katado/order/point/$witel/$datel/$hero/$sto")?>/" + data.kat], {
							pointToLayer: function(feature, latlng) {
									// console.log(feature)
									return L.marker(latlng, {
											icon: new L.icon({
													iconUrl: feature.properties.icon,
													iconSize: [25, 25]
											})
									}).bindPopup(feature.properties.popUp);
							},
							onEachFeature: function(feature, layer) {
									if (feature.properties && feature.properties.name) {
											layer.bindPopup(feature.properties.popUp);
											// window.console.error("You made a mistake");
											// alert(feature.properties.name);
											console.log(feature.properties.name);
									}

							}
					})
			}
			KategoriADO.push(layer);
	}

	

	var overLayers = [{
					group: "Kategori ADO",
					layers: KategoriADO
			}
			// ,{
			// 		group: "Kategori ODP",
			// 		layers: layerodp
			// }
	];

	var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers, {
			//compact: true,
			//collapsed: true,
			collapsibleGroups: true
	});

	map.addControl(panelLayers);
</script>

<script type="text/javascript">
    var latInput = document.querySelector("[name=lat]");
    var lngInput = document.querySelector("[name=lng]");
    var alamatInput = document.querySelector("[name=alamat]");
    var idLOPInput = document.querySelector("[name=idlop]");
    // var geocodeService = L.esri.Geocoding.geocodeService();
    var marker;

    var map1 = L.map('map1', {
            zoom: 14,
            center: L.latLng([<?php echo $detail->lat; ?>, <?php echo $detail->lng; ?>]),
            attributionControl: false,
        }),
        osmLayer = new L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: '',
                maxZoom: 20,
                id: 'mapbox/streets-v11',
                accessToken: 'sk.eyJ1Ijoicmlwa2V5IiwiYSI6ImNrbWdhaTQwYzNkN3AycGp4bnJ4d2I3azIifQ.8mAi-tVZ5Ys-Af1djujFFQ'
            });

    L.marker([<?php echo $detail->lat; ?>, <?php echo $detail->lng; ?>]).addTo(map1);



    // map.on("click", function(e) {
    //     var lat = e.latlng.lat;
    //     var lng = e.latlng.lng;
    //     if (!marker) {
    //         marker = L.marker(e.latlng).addTo(map)
    //     } else {
    //         marker.setLatLng(e.latlng);
    //     }


    //     latInput.value = lat;
    //     lngInput.value = lng;

    //     $.ajax({
    //         url: "https://nominatim.openstreetmap.org/reverse",
    //         data: "lat=" + lat +
    //             "&lon=" + lng +
    //             "&format=json",
    //         dataType: "JSON",
    //         success: function(data) {
    //             console.log(data);
    //             alamatInput.value = data.display_name;
    //         }
    //     })
    // });

    map1.addLayer(osmLayer);
    // map.addControl(L.control.search());
</script>

<script type="text/javascript">
    var latInput = document.querySelector("[name=lat]");
    var lngInput = document.querySelector("[name=lng]");
    var alamatInput = document.querySelector("[name=alamat]");
    var idLOPInput = document.querySelector("[name=idlop]");
    // var geocodeService = L.esri.Geocoding.geocodeService();
    var marker;

    var map2 = L.map('map2', {
            zoom: 14,
            center: L.latLng([<?php echo $detail->lat; ?>, <?php echo $detail->lng; ?>]),
            attributionControl: false,
        }),
        osmLayer = new L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: '',
                maxZoom: 20,
                id: 'mapbox/streets-v11',
                accessToken: 'sk.eyJ1Ijoicmlwa2V5IiwiYSI6ImNrbWdhaTQwYzNkN3AycGp4bnJ4d2I3azIifQ.8mAi-tVZ5Ys-Af1djujFFQ'
            });

    L.marker([<?php echo $detail->lat; ?>, <?php echo $detail->lng; ?>]).addTo(map2);



    map2.on("click", function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;
        if (!marker) {
            marker = L.marker(e.latlng).addTo(map2)
        } else {
            marker.setLatLng(e.latlng);
        }


        latInput.value = lat;
        lngInput.value = lng;

        $.ajax({
            url: "https://nominatim.openstreetmap.org/reverse",
            data: "lat=" + lat +
                "&lon=" + lng +
                "&format=json",
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                alamatInput.value = data.display_name;
            }
        })
    });

    map2.addLayer(osmLayer);
    // map.addControl(L.control.search());
</script>



</body>
</html>
