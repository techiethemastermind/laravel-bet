<template>
<div class="Inplay-Section">
    <div class="inply-header">
        <div class="inply-header_Text">Rugby Union</div>
        <div class="dropdown inplydropdown display-responsive">
            <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Handicap 
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li class="DropdownPopup_Item" href="#fulltime" role="tab" data-toggle="tab"><a>Handicap</a></li>
                <li class="DropdownPopup_Item" href="#matchgoal" role="tab" data-toggle="tab"><a>Total</a></li>
                <li class="DropdownPopup_Item" href="#matchgoal" role="tab" data-toggle="tab"><a>Result</a></li>
            </ul>
        </div>
        <div class="hide-responsive tabclassification">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#fulltime" role="tab">Handicap</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#matchgoal" role="tab">Total</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#asianhandicap" role="tab">Result</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="tab-content">
        <div class="competition-list tab-pane active" id="fulltime" role="tabpanel" aria-labelledby="fulltime-tab">
            <div class="loader" v-if="loader"></div>
            <div v-else class="Competition-bet-start" v-for="event in events">
                <div class="CompetitionHeading CompetitionHeading-media">
                    <div class="CompetitionHeading_Header">
                        <div class="CompetitionHeading_Name">{{ event.name }}</div>
                        <div class="CompetitionHeading_Markets">
                            <div class="CompetitionHeading_numb ">1</div>
                            <div class="CompetitionHeading_numb ">2</div>
                        </div>
                    </div>
                </div>

                <div class="Countryname-list Competition_contests">
                    <div class="contest contest-horizontal contest-media" v-for="match in event.matches">
                        <div class="contest_Container">

                            <div class="contestDetailsTwoWay">
                                <div class="contestDetailsTwoWay_Wrapper">
                                    <div class="contestDetailsTwoWay_TeamsAndScoresWrapper">
                                        <div class="contestDetailsTwoWay_TeamsAndScoresInner">
                                            <div class="contestDetailsTwoWay_TeamsWrapper" @click="openEvent(match)">
                                                <div class="contestDetailsTwoWay_Team">
                                                    <div class="contestDetailsTwoWay_TeamName ">{{ match.home.name }}</div>
                                                </div>
                                                <div class="contestDetailsTwoWay_Team">
                                                    <div class="contestDetailsTwoWay_TeamName ">{{ match.away.name }}</div>
                                                </div>
                                            </div>
                                            <div class="contestDetailsTwoWay_ScoresWrapper StandardScores" >
                                                <div class="StandardScores_ScoresWrapper">
                                                    <div class="StandardScores_TeamOne">{{ score(match.ss, 'home') }}</div>
                                                    <div class="StandardScores_TeamTwo">{{ score(match.ss, 'away') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="contestDetailsTwoWay_AdditionalInfoWrapper">
                                        <div class="contestDetailsTwoWay_AdditionalInfoInner">
                                            <div class="contestDetailsTwoWay_PeriodWrapper">
                                                <div class="contestDetailsTwoWay_Timer InPlayTimer ">07:33</div>
                                            </div>
                                            <div class="contestDetailsTwoWay_IconWrapper">
                                                <div class="contestDetailsTwoWay_MarketCount contestEventCount ">125</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="MarketGroup ">
                                <div class="HorizontalMarket ">
                                    <!-- <div class="HorizontalMarket_contestant" v-if="typeof match.odds.main != 'undefined' && typeof match.odds.main.sp['3_way'] != 'undefined'">
                                        <div class="HorizontalMarket_player playerOddsOnly gl-player_General">
                                            <span class="playerOddsOnly_Odds">{{ match.odds.main.sp['3_way'].odds[0].odds }}</span>
                                        </div>
                                        <div class="HorizontalMarket_player playerOddsOnly gl-player_General">
                                            <span class="playerOddsOnly_Odds">{{ match.odds.main.sp['3_way'].odds[1].odds }}</span>
                                        </div>
                                        <div class="HorizontalMarket_player playerOddsOnly gl-player_General">
                                            <span class="playerOddsOnly_Odds">{{ match.odds.main.sp['3_way'].odds[2].odds }}</span>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="MediaIconContainer ">
                            <div class="MediaIconContainer_Buttons ">
                                <div class="me-MediaButtonLoader me-MediaButtonLoader_ML1 me-MediaButtonLoader_ML1-selected "></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</template>

<script>
import Vue from "vue";
const axios = require("axios");

export default Vue.extend({
  name: "RugbyUnionInplay",
  data() {
    return {
      events: [],
	  oddType: 'winner',
      loader: true,
    };
  },
  computed: {
    sportID() {
      return this.$route.params.sportID;
    },
  },
  mounted() {
    this.loadInplayGames();
    this.$nextTick(function () {
        window.setInterval(() => {
            this.loadInplayGames();
        }, 60000);
    })
  },
  methods: {
    loadInplayGames() {
      let self = this;
      axios
        .get("/games/inplay/" + this.sportID + "?limit=all&league=1")
        .then(function (response) {
          self.events = response.data;
          self.loader = false;
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
	}
  },
});
</script>
