<?= validation_errors('<p style ="color:red">','</p> '); ?>		
	<div class="row">
		<div class="col-lg-8">
			<div class="panel panel-primary">
				<div class="panel-heading">Input Sector</div>
				<form  action="<?php echo base_url(); ?>Sector/add" method="post">
					<div class="panel-body">
						<div class="col-md-8">
							<div class="form-group">
								<label>BARCODE</label>
								<input name="barcode" class="form-control" placeholder="Input Barcode" value="<?php echo $BARCODE; ?>" readonly="">
							</div>
							<div class="form-group">
								<label>PROD NAME</label>
								<input name="prod_nm" class="form-control" placeholder="Input Barcode" value="<?php echo $PROD_NM; ?>" readonly="">
							</div>
							<div class="form-group">
								<label>STATUS</label>
								<input name="status" class="form-control" placeholder="Input Barcode" value="<?php echo $STATUS; ?>" readonly="">
							</div>
							<div class="form-group">
								<label>QTY</label>
								<input name="prod_id" class="form-control" type="hidden" value="<?php echo $PROD_ID; ?>" readonly="">
								<input name="qty" class="form-control" placeholder="Input Qty" autofocus="">
							</div>
							<div class="form-group">
								<label>NO. SECTOR</label>
								<input name="sector" class="form-control" placeholder="No Sector" autofocus="">
							</div>
							<button type="submit" name="submit" value="Submit" class="btn btn-success">Submit</button>
							<button type="reset" onclick="window.history.go(-1)" class="btn btn-primary"> Back</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>



