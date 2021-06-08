<template>
    <div class="main-content">
        <keep-alive>
            <router-view></router-view>
        </keep-alive>

        <div class="betslip-wrapper" v-if="betSlip.length > 0">
			<div class="betslip">
				<div class="betslip-header" @click.self="openBetSlip">
					<span class="slip-count" @click.self="openBetSlip">{{ betSlip.length }}</span>
					<span class="bet-title" @click.self="openBetSlip">Bet Slip</span>
					<span class="log-in-txt" @click="openLogin" v-if="showBetListing">Log In</span>
					<span class="hide-slip" @click="closeBetSlip" v-if="showBetListing">X</span>
				</div>
				
				<div v-if="showBetListing" class="bet-row-wrapper">
					<div class="bet-inner-wrapper">
						<div class="bet-sub-header">
							<div class="bet-remove-all">
								<div @click="removeAll">Remove All</div>
							</div>
							<div class="bet-standard">
								<div>Standard</div>
							</div>
						</div>
						<div v-for="(bet, index) in betSlip" class="bet-row">
							<div class="remove-bet" @click="removeBet(bet.id)">
								X
							</div>
							<div class="bet-row-content">
								<div class="bet-row-detail">
									<div class="bet-inner-detail">
										<div class="bet-row-title">{{ bet.betOn }}</div>
										<div class="bet-small-txt">{{ bet.oddType }}</div>
										<div class="bet-small-txt">{{ bet.matchTitle }}</div>
									</div>
									<div class="bet-row-odd">
										<span>{{ bet.odd }}</span>
									</div>
								</div>
								<div class="bet-row-stake">
									<input type="text" maxlength="8" placeholder="stake" v-model="bet.stake" @input="stakeChange(bet.stake, index)"/>
									<div class="bet-return-txt" v-if="bet.stake != '' && bet.stake > 0">To Return RS. {{ bet.stake * bet.odd }}</div>
								</div>
							</div>
						</div>
					</div>
					<div class="bet-slip-note" v-if="!acceptChanges"><div>The line, odds or availability of your selections has changed.</div></div>
					<div class="bet-slip-accept" v-if="!acceptChanges" @click="clickAcceptChanges"><div >Accept Changes</div></div>
					<div class="bet-place-button" v-if="acceptChanges">
						<div class="bet-place-wrapper" @click="openLogin">
							<div class="bet-place-top-row">
								<div class="plce-txt">Place Bet</div>
								<div class="plce-txt-amount">RS. {{ parseFloat(totalStake) }}</div>
							</div>
							<div class="bet-place-bottom-row" v-if="totalReward > 0">
								Total To Return RS. {{ parseFloat(totalReward) }}
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>


		<div class="login-mask-wrapper" v-if="showLoginPopup">
			<div class="login-mask-overlay"></div>
			<div class="login-mask" @click.self="closeLogin"></div>
			<div class="login-container">
				<div class="login-pop-content">
					<div class="login-username-container">
						<input type="text" placeholder="Username" autocapitalize="off" autocomplete="off" autocorrect="off">
					</div>
					<div class="login-password-container">
						<input type="password" placeholder="Password" autocapitalize="off" autocomplete="off" autocorrect="off">
					</div>
					<div class="login-pop-button">
						<div class="login-button-txt">Log In</div>
					</div>
					<div class="login-additional-txt">
						<div class="login-lost-txt">Lost Login?</div>
					</div>
				</div>
			</div>
		</div>

    </div>
</template>

<script>
export default {
	name: 'App',
	props: {
		msg: String
	},
	data() {
		return {
			showLoginPopup: false,
			showBetListing: false,
			acceptChanges: false,
			get betSlip() {
				return (localStorage.getItem('betSlip'))? JSON.parse(localStorage.getItem('betSlip')) : [];
			},
			set betSlip(value) {
				localStorage.setItem('betSlip', JSON.stringify(value));
			}
		}
	},
	mounted() {
		this.$root.$on('addToBet', (params) => {
			this.addToBet(params.event, params.odd, params.type, params.oddType)
		})

		var betKeys = localStorage.getItem('betKeys')? JSON.parse(localStorage.getItem('betKeys')) : []
		this.$store.dispatch('setBetKeys', betKeys);
	},
	computed: {
		totalStake() {
			var totalStake = 0.00;
			this.betSlip.forEach(function(bet){
				if(bet.stake != '' && bet.stake > 0) {
					totalStake += parseFloat(bet.stake);
				}
			})
			return parseFloat(totalStake).toFixed(2);
		},
		totalReward() {
			var totalReward = 0;
			this.betSlip.forEach(function(bet){
				if(bet.stake != '' && bet.stake > 0) {
					totalReward += bet.stake * bet.odd;
				}
			})
			return totalReward;
		}
	},
	methods: {
		openBetSlip() {
			this.showBetListing = true;
		},
		closeBetSlip() {
			this.showBetListing = false;
		},
		openLogin(){
			this.showLoginPopup = true;
		},
		closeLogin(){
			this.showLoginPopup = false;
		},
		clickAcceptChanges() {
			this.acceptChanges = true;
		},
		stakeChange(stake, index) {
			var betSlip = this.betSlip
			betSlip[index].stake = stake

			// update betslip in localstorage
			this.betSlip = betSlip;
			localStorage.setItem('betSlip', JSON.stringify(betSlip))
		},
		addToBet(event, odd, type, oddType) {
			let self = this;
			var betApplied = false
			var betOn = 'Draw'
			var betKey = event.id+'_'+type

			//get betslip from localstorage
			var betSlip = this.betSlip

			//update betslip
			betSlip.forEach(function(bet, index){
				if(bet.id == betKey) {
					betSlip.splice(index, 1);
					betApplied = true;
					self.$store.dispatch('removeBetKeys', betKey)
				}
			})
			if(!betApplied) {
				if(type == 'home') {
					betOn = event.home.name
				}else if(type == 'away') {
					betOn = event.away.name
				}
				betSlip.push({
					id: betKey,
					odd: odd,
					matchTitle: event.home.name+' v '+event.away.name,
					betOn: betOn,
					oddType: oddType,
					stake: ''
				})
				betApplied = true;
				this.$store.dispatch('addBetKeys', betKey)
			}

			// update betslip in localstorage
			this.betSlip = betSlip;
			localStorage.setItem('betSlip', JSON.stringify(betSlip))
		},
		removeBet(betKey) {
			//get betslip from localstorage
			let self = this;
			var betSlip = this.betSlip
			
			//update betslip
			betSlip.forEach(function(bet, index){
				if(bet.id == betKey) {
					betSlip.splice(index, 1);
					self.$store.dispatch('removeBetKeys', betKey)
				}
			})

			// update betslip in localstorage
			this.betSlip = betSlip;
			localStorage.setItem('betSlip', JSON.stringify(betSlip))
		},
		removeAll() {
			// update betslip in localstorage
			this.betSlip = [];
			localStorage.setItem('betSlip', JSON.stringify([]))

			this.$store.dispatch('setBetKeys', []);
		}
	},
}
</script>

<style scoped>
.betslip-wrapper{
	position: fixed;
	bottom: 0;
    left: 0;
    height: 100%;
    width: 100%;
	display: flex;
	align-items: flex-end;
	justify-content: center;
	pointer-events: none;
}
.betslip {
    position: absolute;
    bottom: 40px;
    background: #f0f0f0;
    border-radius: 5px;
    width: 100%;
	margin: 0 auto;
	max-width: 450px;
	overflow: hidden;
	touch-action: none;
    pointer-events: auto;
}
.betslip-header{
  cursor: pointer;
  padding: 10px;
}
.bet-sub-header{
	display: flex;
	height: 44px;
	border-top: 1px solid #cecece;
}
.bet-sub-header .bet-remove-all, .bet-sub-header .bet-standard{
	height: 44px;
    display: inline-flex;
    align-items: center;
    cursor: pointer;
}
.bet-sub-header .bet-standard{
	position: absolute;
	right: 0px;
}
.bet-sub-header .bet-remove-all div, .bet-sub-header .bet-standard div{
	font-size: 13px;
	display: inline-block;
    line-height: 16px;
    color: #126e51;
    padding: 0 11px;
    -webkit-transition: opacity .2s;
    transition: opacity .2s;
    cursor: pointer;
}
.betslip-header .bet-title{
  margin-left: 10px;
}
.betslip-header .slip-count{
    border-radius: 999px;
    width: 26px;
    height: 26px;
    background-color: #126e51;
    font-size: 14px;
    color: #fff;
    margin-left: 9px;
    top: 15px;
    text-align: center;
    line-height: 26px;
    pointer-events: none;
    display: inline-block;
}
.betslip-header .hide-slip{
  float: right;
  padding: 0 15px;
}
.betslip-header .log-in-txt{
	text-align: right;
    font-size: 14px;
    color: #126e51;
	position: absolute;
    right: 60px;
}
.remove-bet{
	position: absolute;
    width: 40px;
    padding: 10px;
    text-align: center;
	vertical-align: top;
	cursor: pointer;
	top: 0;
}
.bet-row-content{
	margin-left: 40px;
	display: flex;
}
.bet-row-wrapper{
	
}
.bet-row{
	background: #e4e4e4;
	border-top: 1px solid #c3c3c3;
	position: relative;
	padding: 7px 0;
}
.bet-row:first-child {
    border-top: none;
}
.bet-small-txt{
	font-size: 11px;
    color: #666;
    line-height: 16px;
}
.bet-row-title{
	font-size: 15px;
    color: #404040;
    line-height: 18px;
}
.bet-row-detail{
	display: flex;
	width: 75%;
	position: relative;
}
.bet-row-odd{
	right: 10px;
    position: absolute;
}
.bet-row-odd span{
	font-size: 15px;
	background-color: #58d7af;
    color: #333;
    padding: 1px 5px;
}
.bet-row-stake{
	width: 25%;
	padding-right: 10px;
}
.bet-row-stake input {
	width: 100%;
    border: none;
	line-height: 18px;
    font-size: 15px;
    height: 18px;
	color: #126e51;
	text-align: right;
	background: #f8f8f8;
    height: 35px;
    font-size: 15px;
    padding: 8px 10px 0;
}
.bet-row-stake input:focus {
    border: none;
	box-shadow: inset 0 -2px 0 0 #888;
	outline: none;
}
.bet-slip-note{
    display: flex;
    flex-wrap: wrap;
    position: relative;
    background-color: #fff;
    align-items: center;
    justify-content: center;
    width: 100%;
    max-height: 100px;
}
.bet-slip-note div{
	padding: 8px 20px 9px;
    text-align: center;
    user-select: none;
    font-size: 12px;
    color: #333;
    line-height: 14px;
}
.bet-slip-accept{
	padding: 11px;
    position: relative;
    white-space: nowrap;
    min-height: 48px;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    background-color: #58d7af;
    width: 100%;
    -webkit-transition: background-color .2s;
    transition: background-color .2s;
    cursor: pointer;
}
.bet-slip-accept div{
	font-size: 17px;
    color: #333;
    line-height: 20px;
    position: relative;
}
.bet-return-txt{
    justify-content: flex-end;
    font-size: 10px;
    color: #666;
    line-height: 12px;
    padding: 8px 11px 0 0;
    transition: opacity .35s;
    text-align: right;
    white-space: nowrap;
    flex-wrap: wrap;
    margin-left: auto;
}
.bet-place-button{
	background: #f0f0f0;
}
.bet-place-wrapper{
	padding: 6px 10px 7px;
    position: relative;
    white-space: nowrap;
    cursor: pointer;
    min-height: 48px;
    height: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    background-color: #126e51;
    width: 100%;
}
.bet-place-bottom-row{
	text-align: center;
    margin-top: 3px;
    line-height: 12px;
	color: #26ffbe;
	font-size: 11px;
}
.bet-place-top-row{
	text-align: center;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    width: 100%;
    line-height: 20px;
}
.bet-place-top-row .plce-txt{
	font-size: 17px;
    color: #fff;
    line-height: 20px;
    position: relative;
    white-space: normal;
}
.bet-place-top-row .plce-txt-amount{
	margin-left: 10px;
    font-size: 17px;
    color: #26ffbe;
    line-height: 20px;
}
.bet-inner-wrapper{
	max-height: 280px;
	overflow: hidden;
    overflow-y: auto;
    overscroll-behavior: contain;
}
@media (max-width:768px) {
  .betslip{
	  border-radius: 0;
	  bottom: 0;
  }  
	 
}








.login-mask-wrapper{
	background-color: transparent;
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 99999;
    display: block;
    width: 100%;
    overflow-y: scroll;
}
.login-mask-overlay{
	top: 105px;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 40;
    display: block;
    width: 100%;
	background-color: rgba(0,0,0,.4);
    position: fixed;
}
.login-mask{
	top: 105px;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 40;
    display: block;
    width: 100%;
	position: absolute;
    overflow: hidden;
    cursor: pointer;
}
.login-container{
	top: 105px;
	width: 435px;
    padding: 20px 20px 10px;
	position: absolute;
    z-index: 50;
    border-radius: 0 0 2px 2px;
    left: 0;
    right: 0;
    margin: auto;
    background-color: #e4e4e4;
	display: flex;
    flex-direction: column;
}
.login-pop-content{
	display: flex;
    flex-direction: column;
	justify-content: center;
    text-align: center;
}
.login-username-container, .login-password-container{
	width: 100%;
	position: relative;
	display: flex;
	align-self: center;
    background-color: #f0f0f0;
}
.login-username-container input, .login-password-container input{
	display: flex;
    flex: 1 1 90%;
    font-size: 16px;
    padding: 0 10px;
    margin: 0;
    border: 0;
    background-color: #f0f0f0;
    color: #333;
    border-radius: 2px;
    height: 45px;
}
.login-password-container{
	margin-top: 10px;
    margin-bottom: 10px;
}
.login-pop-button{
	width: 100%;
    line-height: 20px;
    border-radius: 2px;
    height: 45px;
    background-color: #126e51;
    cursor: pointer;
    padding: 0 10px;
    margin-top: 10px;
    margin-bottom: 5px;
}
.login-button-txt{
	font-size: 15px;
    text-align: center;
    color: #f0f0f0;
    font-weight: 700;
    cursor: pointer;
    position: relative;
    top: 12px;
}
.login-additional-txt{
	display: flex;
    justify-content: space-between;
}
.login-lost-txt{
	align-items: center;
    font-size: 13px;
    line-height: 20px;
    color: #126e51;
    cursor: pointer;
    padding: 5px 0;
}
</style>