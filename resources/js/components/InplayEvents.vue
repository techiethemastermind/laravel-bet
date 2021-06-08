<template>
	<div class="middlecol">
		<div class="inplay-container">
			<div class="inplayscroll">
				<div @mouseover="isHover = true" @mouseleave="isHover = false" class="sport-list-block">
					<div class="ClassificationBet_LeftButton" @click="scroll_left" v-show="isHover && leftScroll != 0"></div>
					<SportsList/>
					<div class="ClassificationBet_rightButton" @click="scroll_right" v-show="isHover && rightScroll !=0"></div>
				</div>
				<SoccerInplay v-if="sportID==1"/>
				<TennisInplay v-else-if="sportID==13"/>
				<BadmintonInplay v-else-if="sportID==94"/>
				<FutsalInplay v-else-if="sportID==83"/>
				<BeachVolleyballInplay v-else-if="sportID==95"/>
				<AustralianRulesInplay v-else-if="sportID==36"/>
				<TableTennisInplay v-else-if="sportID==92"/>
				<VollyballInplay v-else-if="sportID==91"/>
				<IceHockeyInplay v-else-if="sportID==17"/>
				<RugbyLeagueInplay v-else-if="sportID==19"/>
				<RugbyUnionInplay v-else-if="sportID==8"/>
				<SnookerInplay v-else-if="sportID==14"/>
				<BaseballInplay v-else-if="sportID==16"/>
				<BasketballInplay v-else-if="sportID==18"/>
				<CricketInplay v-else-if="sportID==3"/>
				<HandballInplay v-else-if="sportID==78"/>
				<DartsInplay v-else-if="sportID==15"/>
				<EsportsInplay v-else-if="sportID==151"/>
				<SquashInplay v-else-if="sportID==107"/>
				<WaterPoloInplay v-else-if="sportID==110"/>
				

			</div>
		</div>
	</div>
</template>

<script>
import Vue from "vue";
const axios = require("axios");
import SportsList from "./SportsList.vue";
import SoccerInplay from "./inplay/Soccer.vue";
import TennisInplay from "./inplay/Tennis.vue";
import FutsalInplay from "./inplay/Futsal.vue";
import BadmintonInplay from "./inplay/Badminton.vue";
import BeachVolleyballInplay from "./inplay/BeachVolleyball.vue";
import AustralianRulesInplay from "./inplay/AustralianRules.vue";
import TableTennisInplay from "./inplay/TableTennis.vue";
import VollyballInplay from "./inplay/Vollyball.vue";
import IceHockeyInplay from "./inplay/IceHockey.vue";
import RugbyLeagueInplay from "./inplay/RugbyLeague.vue";
import RugbyUnionInplay from "./inplay/RugbyUnion.vue";
import SnookerInplay from "./inplay/Snooker.vue";
import BaseballInplay from "./inplay/Baseball.vue";
import BasketballInplay from "./inplay/Basketball.vue";
import CricketInplay from "./inplay/Cricket.vue";
import HandballInplay from "./inplay/Handball.vue";
import DartsInplay from "./inplay/Darts.vue";
import EsportsInplay from "./inplay/Esports.vue";
import SquashInplay from "./inplay/Squash.vue";
import WaterPoloInplay from "./inplay/WaterPolo.vue";

export default Vue.extend({
  name: "InplayEvents",
  components: {
	SportsList,
	SoccerInplay,
	TennisInplay,
	FutsalInplay,
	BadmintonInplay,
	BeachVolleyballInplay,
	AustralianRulesInplay,
	TableTennisInplay,
	VollyballInplay,
	IceHockeyInplay,
	RugbyLeagueInplay,
	RugbyUnionInplay,
	SnookerInplay,
	BaseballInplay,
	BasketballInplay,
	CricketInplay,
	HandballInplay,
	DartsInplay,
	EsportsInplay,
	SquashInplay,
	WaterPoloInplay,
  },
  data() {
    return {
      events: [],
	  oddType: 'soccerFulltimeResult',
	  isHover : false,
	  leftScroll: 0,
	  rightScroll: 2058
    };
  },
  computed: {
    sportID() {
      return this.$route.params.sportID;
    },
  },
  mounted() {
    this.loadInplayGames();
    // this.$nextTick(function () {
    //     window.setInterval(() => {
    //     }, 120000);
    // })
  },
  methods: {
    loadInplayGames() {
      let self = this;
      axios
        .get("/games/inplay/" + this.sportID + "?limit=all&league=1")
        .then(function (response) {
          self.events = response.data;
        });
    },
    score(ss, team) {
      if (ss) {
        let score = ss.split("-");
        if (team == "home") {
          return score[0];
        } else {
          return score[1];
        }
      } else {
        return "";
      }
    },
    openEvent(event) {
      this.$store.dispatch("setActiveEvent", event);
      this.$router.push({
        name: "event_detail",
        params: { sportID: event.sport_id, eventID: event.id },
      });
    },
	changeOddType(type) {
		this.oddType = type
	},
	log(data){
		console.log(data)
	},
	scroll_left() {
		let content = document.querySelector(".crm-ClassificationRibbonScroller_HScroll");
		content.scrollLeft -= 150;
		this.leftScroll = content.scrollLeft
		this.rightScroll += 150
	},
	scroll_right() {
		let content = document.querySelector(".crm-ClassificationRibbonScroller_HScroll");
		content.scrollLeft += 150;
		this.leftScroll = content.scrollLeft
		this.rightScroll = content.scrollWidth - content.clientWidth - content.scrollLeft
	}
  },
});
</script>
