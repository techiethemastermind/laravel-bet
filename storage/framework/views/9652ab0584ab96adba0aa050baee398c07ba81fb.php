<?php $__env->startSection('page-title', trans('app.returns')); ?>
<?php $__env->startSection('page-heading', trans('app.returns')); ?>

<?php $__env->startSection('content'); ?>

	<section class="content-header">
		<?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</section>

	<section class="content">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo app('translator')->get('app.returns'); ?></h3>
			</div>
			<div class="box-body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
						<tr>
							<th><?php echo app('translator')->get('app.min_pay'); ?></th>
							<th><?php echo app('translator')->get('app.max_pay'); ?></th>
							<th><?php echo app('translator')->get('app.percent'); ?></th>
							<th><?php echo app('translator')->get('app.min_balance'); ?></th>
							<th><?php echo app('translator')->get('app.status'); ?></th>
						</tr>
						</thead>
						<tbody>
						<?php if(count($returns)): ?>
							<?php $__currentLoopData = $returns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $return): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php echo $__env->make('backend.returns.partials.row', ['base' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php else: ?>
							<tr><td colspan="4"><?php echo app('translator')->get('app.no_data'); ?></td></tr>
						<?php endif; ?>
						</tbody>
						<thead>
						<tr>
							<th><?php echo app('translator')->get('app.min_pay'); ?></th>
							<th><?php echo app('translator')->get('app.max_pay'); ?></th>
							<th><?php echo app('translator')->get('app.percent'); ?></th>
							<th><?php echo app('translator')->get('app.min_balance'); ?></th>
							<th><?php echo app('translator')->get('app.status'); ?></th>
						</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/returns/list.blade.php ENDPATH**/ ?>