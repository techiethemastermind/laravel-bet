<?php $__env->startSection('page-title', trans('app.games')); ?>
<?php $__env->startSection('page-heading', trans('app.games')); ?>

<?php $__env->startSection('content'); ?>

	<section class="content-header">
		<?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</section>

	<section class="content">

		<?php if (\Auth::user()->hasPermission('games.info')) : ?>
		<div class="row">
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-green">
					<div class="inner">
						<h3><?php echo e($stats['in']); ?></h3>
						<p><?php echo app('translator')->get('app.total_in'); ?></p>
					</div>
					<div class="icon">
						<i class="fa fa-level-up"></i>
					</div>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-yellow">
					<div class="inner">
						<h3><?php echo e($stats['out']); ?></h3>
						<p><?php echo app('translator')->get('app.total_out'); ?></p>
					</div>
					<div class="icon">
						<i class="fa fa-level-down"></i>
					</div>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">

						<h3><?php echo e(number_format($stats['games'])); ?></h3>

						<p>View Games</p>
					</div>
					<div class="icon">
						<i class="fa fa-line-chart"></i>
					</div>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">

						<h3><?php echo e(number_format($stats['disabled'])); ?></h3>

						<p>Disabled Games</p>
					</div>
					<div class="icon">
						<i class="fa fa-line-chart"></i>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">

						<h3><?php echo e(auth()->user()->shop?auth()->user()->shop->percent:'0'); ?></h3>

						<p>Total Percent</p>
					</div>
					<div class="icon">
						<i class="fa fa-line-chart"></i>
					</div>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">
						<h3><?php echo e(number_format( $stats['rtp'], 2 )); ?></h3>
						<p><?php echo app('translator')->get('app.average_RTP'); ?></p>
					</div>
					<div class="icon">
						<i class="fa fa-line-chart"></i>
					</div>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-light-blue">
					<div class="inner">
						<h3><?php echo e(number_format($stats['slots'], 2)); ?></h3>
						<p><?php echo app('translator')->get('app.slots'); ?></p>
					</div>
					<div class="icon">
						<i class="fa fa-refresh"></i>
					</div>
					<?php if( auth()->user()->hasRole('distributor') ): ?>
					<a href="javascript:;" class="small-box-footer openAdd" data-toggle="modal" data-target="#openAddModal" data-type="slots"><?php echo app('translator')->get('app.gamebank'); ?> <?php echo app('translator')->get('app.pay_in'); ?> <i class="fa fa-arrow-circle-right"></i></a>
					<?php endif; ?>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-green" >
					<div class="inner">
						<h3><?php echo e(number_format($stats['little'], 2)); ?></h3>
						<p><?php echo app('translator')->get('app.little'); ?></p>
					</div>
					<div class="icon">
						<i class="fa fa-level-up"></i>
					</div>
					<?php if( auth()->user()->hasRole('distributor') ): ?>
					<a href="javascript:;" class="small-box-footer openAdd" data-toggle="modal" data-target="#openAddModal" data-type="little"><?php echo app('translator')->get('app.gamebank'); ?> <?php echo app('translator')->get('app.pay_in'); ?> <i class="fa fa-arrow-circle-right"></i></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-yellow">
					<div class="inner">
						<h3><?php echo e(number_format($stats['table_bank'], 2)); ?></h3>
						<p><?php echo app('translator')->get('app.table_bank'); ?></p>
					</div>
					<div class="icon">
						<i class="fa fa-level-down"></i>
					</div>
					<?php if( auth()->user()->hasRole('distributor') ): ?>
					<a href="javascript:;" class="small-box-footer openAdd" data-toggle="modal" data-target="#openAddModal" data-type="table_bank"><?php echo app('translator')->get('app.gamebank'); ?> <?php echo app('translator')->get('app.pay_in'); ?> <i class="fa fa-arrow-circle-right"></i></a>
					<?php endif; ?>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">
						<h3><?php echo e(number_format( $stats['fish'], 2 )); ?></h3>
						<p><?php echo app('translator')->get('app.fish'); ?></p>
					</div>
					<div class="icon">
						<i class="fa fa-line-chart"></i>
					</div>
					<?php if( auth()->user()->hasRole('distributor') ): ?>
					<a href="javascript:;" class="small-box-footer openAdd" data-toggle="modal" data-target="#openAddModal" data-type="fish"><?php echo app('translator')->get('app.gamebank'); ?> <?php echo app('translator')->get('app.pay_in'); ?> <i class="fa fa-arrow-circle-right"></i></a>
					<?php endif; ?>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">
						<h3><?php echo e(number_format( $stats['bonus'], 2 )); ?></h3>
						<p><?php echo app('translator')->get('app.bonus'); ?></p>
					</div>
					<div class="icon">
						<i class="fa fa-line-chart"></i>
					</div>
					<?php if( auth()->user()->hasRole('distributor') ): ?>
						<a href="javascript:;" class="small-box-footer openAdd" data-toggle="modal" data-target="#openAddModal" data-type="bonus"><?php echo app('translator')->get('app.gamebank'); ?> <?php echo app('translator')->get('app.pay_in'); ?> <i class="fa fa-arrow-circle-right"></i></a>
					<?php endif; ?>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-light-blue">
					<div class="inner">
						<h3><?php echo e($stats['bank']); ?></h3>
						<p><?php echo app('translator')->get('app.total_banks'); ?></p>
					</div>
					<div class="icon">
						<i class="fa fa-refresh"></i>
					</div>
				</div>
			</div>
			<!-- ./col -->
		</div>
		<?php endif; ?>


		<?php if( Auth::user()->shop && Auth::user()->shop->pending ): ?>
			<div class="alert alert-warning">
				<h4><?php echo app('translator')->get('app.shop_is_creating'); ?></h4>
				<p><?php echo app('translator')->get('app.games_will_be_added_in_few_minutes'); ?></p>
			</div>
		<?php endif; ?>

		<?php if( !Auth::user()->shop || (Auth::user()->shop && !Auth::user()->shop->pending) ): ?>
		<form action="" id="games-form" method="GET">
			<div class="box box-danger collapsed-box games_show">
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
								<label><?php echo app('translator')->get('app.search'); ?></label>
								<input type="text" class="form-control" name="search" value="<?php echo e(Request::get('search')); ?>" placeholder="<?php echo app('translator')->get('app.games'); ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.status'); ?></label>
								<?php echo Form::select('view', $views, Request::get('view'), ['id' => 'view', 'class' => 'form-control']); ?>

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.device'); ?></label>
								<?php echo Form::select('device', $devices, Request::get('device'), ['id' => 'device', 'class' => 'form-control']); ?>

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.category'); ?></label>
								<select class="form-control select2" name="category[]" id="category" multiple="multiple" style="width: 100%;" data-placeholder="">
									<option value=""></option>
									<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($category->id); ?>" <?php echo e((count($savedCategory) && in_array($category->id, $savedCategory))? 'selected="selected"' : ''); ?>><?php echo e($category->title); ?></option>
										<?php $__currentLoopData = $category->inner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($inner->id); ?>" <?php echo e((count($savedCategory) && in_array($inner->id, $savedCategory))? 'selected="selected"' : ''); ?>>&nbsp;&nbsp;&nbsp;<?php echo e($inner->title); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">

						<div class="col-md-4">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.gamebank'); ?></label>
								<?php echo Form::select('gamebank', ['' => '---'] + $emptyGame->gamebankNames, Request::get('gamebank'), ['id' => 'gamebank', 'class' => 'form-control']); ?>

							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.labels'); ?></label>
								<?php echo Form::select('label', ['' => '---'] + $emptyGame->labels, Request::get('label'), ['id' => 'label', 'class' => 'form-control']); ?>

							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label><?php echo app('translator')->get('app.jpg'); ?></label>
								<?php echo Form::select('jpg', ['' => '---'] + $jpgs, Request::get('jpg'), ['id' => 'jpg', 'class' => 'form-control']); ?>

							</div>
						</div>

					</div>
				</div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">
                        <?php echo app('translator')->get('app.filter'); ?>
                    </button>
					<a href="?clear" class="btn btn-default">
						<?php echo app('translator')->get('app.clear'); ?>
					</a>

                </div>
			</div>
		</form>

		<form action="<?php echo e(route('backend.game.mass')); ?>" method="POST" class="pb-2 mb-3 border-bottom-light">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"><?php echo app('translator')->get('app.games'); ?></h3>
					<?php if (\Auth::user()->hasPermission('games.edit')) : ?>
					<div class="pull-right box-tools">
						<input type="hidden" value="<?= csrf_token() ?>" name="_token">
						<button class="btn btn-block btn-primary btn-sm" type="submit"><?php echo app('translator')->get('app.change'); ?></button>
					</div>
					<?php endif; ?>
				</div>
                    <div class="box-body">


                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
						<thead>
						<tr>
							<th><?php echo app('translator')->get('app.game'); ?></th>
							<?php if (\Auth::user()->hasPermission('games.in_out')) : ?>
							<th><?php echo app('translator')->get('app.in'); ?></th>
							<th><?php echo app('translator')->get('app.out'); ?></th>
							<th><?php echo app('translator')->get('app.total'); ?></th>
							<?php endif; ?>
							<th>Count</th>
							<th><?php echo app('translator')->get('app.denomination'); ?></th>
							<th>
								<label class="checkbox-container">
									<input type="checkbox" class="checkAll">
									<span class="checkmark"></span>
								</label>
							</th>
						</tr>
						</thead>
						<tbody>
						<?php if(count($games)): ?>
							<?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php echo $__env->make('backend.games.partials.row', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php else: ?>
							<tr><td colspan="9"><?php echo app('translator')->get('app.no_data'); ?></td></tr>
						<?php endif; ?>
						</tbody>
						<thead>
						<tr>
							<th><?php echo app('translator')->get('app.game'); ?></th>
							<?php if (\Auth::user()->hasPermission('games.in_out')) : ?>
							<th><?php echo app('translator')->get('app.in'); ?></th>
							<th><?php echo app('translator')->get('app.out'); ?></th>
							<th><?php echo app('translator')->get('app.total'); ?></th>
							<?php endif; ?>
							<th>Count</th>
							<th><?php echo app('translator')->get('app.denomination'); ?></th>
							<th>
								<label class="checkbox-container">
									<input type="checkbox" class="checkAll">
									<span class="checkmark"></span>
								</label>
							</th>
						</tr>
						</thead>
                            </table>
                        </div>
                    </div>
			</div>
		</form>
		<?php endif; ?>


		<div class="modal fade" id="openAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form action="" method="POST" id="gamebank_add">

						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><?php echo app('translator')->get('app.balance'); ?> <?php echo app('translator')->get('app.pay_in'); ?></h4>
						</div>

						<div class="modal-body">
							<div class="form-group">
								<input type="hidden" class="form-control" id="AddSum" name="summ" placeholder="<?php echo app('translator')->get('app.sum'); ?>" required>
								<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
								<br>

									<button type="button" class="btn btn-default changeAddSum" data-value="100">100</button>
									<button type="button" class="btn btn-default changeAddSum" data-value="200">200</button>
									<button type="button" class="btn btn-default changeAddSum" data-value="300">300</button>
									<button type="button" class="btn btn-default changeAddSum" data-value="400">400</button>
									<button type="button" class="btn btn-default changeAddSum" data-value="500">500</button>
									<button type="button" class="btn btn-default changeAddSum" data-value="1000">1000</button>
									<button type="button" class="btn btn-default changeAddSum" data-value="2000">2000</button>
									<button type="button" class="btn btn-default changeAddSum" data-value="3000">3000</button>
									<button type="button" class="btn btn-default changeAddSum" data-value="4000">4000</button>
									<button type="button" class="btn btn-default changeAddSum" data-value="5000">5000</button>

							</div>
						</div>
						<div class="modal-footer" style="text-align: left;">
							<a href="" class="btn btn-warning openAddClear"><b><?php echo app('translator')->get('app.reset'); ?></b></a>
						</div>
					</form>
				</div>
			</div>
		</div>

	</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script>
		$('.openAdd').click(function(event){
			var type = $(event.target).data('type');
			$('.openAddClear').attr('href', '<?php echo e(route('backend.game.gamebanks_clear')); ?>?type=' + type);
			$('#gamebank_add').attr('action', '<?php echo e(route('backend.game.gamebanks_add')); ?>?type=' + type)
		});
		$('.changeAddSum').click(function(event){
			$('#AddSum').val($(event.target).data('value'));
			$('#gamebank_add').submit();
		});
	</script>
	<script>
		var table = $('#games-table').DataTable({
			orderCellsTop: true,
			dom: '<"toolbar">frtip',

		});

		$("#filter").detach().appendTo("div.toolbar");

		//$('#games-table').dataTable();
		$("#view").change(function () {
			$("#games-form").submit();
		});
		$("#device").change(function () {
			$("#games-form").submit();
		});
		$("#category").change(function () {
			$("#games-form").submit();
		});

		$('.checkAll').on('ifChecked', function(event){
			$('.minimal').iCheck('check');
		});

		$('.checkAll').on('ifUnchecked\t', function(event){
			$('.minimal').iCheck('uncheck');
		});

		$('.checkAll').click(function(event){
			if($(event.target).is(':checked') ){
				$('input[type=checkbox]').attr('checked', true);
			}else{
				$('input[type=checkbox]').attr('checked', false);
			}
		});

		$('.btn-box-tool').click(function(event){
			if( $('.games_show').hasClass('collapsed-box') ){
				$.cookie('games_show', '1');
			} else {
				$.removeCookie('games_show');
			}
		});

		if( $.cookie('games_show') ){
			$('.games_show').removeClass('collapsed-box');
			$('.games_show .btn-box-tool i').removeClass('fa-plus').addClass('fa-minus');
		}

	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/games/list.blade.php ENDPATH**/ ?>