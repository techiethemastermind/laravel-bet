<?php $__env->startSection('page-title', trans('app.edit_user')); ?>
<?php $__env->startSection('page-heading', $user->present()->username); ?>

<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>

    <section class="content">
        <div class="row">
            <?php echo $__env->make('backend.user.partials.info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="col-md-9">




                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li <?php if(!Request::get('date')): ?> class="active" <?php endif; ?>>
                            <a id="details-tab"
                               data-toggle="tab"
                               href="#details">
                                <?php echo app('translator')->get('app.edit_user'); ?>
                            </a>
                        </li>
                        <li>
                            <a id="authentication-tab"
                               data-toggle="tab"
                               href="#login-details">
                                <?php echo app('translator')->get('app.latest_activity'); ?>
                            </a>
                        </li>
                        <li <?php if(Request::get('date')): ?> class="active" <?php endif; ?>>
                            <a id="bonus-tab"
                               data-toggle="tab"
                               href="#bonus-details">
                                <?php echo app('translator')->get('app.games_activity'); ?>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content" id="nav-tabContent">
                        <div class="<?php if(!Request::get('date')): ?> active <?php endif; ?> tab-pane" id="details">
                            <?php echo Form::open(['route' => ['backend.user.update.details', $user->id], 'method' => 'PUT', 'id' => 'details-form']); ?>

                            <?php echo $__env->make('backend.user.partials.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo Form::close(); ?>

                        </div>


                        <div class="tab-pane" id="login-details">
                            <?php if(count($userActivities)): ?>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('app.action'); ?></th>
                                        <th><?php echo app('translator')->get('app.date'); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $userActivities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($activity->description); ?></td>
                                            <td><?php echo e($activity->created_at->format(config('app.date_time_format'))); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <p class="text-muted font-weight-light"><em><?php echo app('translator')->get('app.no_activity_from_this_user_yet'); ?></em></p>
                            <?php endif; ?>
                        </div>

                        <div class="tab-pane <?php if(Request::get('date')): ?> active <?php endif; ?>" id="bonus-details">

                            <form action="" method="GET">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('app.date'); ?></label>
                                            <input type="text" class="form-control" name="date" value="<?php echo e(Request::get('date')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>&nbsp;</label><br>
                                            <button type="submit" class="btn btn-primary">
                                                <?php echo app('translator')->get('app.filter'); ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <?php if(count($numbers) || count($max_wins) || count($max_bets)): ?>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('app.games'); ?></th>
                                        <th><?php echo app('translator')->get('app.count2'); ?></th>
                                        <th><?php echo app('translator')->get('app.max_bet'); ?></th>
                                        <th><?php echo app('translator')->get('app.max_win'); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if($numbers): ?>
                                        <?php $__currentLoopData = $numbers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $number): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($number->game); ?></td>
                                                <td><?php echo e($number->summ); ?> </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <?php if($max_wins): ?>
                                        <?php $__currentLoopData = $max_wins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $win): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($win->game); ?></td>
                                                <td></td>
                                                <td></td>
                                                <td><?php echo e($win->max_win); ?> </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <?php if($max_bets): ?>
                                        <?php $__currentLoopData = $max_bets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($bet->game); ?></td>
                                                <td></td>
                                                <td><?php echo e($bet->max_bet); ?> </td>
                                                <td></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <p class="text-muted font-weight-light"><em><?php echo app('translator')->get('app.no_activity_from_this_user_yet'); ?></em></p>
                            <?php endif; ?>
                        </div>

                    </div>

                </div>




            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(function() {
            $('input[name="date"]').datepicker({
                format: 'yyyy-mm-dd',
            });
        });
    </script>
    <?php echo HTML::script('/back/js/as/app.js'); ?>

    <?php echo HTML::script('/back/js/as/btn.js'); ?>

    <?php echo HTML::script('/back/js/as/profile.js'); ?>

    <?php echo JsValidator::formRequest('VanguardLTE\Http\Requests\User\UpdateDetailsRequest', '#details-form'); ?>

    <?php echo JsValidator::formRequest('VanguardLTE\Http\Requests\User\UpdateLoginDetailsRequest', '#login-details-form'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/user/edit.blade.php ENDPATH**/ ?>