<div class="row">
		<div class="col-lg-8">		
			<div class="panel panel-primary">
				<div class="panel-heading">Input Detail Vendor</div>
				<form  action="<?php echo base_url(); ?>Vendor/update" method="post">
					<div class="panel-body">
						<div class="col-md-8">
							<?php $ven = $data->row();  ?>
							<div class="form-group">
								<label>VENDOR NAME</label>
								<input type="hidden" name="ven_cd" class="form-control" value="<?= $ven->VEN_CD;  ?>">
								<input name="ven_nm" class="form-control" value="<?= $ven->VEN_NM;  ?>">
							</div>
							<div class="form-group">
								<label>ALAMAT</label>
								<textarea name="alamat" id="alamat" class="form-control" cols="25" rows="6"><?= $ven->ALAMAT;?></textarea>
							</div>
							<div class="form-group">
								<label>EMAIL</label>
								<input type="email" name="email" class="form-control" value="<?php echo $ven->EMAIL;  ?>"></div>
							<div class="form-group">
								<label>TELPHONE</label>
								<input name="telpon" class="form-control" value="<?= $ven->TELPON;  ?>" >
							</div>
							<button type="submit" name="submit" value="Submit" class="btn btn-success">Submit</button>
							<button type="reset" onclick="window.history.go(-1)" class="btn btn-primary"> Back</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>