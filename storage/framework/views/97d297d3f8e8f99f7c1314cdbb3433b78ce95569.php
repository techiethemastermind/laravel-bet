<?php $__env->startSection('page-title', trans('app.statistics')); ?>
<?php $__env->startSection('page-heading', trans('app.statistics')); ?>

<?php $__env->startSection('content'); ?>

	<section class="content-header">
		<?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</section>

	<section class="content">
		<form action="" method="GET">
			<div class="box box-danger collapsed-box pay_stat_show">
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
								<label><?php echo app('translator')->get('app.system'); ?></label>
								<input type="text" class="form-control" name="system_str" value="<?php echo e(Request::get('system_str')); ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.type'); ?></label>
								<select name="type" class="form-control">
									<option value="" <?php if(Request::get('type') == ''): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.all'); ?></option>
									<option value="add" <?php if(Request::get('type') == 'add'): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.add'); ?></option>
									<option value="out" <?php if(Request::get('type') == 'out'): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.out'); ?></option>
								</select>
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
								<label><?php echo app('translator')->get('app.payeer'); ?></label>
								<input type="text" class="form-control" name="payeer" value="<?php echo e(Request::get('payeer')); ?>">
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
				<h3 class="box-title"><?php echo app('translator')->get('app.pay_stats'); ?></h3>
			</div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
					<thead>
					<tr>
						<th><?php echo app('translator')->get('app.system'); ?></th>
						<th><?php echo app('translator')->get('app.in'); ?></th>
						<th><?php echo app('translator')->get('app.out'); ?></th>
						<th><?php echo app('translator')->get('app.user'); ?></th>
						<th><?php echo app('translator')->get('app.date'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php if(count($statistics)): ?>
						<?php $__currentLoopData = $statistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($stat instanceof \VanguardLTE\ShopStat): ?>
								<?php echo $__env->make('backend.stat.partials.row_shop_stat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							<?php else: ?>
								<?php echo $__env->make('backend.stat.partials.row_stat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php else: ?>
						<tr><td colspan="4"><?php echo app('translator')->get('app.no_data'); ?></td></tr>
					<?php endif; ?>
					</tbody>
					<thead>
					<tr>
						<th><?php echo app('translator')->get('app.system'); ?></th>
						<th><?php echo app('translator')->get('app.in'); ?></th>
						<th><?php echo app('translator')->get('app.out'); ?></th>
						<th><?php echo app('translator')->get('app.user'); ?></th>
						<th><?php echo app('translator')->get('app.date'); ?></th>
					</tr>
					</thead>
                            </table>
                        </div>
						<?php echo e($statistics->appends(Request::except('page'))->links()); ?>

                    </div>			
		</div>
	</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script>
		$('#stat-table').dataTable();
		$(function() {
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
				if( $('.pay_stat_show').hasClass('collapsed-box') ){
					$.cookie('pay_stat_show', '1');
				} else {
					$.removeCookie('pay_stat_show');
				}
			});

			if( $.cookie('pay_stat_show') ){
				$('.pay_stat_show').removeClass('collapsed-box');
				$('.pay_stat_show .btn-box-tool i').removeClass('fa-plus').addClass('fa-minus');
			}
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/stat/pay_stat.blade.php ENDPATH**/ ?>