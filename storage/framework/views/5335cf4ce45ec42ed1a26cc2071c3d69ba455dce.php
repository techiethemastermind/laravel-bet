<?php $__env->startSection('page-title', $title); ?>

<?php $__env->startSection('content'); ?>

	<!-- MAIN -->
	<main class="main">
		<div class="container">
			<!-- MENU BEGIN -->
			<div class="menu">
				<div class="menu__wrap">
				<?php if( settings('use_all_categories') ): ?>
					<a href="<?php echo e(route('frontend.game.list.category', 'all')); ?>" class="menu__link <?php if($currentSliderNum != -1 && $currentSliderNum == 'all'): ?> active <?php endif; ?>"><?php echo app('translator')->get('app.all'); ?></a>
				<?php endif; ?>
				<?php if($categories && count($categories)): ?>
					<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<a href="<?php echo e(route('frontend.game.list.category', $category->href)); ?>" class="menu__link <?php if($currentSliderNum != -1 && $category->href == $currentSliderNum): ?> active <?php endif; ?>""><?php echo e($category->title); ?></a>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
				</div>
				<div class="navBurger" role="navigation" id="navToggle"></div> 
				<!-- MENU END -->
			</div>
						<?php
							$return = \VanguardLTE\Returns::where('shop_id', Auth::user()->shop_id)->first();
                            $pincodes = \VanguardLTE\Pincode::where(['shop_id' => Auth::user()->shop_id, 'status' => 1, 'activated_at' => null])->count();
							$happyhour = \VanguardLTE\HappyHour::where(['shop_id' => auth()->user()->shop_id, 'time' => date('G'), 'status' => 1])->first();
							if(!$happyhour){
								$happyhour = \VanguardLTE\HappyHour::where(['shop_id' => auth()->user()->shop_id, 'status' => 1])->where('time', '>',date('G'))->first();
							}
							if(!$happyhour){
								$happyhour = \VanguardLTE\HappyHour::where(['shop_id' => auth()->user()->shop_id, 'status' => 1])->first();
							}
						?>
			<!-- SLIDER - BEGIN -->
			<div class="slider">
					<div class="grid">
						<div class="grid-item grid-item--width3 grid-item--height4">
							<div class="grid__content">
								<!-- JACKPOT - BEGIN -->
								<div class="jackpot">
									<h2 class="jackpot__title">JACKPOT PROGRESSIVE</h2>
									<div class="jackpot__block">
										<div class="jackpot__item jackpot__item-major">
											<span class="jackpot__level">
												GRAND
											</span>
											<span class="jackpot__value jackpot0">
								            <?php if( count($jpgs) > 0 ): ?>
									            <?php echo e($jpgs[0]->balance); ?>

								            <?php endif; ?>											
											</span>
										</div>
										<div class="jackpot__item jackpot__item-maxi">
											<span class="jackpot__level">
												MAXI
											</span>
											<span class="jackpot__value jackpot1">
								            <?php if( count($jpgs) > 1 ): ?>
									            <?php echo e($jpgs[1]->balance); ?>

								            <?php endif; ?>											
											</span>
										</div>
										<div class="jackpot__item jackpot__item-minor">
											<span class="jackpot__level">
												MAJOR
											</span>
											<span class="jackpot__value jackpot2">
								            <?php if( count($jpgs) > 2 ): ?>
									            <?php echo e($jpgs[2]->balance); ?>

								            <?php endif; ?>											
											</span>
										</div>
										<div class="jackpot__item jackpot__item-mini">
											<span class="jackpot__level">
												MINOR
											</span>
											<span class="jackpot__value jackpot3">
								            <?php if( count($jpgs) > 3 ): ?>
									            <?php echo e($jpgs[3]->balance); ?>

								            <?php endif; ?>											
											</span>
										</div>
										<div class="jackpot__item jackpot__item-full">
											<span class="jackpot__level">
												MINI
											</span>
											<span class="jackpot__value jackpot4">
								            <?php if( count($jpgs) > 4 ): ?>
									            <?php echo e($jpgs[4]->balance); ?>

								            <?php endif; ?>											
											</span>
										</div>
										<div class="jackpot__item jackpot__item-mega">
											<span class="jackpot__level">
												LITE
											</span>
											<span class="jackpot__value jackpot5">
								            <?php if( count($jpgs) > 5 ): ?>
									            <?php echo e($jpgs[5]->balance); ?>

								            <?php endif; ?>											
											</span>
										</div>
									</div>
								</div>
								<!-- JACKPOT - BEGIN -->
							</div>
						</div>
						<!-- GAMES - BEGIN -->
				<?php if($games && count($games)): ?>
					<?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="grid-item grid-item--height2 grid-item--width2">
							<div class="grid__content games">
								<div class="games__item">
									<div class="games__content">
										<img src="<?php echo e($game->name ? '/frontend/Default/ico/' . $game->name . '.jpg' : ''); ?>" alt="<?php echo e($game->title); ?>">										
										<a href="<?php echo e(route('frontend.game.go', $game->name)); ?>" class="play-btn btn">Play</a>
										<span class="game-name"><?php echo e($game->title); ?></span>
									</div>
								</div>
							</div>
						</div>					
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
						<!-- GAMES - BEGIN -->
					</div>
			</div>
			<!-- SLIDER - END -->
		</div>
	</main>
	<footer class="footer">
		<div class="container">
			<div class="footer__block">
				<div class="footer__left">
					<?php if( $return && auth()->user()->present()->count_return > 0 && auth()->user()->present()->balance <= $return->min_balance ): ?>
					<a href="#" data-name="modal-bonus" class="gift" id="returns">
						<img src="/frontend/Default/img/_src/gift-active.png" alt="" class="gift-icon active">
					</a>
					<?php endif; ?>
					<!--
					<a href="#" class="wheel">
						<img src="/frontend/Default/img/_src/wheel-active.png" alt="" class="gift-icon active">
						<img src="/frontend/Default/img/_src/wheel.png" alt="" class="gift-icon disabled">
					</a>
					-->
				</div>
				<div class="footer__center">
					<div class="footer__info">
						<span class="account-id"><em>ID</em> <?php echo e(Auth::user()->username); ?></span>
						<a href="#modal-pin" class="footer__btn modal-btn btn" data-name="modal-pin">Cashier</a>
						<span class="account-money" id="balanceValue"><?php echo e(number_format(Auth::user()->balance, 2,".","")); ?> <em><?php if( auth()->user()->present()->shop ): ?><?php echo e(auth()->user()->present()->shop->currency); ?><?php endif; ?></em></span>
					</div>
					<ul class="balance__info">
						<li>
							<p>Bonus</p>
							<span class="amount"><?php echo e(number_format(Auth::user()->bonus, 2,".","")); ?> <?php if( auth()->user()->present()->shop ): ?><?php echo e(auth()->user()->present()->shop->currency); ?><?php endif; ?></span>
						</li>
						<li>
							<p>Wager</p>
							<span class="amount"><?php echo e(number_format(Auth::user()->wager, 2,".","")); ?> <?php if( auth()->user()->present()->shop ): ?><?php echo e(auth()->user()->present()->shop->currency); ?><?php endif; ?></span>
						</li>
						<li>
							<p>CashBack</p>
							<span class="amount count_return"><?php echo e(number_format(Auth::user()->count_return, 2,".","")); ?> <?php if( auth()->user()->present()->shop ): ?><?php echo e(auth()->user()->present()->shop->currency); ?><?php endif; ?></span>
						</li>
					</ul>
				</div>
				<div class="footer__right">
					<a href="/logout" class="footer__icon"><img src="/frontend/Default/img/_src/close.svg" alt=""></a>
				</div>
			</div>
		</div>
	</footer>
	<div class="overlay"></div>
	<div class="modal modal-bonus" >
		<div class="modal__block">
			<h3 class="modal__title">Cash Back Bonus</h3>
			<p class="modal__text cashBankText"></p>
			<button class="btn modal-close">OK</button>
		</div>
		<span class="close-btn">
			<img src="/frontend/Default/img/_src/close.svg" alt="">
		</span>
	</div>
	<div class="modal modal-pin">
		<div class="modal__block">
			<h3 class="modal__title">PIN - code</h3>
			<p class="modal__text">Enter PIN - code to replenish your account<span id="error" style="color: red;"></span></p>
			<div class="input__group">
				<input type="text" id="inputPin">
			</div>
			<button type="submit" class="btn" id="send">OK</button>
		</div>
			<span class="close-btn">
				<img src="/frontend/Default/img/_src/close.svg" alt="">
			</span>
	</div>
	<!-- /.MAIN -->

	<script type="text/javascript">


		$('body').on('click', '#send', function(event){
			var pincode = $('#inputPin').val();
			$.ajax({
				url: "<?php echo e(route('frontend.profile.pincode')); ?>",
				type: "GET",
				data: {pincode : pincode},
				dataType: "json",
				success: function(data){
					if( data.fail ){
						$('#error').html('<br>' + data.error);
					}
					if( data.success ){
						window.location.reload();
					}
				}
			});
		});


		$(document).on('click', '#returns', function(e) {
			e.preventDefault();
			$.get('<?php echo e(route('frontend.profile.returns')); ?>', function(data) {
				if (data.success) {
					$('.cashBankText').html('<?php echo app('translator')->get('app.your_cash_back_bonus'); ?> <b>' + data.value + ' '+ data.currency +'</b> <?php echo app('translator')->get('app.has_been_added_to_the_balance'); ?>. <br /><?php echo app('translator')->get('app.have_a_good_game_in'); ?> <b><?php echo e(config('app.name')); ?></b>.');
					$("div.modal-bonus").addClass("active");
					$(".overlay").fadeIn();
					$('.balanceValue').text(data.balance + ' ' + data.currency);
					$('.count_return').text(data.count_return + ' ' + data.currency);
					$('#balanceValue').html(data.balance + '&ensp;<em>'+ data.currency +'</em>');

					$('#returns').remove();
				}
				if (data.fail) {
					$.modal(data.text);
				}
			}, 'json');
		});

		setInterval(function(){
			$.get('<?php echo e(route('frontend.profile.jackpots')); ?>', function(data) {
				if( data.length >= 7 ){
					for(var i=0; i<7; i++){
						$('.jackpot' + i).text((data[i]['balance']));
					}
				}
			});
		}, 5000);

		$(document).on('keyup', '#search', function() {
			var query = $(this).val().toLowerCase();
			doSearch(query);
		});

		function OnSearch(input) {
			var query = input.value.toLowerCase();
			doSearch(query);
		}

		function doSearch(query){
			$(".games__item").each(function(event) {
				var name = $(this).data('name').toLowerCase();
				var title = $(this).data('title').toLowerCase();
				var item = $( this ).parents('.grid-item');
				if(query){
					if (name.search(query) != -1 || title.search(query) != -1){
						item.css('display', 'inherit')
					} else{
						item.css('display', 'none')
					}
				} else{
					item.css('display', 'inherit')
				}
			});
		}


	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.Default.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\win-365.org\resources\views/frontend/Default/games/list.blade.php ENDPATH**/ ?>