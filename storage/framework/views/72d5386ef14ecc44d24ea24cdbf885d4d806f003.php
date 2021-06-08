<?php $__env->startSection('page-title', trans('app.api_generator')); ?>
<?php $__env->startSection('page-heading', trans('app.api_generator')); ?>

<?php $__env->startSection('content'); ?>

<section class="content-header">
<?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>

    <section class="content">
    <?php echo Form::open(['route' => 'backend.settings.generator.post', 'id' => 'generator-form']); ?>

    <div class="box box-primary">
    <div class="box-header with-border">
    <h3 class="box-title"><?php echo app('translator')->get('app.api_generator'); ?></h3>
    </div>
    <div class="box-body">
    <div class="row">

            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo app('translator')->get('app.shops'); ?></label>
                <?php echo e(Form::select('shop_id', $shops, Request::old('shop_id'), ['class' => 'form-control', 'id' => 'shops'])); ?>

			  </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo app('translator')->get('app.api'); ?></label>
                <?php echo e(Form::select('key', $api, Request::old('key'), ['class' => 'form-control', 'id' => 'keys'])); ?>

			  </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo app('translator')->get('app.view'); ?></label>
                <?php echo e(Form::select('view', $view, Request::old('view'), ['class' => 'form-control changing', 'id' => 'view'])); ?>

			  </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo app('translator')->get('app.device'); ?></label>
                <?php echo e(Form::select('device[]', $device, Request::old('device'), ['class' => 'form-control changing', 'multiple' => 'multiple', 'id' => 'device'])); ?>

			  </div>
            </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="device"><?php echo app('translator')->get('app.categories'); ?></label>
                <select name="categories_ids[]" id="categories" class="form-control select2 changing" multiple="multiple" style="width: 100%;" >
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php echo e((Request::get('categories_ids') && in_array($category->id, Request::get('categories_ids')))? 'selected="selected"' : ''); ?>><?php echo e($category->title); ?></option>
                        <?php $__currentLoopData = $category->inner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($inner->id); ?>" <?php echo e((Request::get('categories_ids') && in_array($inner->id, Request::get('categories_ids')))? 'selected="selected"' : ''); ?>><?php echo e($inner->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo app('translator')->get('app.games'); ?></label>
					<select name="game_ids[]" multiple="multiple" class="form-control" id="games">
						<?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($game); ?>" <?php if(Request::get('game_ids') && in_array($game, Request::get('game_ids'))) {echo 'selected';} ?> ><?php echo e($game); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
			  </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo app('translator')->get('app.jackpots'); ?></label>
                <?php echo e(Form::select('jackpot_ids[]', $jackpots, Request::old('jackpot_ids'), ['class' => 'form-control', 'multiple' => 'multiple'])); ?>

			  </div>
            </div>

			<?php if( $text ): ?>
            <div class="col-md-12">
              <div class="form-group">
                <label><?php echo app('translator')->get('app.generate_api_code'); ?></label>
					<textarea class="form-control" rows="5"><?php echo e($text); ?></textarea>
			  </div>
            </div>
			<?php endif; ?>

    </div>
    </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">
                <?php echo app('translator')->get('app.api_generator'); ?>
            </button>
        </div>
    </div>
    <?php echo e(Form::close()); ?>

    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(".changing").change(function () {

			var categories = $('#categories').val();
			var device = $('#device').val();
			var view = $('#view').val();


            $.ajax({
				dataType: "json",
				url: "<?php echo e(route('backend.game.list.json')); ?>",
				data: {view: view, categories: categories, device: device},
				success: function(data){

					var games = '';

					$.each(data, function(index, item) {
						games += '<option value="' + item + '">' + item + '</option>';
					});


					$('#games')
						.find('option')
						.remove()
						.end()
						.append(games);
				}
			});
        });

        $('#shops').change(function(event){

			var shop_id = $(event.target).val();

			$.ajax({
				dataType: "json",
				url: "<?php echo e(route('backend.api.json')); ?>",
				data: {shop_id: shop_id},
				success: function(data){

					var keys = '';

					$.each(data, function(index, item) {
						keys += '<option value="' + index + '">' + item + '</option>';
					});


					$('#keys')
							.find('option')
							.remove()
							.end()
							.append(keys);
				}
			});
		});
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/settings/generator.blade.php ENDPATH**/ ?>