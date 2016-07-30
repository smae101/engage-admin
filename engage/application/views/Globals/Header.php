<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content = "Library Abstract Search">
	    <meta name="author" content = "CIT_OJT">
	    <link rel="shortcut icon" href="<?php echo base_url("assets/images/citu-logo.png");?>">
	    <title><?php echo $page_title;?></title>
		<link rel = "stylesheet" href = "<?php echo base_url("assets/css/bootstrap.css");?>"/>
		<link rel = "stylesheet" href ="<?php echo base_url("assets/css/font-awesome.min.css");?>"/>
		<link rel = "stylesheet" href ="<?php echo base_url("assets/css/color.css");?>"/>
		
	   		<link rel = "stylesheet" href = "<?php echo base_url("assets/css/style.css");?>"/>
	   		<link rel = "stylesheet" href ="<?php echo base_url("assets/css/modern-business.css");?>"/>
	   	<?php if(isset($table_sorter) && $table_sorter == TRUE){
	   		?>
   		<link rel="stylesheet" href = "<?php echo base_url('assets/js/Tables/jquery.dataTables.css'); ?>" />
		<link rel="stylesheet" href = "<?php echo base_url("assets/js/Tables/dataTables.bootstrap.css");?>"/>
		<link rel="stylesheet" href = "<?php echo base_url("assets/js/Tables/dataTables.responsive.css");?>"/>
		<link rel="stylesheet" href = "<?php echo base_url("assets/js/Tables/metisMenu.min.css");?>"/>
	   		<?php
	   	}if(isset($allow_date_picker) && $allow_date_picker == TRUE){
	   		?>
			<link rel="stylesheet" href = "<?php echo base_url("assets/css/datepicker.css");?>"/>
	   		<?php
	   	}?>
	   	<style type="text/css" media="print">
		    .noprint{ 
		    display:none 
		    }
		    #print-button{
		        display:none;
		    }
		</style>
	</head>
	<body id="liaddshapes" <?php if(isset($page_active) && $page_active == "Login"){?>class = "Login-container" <?php }?>>