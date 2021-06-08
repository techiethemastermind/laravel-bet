<?php $__env->startSection('page-title', trans('app.jpg')); ?>
<?php $__env->startSection('page-heading', trans('app.jpg')); ?>

<?php $__env->startSection('content'); ?>

	<section class="content-header">
		<?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</section>

	<section class="content">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo app('translator')->get('app.jpg'); ?></h3>
			</div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
					<thead>
					<tr>
						<th><?php echo app('translator')->get('app.id'); ?></th>
						<th><?php echo app('translator')->get('app.name'); ?></th>
						<th><?php echo app('translator')->get('app.balance'); ?></th>
						<th><?php echo app('translator')->get('app.start_balance'); ?></th>
						<th><?php echo app('translator')->get('app.trigger'); ?></th>
						<th><?php echo app('translator')->get('app.percent'); ?></th>
						<th><?php echo app('translator')->get('app.status'); ?></th>
						<th><?php echo app('translator')->get('app.pay_in'); ?></th>
						<th><?php echo app('translator')->get('app.pay_out'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php if(count($jackpots)): ?>
						<?php $__currentLoopData = $jackpots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jackpot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php echo $__env->make('backend.jpg.partials.row', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php else: ?>
						<tr><td colspan="9"><?php echo app('translator')->get('app.no_data'); ?></td></tr>
					<?php endif; ?>
					</tbody>
					<thead>
					<tr>
						<th><?php echo app('translator')->get('app.id'); ?></th>
						<th><?php echo app('translator')->get('app.name'); ?></th>
						<th><?php echo app('translator')->get('app.balance'); ?></th>
						<th><?php echo app('translator')->get('app.start_balance'); ?></th>
						<th><?php echo app('translator')->get('app.trigger'); ?></th>
						<th><?php echo app('translator')->get('app.percent'); ?></th>
						<th><?php echo app('translator')->get('app.status'); ?></th>
						<th><?php echo app('translator')->get('app.pay_in'); ?></th>
						<th><?php echo app('translator')->get('app.pay_out'); ?></th>
					</tr>
					</thead>
                            </table>
                        </div>
                    </div>
		</div>
	</section>

	<!-- Modal -->
	<div class="modal fade" id="openAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form action="<?php echo e(route('backend.jpgame.balance')); ?>" method="POST">
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
							<input type="hidden" id="AddId" name="jackpot_id">
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
				<form action="<?php echo e(route('backend.jpgame.balance')); ?>" method="POST" id="outForm">
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
							<input type="hidden" id="OutId" name="jackpot_id">
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
		$('#jackpots-table').dataTable();
		$("#status").change(function () {
			$("#users-form").submit();
		});
		$('.addPayment').click(function(event){
			console.log($(event.target));
			var item = $(event.target).hasClass('addPayment') ? $(event.target) : $(event.target).parent();
			var id = item.attr('data-id');
			$('#AddId').val(id);
			$('#outAll').val('0');
		});


		$('#doOutAll').click(function () {
			$('#outAll').val('1');
			$('form#outForm').submit();
		});

		$('.outPayment').click(function(event){
			console.log($(event.target));
			var item = $(event.target).hasClass('outPayment') ? $(event.target) : $(event.target).parent();
			console.log(item);
			var id = item.attr('data-id');
			$('#OutId').val(id);
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/jpg/list.blade.php ENDPATH**/ ?>