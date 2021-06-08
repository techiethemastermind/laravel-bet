<?php $__env->startSection('page-title', trans('app.general_settings')); ?>
<?php $__env->startSection('page-heading', trans('app.general_settings')); ?>

<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>

    <section class="content">

        <div class="box box-default">
            <?php echo Form::open(['route' => 'backend.settings.general.update', 'id' => 'general-settings-form']); ?>

            <div class="box-header with-border">
                <h3 class="box-title"><?php echo app('translator')->get('app.general_settings'); ?></h3>
            </div>

            <div class="box-body">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo app('translator')->get('app.name'); ?></label>
                            <input type="text" class="form-control" id="app_name" name="app_name" value="<?php echo e(settings('app_name')); ?>">
                        </div>

                    <?php echo $__env->make('backend.settings.partials.auth', ['directories' => $directories], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    </div>
                    <div class="col-md-6">
                    <?php echo $__env->make('backend.settings.partials.throttling', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('backend.settings.partials.registration', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">
                    <?php echo app('translator')->get('app.edit_settings'); ?>
                </button>

                <?php if( Auth::user()->hasRole('admin') && Auth::user()->shop_id == 0 ): ?>

                    <a href="<?php echo e(route('backend.settings.sync')); ?>"
                       class="btn btn-danger "
                       data-method="PUT"
                       data-confirm-title="<?php echo app('translator')->get('app.please_confirm'); ?>"
                       data-confirm-text="<?php echo app('translator')->get('app.do_you_want_to_sync_shops'); ?>"
                       data-confirm-delete="<?php echo app('translator')->get('app.yes_i_do'); ?>">
                        <b>Sync</b></a>
                <?php endif; ?>

            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/settings/general.blade.php ENDPATH**/ ?>