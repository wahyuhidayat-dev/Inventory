	
<?= validation_errors('<p style ="color:red">','</p> '); ?>		
	<div class="row">
		<div class="col-lg-8">
			<div class="panel panel-primary">
				<div class="panel-heading">Input Detail Vendor</div>
				<form  action="<?php echo base_url(); ?>Vendor/add" method="post">
					<div class="panel-body">
						<div class="col-md-8">
							<div class="form-group">
								<label>VENDOR NAME</label>
								<input name="ven_nm" class="form-control" placeholder="Input Nama Vendor" autofocus="">
							</div>
							<div class="form-group">
								<label>ALAMAT</label>
								<textarea name="alamat" class="form-control" placeholder="Input Alamat" cols="25" rows="6"></textarea>
							</div>
							<div class="form-group">
								<label>EMAIL</label>
								<input type="email" name="email" class="form-control" placeholder="Input Email">
							</div>
							<div class="form-group">
								<label>TELPON</label>
								<input name="telpon" class="form-control" placeholder="Input No Telpon" >
							</div>
							<button type="submit" name="submit" value="Submit" class="btn btn-success">Submit</button>
							<button type="reset" onclick="window.history.go(-1)" class="btn btn-primary"> Back</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>



