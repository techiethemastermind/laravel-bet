
<div class="col-md-3">

    <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="/back/img/<?php echo e($user->present()->role_id); ?>.png" alt="<?php echo e($user->present()->username); ?>">
            <h4 class="profile-username text-center"><small><i class="fa fa-circle text-<?php echo e($user->present()->labelClass); ?>"></i></small> <?php echo e($user->present()->username); ?></h4>
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b><?php echo app('translator')->get('app.balance'); ?></b> <a class="pull-right"><?php echo e($user->present()->balance); ?></a>
                </li>

                <?php if( $user->hasRole('user') ): ?>
                <li class="list-group-item">
                    <b><?php echo app('translator')->get('app.in'); ?></b> <a class="pull-right"><?php echo e(number_format($user->present()->total_in,2)); ?></a>
                </li>
                <li class="list-group-item">
                    <b><?php echo app('translator')->get('app.out'); ?></b> <a class="pull-right"><?php echo e(number_format($user->present()->total_out,2)); ?></a>
                </li>
                <li class="list-group-item">
                    <b><?php echo app('translator')->get('app.total'); ?></b> <a class="pull-right"><?php echo e(number_format($user->present()->total_in - $user->present()->total_out,2)); ?></a>
                </li>
                <?php endif; ?>

            </ul>

            <?php if( $user->id != Auth::id() ): ?>
                <?php if(

                    (auth()->user()->hasRole('agent') && $user->hasRole('distributor'))
                    ||
                    (auth()->user()->hasRole('distributor') && $user->hasRole('manager'))
                    ||
                    (auth()->user()->hasRole('manager') && $user->hasRole('cashier'))
                    ||
                    (auth()->user()->hasRole('cashier') && $user->hasRole('user'))
                ): ?>
                <?php if (\Auth::user()->hasPermission('users.delete')) : ?>
                <a href="<?php echo e(route('backend.user.delete', $user->id)); ?>"
                   class="btn btn-danger btn-block"
                   data-method="DELETE"
                   data-confirm-title="<?php echo app('translator')->get('app.please_confirm'); ?>"
                   data-confirm-text="<?php echo app('translator')->get('app.are_you_sure_delete_user'); ?>"
                   data-confirm-delete="<?php echo app('translator')->get('app.yes_delete_him'); ?>">
                    <b><?php echo app('translator')->get('app.delete'); ?></b></a>
                <?php endif; ?>
                <?php endif; ?>

                    <?php if (\Auth::user()->hasPermission('users.delete')) : ?>
                    <?php if(auth()->user()->hasRole('admin') && $user->hasRole(['agent','distributor']) ): ?>
                        <a href="<?php echo e(route('backend.user.hard_delete', $user->id)); ?>"
                           class="btn btn-danger btn-block"
                           data-method="DELETE"
                           data-confirm-title="<?php echo app('translator')->get('app.please_confirm'); ?>"
                           data-confirm-text="<?php echo app('translator')->get('app.are_you_sure_delete_user'); ?>"
                           data-confirm-delete="<?php echo app('translator')->get('app.yes_delete_him'); ?>">
                            <b><?php echo app('translator')->get('app.hard_delete'); ?> <?php echo e($user->role->name); ?></b></a>
                    <?php endif; ?>
                    <?php endif; ?>

            <?php endif; ?>
        </div>
    </div>


</div><?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/user/partials/info.blade.php ENDPATH**/ ?>