<?php $__env->startSection('page-title', trans('app.dashboard')); ?>
<?php $__env->startSection('page-heading', trans('app.dashboard')); ?>

<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>

    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-light-blue">
                    <div class="inner">
                        <h3><?php echo e(number_format($stats['total'])); ?></h3>
                        <p><?php echo app('translator')->get('app.total_users'); ?></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="<?php echo e(route('backend.user.list')); ?>" class="small-box-footer"><?php echo app('translator')->get('app.more_info'); ?> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo e(number_format($stats['new'])); ?></h3>
                        <p><?php echo app('translator')->get('app.new_users_this_month'); ?></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-plus"></i>
                    </div>
                    <a href="<?php echo e(route('backend.user.list')); ?>" class="small-box-footer"><?php echo app('translator')->get('app.more_info'); ?> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo e(number_format($stats['banned'])); ?></h3>
                        <p><?php echo app('translator')->get('app.banned_users'); ?></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-ban"></i>
                    </div>
                    <a href="<?php echo e(route('backend.user.list')); ?>" class="small-box-footer"><?php echo app('translator')->get('app.more_info'); ?> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo e(number_format($stats['games'])); ?></h3>
                        <p><?php echo app('translator')->get('app.games'); ?></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-desktop"></i>
                    </div>
                    <a href="<?php echo e(route('backend.game.list')); ?>" class="small-box-footer"><?php echo app('translator')->get('app.more_info'); ?> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

        <!-- Latest Pay Stats / Latest Game Stats -->

        <div class="row">

            <?php if (\Auth::user()->hasPermission('stats.pay')) : ?>
            <div class="col-xs-6">
                <div class="box box-success">

                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo app('translator')->get('app.latest_pay_stats'); ?></h3>
                    </div>

                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('app.system'); ?></th>
                                    <th><?php echo app('translator')->get('app.sum'); ?></th>
                                    <th><?php echo app('translator')->get('app.user'); ?></th>
                                    <th><?php echo app('translator')->get('app.date'); ?></th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php if(count($statistics)): ?>
                                    <?php $__currentLoopData = $statistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo e(route('backend.statistics', ['system_str' => $stat->admin ? $stat->admin->username : $stat->system])); ?>">
                                                    <?php echo e($stat->admin ? $stat->admin->username : $stat->system); ?>

                                                </a>
                                                <?php if( $stat->value ): ?> <?php echo e($stat->value); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($stat->type == 'add'): ?>
                                                    <span class="text-green"><?php echo e(abs($stat->summ)); ?></span>
                                                <?php else: ?>
                                                    <span class="text-red"><?php echo e(abs($stat->summ)); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('backend.statistics', ['user' => $stat->user ? $stat->user->username : ''])); ?>">
                                                    <?php echo e($stat->user ? $stat->user->username : ''); ?>

                                                </a>
                                            </td>
                                            <td><?php echo e($stat->created_at->format(config('app.time_format'))); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr><td colspan="4"><?php echo app('translator')->get('app.no_data'); ?></td></tr>
                                <?php endif; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if (\Auth::user()->hasPermission('stats.game')) : ?>
            <div class="col-xs-6">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo app('translator')->get('app.latest_game_stats'); ?></h3>
                    </div>

                    <div class="box-body">
                        <div class="table-responsive">

                            <table class="table table-striped">

                                <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('app.game'); ?></th>
                                    <th><?php echo app('translator')->get('app.user'); ?></th>
                                    <th><?php echo app('translator')->get('app.balance'); ?></th>
                                    <th><?php echo app('translator')->get('app.bet'); ?></th>
                                    <th><?php echo app('translator')->get('app.win'); ?></th>
                                    <th><?php echo app('translator')->get('app.date'); ?></th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php if(count($gamestat)): ?>
                                    <?php $__currentLoopData = $gamestat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo e(route('backend.game_stat', ['game' => $stat->game])); ?>">
                                                    <?php echo e($stat->game); ?>

                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('backend.game_stat', ['user' => $stat->user ? $stat->user->username : ''])); ?>">
                                                    <?php echo e($stat->user ? $stat->user->username : ''); ?>

                                                </a>
                                            </td>
                                            <td><?php echo e($stat->balance); ?></td>
                                            <td><?php echo e($stat->bet); ?></td>
                                            <td><?php echo e($stat->win); ?></td>
                                            <td><?php echo e(date(config('app.time_format'), strtotime($stat->date_time))); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr><td colspan="6"><?php echo app('translator')->get('app.no_data'); ?></td></tr>
                                <?php endif; ?>

                                </tbody>

                            </table>

                        </div>
                    </div>

                </div>
            </div>
            <?php endif; ?>

        </div>

        <!-- /Latest Pay Stats / Latest Game Stats -->

        <!-- Latest Shops / Latest Registrations -->

        <div class="row">

            <?php if (\Auth::user()->hasPermission('shops.manage')) : ?>
            <div class="col-xs-6">
                <div class="box box-success">

                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo app('translator')->get('app.latest_shops'); ?></h3>
                    </div>

                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('app.name'); ?></th>
                                    <th><?php echo app('translator')->get('app.id'); ?></th>
                                    <th><?php echo app('translator')->get('app.credit'); ?></th>
                                    <th><?php echo app('translator')->get('app.frontend'); ?></th>
                                    <th><?php echo app('translator')->get('app.currency'); ?></th>
                                    <th><?php echo app('translator')->get('app.status'); ?></th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php if(count($shops)): ?>
                                    <?php $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo e(route('backend.shop.edit', $shop->id)); ?>">
                                                    <?php echo e($shop->name); ?>

                                                </a>
                                            </td>
                                            <td><?php echo e($shop->id); ?></td>
                                            <td><?php echo e($shop->balance); ?></td>
                                            <td><?php echo e($shop->frontend); ?></td>

                                            <td><?php echo e($shop->currency); ?></td>
                                            <td>
                                                <?php if($shop->is_blocked): ?>
                                                    <small><i class="fa fa-circle text-red"></i></small>
                                                <?php else: ?>
                                                    <small><i class="fa fa-circle text-green"></i></small>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr><td colspan="7"><?php echo app('translator')->get('app.no_data'); ?></td></tr>
                                <?php endif; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if (\Auth::user()->hasPermission('users.manage')) : ?>
            <div class="col-xs-6">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo app('translator')->get('app.latest_registrations'); ?></h3>
                    </div>

                    <div class="box-body">
                        <div class="table-responsive">

                            <table class="table table-striped">

                                <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('app.username'); ?></th>
                                    <?php if (\Auth::user()->hasPermission('users.balance.manage')) : ?>
                                    <th><?php echo app('translator')->get('app.balance'); ?></th>
                                    <?php endif; ?>
                                    <th><?php echo app('translator')->get('app.status'); ?></th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php if(count($latestRegistrations)): ?>
                                    <?php $__currentLoopData = $latestRegistrations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo e(route('backend.user.edit', $user->id)); ?>">
                                                    <?php echo e($user->username ?: trans('app.n_a')); ?>

                                                </a>
                                            </td>
                                            <?php if (\Auth::user()->hasPermission('users.balance.manage')) : ?>
                                            <td><?php echo e($user->balance); ?></td>
                                            <?php endif; ?>
                                            <td><?php echo e(date(config('app.time_format'), strtotime($user->last_login))); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr><td colspan="4"><?php echo app('translator')->get('app.no_data'); ?></td></tr>
                                <?php endif; ?>

                                </tbody>

                            </table>

                        </div>
                    </div>

                </div>
            </div>
            <?php endif; ?>

        </div>

        <!-- /Latest Shops / Latest Registrations -->


        <div class="row">

            <?php if (\Auth::user()->hasPermission('stats.bank')) : ?>
            <div class="col-xs-6">
                <div class="box box-success">

                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo app('translator')->get('app.latest_bank_stat'); ?></h3>
                    </div>

                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('app.name'); ?></th>
                                    <th><?php echo app('translator')->get('app.user'); ?></th>
                                    <th><?php echo app('translator')->get('app.old'); ?></th>
                                    <th><?php echo app('translator')->get('app.new'); ?></th>
                                    <th><?php echo app('translator')->get('app.sum'); ?></th>
                                    <th><?php echo app('translator')->get('app.date'); ?></th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php if(count($bank_stat)): ?>
                                    <?php $__currentLoopData = $bank_stat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($stat->name); ?></td>
                                            <td><?php echo e($stat->user ? $stat->user->username : ''); ?></td>
                                            <td><?php echo e($stat->old); ?></td>
                                            <td><?php echo e($stat->new); ?></td>
                                            <td>
                                                <?php if($stat->type == 'add'): ?>
                                                    <span class="text-green"><?php echo e(abs($stat->sum)); ?></span>
                                                <?php else: ?>
                                                    <span class="text-red"><?php echo e(abs($stat->sum)); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($stat->created_at->format(config('app.time_format'))); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr><td colspan="6"><?php echo app('translator')->get('app.no_data'); ?></td></tr>
                                <?php endif; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if (\Auth::user()->hasPermission('stats.shop')) : ?>
            <div class="col-xs-6">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo app('translator')->get('app.latest_shop_stats'); ?></h3>
                    </div>

                    <div class="box-body">
                        <div class="table-responsive">

                            <table class="table table-striped">

                                <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('app.name'); ?></th>
                                    <th><?php echo app('translator')->get('app.user'); ?></th>
                                    <th><?php echo app('translator')->get('app.sum'); ?></th>
                                    <th><?php echo app('translator')->get('app.date'); ?></th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php if(count($shops_stat)): ?>
                                    <?php $__currentLoopData = $shops_stat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($stat->shop? $stat->shop->name: ''); ?></td>
                                            <td><?php echo e($stat->user ? $stat->user->username : ''); ?></td>
                                            <td>
                                                <?php if($stat->type == 'add'): ?>
                                                    <span class="text-green"><?php echo e(abs($stat->sum)); ?>	</span>
                                                <?php else: ?>
                                                    <span class="text-red"><?php echo e(abs($stat->sum)); ?></span>
                                                <?php endif; ?>

                                            </td>
                                            <td><?php echo e(date(config('app.time_format'), strtotime($stat->date_time))); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr><td colspan="4"><?php echo app('translator')->get('app.no_data'); ?></td></tr>
                                <?php endif; ?>

                                </tbody>

                            </table>

                        </div>
                    </div>

                </div>
            </div>
            <?php endif; ?>

        </div>

        <!-- Latest Shift Stat -->

        <div class="row">

            <?php if (\Auth::user()->hasPermission('stats.shift')) : ?>
            <div class="col-xs-12">
                <div class="box box-success">

                    <div class="box-header with-border">
                        <h3 class="box-title">Latest <?php echo app('translator')->get('app.shift_stats'); ?></h3>
                    </div>

                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <?php if(!auth()->user()->hasRole('cashier')): ?>
                                        <th><?php echo app('translator')->get('app.shift'); ?></th>
                                    <?php endif; ?>
                                    <th><?php echo app('translator')->get('app.user'); ?></th>
                                    <th><?php echo app('translator')->get('app.date_start'); ?></th>
                                    <th><?php echo app('translator')->get('app.date_end'); ?></th>
                                    <?php if(!auth()->user()->hasRole('cashier')): ?>
                                        <th><?php echo app('translator')->get('app.credit'); ?></th>
                                        <th><?php echo app('translator')->get('app.in'); ?></th>
                                        <th><?php echo app('translator')->get('app.out'); ?></th>
                                    <?php endif; ?>
                                    <th><?php echo app('translator')->get('app.total'); ?></th>
                                    <?php if (\Auth::user()->hasPermission('games.in_out')) : ?>
                                        <th><?php echo app('translator')->get('app.banks'); ?></th>
                                    <?php endif; ?>
                                    <th><?php echo app('translator')->get('app.returns'); ?></th>
                                    <th><?php echo app('translator')->get('app.money'); ?></th>
                                    <th><?php echo app('translator')->get('app.in'); ?></th>
                                    <th><?php echo app('translator')->get('app.out'); ?></th>
                                    <th><?php echo app('translator')->get('app.total'); ?></th>
                                    <?php if(auth()->user()->hasRole('admin')): ?>
                                        <th><?php echo app('translator')->get('app.profit'); ?></th>
                                    <?php endif; ?>
                                </tr>
                                </thead>

                                <tbody>

                                <?php if(count($open_shift)): ?>
                                    <?php $__currentLoopData = $open_shift; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num=>$stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <?php if(!auth()->user()->hasRole('cashier')): ?>
                                                <td><?php echo e($stat->id); ?></td>
                                            <?php endif; ?>
                                            <td><?php echo e($stat->user ? $stat->user->username : ''); ?></td>
                                            <td><?php echo e(date(config('app.date_format'), strtotime($stat->start_date))); ?></td>
                                            <td><?php echo e($stat->end_date ? date(config('app.date_format'), strtotime($stat->end_date)) : ''); ?></td>
                                            <?php if(!auth()->user()->hasRole('cashier')): ?>
                                                <td><?php echo e($stat->balance); ?></td>
                                            <td><?php echo e($stat->balance_in); ?></td>
                                            <td><?php echo e($stat->balance_out); ?></td>
                                                <?php endif; ?>
                                                    <td><?php echo e(number_format ($stat->balance + $stat->balance_in - $stat->balance_out, 4, ".", "")); ?></td>
                                                <?php if (\Auth::user()->hasPermission('games.in_out')) : ?>
                                                <?php
                                                $banks = !$stat->end_date ? $stat->banks() : $stat->last_banks;
                                            ?>
                                            <td><?php echo e(number_format ($banks, 4, ".", "")); ?></td>
                                                <?php endif; ?>
                                            <td>
                                                <?php if( !$stat->end_date ): ?>
                                                    <?php echo e($stat->returns()); ?>

                                                <?php else: ?>
                                                    <?php echo e($stat->last_returns); ?>

                                                <?php endif; ?>
                                            </td>

                                            <?php
                                                $money = $stat->users;
                                                if($stat->end_date == NULL){
                                                    $money = $summ;
                                                }
                                            ?>

                                            <td><?php echo e($money); ?></td>
                                            <td><?php echo e($stat->money_in); ?></td>
                                            <td><?php echo e($stat->money_out); ?></td>

                                            <?php
                                                $total = $stat->money_in - $stat->money_out;
                                            ?>

                                            <td><?php echo e(number_format ($total, 4, ".", "")); ?></td>

                                            <?php if(auth()->user()->hasRole('admin')): ?>
                                                <td><?php echo e(number_format ($stat->profit(), 4, ".", "")); ?></td>
                                            <?php endif; ?>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr><td colspan="15"><?php echo app('translator')->get('app.no_data'); ?></td></tr>
                                <?php endif; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

        </div>

        <!-- /Latest Shift Stat -->

    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        //$('.table').dataTable();

                <?php
                    $data = [];
                    foreach($usersPerMonth AS $key=>$value){
                        $data[] = ['y' => $key, 'item1' => rand(100,1000)];
                    }
                ?>

        var area = new Morris.Area({
                element   : 'revenue-chart',
                resize    : true,
                data      : [
                        <?php $__currentLoopData = $usersPerMonth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    {y: "<?php echo e($key); ?>", item1: <?php echo e($value); ?> },
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                xkey      : 'y',
                ykeys     : ['item1'],
                labels    : ["<?php echo e(trans('app.new_sm')); ?>"],
                lineColors: ['#a0d0e0'],
                hideHover : 'auto'
            });

    </script>
    <?php echo HTML::script('/back/dist/js/pages/dashboard.js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/dashboard/admin.blade.php ENDPATH**/ ?>