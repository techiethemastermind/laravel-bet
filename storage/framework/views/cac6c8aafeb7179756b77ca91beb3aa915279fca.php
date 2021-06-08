<?php $__env->startSection('page-title', trans('app.live_stats')); ?>
<?php $__env->startSection('page-heading', trans('app.live_stats')); ?>

<?php $__env->startSection('content'); ?>

    <script src="https://cdn.jsdelivr.net/npm/socket.io-client@2/dist/socket.io.js"></script>
    <script src="https://cdn.jsdelivr.net/vue/1.0.24/vue.js"></script>

    <section class="content-header">
        <?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>

    <section class="content">


        <form action="" method="GET">
            <div class="box box-danger collapsed-box shop_stat_show">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo app('translator')->get('app.filter'); ?></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('app.type'); ?></label>
                                <?php echo Form::select('type', ['' => 'All', 'PayStat' => 'Pay Stats', 'StatGame' => 'Game Stats', 'BankStat' => 'Bank Stats', 'ShopStat' => 'Shop Stats'], $filter, ['id' => 'type', 'class' => 'form-control']); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">
                        <?php echo app('translator')->get('app.filter'); ?>
                    </button>
                    <button type="button" class="btn btn-danger" id="stopActivity">
                        <?php echo app('translator')->get('app.stop'); ?>
                    </button>
                    <button type="button" class="btn btn-success" id="startActivity">
                        <?php echo app('translator')->get('app.start'); ?>
                    </button>
                </div>
            </div>
        </form>


        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo app('translator')->get('app.live_stats'); ?></h3>
            </div>
            <div class="box-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="stat-table">
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->get('app.name'); ?></th>
                            <th><?php echo app('translator')->get('app.game'); ?></th>
                            <th><?php echo app('translator')->get('app.user'); ?></th>
                            <th><?php echo app('translator')->get('app.system'); ?></th>
                            <th><?php echo app('translator')->get('app.in'); ?></th>
                            <th><?php echo app('translator')->get('app.out'); ?></th>
                            <th><?php echo app('translator')->get('app.balance'); ?></th>
                            <th><?php echo app('translator')->get('app.bet'); ?></th>
                            <th><?php echo app('translator')->get('app.win'); ?></th>
                            <th><?php echo app('translator')->get('app.old'); ?></th>
                            <th><?php echo app('translator')->get('app.new'); ?></th>
                            <th><?php echo app('translator')->get('app.in_game'); ?></th>
                            <th><?php echo app('translator')->get('app.in_jps'); ?></th>
                            <th><?php echo app('translator')->get('app.in_jpg'); ?></th>
                            <th><?php echo app('translator')->get('app.profit'); ?></th>
                            <th><?php echo app('translator')->get('app.date'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(count($statistics)): ?>
                            <?php $__currentLoopData = $statistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('backend.stat.partials.row_live_stat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr><td colspan="15"><?php echo app('translator')->get('app.no_data'); ?></td></tr>
                        <?php endif; ?>
                        </tbody>
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->get('app.name'); ?></th>
                            <th><?php echo app('translator')->get('app.game'); ?></th>
                            <th><?php echo app('translator')->get('app.user'); ?></th>
                            <th><?php echo app('translator')->get('app.system'); ?></th>
                            <th><?php echo app('translator')->get('app.in'); ?></th>
                            <th><?php echo app('translator')->get('app.out'); ?></th>
                            <th><?php echo app('translator')->get('app.balance'); ?></th>
                            <th><?php echo app('translator')->get('app.bet'); ?></th>
                            <th><?php echo app('translator')->get('app.win'); ?></th>
                            <th><?php echo app('translator')->get('app.old'); ?></th>
                            <th><?php echo app('translator')->get('app.new'); ?></th>
                            <th><?php echo app('translator')->get('app.in_game'); ?></th>
                            <th><?php echo app('translator')->get('app.in_jps'); ?></th>
                            <th><?php echo app('translator')->get('app.in_jpg'); ?></th>
                            <th><?php echo app('translator')->get('app.profit'); ?></th>
                            <th><?php echo app('translator')->get('app.date'); ?></th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(function() {

            var table = $('#stat-table');
            //var datatable = table.DataTable();

            $('#stopActivity').click(function(){
                $.cookie('stopActivity', '1'), { expires: 7 };
                $('#startActivity').css('display', '');
                $('#stopActivity').css('display', 'none');
            });

            $('#startActivity').click(function(){
                $.removeCookie('stopActivity');
                $('#startActivity').css('display', 'none');
                $('#stopActivity').css('display', '');
            });

            if($.cookie('stopActivity')){
                $('#startActivity').css('display', '');
                $('#stopActivity').css('display', 'none');
            } else{
                $('#startActivity').css('display', 'none');
                $('#stopActivity').css('display', '');
            }

            <?php

                $users = Auth::user()->hierarchyUsers();

                $filter = Request::get('type')?:'';

                echo 'var users = [' . implode(',', $users) . '];';
                echo 'var filter = "' . $filter . '";';

            ?>

            var socket = io.connect("<?php echo e(Request::server('SERVER_ADDR')); ?>:3000", {reconnect: true});
            var prior = ['ShopStat', 'BankStat'];

            var availible = {
                'StatGame': <?php echo e(intval(Auth::user()->hasPermission('stats.live'))); ?>,
                'ShopStat': <?php echo e(intval(Auth::user()->hasPermission('stats.shop'))); ?>,
                'BankStat': <?php echo e(intval(Auth::user()->hasPermission('stats.bank'))); ?>,
                'PayStat': <?php echo e(intval(Auth::user()->hasPermission('stats.pay'))); ?>,
            };

            socket.on('connect', function(){
                socket.on('Lives:NewLive', function(msg){

                    console.log(msg);
                    console.log($.inArray(parseInt(msg['shop_id']), [<?php echo e(implode(',', auth()->user()->availableShops())); ?>]));

                    if( !$.cookie('stopActivity') && availible[msg['type']] &&
                        $.inArray(parseInt(msg['shop_id']), [<?php echo e(implode(',', auth()->user()->availableShops())); ?>]) > -1 &&
                        !(!users.includes(msg['user_id']) && msg['type'] == 'ShopStat' ) &&
                        msg['domain'] == '<?php echo e(request()->getHost()); ?>'
                    ){

                        if( filter == '' || (filter != '' && filter == msg['type']) ){
                            $('#stat-table tbody').prepend(
                                '<tr>'+
                                '<td>' + msg['Name'] + '</td>'+
                                '<td>' + msg['Game'] + '</td>'+
                                '<td>' + msg['User'] + '</td>'+
                                '<td>' + msg['System'] + '</td>'+
                                '<td>' + msg['In'] + '</td>'+
                                '<td>' + msg['Out'] + '</td>'+
                                '<td>' + msg['Balance'] + '</td>'+
                                '<td>' + msg['Bet'] + '</td>'+
                                '<td>' + msg['Win'] + '</td>'+
                                '<td>' + msg['Old'] + '</td>'+
                                '<td>' + msg['New'] + '</td>'+
                                '<td>' + msg['IN_GAME'] + '</td>'+
                                '<td>' + msg['IN_JPS'] + '</td>'+
                                '<td>' + msg['IN_JPG'] + '</td>'+
                                '<td>' + msg['Profit'] + '</td>'+
                                '<td>' + msg['Date'] + '</td>'+
                                '</tr>'
                            );
                            remove();
                        }
                    }
                });
            });


            function remove(){
                var table = $('#stat-table tbody');
                var trs = table.find('tr');
                if( trs.length > 100){
                    for(var i=100; i<trs.length; i++){
                        table.children().slice(i).detach();
                    }
                }
            }


            $('input[name="dates"]').daterangepicker({
                timePicker: true,
                timePicker24Hour: true,
                startDate: moment().subtract(30, 'day'),
                endDate: moment().add(7, 'day'),

                locale: {
                    format: 'YYYY-MM-DD HH:mm'
                }
            });
            $('.btn-box-tool').click(function(event){
                if( $('.shop_stat_show').hasClass('collapsed-box') ){
                    $.cookie('shop_stat_show', '1');
                } else {
                    $.removeCookie('shop_stat_show');
                }
            });

            if( $.cookie('shop_stat_show') ){
                $('.shop_stat_show').removeClass('collapsed-box');
                $('.shop_stat_show .btn-box-tool i').removeClass('fa-plus').addClass('fa-minus');
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/stat/live_stat.blade.php ENDPATH**/ ?>