<!DOCTYPE html>
<html>
<head>
	<title>Codeigniter : Excel Data Importer</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap.min.css" />
	<script src="<?php echo base_url(); ?>asset/jquery.min.js"></script>
</head>

<body>
	<div class="container">
	<br/>
		<div class="row well">
		<form method="post" id="import_form" enctype="multipart/form-data">
			<div class="col-md-12">
			<h3 align="center">Codeigniter : Excel Data Importer</h3>				
					<p><label>Select Excel File</label>
					<input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>				
			</div>
			<div class="col-md-4">
				<input type="submit" name="import" value="Import" class="btn btn-info pull-right" />
			</div>
			</form>
			
		</div>
		<div class="row">
			<div class="col-md-10">
			<div class="table-responsive" id="customer_data">

			</div>
			</div>
			<div class="col-md-2">
				<button class="btn btn-info pull-right" onclick="downloadAsExcel()">Download</button>
			</div>
		</div>
		
	</div>
</body>
</html>

<script>
$(document).ready(function(){

	load_data();

	function load_data()
	{
		$.ajax({
			url:"<?php echo base_url(); ?>excel_import/fetch",
			method:"POST",
			success:function(data){
				$('#customer_data').html(data);
			}
		})
	}

	$('#import_form').on('submit', function(event){
		event.preventDefault();
		$.ajax({
			url:"<?php echo base_url(); ?>excel_import/import",
			method:"POST",
			data:new FormData(this),
			contentType:false,
			cache:false,
			processData:false,
			success:function(data){
				$('#file').val('');
				load_data();
				alert(data);
			}
		})
	});

});
</script>
