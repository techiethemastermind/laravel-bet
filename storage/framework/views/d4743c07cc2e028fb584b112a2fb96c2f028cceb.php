<?php $__env->startSection('page-title', trans('app.shops')); ?>
<?php $__env->startSection('page-heading', trans('app.shops')); ?>

<?php $__env->startSection('content'); ?>

	<section class="content-header">
		<?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-light-blue">
					<div class="inner">
						<h3><?php echo e($stats['shops']); ?></h3>
						<p><?php echo app('translator')->get('app.total_shops'); ?></p>
					</div>
					<div class="icon">
						<i class="fa fa-refresh"></i>
					</div>
				</div>
			</div>
			<!-- ./col -->
			<?php if(auth()->user()->hasRole('admin')): ?>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-green">
					<div class="inner">
						<h3><?php echo e(($stats['agents'])); ?></h3>
						<p><?php echo app('translator')->get('app.total_agents'); ?></p>
					</div>
					<div class="icon">
						<i class="fa fa-level-up"></i>
					</div>
				</div>
			</div>
			<!-- ./col -->
			<?php endif; ?>
			<?php if(auth()->user()->hasRole(['admin','agent'])): ?>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-yellow">
					<div class="inner">
						<h3><?php echo e(($stats['distributors'])); ?></h3>
						<p><?php echo app('translator')->get('app.total_distributors'); ?></p>
					</div>
					<div class="icon">
						<i class="fa fa-level-down"></i>
					</div>
				</div>
			</div>
			<!-- ./col -->
			<?php endif; ?>
			<?php if(auth()->user()->hasRole(['agent','distributor'])): ?>
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-yellow">
						<div class="inner">
							<h3><?php echo e(($stats['managers'])); ?></h3>
							<p><?php echo app('translator')->get('app.total_managers'); ?></p>
						</div>
						<div class="icon">
							<i class="fa fa-level-down"></i>
						</div>
					</div>
				</div>
				<!-- ./col -->
			<?php endif; ?>
			<?php if(auth()->user()->hasRole(['distributor','manager'])): ?>
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-yellow">
						<div class="inner">
							<h3><?php echo e(($stats['cashiers'])); ?></h3>
							<p><?php echo app('translator')->get('app.total_cashiers'); ?></p>
						</div>
						<div class="icon">
							<i class="fa fa-level-down"></i>
						</div>
					</div>
				</div>
				<!-- ./col -->
			<?php endif; ?>
			<?php if(auth()->user()->hasRole(['manager','cashier'])): ?>
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-yellow">
						<div class="inner">
							<h3><?php echo e(($stats['users'])); ?></h3>
							<p><?php echo app('translator')->get('app.total_users'); ?></p>
						</div>
						<div class="icon">
							<i class="fa fa-level-down"></i>
						</div>
					</div>
				</div>
				<!-- ./col -->
			<?php endif; ?>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">
						<h3><?php echo e(number_format( $stats['credit'], 2 )); ?></h3>
						<p><?php echo app('translator')->get('app.total_credit'); ?></p>
					</div>
					<div class="icon">
						<i class="fa fa-line-chart"></i>
					</div>
				</div>
			</div>
			<!-- ./col -->

		</div>



		<form action="" method="GET">
			<div class="box box-danger collapsed-box shops_show">
				<div class="box-header with-border">
					<h3 class="box-title"><?php echo app('translator')->get('app.filter'); ?></h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.name'); ?></label>
								<input type="text" class="form-control" name="name" value="<?php echo e(Request::get('name')); ?>">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.credit_from'); ?></label>
								<input type="text" class="form-control" name="credit_from" value="<?php echo e(Request::get('credit_from')); ?>">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.credit_to'); ?></label>
								<input type="text" class="form-control" name="credit_to" value="<?php echo e(Request::get('credit_to')); ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.frontend'); ?></label>
								<input type="text" class="form-control" name="frontend" value="<?php echo e(Request::get('frontend')); ?>">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.percent_from'); ?></label>
								<input type="text" class="form-control" name="percent_from" value="<?php echo e(Request::get('percent_from')); ?>">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.percent_to'); ?></label>
								<input type="text" class="form-control" name="percent_to" value="<?php echo e(Request::get('percent_to')); ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.order'); ?></label>
								<?php
									$orders = array_combine(array_merge([''], \VanguardLTE\Shop::$values['orderby']), array_merge([''], \VanguardLTE\Shop::$values['orderby']));
								?>
								<?php echo Form::select('order', $orders, Request::get('status'), ['id' => 'order', 'class' => 'form-control']); ?>

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.currency'); ?></label>
								<?php
									$currencies = array_combine(\VanguardLTE\Shop::$values['currency'], \VanguardLTE\Shop::$values['currency']);
								?>
								<?php echo Form::select('currency', $currencies, Request::get('currency'), ['id' => 'currency', 'class' => 'form-control']); ?>

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.categories'); ?></label>
								<?php echo Form::select('categories[]', $categories->pluck('title','id'), Request::get('categories'), ['id' => 'type', 'class' => 'form-control select2', 'multiple' => true, 'style' => 'width: 100%;']); ?>


							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.status'); ?></label>
								<?php echo Form::select('status', ['' => __('app.all'), '1' => __('app.active'), '0' => __('app.disabled')], Request::get('status'), ['id' => 'type', 'class' => 'form-control']); ?>

							</div>
						</div>

						<?php if(auth()->user()->hasRole('admin')): ?>
							<div class="col-md-6">
								<div class="form-group">
									<label><?php echo app('translator')->get('app.agents'); ?> & <?php echo app('translator')->get('app.distributors'); ?></label>
									<?php echo Form::select('users', ['' => '---'] + $agents + $distributors, Request::get('users'), ['id' => 'users', 'class' => 'form-control select2']); ?>

								</div>
							</div>
						<?php endif; ?>

						<?php if(auth()->user()->hasRole(['agent'])): ?>
							<div class="col-md-6">
								<div class="form-group">
									<label><?php echo app('translator')->get('app.distributors'); ?></label>
									<?php echo Form::select('users', ['' => '---'] + $distributors, Request::get('users'), ['id' => 'users', 'class' => 'form-control select2']); ?>

								</div>
							</div>
						<?php endif; ?>

					</div>
				</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">
						<?php echo app('translator')->get('app.filter'); ?>
					</button>

				</div>
			</div>
		</form>

		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo app('translator')->get('app.shops'); ?></h3>
				<?php if(auth()->user()->hasRole('admin')): ?>
					<div class="pull-right box-tools">
						<a href="<?php echo e(route('backend.shop.admin_create')); ?>" class="btn btn-block btn-primary btn-sm"><?php echo app('translator')->get('app.add'); ?></a>
					</div>
				<?php endif; ?>
				<?php if(auth()->user()->hasRole('distributor')): ?>
					<div class="pull-right box-tools">
						<a href="<?php echo e(route('backend.shop.create')); ?>" class="btn btn-block btn-primary btn-sm"><?php echo app('translator')->get('app.add'); ?></a>
					</div>
				<?php endif; ?>
			</div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
					<thead>
					<tr>
						<th><?php echo app('translator')->get('app.name'); ?></th>
						<th><?php echo app('translator')->get('app.go_to_shop'); ?></th>
						<th><?php echo app('translator')->get('app.distributor'); ?></th>
						<th><?php echo app('translator')->get('app.id'); ?></th>
						<th><?php echo app('translator')->get('app.credit'); ?></th>
						<th><?php echo app('translator')->get('app.percent'); ?></th>
						<th><?php echo app('translator')->get('app.frontend'); ?></th>
						<th><?php echo app('translator')->get('app.currency'); ?></th>
						<th><?php echo app('translator')->get('app.order'); ?></th>
						<th><?php echo app('translator')->get('app.status'); ?></th>
						<th><?php echo app('translator')->get('app.pay_in'); ?></th>
						<th><?php echo app('translator')->get('app.pay_out'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php if(count($shops)): ?>
						<?php $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php echo $__env->make('backend.shops.partials.row', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php else: ?>
						<tr><td colspan="12"><?php echo app('translator')->get('app.no_data'); ?></td></tr>
					<?php endif; ?>
					</tbody>
					<thead>
					<tr>
						<th><?php echo app('translator')->get('app.name'); ?></th>
						<th><?php echo app('translator')->get('app.go_to_shop'); ?></th>
						<th><?php echo app('translator')->get('app.distributor'); ?></th>
						<th><?php echo app('translator')->get('app.id'); ?></th>
						<th><?php echo app('translator')->get('app.credit'); ?></th>
						<th><?php echo app('translator')->get('app.percent'); ?></th>
						<th><?php echo app('translator')->get('app.frontend'); ?></th>
						<th><?php echo app('translator')->get('app.currency'); ?></th>
						<th><?php echo app('translator')->get('app.order'); ?></th>
						<th><?php echo app('translator')->get('app.status'); ?></th>
						<th><?php echo app('translator')->get('app.pay_in'); ?></th>
						<th><?php echo app('translator')->get('app.pay_out'); ?></th>
					</tr>
					</thead>
                            </table>

							<?php echo e($shops->links()); ?>

                        </div>
                    </div>
		</div>

	</section>

	<!-- Modal -->
	<div class="modal fade" id="openAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form action="<?php echo e(route('backend.shop.balance')); ?>" method="POST">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><?php echo app('translator')->get('app.balance'); ?> <?php echo app('translator')->get('app.pay_in'); ?></h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="AddSum"><?php echo app('translator')->get('app.sum'); ?></label>
							<input type="text" class="form-control" id="AddSum" name="summ" placeholder="<?php echo app('translator')->get('app.sum'); ?>" required>
							<input type="hidden" name="type" value="add">
							<input type="hidden" id="AddId" name="shop_id">
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo app('translator')->get('app.close'); ?></button>
						<button type="submit" class="btn btn-primary"><?php echo app('translator')->get('app.pay_in'); ?></button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="openOutModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form action="<?php echo e(route('backend.shop.balance')); ?>" method="POST" id="outForm">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><?php echo app('translator')->get('app.balance'); ?> <?php echo app('translator')->get('app.pay_out'); ?></h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="OutSum"><?php echo app('translator')->get('app.sum'); ?></label>
							<input type="text" class="form-control" id="OutSum" name="summ" placeholder="<?php echo app('translator')->get('app.sum'); ?>" required>
							<input type="hidden" id="outAll" name="all" value="0">
							<input type="hidden" name="type" value="out">
							<input type="hidden" id="OutId" name="shop_id">
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo app('translator')->get('app.close'); ?></button>
						<button type="button" class="btn btn-danger" id="doOutAll"><?php echo app('translator')->get('app.pay_out'); ?> <?php echo app('translator')->get('app.all'); ?></button>
						<button type="submit" class="btn btn-primary"><?php echo app('translator')->get('app.pay_out'); ?></button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script>
		$('#shops-table').dataTable();
		$("#view").change(function () {
			$("#shops-form").submit();
		});
		$('.addPayment').click(function(event){
			console.log($(event.target));
			var item = $(event.target).hasClass('addPayment') ? $(event.target) : $(event.target).parent();
			var id = item.attr('data-id');
			$('#AddId').val(id);
		});

		$('.outPayment').click(function(event){
			console.log($(event.target));
			var item = $(event.target).hasClass('outPayment') ? $(event.target) : $(event.target).parent();
			var id = item.attr('data-id');
			$('#OutId').val(id);
			$('#outAll').val('0');
		});


		$('#doOutAll').click(function () {
			$('#outAll').val('1');
			$('form#outForm').submit();
		});

		$('.btn-box-tool').click(function(event){
			if( $('.shops_show').hasClass('collapsed-box') ){
				$.cookie('shops_show', '1');
			} else {
				$.removeCookie('shops_show');
			}
		});

		if( $.cookie('shops_show') ){
			$('.shops_show').removeClass('collapsed-box');
			$('.shops_show .btn-box-tool i').removeClass('fa-plus').addClass('fa-minus');
		}
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/shops/list.blade.php ENDPATH**/ ?>