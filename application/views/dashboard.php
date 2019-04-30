	<div class="row">
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-blue panel-widget ">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large"><?= $vendor; ?></div>
						<div class="text-muted">Supplier</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-orange panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked tag"><use xlink:href="#stroked-tag"/></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large"><?= $items; ?></div>
						<div class="text-muted">SKU</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-teal panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large"><?= $user; ?></div>
						<div class="text-muted">New Users</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-red panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked star"><use xlink:href="#stroked-star"></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?= $cat;  ?></div>
							<div class="text-muted">CATEGORY</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading"><marquee behavior="alternate" direction="">SUMMARY STOCK</marquee></div>
					<!-- <?php var_dump($data); ?> -->
					<div class="panel-body">
						<table data-toggle="table" data-show-refresh="true" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
							<thead>
								<tr>
									<th data-field ="id1" data-checkbox="true">NO.</th>
									<th data-field ="id2" data-sortable="true">DIVISI</th>
									<th data-field ="id3" data-sortable="true">CATEGORY</th>
									<th data-field ="id4" data-sortable="true">PROD NM</th>
									<th data-field ="id5" data-sortable="true">STOCK QTY</th>
									<th data-field ="id6" data-sortable="true">STOCK AMT</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$no =1;
								foreach ($data as $key) : 
									?>
								<tr>
									<td data-field ="id1" ><?= $no++; ?></td>
									<td data-field ="id2" ><?= $key->DIVISION; ?></td>
									<td data-field ="id3" ><?= $key->CAT_NM; ?></td>
									<td data-field ="id4" ><?= $key->PROD_NM; ?></td>
									<td data-field ="id5" ><?= $key->STOCK_QTY; ?></td>
									<td data-field ="id6" ><?= 'Rp. '.number_format($key->STOCK_QTY*$key->SALE_PRC,0,',','.'); ?></td>
								</tr>
								<?php endforeach; ?>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		<script>
			$(function () {
				$('#hover, #striped, #condensed').click(function () {
					var classes = 'table';
					
					if ($('#hover').prop('checked')) {
						classes += ' table-hover';
					}
					if ($('#condensed').prop('checked')) {
						classes += ' table-condensed';
					}
					$('#table-style').bootstrapTable('destroy')
					.bootstrapTable({
						classes: classes,
						striped: $('#striped').prop('checked')
					});
				});
			});
			
			function rowStyle(row, index) {
				var classes = ['active', 'success', 'info', 'warning', 'danger'];
				
				if (index % 2 === 0 && index / 2 < classes.length) {
					return {
						classes: classes[index / 2]
					};
				}
				return {};
			}
		</script>
		