<?php echo Form::open(['route' => 'backend.settings.auth.update', 'id' => 'registration-settings-form']); ?>



<div class="form-group">
    <input type="hidden" value="0" name="reg_enabled">
    <label class="checkbox-container">
        <?php echo app('translator')->get('app.allow_registration'); ?>
        <?php echo Form::checkbox('reg_enabled', 1, settings('reg_enabled'), ['id' => 'switch-reg-enabled']); ?>

        <span class="checkmark"></span>
    </label>
</div>

<div class="form-group">
    <input type="hidden" value="0" name="forgot_password">
    <label class="checkbox-container">
        <?php echo app('translator')->get('app.forgot_password'); ?>
        <?php echo Form::checkbox('forgot_password', 1, settings('forgot_password'), ['id' => 'switch-forgot_password']); ?>

        <span class="checkmark"></span>
    </label>
</div>
<?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/settings/partials/registration.blade.php ENDPATH**/ ?>