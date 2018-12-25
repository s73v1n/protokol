<?php
$this->load->view('template/head');
?>
<?php foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<body>
	<div style='height:20px;'></div>  
    <div style="padding: 10px">
		<?php echo $output; ?>
    </div>
<?php
$this->load->view('template/footer');
?>
<?php 
foreach($js_files as $file): 
?>
	<script src="<?php echo $file; ?>"></script>
<?php 
endforeach; 
?>
<?php
$this->load->view('template/dashboard1_js');
?> 
<?php
$this->load->view('template/end');
?>