<tr>
	<td>
		<a href="<?php echo e(route('backend.statistics', ['system_str' => $stat->admin ? $stat->admin->username : $stat->system])); ?>">
			<?php echo e($stat->admin ? $stat->admin->username : $stat->system); ?>

		</a>
		<?php if( $stat->value ): ?> <?php echo e($stat->value); ?> <?php endif; ?>
	</td>
<td>
		<?php if($stat->type == 'add'): ?>
			<span class="text-green"><?php echo e(abs($stat->summ)); ?></span>
		<?php endif; ?>
</td>
	<td>
		<?php if($stat->type != 'add'): ?>
			<span class="text-red"><?php echo e(abs($stat->summ)); ?></span>
		<?php endif; ?>
	</td>
</td>
	<td>
		<a href="<?php echo e(route('backend.statistics', ['user' => $stat->user->username])); ?>">
			<?php echo e($stat->user->username); ?>

		</a>
	</td>

<td><?php echo e($stat->created_at->format(config('app.date_time_format'))); ?></td>
	<?php if(isset($show_shop) && $show_shop): ?>
		<?php if($stat->shop): ?>
			<td><a href="<?php echo e(route('backend.shop.edit', $stat->shop->id)); ?>"><?php echo e($stat->shop->name); ?></a></td>
			<?php else: ?>
			<td><?php echo app('translator')->get('app.no_shop'); ?></td>
		<?php endif; ?>
	<?php endif; ?>
</tr><?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/stat/partials/row_stat.blade.php ENDPATH**/ ?>