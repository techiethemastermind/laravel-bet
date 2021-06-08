<?php $__env->startSection('page-title', trans('app.edit_shop')); ?>
<?php $__env->startSection('page-heading', $shop->title); ?>

<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>

    <section class="content">

        <?php echo Form::open(['route' => array('backend.shop.update', $shop->id), 'files' => true, 'id' => 'user-form']); ?>

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo app('translator')->get('app.edit_shop'); ?></h3>
            </div>

            <div class="box-body">

                    <?php echo $__env->make('backend.shops.partials.base', ['edit' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">
                    <?php echo app('translator')->get('app.edit_shop'); ?>
                </button>

                <?php if( Auth::user()->hasRole(['admin','agent']) ): ?>
                    <a href="<?php echo e(route('backend.shop.hard_delete', $shop->id)); ?>"
                       class="btn btn-danger"
                       data-method="DELETE"
                       data-confirm-title="<?php echo app('translator')->get('app.please_confirm'); ?>"
                       data-confirm-text="<?php echo app('translator')->get('app.are_you_sure_delete_shop'); ?>"
                       data-confirm-delete="<?php echo app('translator')->get('app.yes_delete_him'); ?>">
                        <?php echo app('translator')->get('app.hard_delete'); ?>
                    </a>
                <?php endif; ?>

                <?php if( Auth::user()->hasRole('distributor') && count(Auth::user()->shops()) > 1 ): ?>
                <a href="<?php echo e(route('backend.shop.delete', $shop->id)); ?>"
                   class="btn btn-danger"
                   data-method="DELETE"
                   data-confirm-title="<?php echo app('translator')->get('app.please_confirm'); ?>"
                   data-confirm-text="<?php echo app('translator')->get('app.are_you_sure_delete_shop'); ?>"
                   data-confirm-delete="<?php echo app('translator')->get('app.yes_delete_him'); ?>">
                    <?php echo app('translator')->get('app.delete_shop'); ?>
                </a>
                <?php endif; ?>


            </div>
        </div>
        <?php echo Form::close(); ?>


    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\win-365.org\resources\views/backend/shops/edit.blade.php ENDPATH**/ ?>