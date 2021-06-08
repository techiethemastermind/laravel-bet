<header class="main-header">
    <!-- Logo -->
    <a class="logo" href="<?php echo e(url('/')); ?>">
        <span class="logo-mini"><b>T</b></span>
        <span class="logo-lg"><b>Tbet-365</b> <small></small></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only"><?php echo app('translator')->get('app.toggle_navigation'); ?></span>
        </a>

<div class="navbar-custom-menu">
   <ul class="nav navbar-nav">
   
      <li class="dropdown tasks-menu">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-time text-aqua"></i></a>
         <ul class="dropdown-menu">
            <li class="header"><b><?php echo e(auth()->user()->username); ?></b></li>
            <li>
               <ul class="menu">

				  <li><a href="<?php echo e(route('backend.start_shift')); ?>"> <?php echo app('translator')->get('app.start_shift'); ?></a></li>

               </ul>
            </li>
         </ul>
      </li>


<?php if(Auth::user()->hasRole(['cashier', 'distributor'])): ?>
      <li class="dropdown tasks-menu">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-stats text-aqua"></i></a>
         <ul class="dropdown-menu">
            <li class="header"><b><?php echo e(auth()->user()->username); ?></b></li>
            <li>
               <ul class="menu">

				<?php if( Auth::user()->hasRole('distributor') && auth()->user()->present()->shop): ?>
				  <li><a href="<?php echo e(route('backend.shop.action', [auth()->user()->present()->shop, 'jpg_out'])); ?>"
                    data-method="DELETE"
                    data-confirm-title="<?php echo app('translator')->get('app.please_confirm'); ?>"
                    data-confirm-text="<?php echo e(auth()->user()->present()->shop->name); ?> / <?php echo app('translator')->get('app.jpg_out'); ?>"
                    data-confirm-delete="<?php echo app('translator')->get('app.yes_delete_him'); ?>"> <?php echo app('translator')->get('app.jpg_out'); ?></a></li>
				  <li><a href="<?php echo e(route('backend.shop.action', [auth()->user()->present()->shop, 'games_out'])); ?>"
                    data-method="DELETE"
                    data-confirm-title="<?php echo app('translator')->get('app.please_confirm'); ?>"
                    data-confirm-text="<?php echo e(auth()->user()->present()->shop->name); ?> / <?php echo app('translator')->get('app.games_out'); ?>"
                    data-confirm-delete="<?php echo app('translator')->get('app.yes_delete_him'); ?>"> <?php echo app('translator')->get('app.games_out'); ?></a></li>
				  <li><a href="<?php echo e(route('backend.shop.action', [auth()->user()->present()->shop, 'return_out'])); ?>"
                    data-method="DELETE"
                    data-confirm-title="<?php echo app('translator')->get('app.please_confirm'); ?>"
                    data-confirm-text="<?php echo e(auth()->user()->present()->shop->name); ?> / <?php echo app('translator')->get('app.returns_out'); ?>"
                    data-confirm-delete="<?php echo app('translator')->get('app.yes_delete_him'); ?>"> <?php echo app('translator')->get('app.returns_out'); ?></a></li>
				<?php endif; ?>

				<?php if( Auth::user()->hasRole('cashier') && auth()->user()->present()->shop): ?>
				  <li><a href="<?php echo e(route('backend.user.action', ['users_out'])); ?>"
                    data-method="DELETE"
                    data-confirm-title="<?php echo app('translator')->get('app.please_confirm'); ?>"
                    data-confirm-text="<?php echo e(auth()->user()->present()->shop->name); ?> / <?php echo app('translator')->get('app.users_out'); ?>"
                    data-confirm-delete="<?php echo app('translator')->get('app.yes_delete_him'); ?>"> <?php echo app('translator')->get('app.users_out'); ?></a></li>
				  <li><a href="<?php echo e(route('backend.user.action', ['pin_out'])); ?>"
                    data-method="DELETE"
                    data-confirm-title="<?php echo app('translator')->get('app.please_confirm'); ?>"
                    data-confirm-text="<?php echo e(auth()->user()->present()->shop->name); ?> / <?php echo app('translator')->get('app.pin_out'); ?>"
                    data-confirm-delete="<?php echo app('translator')->get('app.yes_delete_him'); ?>"> <?php echo app('translator')->get('app.pin_out'); ?></a></li>
				<?php endif; ?>

               </ul>
            </li>
         </ul>
      </li>
<?php endif; ?>

    <li class="dropdown tasks-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-off text-aqua"></i></a>
        <ul class="dropdown-menu">
            <li class="header"><b><?php echo e(auth()->user()->username); ?></b></li>
            <li>
                <ul class="menu">

                    <?php if(config('session.driver') == 'database'): ?>
                        <li><a href="<?php echo e(route('backend.profile.sessions')); ?>"> <?php echo app('translator')->get('app.active_sessions'); ?></a></li>
                    <?php endif; ?>

                    <?php if( Auth::user()->shop ): ?>
                        <?php if( Auth::user()->shop->is_blocked ): ?>
                            <?php if (\Auth::user()->hasPermission('shops.unblock')) : ?>
                            <li><a href="<?php echo e(route('backend.settings.shop_unblock')); ?>"
                                   data-method="PUT"
                                   data-confirm-title="<?php echo app('translator')->get('app.please_confirm'); ?>"
                                   data-confirm-text="<?php echo app('translator')->get('app.are_you_sure_unblock_shop'); ?>"
                                   data-confirm-delete="<?php echo app('translator')->get('app.unblock'); ?>"
                                > UnBlock Shop</a></li>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if (\Auth::user()->hasPermission('shops.block')) : ?>
                            <li><a href="<?php echo e(route('backend.settings.shop_block')); ?>"
                                   data-method="PUT"
                                   data-confirm-title="<?php echo app('translator')->get('app.please_confirm'); ?>"
                                   data-confirm-text="<?php echo app('translator')->get('app.are_you_sure_block_shop'); ?>"
                                   data-confirm-delete="<?php echo app('translator')->get('app.block'); ?>"
                                > Block Shop</a></li>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>

                    <li><a href="<?php echo e(route('backend.user.edit', auth()->user()->present()->id)); ?>"> <?php echo app('translator')->get('app.my_profile'); ?></a></li>
                    <li><a href="<?php echo e(route('backend.auth.logout')); ?>"> <?php echo app('translator')->get('app.logout'); ?></a></li>

                </ul>
            </li>
        </ul>
    </li>

   </ul>
</div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar --><?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/partials/navbar.blade.php ENDPATH**/ ?>