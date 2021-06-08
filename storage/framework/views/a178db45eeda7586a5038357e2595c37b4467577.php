<?php echo Form::open(['route' => 'backend.settings.auth.update', 'id' => 'auth-general-settings-form']); ?>


    <div class="form-group">
        <label>
            <?php echo app('translator')->get('app.reset_token_lifetime'); ?>
        </label>
        <input type="text" name="login_reset_token_lifetime" class="form-control" value="<?php echo e(settings('login_reset_token_lifetime', 30)); ?>">
    </div>

<div class="form-group">
    <label>
        <?php echo app('translator')->get('app.frontend'); ?>
    </label>
    <?php echo Form::select('frontend', $directories, settings('frontend', 'Default'), ['class' => 'form-control']); ?>

</div>

<div class="form-group">
    <input type="hidden" value="0" name="use_email">
    <label class="checkbox-container">
        <?php echo app('translator')->get('app.use_email'); ?>
        <?php echo Form::checkbox('use_email', 1, settings('use_email'), ['id' => 'use-email']); ?>

        <span class="checkmark"></span>
    </label>
</div>

    <div class="form-group">
        <input type="hidden" value="0" name="remember_me">
        <label class="checkbox-container">
            <?php echo app('translator')->get('app.allow_remember_me'); ?>
            <?php echo Form::checkbox('remember_me', 1, settings('remember_me'), ['id' => 'switch-remember-me']); ?>

            <span class="checkmark"></span>
        </label>
    </div>

    <div class="form-group">
        <input type="hidden" value="0" name="reset_authentication">
        <label class="checkbox-container">
            <?php echo app('translator')->get('app.reset_authentication'); ?>
            <?php echo Form::checkbox('reset_authentication', 1, settings('reset_authentication'), ['id' => 'switch-reset-authentication']); ?>

            <span class="checkmark"></span>
        </label>
    </div>


    <div class="form-group">
        <input type="hidden" value="0" name="check_active_tab">
        <label class="checkbox-container">
            <?php echo app('translator')->get('app.check_active_tab'); ?>
            <?php echo Form::checkbox('check_active_tab', 1, settings('check_active_tab'), ['id' => 'switch-check_active_tab']); ?>

            <span class="checkmark"></span>
        </label>

    </div>

<div class="form-group">
    <input type="hidden" value="0" name="siteisclosed">
    <label class="checkbox-container">
        <?php echo app('translator')->get('app.turn_off_the_site'); ?>
        <?php echo Form::checkbox('siteisclosed', 1, settings('siteisclosed'), ['id' => 'switch-siteisclosed']); ?>

        <span class="checkmark"></span>
    </label>
</div>

<div class="form-group">
    <input type="hidden" value="0" name="use_all_categories">
    <label class="checkbox-container">
        <?php echo app('translator')->get('app.use_all_categories'); ?>
        <?php echo Form::checkbox('use_all_categories', 1, settings('use_all_categories'), ['id' => 'switch-use_all_categories']); ?>

        <span class="checkmark"></span>
    </label>
</div>

<?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/settings/partials/auth.blade.php ENDPATH**/ ?>