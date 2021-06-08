<tr>
	<?php if(!auth()->user()->hasRole('cashier')): ?>
	<td><?php echo e($stat->id); ?></td>
	<?php endif; ?>
	<td><?php echo e($stat->user->username); ?></td>
	<td><?php echo e(date(config('app.date_time_format'), strtotime($stat->start_date))); ?></td>
	<td><?php echo e($stat->end_date ? date(config('app.date_time_format'), strtotime($stat->end_date)) : ''); ?></td>
	<?php if(!auth()->user()->hasRole('cashier')): ?>
		<td><?php echo e($stat->balance); ?></td>
	<td><?php echo e($stat->balance_in); ?></td>
	<td><?php echo e($stat->balance_out); ?></td>
	<?php endif; ?>
	<td><?php echo e(number_format ($stat->balance + $stat->balance_in - $stat->balance_out, 4, ".", "")); ?></td>
	<?php if (\Auth::user()->hasPermission('games.in_out')) : ?>
	<?php
			$banks = !$stat->end_date ? $stat->banks() : $stat->last_banks;
	?>
	<td><?php echo e(number_format ($banks, 4, ".", "")); ?></td>
	<?php endif; ?>
	<?php if(!auth()->user()->hasRole('cashier')): ?>
	<td>
		<?php if( !$stat->end_date ): ?>
			<?php echo e($stat->returns()); ?>

		<?php else: ?>
			<?php echo e($stat->last_returns); ?>

		<?php endif; ?>
	</td>
    <?php endif; ?>
	<?php
		$money = $stat->users;
		if($stat->end_date == NULL){
			$money = $summ;
		}
	?>

	<td><?php echo e($money); ?></td>
	<td><?php echo e($stat->money_in); ?></td>
	<td><?php echo e($stat->money_out); ?></td>

	<?php
		$total = $stat->money_in - $stat->money_out;
	?>

	<td><?php echo e(number_format ($total, 4, ".", "")); ?></td>

	<?php if(auth()->user()->hasRole('admin')): ?>
	<td><?php echo e(number_format ($stat->profit(), 4, ".", "")); ?></td>
	<?php endif; ?>


	<?php if(isset($show_shop) && $show_shop): ?>
		<?php if($stat->shop): ?>
			<td><a href="<?php echo e(route('backend.shop.edit', $stat->shop->id)); ?>"><?php echo e($stat->shop->name); ?></a></td>
		<?php endif; ?>
	<?php endif; ?>
</tr><?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/stat/partials/row_shift_stat.blade.php ENDPATH**/ ?>