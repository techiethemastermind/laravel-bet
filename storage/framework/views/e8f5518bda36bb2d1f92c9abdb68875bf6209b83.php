<?php echo Form::open(['route' => 'backend.settings.auth.update', 'id' => 'auth-throttle-settings-form']); ?>


    <div class="form-group">
        <label>
            <?php echo app('translator')->get('app.maximum_number_of_attempts'); ?>
            <small class="text-muted"><?php echo app('translator')->get('app.max_number_of_incorrect_login_attempts'); ?></small>
        </label>
        <input type="text" name="throttle_attempts" class="form-control" value="<?php echo e(settings('throttle_attempts', 10)); ?>">
    </div>

    <div class="form-group">
        <label><?php echo app('translator')->get('app.lockout_time'); ?></label>
        <input type="text" name="throttle_lockout_time" class="form-control" value="<?php echo e(settings('throttle_lockout_time', 1)); ?>">
    </div>
    <div class="form-group">
        <input type="hidden" value="0" name="throttle_enabled">
        <label class="checkbox-container">
            <?php echo app('translator')->get('app.throttle_authentication'); ?>
            <?php echo Form::checkbox('throttle_enabled', 1, settings('throttle_enabled'), ['id' => 'switch-throttle']); ?>

            <span class="checkmark"></span>
        </label>
    </div><?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/settings/partials/throttling.blade.php ENDPATH**/ ?>