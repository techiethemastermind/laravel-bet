<?php $__env->startSection('page-title', trans('app.api_keys')); ?>
<?php $__env->startSection('page-heading', trans('app.api_keys')); ?>

<?php $__env->startSection('content'); ?>

	<section class="content-header">
		<?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</section>

	<section class="content">
		<div class="box box-danger collapsed-box api_show">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo app('translator')->get('app.filter'); ?></h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<form action="" method="GET" id="users-form" >
						<div class="col-md-6">
							<input type="text" class="form-control" name="search" value="<?php echo e(Request::get('search')); ?>" placeholder="<?php echo app('translator')->get('app.search_for_users'); ?>">
						</div>
						<div class="col-md-6">
							<?php echo Form::select('status', ['' => 'All', '0' => 'Disabled', '1' => 'Active'], Request::get('status'), ['id' => 'status', 'class' => 'form-control input-solid']); ?>

						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo app('translator')->get('app.api_keys'); ?></h3>
				<div class="pull-right box-tools">
					<?php if (\Auth::user()->hasPermission('api.add')) : ?>
					<a href="<?php echo e(route('backend.api.create')); ?>" class="btn btn-block btn-primary btn-sm"><?php echo app('translator')->get('app.add'); ?></a>
					<?php endif; ?>
				</div>
			</div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
					<thead>
					<tr>
						<th><?php echo app('translator')->get('app.api_key'); ?></th>
						<th><?php echo app('translator')->get('app.api_ip'); ?></th>
						<th><?php echo app('translator')->get('app.shop'); ?></th>
						<th><?php echo app('translator')->get('app.status'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php if(count($api)): ?>
						<?php $__currentLoopData = $api; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $api_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php echo $__env->make('backend.api.partials.row', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php else: ?>
						<tr><td colspan="4"><?php echo app('translator')->get('app.no_data'); ?></td></tr>
					<?php endif; ?>
					</tbody>
					<thead>
					<tr>
						<th><?php echo app('translator')->get('app.api_key'); ?></th>
						<th><?php echo app('translator')->get('app.api_ip'); ?></th>
						<th><?php echo app('translator')->get('app.shop'); ?></th>
						<th><?php echo app('translator')->get('app.status'); ?></th>
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
		$(function() {
			var table = $('#api-table').DataTable({
				orderCellsTop: true,
				dom: '<"toolbar">frtip',

			});

			$("#filter").detach().appendTo("div.toolbar");

			$("#status").change(function () {
				$("#users-form").submit();
			});

			$('.btn-box-tool').click(function(event){
				if( $('.api_show').hasClass('collapsed-box') ){
					$.cookie('api_show', '1');
				} else {
					$.removeCookie('api_show');
				}
			});

			if( $.cookie('api_show') ){
				$('.api_show').removeClass('collapsed-box');
				$('.api_show .btn-box-tool i').removeClass('fa-plus').addClass('fa-minus')
			}
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/api/list.blade.php ENDPATH**/ ?>