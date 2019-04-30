<?= validation_errors('<p style ="color:red">','</p> '); ?>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Input Detail Category</div>
				<form  action="<?php echo base_url(); ?>Category/add" method="post">
					<div class="panel-body">
					
						<div class="col-md-8">
							<div class="form-group">
								<label>CATEGORY NAME</label>
								<input name="cat_nm" class="form-control" placeholder="Input Category Name" autofocus="">
							</div>
							<div class="form-group">
								<label>DIVISION</label>
								<input name="division" class="form-control" placeholder="Input Division">
							</div>
							<div class="footer">	
							<button type="submit" name="submit" value="Submit" class="btn btn-success">Submit</button>
							<button type="reset" onclick="window.history.go(-1)" class="btn btn-primary"> Back</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
