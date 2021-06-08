<?php $__env->startSection('page-title', trans('app.info')); ?>
<?php $__env->startSection('page-heading', trans('app.info')); ?>

<?php $__env->startSection('content'); ?>

	<section class="content-header">
		<?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</section>

	<section class="content">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Helper</h3>
				<?php if (\Auth::user()->hasPermission('helpers.add')) : ?>
				<div class="pull-right box-tools">
					<a href="<?php echo e(route('backend.info.create')); ?>" class="btn btn-block btn-primary btn-sm"><?php echo app('translator')->get('app.add'); ?></a>
				</div>
				<?php endif; ?>
			</div>
			<div class="box-body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
						<tr>
							<th><?php echo app('translator')->get('app.href'); ?></th>
							<th><?php echo app('translator')->get('app.title'); ?></th>
							<th><?php echo app('translator')->get('app.roles'); ?></th>
							<th><?php echo app('translator')->get('app.shops'); ?></th>
						</tr>
						</thead>
						<tbody>
						<?php if(count($info)): ?>
							<?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php echo $__env->make('backend.info.partials.row', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php else: ?>
							<tr><td colspan="4"><?php echo app('translator')->get('app.no_data'); ?></td></tr>
						<?php endif; ?>
						</tbody>
						<thead>
						<tr>
							<th><?php echo app('translator')->get('app.href'); ?></th>
							<th><?php echo app('translator')->get('app.title'); ?></th>
							<th><?php echo app('translator')->get('app.roles'); ?></th>
							<th><?php echo app('translator')->get('app.shops'); ?></th>
						</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>

	</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/info/list.blade.php ENDPATH**/ ?>