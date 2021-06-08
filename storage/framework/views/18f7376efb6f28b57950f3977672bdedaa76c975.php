<?php $__env->startSection('page-title', trans('app.pincodes')); ?>
<?php $__env->startSection('page-heading', trans('app.pincodes')); ?>

<?php $__env->startSection('content'); ?>

	<section class="content-header">
		<?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</section>

	<section class="content">

		<form action="" method="GET">
			<div class="box box-danger collapsed-box pin_show">
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
								<label><?php echo app('translator')->get('app.pincode'); ?></label>
								<input type="text" class="form-control" name="pincode" value="<?php echo e(Request::get('pincode')); ?>">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.nominal_from'); ?></label>
								<input type="text" class="form-control" name="sum_from" value="<?php echo e(Request::get('sum_from')); ?>">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.nominal_to'); ?></label>
								<input type="text" class="form-control" name="sum_to" value="<?php echo e(Request::get('sum_to')); ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.date'); ?></label>
								<input type="text" class="form-control dates" name="created" value="<?php echo e(Request::get('dates')); ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.status'); ?></label>
								<?php echo Form::select('status', ['' => __('app.all'), '1' => __('app.activated'), '0' => __('app.disabled')], Request::get('status'), ['id' => 'type', 'class' => 'form-control']); ?>

							</div>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">
						<?php echo app('translator')->get('app.filter'); ?>
					</button>
							<?php
								$parameters = Request::all();
							?>
						<a href="<?php echo e(url()->current()); ?>?<?php echo e(http_build_query($parameters)); ?>&download=csv" class="btn btn-danger">
							<?php echo app('translator')->get('app.download_CSV'); ?>
						</a>

				</div>
			</div>
		</form>

		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo app('translator')->get('app.pincode'); ?></h3>
				<?php if (\Auth::user()->hasPermission('pincodes.add')) : ?>
				<div class="pull-right box-tools">
					<a href="<?php echo e(route('backend.pincode.create')); ?>" class="btn btn-block btn-primary btn-sm"><?php echo app('translator')->get('app.add'); ?></a>
				</div>
				<?php endif; ?>
			</div>
			<div class="box-body">
				<table class="table table-bordered table-striped">
					<thead>
					<tr>
						<th><?php echo app('translator')->get('app.pincode'); ?></th>
						<th><?php echo app('translator')->get('app.nominal'); ?></th>
						<th><?php echo app('translator')->get('app.date'); ?></th>
						<th><?php echo app('translator')->get('app.status'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php if(count($pincodes)): ?>
						<?php $__currentLoopData = $pincodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pincode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php echo $__env->make('backend.pincodes.partials.row', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php else: ?>
						<tr><td colspan="4"><?php echo app('translator')->get('app.no_data'); ?></td></tr>
					<?php endif; ?>
					</tbody>
					<thead>
					<tr>
						<th><?php echo app('translator')->get('app.pincode'); ?></th>
						<th><?php echo app('translator')->get('app.nominal'); ?></th>
						<th><?php echo app('translator')->get('app.date'); ?></th>
						<th><?php echo app('translator')->get('app.status'); ?></th>
					</tr>
					</thead>
				</table>
			</div>
		</div>
	</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
		$(function() {
			$('#pincodes-table').dataTable();
			$('.dates').daterangepicker({
				//autoUpdateInput: false,
				timePicker: true,
				timePicker24Hour: true,
				startDate: moment().subtract(30, 'day'),
				endDate: moment().add(7, 'day'),
				locale: {
					format: 'YYYY-MM-DD HH:mm'
				}
			});
			$('.dates').on('cancel.daterangepicker', function(ev, picker) {
				$(picker.element).val('');
			});

		});
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
		});

			$('.btn-box-tool').click(function(event){
				if( $('.pin_show').hasClass('collapsed-box') ){
					$.cookie('pin_show', '1');
				} else {
					$.removeCookie('pin_show');
				}
			});

			if( $.cookie('pin_show') ){
				$('.pin_show').removeClass('collapsed-box');
				$('.pin_show .btn-box-tool i').removeClass('fa-plus').addClass('fa-minus');
			}
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/pincodes/list.blade.php ENDPATH**/ ?>