<tr>
    <td>
        <a href="<?php echo e(route('backend.user.edit', $user->id)); ?>">
            <?php echo e($user->username ?: trans('app.n_a')); ?>

        </a>
    </td>

	<?php if (\Auth::user()->hasPermission('users.balance.manage')) : ?>
	<td><?php echo e($user->balance); ?></td>
	<td><?php echo e($user->bonus); ?></td>
	<td><?php echo e($user->wager); ?></td>
	<td>
		<?php if( 
			(Auth::user()->hasRole('admin') && $user->hasRole(['agent'])) ||
			(Auth::user()->hasRole('agent') && $user->hasRole(['distributor'])) ||
			(Auth::user()->hasRole('cashier') && $user->hasRole('user'))
		): ?>
		<a class="newPayment addPayment" href="#" data-toggle="modal" data-target="#openAddModal" data-id="<?php echo e($user->id); ?>" >
		<button type="button" class="btn btn-block btn-success btn-xs"><?php echo app('translator')->get('app.add'); ?></button>
		</a>
		<?php else: ?>
			<button type="button" class="btn btn-block btn-success disabled btn-xs"><?php echo app('translator')->get('app.add'); ?></button>
		<?php endif; ?>
	</td>
	<td>
		<?php if(
    		$user->wager == 0 &&
    		(
				(Auth::user()->hasRole('admin') && $user->hasRole(['agent'])) ||
				(Auth::user()->hasRole('agent') && $user->hasRole(['distributor'])) ||
				(Auth::user()->hasRole('cashier') && $user->hasRole('user'))
			)
		): ?>
		<a class="newPayment outPayment" href="#" data-toggle="modal" data-target="#openOutModal" data-id="<?php echo e($user->id); ?>" >
		<button type="button" class="btn btn-block btn-danger btn-xs"><?php echo app('translator')->get('app.out'); ?></button>
		</a>
		<?php else: ?>
			<button type="button" class="btn btn-block btn-danger disabled btn-xs"><?php echo app('translator')->get('app.out'); ?></button>
		<?php endif; ?>
	</td>
    <?php endif; ?>

	<?php if(isset($show_shop) && $show_shop): ?>
		<?php if($user->shop): ?>
			<td><a href="<?php echo e(route('backend.shop.edit', $user->shop->id)); ?>"><?php echo e($user->shop->name); ?></a></td>
			<?php else: ?>
			<td></td>
		<?php endif; ?>
	<?php endif; ?>
</tr><?php /**PATH C:\OSPanel\domains\win-365.org\resources\views/backend/user/partials/row.blade.php ENDPATH**/ ?>