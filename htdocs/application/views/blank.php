<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Material Pro Admin Template - The Most Complete & Trusted Bootstrap 4 Admin Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('/assets/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="<?php echo base_url('/assets/plugins/chartist-js/dist/chartist.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/plugins/chartist-js/dist/chartist-init.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/plugins/css-chart/css-chart.css')?>" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
    <!-- Calendar CSS -->
    <link href="<?php echo base_url('/assets/plugins/calendar/dist/fullcalendar.css')?>" rel="stylesheet" />
	<!-- Custom CSS -->
    <link href="<?php echo base_url('/assets/horizontal/css/style.css')?>" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url('/assets/horizontal/css/colors/blue.css')?>" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<?php
$this->load->view('template/header');
?>
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
<?php
$this->load->view('template/menu');
?>      
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
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
										<?php
										$i=0;
										foreach($agenda1 as $giat1): 
										$i++;
										?>
										<a href="#">
												<div class="mail-contnet">
												<h5><?php echo ($giat1['disposisi']);?></h5> 
												<span class="mail-desc"><?php echo ($giat1['kegiatan']);?></span> 
												<span class="time"><?php echo ($giat1['start']);?></span> </div>
                                        </a>
										<?php
										endforeach;
										?>										
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
											<?php
										$i=0;
										foreach($agenda2 as $giat2): 
										$i++;
										?>
										<a href="#">
												<div class="mail-contnet">
												<h5><?php echo ($giat2['disposisi']);?></h5> 
												<span class="mail-desc"><?php echo ($giat2['kegiatan']);?></span> 
												<span class="time"><?php echo ($giat2['start']);?></span> </div>
                                        </a>
										<?php
										endforeach;
										?>	
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
											<?php
												$i=0;
												foreach($agenda3 as $giat3): 
												$i++;
												?>
											<a href="#">
												<div class="mail-contnet">
												<h5><?php echo ($giat3['disposisi']);?></h5> 
												<span class="mail-desc"><?php echo ($giat3['kegiatan']);?></span> 
												<span class="time"><?php echo ($giat3['start']);?></span> </div>
											</a>
											<?php
											endforeach;
											?>	
											<!--pesan-->
										</div>								
									</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
				<!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="calendar"></div>
                                <!-- BEGIN MODAL -->
                                <div class="modal fade none-border" id="my-event">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><strong>Tambah Kegiatan</strong></h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body"></div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Add Category -->
                                <div class="modal fade none-border" id="add-new-event">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><strong>Add</strong> a category</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="control-label">Category Name</label>
                                                            <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="control-label">Choose Category Color</label>
                                                            <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                                <option value="success">Success</option>
                                                                <option value="danger">Danger</option>
                                                                <option value="info">Info</option>
                                                                <option value="primary">Primary</option>
                                                                <option value="warning">Warning</option>
                                                                <option value="inverse">Inverse</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                                                <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END MODAL -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                
                
                <!-- Row -->


                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->

                <!-- ============================================================== -->
                <!-- End Right sidebar -->
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
    <script src="<?php echo base_url('/assets/plugins/jquery/jquery.min.js')?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url('/assets/plugins/popper/popper.min.js')?>"></script>
    <script src="<?php echo base_url('/assets/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url('/assets/horizontal/js/jquery.slimscroll.js')?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url('/assets/horizontal/js/waves.js')?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url('/assets/horizontal/js/sidebarmenu.js')?>"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url('/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')?>"></script>
    <script src="<?php echo base_url('/assets/plugins/sparkline/jquery.sparkline.min.js')?>"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url('/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')?>"></script>
    <script src="<?php echo base_url('/assets/plugins/sparkline/jquery.sparkline.min.js')?>"></script>
    <script src="<?php echo base_url('/assets/plugins/sparkline/jquery.sparkline.min.js')?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url('/assets/horizontal/js/custom.min.js')?>"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="<?php echo base_url('/assets/plugins/chartist-js/dist/chartist.min.js')?>"></script>
    <script src="<?php echo base_url('/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')?>"></script>
    <!-- Calendar JavaScript -->
    <script src="<?php echo base_url('/assets/plugins/moment/moment.js')?>"></script>
    <script src="<?php echo base_url('/assets/plugins/calendar/dist/fullcalendar.min.js')?>"</script>
    <script src="<?php echo base_url('/assets/plugins/calendar/dist/jquery.fullcalendar.js')?>"</script>
	<script src="<?php echo base_url('/assets/plugins/calendar/dist/locale/id.js')?>"></script>
    <script src="<?php echo base_url('/assets/plugins/calendar/dist/cal-init.js')?>"</script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url('/assets/plugins/styleswitcher/jQuery.style.switcher.js')?>"></script>
</body>

</html>