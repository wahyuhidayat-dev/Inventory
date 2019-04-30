<?= validation_errors('<p style ="color:red">','</p> '); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading"><?php echo $header; ?></div>
			<form  action="<?php echo base_url(); ?>Items/add_items" method="post">
				<div class="panel-body">
					<div class="col-md-6">
						<!-- <div class="form-group">
							<label>VENDOR CODE</label>
							<input name="ven_cd" class="form-control" placeholder="Vendor Code" autofocus="">
						</div> -->
						<div class="form-group">
							<label>VENDOR NAME</label>
							<select class="form-control" name="ven_nm">
								<?php foreach ($vendor as $key) :?>
									<option><?= $key->VEN_NM; ?></option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="form-group">
							<label>PRODUCT NAME</label>
							<input name="prod_nm" class="form-control" placeholder="Product Name" autofocus="">
						</div>
						<div class="form-group">
							<label>CAT NAME</label>
							<select class="form-control" name="cat_nm">
								<?php foreach ($cat as $key) :?>
									<option><?= $key->CAT_NM; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label>STATUS</label>
							<select class="form-control" name="status">
								<option value="Normal">Normal</option>
								<option value="Order Stop">Order Stop</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>SPEC *PCS *Gram</label>
							<input name="spec" class="form-control" placeholder="Spec" value="">
						</div>
						<div class="form-group">
							<label>SALE PRICE</label>
							<input name="sale_price" class="form-control" placeholder="Sale Price" value="">
						</div>
						<div class="form-group">
							<label>BUY PRICE</label>
							<input name="buy_price" class="form-control" placeholder="Buy Price" value="">
						</div>
						<div class="form-group">
							<label>BARCODE</label>
							<input name="barcode" class="form-control" placeholder="Barcode" value="">
						</div>
					</div>
					<div class="footer">	
					<button type="submit" name="submit" value="Submit" class="btn btn-success">Submit</button>
					<button type="reset" onclick="window.history.go(-1)" class="btn btn-primary"> Back</button>
					</div>
				</form>
			</div>
		</div>
	</div>