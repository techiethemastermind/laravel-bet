<?php $__env->startSection('page-title', trans('app.shift_stats')); ?>
<?php $__env->startSection('page-heading', trans('app.shift_stats')); ?>

<?php $__env->startSection('content'); ?>

	<section class="content-header">
		<?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</section>

	<section class="content">
		<form action="" method="GET">
			<div class="box box-danger collapsed-box shift_stat_show">
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
								<label><?php echo app('translator')->get('app.user'); ?></label>
								<input type="text" class="form-control" name="user" value="<?php echo e(Request::get('user')); ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.date_start'); ?></label>
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
				<h3 class="box-title"><?php echo app('translator')->get('app.shift_stats'); ?></h3>
			</div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
					<thead>
					<tr>
						<?php if(!auth()->user()->hasRole('cashier')): ?>
							<th><?php echo app('translator')->get('app.shift'); ?></th>
						<?php endif; ?>
						<th>Open Shift</th>
						<th><?php echo app('translator')->get('app.date_start'); ?></th>
						<th><?php echo app('translator')->get('app.date_end'); ?></th>
						<?php if(!auth()->user()->hasRole('cashier')): ?>
							<th><?php echo app('translator')->get('app.credit'); ?></th>
							<th><?php echo app('translator')->get('app.in'); ?></th>
							<th><?php echo app('translator')->get('app.out'); ?></th>
						<?php endif; ?>
						<th><?php echo app('translator')->get('app.total'); ?> Credit</th>
						<?php if (\Auth::user()->hasPermission('games.in_out')) : ?>
							<th><?php echo app('translator')->get('app.banks'); ?></th>
						<?php endif; ?>
						<?php if(!auth()->user()->hasRole('cashier')): ?>
						<th><?php echo app('translator')->get('app.returns'); ?></th>
					    <?php endif; ?>
						<th>User <?php echo app('translator')->get('app.balance'); ?></th>
						<th><?php echo app('translator')->get('app.in'); ?></th>
						<th><?php echo app('translator')->get('app.out'); ?></th>
						<th><?php echo app('translator')->get('app.total'); ?> Money</th>
						<?php if(auth()->user()->hasRole('admin')): ?>
							<th><?php echo app('translator')->get('app.profit'); ?></th>
						<?php endif; ?>
					</tr>
					</thead>
					<tbody>
					<?php if(count($open_shift)): ?>
						<?php $__currentLoopData = $open_shift; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num=>$stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php echo $__env->make('backend.stat.partials.row_shift_stat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php else: ?>
						<tr><td colspan="15"><?php echo app('translator')->get('app.no_data'); ?></td></tr>
					<?php endif; ?>
					</tbody>
					<thead>
					<tr>
						<?php if(!auth()->user()->hasRole('cashier')): ?>
							<th><?php echo app('translator')->get('app.shift'); ?></th>
						<?php endif; ?>
						<th>Open Shift</th>
						<th><?php echo app('translator')->get('app.date_start'); ?></th>
						<th><?php echo app('translator')->get('app.date_end'); ?></th>
						<?php if(!auth()->user()->hasRole('cashier')): ?>
							<th><?php echo app('translator')->get('app.credit'); ?></th>
							<th><?php echo app('translator')->get('app.in'); ?></th>
							<th><?php echo app('translator')->get('app.out'); ?></th>
						<?php endif; ?>
						<th><?php echo app('translator')->get('app.total'); ?> Credit</th>
						<?php if (\Auth::user()->hasPermission('games.in_out')) : ?>
							<th><?php echo app('translator')->get('app.banks'); ?></th>
						<?php endif; ?>
						<?php if(!auth()->user()->hasRole('cashier')): ?>
						<th><?php echo app('translator')->get('app.returns'); ?></th>
					    <?php endif; ?>
						<th>User <?php echo app('translator')->get('app.balance'); ?></th>
						<th><?php echo app('translator')->get('app.in'); ?></th>
						<th><?php echo app('translator')->get('app.out'); ?></th>
						<th><?php echo app('translator')->get('app.total'); ?> Money</th>
						<?php if(auth()->user()->hasRole('admin')): ?>
							<th><?php echo app('translator')->get('app.profit'); ?></th>
						<?php endif; ?>
					</tr>
					</thead>
                            </table>
                        </div>
						<?php echo e($open_shift->appends(Request::except('page'))->links()); ?>

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
				if( $('.shift_stat_show').hasClass('collapsed-box') ){
					$.cookie('shift_stat_show', '1');
				} else {
					$.removeCookie('shift_stat_show');
				}
			});

			if( $.cookie('shift_stat_show') ){
				$('.shift_stat_show').removeClass('collapsed-box');
				$('.shift_stat_show .btn-box-tool i').removeClass('fa-plus').addClass('fa-minus');
			}
		});
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/stat/shift_stat.blade.php ENDPATH**/ ?>