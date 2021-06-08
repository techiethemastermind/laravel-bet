<!DOCTYPE html>
<html lang="ru">

<head>

	<meta charset="utf-8">

	<title><?php echo $__env->yieldContent('page-title'); ?> - <?php echo e(settings('app_name')); ?></title>
	<meta name="description" content="HTML template">

	<meta name="viewport" content="width=device-width">

	<link rel="icon" href="/frontend/Default/img/favicon.png" >

	<link rel="stylesheet" href="/frontend/Default/css/slick.css">
	<link rel="stylesheet" href="/frontend/Default/css/grid.css">
	<link rel="stylesheet" href="/frontend/Default/css/styles.min.css">
	
	<script src="/frontend/Default/js/jquery-3.4.1.min.js"></script>

</head>

<body>

		<?php echo $__env->yieldContent('content'); ?>

	<!-- SCRIPTS -->
	<script src="/frontend/Default/js/slick.min.js"></script>
	<script src="/frontend/Default/js/masonry-docs.min.js"></script>
	<script src="/frontend/Default/js/custom.js"></script>

</body>
</html><?php /**PATH C:\OSPanel\domains\win-365.org\resources\views/frontend/Default/layouts/app.blade.php ENDPATH**/ ?>