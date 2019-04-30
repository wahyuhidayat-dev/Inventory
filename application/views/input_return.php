
<?= validation_errors('<p style ="color:red">','</p> '); ?>		
<div class="row">
	<div class="col-lg-8">
		<div class="panel panel-primary">
			<div class="panel-heading">Input Return</div>
			<form  action="<?php echo base_url(); ?>Returnn/add" method="post">
				<div class="panel-body">
					<div class="col-md-8">
						<div class="form-group">
							<label>NO. RETURN</label>
							<input name="id_return" class="form-control"  value="<?php echo $kode_return; ?>" readonly="">
							<input name="prod_id" type="hidden" class="form-control"  value="<?php echo $PROD_ID; ?>" >
							<input type="hidden"  name="stock_qty" 
								<?php if(!isset($stock->STOCK_QTY)): ?>
									value="0"
									<?php elseif($stock->STOCK_QTY): ?> 
										value="<?=$stock->STOCK_QTY;?>"	
										<?php endif;?>>
						</div>
						<div class="form-group">
							<label>BARCODE</label>
							<input name="barcode" class="form-control"  value="<?php echo $BARCODE; ?>" readonly="">
						</div>
						<div class="form-group">
							<label>PROD NAME</label>
							<input name="prod_nm" class="form-control" value="<?php echo $PROD_NM; ?>" readonly="" >
							<input name="date" type="hidden" class="form-control" value="<?php echo $date; ?>" >
							<input name="cat_nm" type="hidden" class="form-control" value="<?php echo $L1_NM; ?>" >
							<input name="status" type="hidden" class="form-control" value="<?php echo $STATUS; ?>" >
							<input name="sale_prc" type="hidden" class="form-control" value="<?php echo $SALE_PRC; ?>" >
						</div>
						<div class="form-group">
							<label>QTY</label>
							<input name="qty" type="text" class="form-control" placeholder="Qty" autofocus="">
						</div>
						<div class="form-group">
							<label>REASON</label>
							<select class="form-control" name="reason">
								<option value="">--PILIH--</option>
								<option value="PERSEDIAAN TIDAK TERJUAL">PERSEDIAAN TIDAK TERJUAL</option>
								<option value="BARANG CACAT">BARANG CACAT</option>
								<option value="EXPIRED">EXPIRED</option>
							</select>
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



