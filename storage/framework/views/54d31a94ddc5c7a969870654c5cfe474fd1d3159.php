<?php if(!(isset ($errors) && count($errors) > 0) && !Session::get('success', false) && Auth::check()): ?>
    <?php
        $path = str_replace('backend/', '', Request::path());
        $path = str_replace('backend', '', $path);
        $path = preg_replace('/[0-9]+/', '*', $path);

        $infos = [];
        $allInfos = \VanguardLTE\Info::where('link', $path)->get();
        if( count($allInfos) ){
            foreach($allInfos AS $infoItem){
                if($infoItem->user){
                    if($infoItem->user->hasRole('admin')){
                        $infos[] = $infoItem;
                    }
                    if($infoItem->user->hasRole('agent')){
                        if( in_array(auth()->user()->id, $infoItem->user->availableUsers()) ){
                            $infos[] = $infoItem;
                        }
                    }
                }
            }
        }
        if( count($infos) > 1 ){
            $infos = [$infos[rand(1, count($infos))-1]];
        }
    ?>
    <?php if($infos): ?>
        <?php $__currentLoopData = $infos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($info->roles == '' || auth()->user()->hasRole(strtolower($info->roles))): ?>

                <div class="alert alert-info">
                    <h4><?php echo e($info->title); ?></h4>
                    <p><?php echo $info->text; ?></p>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php endif; ?>

<?php

    $messages = [];

    if( Auth::check() ){
        $infoShop = \VanguardLTE\Shop::find(auth()->user()->shop_id);
        $infoGames = \VanguardLTE\JPG::select(\DB::raw('SUM(percent) AS percent'))->where(['shop_id' => auth()->user()->shop_id, 'view' => 1])->first();

        if( $infoShop && ($infoGames->percent+$infoShop->percent) >= 100 ){
            $text = '<p>JPG = <b>' .$infoGames->percent. '%</b></p>';
            $text .= '<p>'.$infoShop->name.' = <b>' .$infoShop->percent. '%</b></p>';
            $text .= '<p>' . __('app.total_percentage', ['name' => $infoShop->name, 'percent' => $infoGames->percent+$infoShop->percent]).'</p>';
            $messages[] = $text;
        }
    }

?>

<?php if(session('blockError')): ?>
    <div class="alert alert-danger">
        Errors in block <?php echo e(strtoupper(session('blockError'))); ?>

    </div>
<?php endif; ?>

<?php if(isset ($messages) && count($messages) > 0): ?>
    <div class="alert alert-danger">
        <h4><?php echo app('translator')->get('app.error'); ?></h4>
        <p><?php echo $messages[array_rand($messages)];; ?></p>
    </div>
<?php endif; ?>


<?php if(isset ($errors) && count($errors) > 0): ?>
    <div class="alert alert-danger">
        <h4><?php echo app('translator')->get('app.error'); ?></h4>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>



<?php if(settings('siteisclosed')): ?>
	<div class="alert alert-danger">
         <h4><?php echo app('translator')->get('app.turned_off'); ?></h4>
         <p><?php echo app('translator')->get('app.site_is_turned_off'); ?></p>
    </div>
<?php endif; ?>



<?php if(Session::get('success', false)): ?>
    <?php $data = Session::get('success'); ?>
    <?php if(is_array($data)): ?>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        <div class="alert alert-success">
                <h4><?php echo app('translator')->get('app.success'); ?></h4>
                <p><?php echo e($msg); ?></p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
	        <div class="alert alert-success">
                <h4><?php echo app('translator')->get('app.success'); ?></h4>
            <p><?php echo e($data); ?></p>
            </div>
    <?php endif; ?>
<?php endif; ?><?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/partials/messages.blade.php ENDPATH**/ ?>