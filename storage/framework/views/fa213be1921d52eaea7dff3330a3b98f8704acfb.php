<?php $__env->startSection('page-title', trans('app.bank_stats')); ?>
<?php $__env->startSection('page-heading', trans('app.bank_stats')); ?>

<?php $__env->startSection('content'); ?>

	<section class="content-header">
		<?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</section>

	<section class="content">
		<form action="" method="GET">
			<div class="box box-danger collapsed-box bank_stat_show">
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
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.user'); ?></label>
								<input type="text" class="form-control" name="user" value="<?php echo e(Request::get('user')); ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.type'); ?></label>
								<?php echo Form::select('type', ['' => 'All', 'add' => 'Add', 'out' => 'Out'], Request::get('type'), ['id' => 'type', 'class' => 'form-control']); ?>

							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.sum_from'); ?></label>
								<input type="text" class="form-control" name="sum_from" value="<?php echo e(Request::get('sum_from')); ?>">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.sum_to'); ?></label>
								<input type="text" class="form-control" name="sum_to" value="<?php echo e(Request::get('sum_to')); ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.date'); ?></label>
								<input type="text" class="form-control" name="dates" value="<?php echo e(Request::get('dates')); ?>">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<?php
									$filter = ['' => '---'];
                                    $shifts = \VanguardLTE\OpenShift::where('shop_id', Auth::user()->shop_id)->orderBy('start_date', 'DESC')->get();
                                    if( count($shifts) ){
                                        foreach($shifts AS $shift){
                                            $filter[$shift->id] = $shift->id . ' - ' . $shift->start_date;
                                        }
                                    }
								?>
								<label><?php echo app('translator')->get('app.shifts'); ?></label>
								<?php echo Form::select('shifts', $filter, Request::get('shifts'), ['id' => 'shifts', 'class' => 'form-control']); ?>

							</div>
						</div>
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
				<h3 class="box-title"><?php echo app('translator')->get('app.bank_stats'); ?></h3>
			</div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
					<thead>
					<tr>
						<th><?php echo app('translator')->get('app.name'); ?></th>
						<th><?php echo app('translator')->get('app.user'); ?></th>
						<th><?php echo app('translator')->get('app.old'); ?></th>
						<th><?php echo app('translator')->get('app.new'); ?></th>
						<th><?php echo app('translator')->get('app.in'); ?></th>
						<th><?php echo app('translator')->get('app.out'); ?></th>
						<th><?php echo app('translator')->get('app.date'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php if(count($bank_stat)): ?>
						<?php $__currentLoopData = $bank_stat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php echo $__env->make('backend.stat.partials.row_bank_stat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php else: ?>
						<tr><td colspan="7"><?php echo app('translator')->get('app.no_data'); ?></td></tr>
					<?php endif; ?>
					</tbody>
					<thead>
					<tr>
						<th><?php echo app('translator')->get('app.name'); ?></th>
						<th><?php echo app('translator')->get('app.user'); ?></th>
						<th><?php echo app('translator')->get('app.old'); ?></th>
						<th><?php echo app('translator')->get('app.new'); ?></th>
						<th><?php echo app('translator')->get('app.in'); ?></th>
						<th><?php echo app('translator')->get('app.out'); ?></th>
						<th><?php echo app('translator')->get('app.date'); ?></th>
					</tr>
					</thead>
                            </table>
                        </div>
						<?php echo e($bank_stat->appends(Request::except('page'))->links()); ?>

                    </div>			
		</div>
	</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script>
		$(function() {
			$('#stat-table').dataTable();
			$('input[name="dates"]').daterangepicker({
				timePicker: true,
				timePicker24Hour: true,
				startDate: moment().subtract(30, 'day'),
				endDate: moment().add(7, 'day'),

				locale: {
					format: 'YYYY-MM-DD HH:mm'
				}
			});

			$('.btn-box-tool').click(function(event){
				if( $('.bank_stat_show').hasClass('collapsed-box') ){
					$.cookie('bank_stat_show', '1');
				} else {
					$.removeCookie('bank_stat_show');
				}
			});

			if( $.cookie('bank_stat_show') ){
				$('.bank_stat_show').removeClass('collapsed-box');
			}
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/stat/bank_stat.blade.php ENDPATH**/ ?>