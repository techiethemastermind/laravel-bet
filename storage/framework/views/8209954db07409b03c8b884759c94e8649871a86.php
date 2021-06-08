<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label><?php echo app('translator')->get('app.title'); ?></label>
            <input type="text" class="form-control" id="title" name="name" placeholder="<?php echo app('translator')->get('app.title'); ?>" required value="<?php echo e($edit ? $shop->name : old('name')); ?>">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label><?php echo app('translator')->get('app.percent'); ?></label>
            <?php
                $percents = array_combine(\VanguardLTE\Shop::$values['percent'], \VanguardLTE\Shop::$values['percent']);
            ?>
            <?php echo Form::select('percent', $percents, $edit ? $shop->percent : old('percent')?:'90', ['class' => 'form-control']); ?>

        </div>
    </div>



    <div class="col-md-6">
        <div class="form-group">
            <label> <?php echo app('translator')->get('app.frontend'); ?></label>
            <?php echo Form::select('frontend', $directories, $edit ? $shop->frontend : old('frontend')?:'Default', ['class' => 'form-control']); ?>

        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label> <?php echo app('translator')->get('app.order'); ?></label>
            <?php
                $orders = array_combine(\VanguardLTE\Shop::$values['orderby'], \VanguardLTE\Shop::$values['orderby']);
            ?>
            <?php echo Form::select('orderby', $orders, $edit ? $shop->orderby : old('orderby'), ['class' => 'form-control']); ?>

        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label> <?php echo app('translator')->get('app.currency'); ?></label>
            <?php
                $currencies = array_combine(\VanguardLTE\Shop::$values['currency'], \VanguardLTE\Shop::$values['currency']);
            ?>
            <?php echo Form::select('currency', $currencies, $edit ? $shop->currency : old('currency')?:'USD', ['class' => 'form-control']); ?>

        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="device"> <?php echo app('translator')->get('app.categories'); ?></label>
            <select class="form-control select2" name="categories[]" <?php echo e($edit ? 'disabled' : ''); ?> multiple="multiple" required>
                <option value="0" <?php echo e(((old('categories') && in_array(0, old('categories')) ) || ($edit && in_array(0, $cats) )) ? 'selected':''); ?>>All</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"
                            <?php echo e(((old('categories') && in_array($category->id, old('categories')) )  || ($edit && in_array($category->id, $cats) ))
    ? 'selected':''); ?>

                    ><?php echo e($category->title); ?></option>
                    <?php $__currentLoopData = $category->inner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($inner->id); ?>"
                                <?php echo e((( old('categories') && in_array($inner->id, old('categories')) || ( $edit && in_array($inner->id, $cats) )) ) ? 'selected':''); ?>><?php echo e($inner->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <?php if($edit && count($blocks)): ?>
    <div class="col-md-6">
        <div class="form-group">
            <label for="device">
                <?php echo app('translator')->get('app.status'); ?>:
                <?php if($shop->is_blocked): ?>
                    <?php echo app('translator')->get('app.block'); ?>
                <?php else: ?>
                    <?php echo app('translator')->get('app.unblock'); ?>
                <?php endif; ?>
            </label>
            <?php echo Form::select('is_blocked', $blocks, $edit ? $shop->is_blocked : old('is_blocked'), ['class' => 'form-control']); ?>

        </div>
    </div>
    <?php endif; ?>
</div>


<?php /**PATH C:\OSPanel\domains\win-365.org\resources\views/backend/shops/partials/base.blade.php ENDPATH**/ ?>