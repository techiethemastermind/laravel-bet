<?php $__env->startSection('page-title', trans('app.categories')); ?>
<?php $__env->startSection('page-heading', trans('app.categories')); ?>

<?php $__env->startSection('content'); ?>

	<section class="content-header">
		<?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</section>

	<section class="content">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo app('translator')->get('app.categories'); ?></h3>
				<?php if (\Auth::user()->hasPermission('categories.add')) : ?>
				<div class="pull-right box-tools">
					<a href="<?php echo e(route('backend.category.create')); ?>" class="btn btn-block btn-primary btn-sm"><?php echo app('translator')->get('app.add'); ?></a>
				</div>
				<?php endif; ?>
			</div>
			<div class="box-body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
						<tr>
							<th><?php echo app('translator')->get('app.name'); ?></th>
							<th><?php echo app('translator')->get('app.position'); ?></th>
							<th><?php echo app('translator')->get('app.href'); ?></th>
							<th><?php echo app('translator')->get('app.count'); ?></th>
						</tr>
						</thead>
						<tbody>
						<?php if(count($categories)): ?>
							<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php echo $__env->make('backend.categories.partials.row', ['base' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
								<?php $__currentLoopData = $category->inner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php echo $__env->make('backend.categories.partials.row', ['base' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php else: ?>
							<tr><td colspan="4"><?php echo app('translator')->get('app.no_data'); ?></td></tr>
						<?php endif; ?>
						</tbody>
						<thead>
						<tr>
							<th><?php echo app('translator')->get('app.name'); ?></th>
							<th><?php echo app('translator')->get('app.position'); ?></th>
							<th><?php echo app('translator')->get('app.href'); ?></th>
							<th><?php echo app('translator')->get('app.count'); ?></th>
						</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script>
		$('#categories-table').dataTable();
		$("#view").change(function () {
			$("#users-form").submit();
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/categories/list.blade.php ENDPATH**/ ?>