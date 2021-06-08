<div class="box-body box-profile">


    <div class="form-group">
        <label><?php echo app('translator')->get('app.role'); ?></label>
        <?php echo Form::select('role_id', Auth::user()->available_roles( true ), $edit ? $user->role_id : '',
            ['class' => 'form-control', 'id' => 'role_id', 'disabled' => true]); ?>

    </div>

        <div class="form-group">
            <label><?php echo app('translator')->get('app.shops'); ?></label>
            <?php echo Form::select('shops[]', $shops, ($edit && $user->hasRole(['admin', 'agent', 'distributor'])) ? $user->shops(true) : Auth::user()->shop_id,
                ['class' => 'form-control', 'id' => 'shops', ($edit) ? 'disabled' : '', ($edit && $user->hasRole(['agent','distributor'])) ? 'multiple' : '']); ?>

        </div>
        <?php if($user->hasRole(['agent','distributor'])): ?>
            <div class="form-group">
                <label><?php echo app('translator')->get('app.free_shops'); ?></label>
                <?php echo Form::select('free_shops[]', $free_shops, [],
                    ['class' => 'form-control', 'id' => 'free_shops', 'multiple' => 'multiple']); ?>

            </div>
        <?php endif; ?>

    <div class="form-group">
        <label><?php echo app('translator')->get('app.status'); ?></label>
        <?php echo Form::select('status', $statuses, $edit ? $user->status : '' ,
            ['class' => 'form-control', 'id' => 'status', 'disabled' => ($user->hasRole(['admin']) || $user->id == auth()->user()->id) ? true: false]); ?>

    </div>

    <div class="form-group">
        <label><?php echo app('translator')->get('app.username'); ?></label>
        <input type="text" class="form-control" id="username" name="username" placeholder="(<?php echo app('translator')->get('app.optional'); ?>)" value="<?php echo e($edit ? $user->username : ''); ?>">
    </div>

    <?php if( $user->email != '' ): ?>
    <div class="form-group">
        <label><?php echo app('translator')->get('app.email'); ?></label>
        <input type="email" class="form-control" id="email" name="email" placeholder="(<?php echo app('translator')->get('app.optional'); ?>)" value="<?php echo e($edit ? $user->email : ''); ?>">
    </div>
    <?php endif; ?>

    <div class="form-group">
        <label><?php echo app('translator')->get('app.lang'); ?></label>
        <?php echo Form::select('language', $langs, $edit ? $user->language : '', ['class' => 'form-control']); ?>

    </div>

    <div class="form-group">
        <label><?php echo e($edit ? trans("app.new_password") : trans('app.password')); ?></label>
        <input type="password" class="form-control" id="password" name="password" <?php if($edit): ?> placeholder="<?php echo app('translator')->get('app.leave_blank_if_you_dont_want_to_change'); ?>" <?php endif; ?>>
    </div>

    <div class="form-group">
        <label><?php echo e($edit ? trans("app.confirm_new_password") : trans('app.confirm_password')); ?></label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" <?php if($edit): ?> placeholder="<?php echo app('translator')->get('app.leave_blank_if_you_dont_want_to_change'); ?>" <?php endif; ?>>
    </div>

</div>

<div class="box-footer">
    <button type="submit" class="btn btn-primary" id="update-details-btn">
        <?php echo app('translator')->get('app.edit_user'); ?>
    </button>
</div><?php /**PATH C:\OSPanel\domains\win-365.org\resources\views/backend/user/partials/edit.blade.php ENDPATH**/ ?>