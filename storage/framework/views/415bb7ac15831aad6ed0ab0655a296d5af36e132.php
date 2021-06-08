<tr>
	<td><?php echo e($stat->user->username); ?></td>


	<td>
		<?php if($stat->type == 'add'): ?>
			<span class="text-green"><?php echo e(abs($stat->sum)); ?>	</span>
		<?php endif; ?>
	</td>
	<td>
		<?php if($stat->type != 'add'): ?>
			<span class="text-red"><?php echo e(abs($stat->sum)); ?></span>
		<?php endif; ?>
	</td>
	<td><?php echo e($stat->shop->name); ?></td>
	<td><?php echo e(date(config('app.date_time_format'), strtotime($stat->date_time))); ?></td>
	<?php if(isset($show_shop) && $show_shop): ?>
		<?php if($stat->shop): ?>
			<td><a href="<?php echo e(route('backend.shop.edit', $stat->shop->id)); ?>"><?php echo e($stat->shop->name); ?></a></td>
		<?php endif; ?>
	<?php endif; ?>
</tr><?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/stat/partials/row_shop_stat.blade.php ENDPATH**/ ?>