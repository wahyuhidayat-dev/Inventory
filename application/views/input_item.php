	<?= validation_errors('<p style ="color:red">','</p> '); ?>	
	<div class="row">
		<div class="col-lg-8">
			<div class="panel panel-primary">
				<div class="panel-heading"><?= $header;  ?></div>
				<form  action="<?php echo base_url(); ?>Items/insert" method="post">
					<div class="panel-body">
						<div class="col-md-8">
							<div class="form-group">
								<label>CATEGORY NAME</label>
								<input type="hidden"  name="prod_id" value="<?php echo $PROD_ID; ?>">
								<input type="hidden"  name="stock_qty" 
								<?php if(!isset($stock->STOCK_QTY)): ?>
									value="0"
									<?php elseif($stock->STOCK_QTY): ?> 
										value="<?=$stock->STOCK_QTY;?>"	
										<?php endif;?>>
										<input name="cat_nm" class="form-control" placeholder="Input Barcode" value="<?php echo $CAT_NM; ?>" readonly="">
									</div>
									<div class="form-group">
										<label>BARCODE</label>
										<input name="barcode" class="form-control" placeholder="Input Barcode" value="<?php echo $BARCODE; ?>" readonly="">
									</div>
									<div class="form-group">
										<label>NAMA</label>
										<input name="prod_nm" class="form-control" placeholder="Input Barcode" value="<?php echo $PROD_NM; ?>" readonly="">
										<input name="status" class="form-control" type="hidden" value="<?php echo $STATUS; ?>" readonly="">
									</div>
									<div class="form-group">
										<label>QTY</label>
										<input name="qty" class="form-control" placeholder="Input Qty" autofocus="">
										<input name="sale_prc" class="form-control" type="hidden" value="<?php echo $SALE_PRC; ?>" >
										<input name="date" class="form-control" type="hidden" value="<?php echo $date; ?>" >
									</div>
									<button type="submit" name="submit" value="Submit" class="btn btn-success">Submit</button>
									<button type="reset" onclick="window.history.go(-1)" class="btn btn-primary"> Back</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>



