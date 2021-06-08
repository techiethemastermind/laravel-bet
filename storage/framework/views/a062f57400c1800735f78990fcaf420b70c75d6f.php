<?php $__env->startSection('page-title', trans('app.active_sessions')); ?>
<?php $__env->startSection('page-heading', trans('app.active_sessions')); ?>

<?php $__env->startSection('content'); ?>

<section class="content-header">
<?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>

    <section class="content">
	<div class="box box-primary">
	<div class="box-header with-border">
	<h3 class="box-title"><?php echo app('translator')->get('app.sessions'); ?> - <?php echo e($user->present()->username); ?></h3>
	</div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
	<thead>
	<tr>
	<th>IP</th>
	<th><?php echo app('translator')->get('app.device'); ?></th>
	<th><?php echo app('translator')->get('app.browser'); ?></th>
	<th><?php echo app('translator')->get('app.last_activity'); ?></th>
	<th><?php echo app('translator')->get('app.action'); ?></th>
	</tr>
	</thead>
	<tbody>
                        <?php if(count($sessions)): ?>
                            <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr>
                                    <td><?php echo e($session->ip_address); ?></td>
                                    <td>
                                        <?php echo e($session->device ?: trans('app.unknown')); ?> (<?php echo e($session->platform ?: trans('app.unknown')); ?>)
                                    </td>
                                    <td><?php echo e($session->browser ?: trans('app.unknown')); ?></td>
                                    <td><?php echo e($session->last_activity->format(config('app.date_time_format'))); ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo e(isset($profile) ? route('backend.profile.sessions.invalidate', $session->id) : route('backend.user.sessions.invalidate', [$user->id, $session->id])); ?>"
                                           class="btn btn-block btn-danger btn-xs"
                                           data-method="DELETE"
                                           data-confirm-title="<?php echo app('translator')->get('app.please_confirm'); ?>"
                                           data-confirm-text="<?php echo app('translator')->get('app.are_you_sure_invalidate_session'); ?>"
                                           data-confirm-delete="<?php echo app('translator')->get('app.yes_proceed'); ?>">
                                            <?php echo app('translator')->get('app.invalidate_session'); ?>
                                        </a>
                                    </td>
	</tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
	</tbody>
	<thead>
	<tr>
	<th>IP</th>
	<th><?php echo app('translator')->get('app.device'); ?></th>
	<th><?php echo app('translator')->get('app.browser'); ?></th>
	<th><?php echo app('translator')->get('app.last_activity'); ?></th>
	<th><?php echo app('translator')->get('app.action'); ?></th>
	</tr>
	</thead>
                            </table>
                        </div>
                    </div>
	</div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/user/sessions.blade.php ENDPATH**/ ?>