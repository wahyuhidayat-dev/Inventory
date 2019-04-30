<div class="row">
		<div class="col-lg-8">		
			<div class="panel panel-primary">
				<div class="panel-heading">Input Detail Category</div>
				<form  action="<?php echo base_url(); ?>Category/update" method="post">
					<div class="panel-body">
						<div class="col-md-8">
							<?php $cat = $data->row();  ?>
							<div class="form-group">
								<label>CATEGORY NAME</label>
								<input type="hidden" name="cat_id" class="form-control" value="<?= $cat->CAT_ID;  ?>">
								<input name="cat_nm" class="form-control" value="<?= $cat->CAT_NM;  ?>">
							</div>
							<div class="form-group">
								<label>DIVSION</label>
								<input name="division" class="form-control" value="<?= $cat->DIVISION;  ?>" >
							</div>
							<button type="submit" name="submit" value="Submit" class="btn btn-success">Submit</button>
							<button type="reset" onclick="window.history.go(-1)" class="btn btn-primary"> Back</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>