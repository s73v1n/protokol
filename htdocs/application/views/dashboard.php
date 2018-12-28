<?php
date_default_timezone_set('Asia/Jakarta');
setlocale(LC_TIME, "id_ID.utf8");
$tanggal = strftime( "%A, %d %B %Y", time());
$besok = strftime( "%A, %d %B %Y", strtotime("+1 day"));
$lusa = strftime( "%A, %d %B %Y", strtotime("+2 day"));
?>
<?php
$this->load->view('template/header');
?>
<!-- CUSTOM CSS-->
<?php foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<!---CUSTOM CSS-->
</head>
<body class="fix-header fix-sidebar card-no-border logo-center">
<?php
$this->load->view('template/sidebar');
?>
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
 <?php
$this->load->view('template/menu');
?>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard3</li>
                        </ol>
                    </div>
                    <div class="col-md-7 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                                <div class="chart-text m-r-10">
                                    <h6 class="m-b-0"><small>THIS MONTH</small></h6>
                                    <h4 class="m-t-0 text-info">$58,356</h4></div>
                                <div class="spark-chart">
                                    <div id="monthchart"></div>
                                </div>
                            </div>
                            <div class="">
                                <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->

                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $tanggal?></h4>
                                <h6 class="card-subtitle">Agenda Hari Ini</h6>
                                <div class="message-box">
									<div class="message-widget message-scroll">
										<!--pesan-->
									
										<!--pesan-->
									</div>								
								</div>
                               
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $besok?></h4>
                                <h6 class="card-subtitle">Agenda Besok</h6>
									<div class="message-box">
										<div class="message-widget message-scroll">
											<!--pesan-->
									
											<!--pesan-->
										</div>								
									</div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $lusa?></h4>
                                <h6 class="card-subtitle">Agenda Lusa</h6>
									<div class="message-box">
										<div class="message-widget message-scroll">
											<!--pesan-->
									
											<!--pesan-->
										</div>								
									</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <div style="padding: 10px">
					<?php echo $output; ?>
				</div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2018 Material Pro Admin by wrappixel.com </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
	<!--<script src="<?php echo base_url('/assets/plugins/jquery/jquery.min.js')?>"></script>-->
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url('/assets/plugins/popper/popper.min.js')?>"></script>
    <script src="<?php echo base_url('/assets/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url ('/assets/horizontal/js/jquery.slimscroll.js')?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url ('/assets/horizontal/js/waves.js')?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url ('/assets/horizontal/js/sidebarmenu.js')?>"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url('/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')?>"></script>
    <script src="<?php echo base_url('/assets/plugins/sparkline/jquery.sparkline.min.js')?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url('/assets/horizontal/js/custom.min.js')?>"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url('/assets/horizontal/js/dashboard3.js')?>"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url('/assets/plugins/styleswitcher/jQuery.style.switcher.js')?>"></script>
</body>

</html>