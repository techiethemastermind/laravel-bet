<template>
<div class="Inplay-Section">
    <div class="inply-header">
        <div class="inply-header_Text">Badminton</div>
        <div class="dropdown inplydropdown display-responsive">
            <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Game Lines
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li class="DropdownPopup_Item" href="#winner" role="tab" data-toggle="tab"><a>Game Lines</a></li>
                <li class="DropdownPopup_Item" href="#nextgame" role="tab" data-toggle="tab"><a>Tied At End Of Regulation</a></li>
            </ul>
        </div>
        <div class="hide-responsive tabclassification">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#winner" role="tab">Game Lines</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#nextgame" role="tab">Tied At End Of Regulation</a>
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

                            <div class="contestDetailsWithIndicators">
                                <div class="contestDetailsWithIndicators_TeamsAndScores">

                                    <div class="contestDetailsWithIndicators_TeamsWrapper" @click="openEvent(match)">
                                        <div class="contestDetailsWithIndicators_Team ">
                                            <div class="contestDetailsWithIndicators_PlayingIndicator "></div>
                                            {{ match.home.name }}
                                        </div>
                                        <div class="contestDetailsWithIndicators_Team ">
                                            <div class="contestDetailsWithIndicators_PlayingIndicator "></div>
                                            {{ match.away.name }}
                                        </div>
                                    </div>
                                    
                                    <div class="contestDetailsWithIndicators_ScoresWrapper SetsBasedScoresTennis ">
                                        <div class="SetsBasedScoresTennis_SetsWrapper">
                                            <div class="SetsBasedScoresTennis_SetsInner" v-for="ss in match.ss.split(',')">
                                                <div class="SetsBasedScoresTennis_TeamOne">{{ score(ss, 'home') }}</div>
                                                <div class="SetsBasedScoresTennis_TeamTwo">{{ score(ss, 'away') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="contestDetailsWithIndicators_AdditionalInfoWrapper">
                                    <div class="contestDetailsWithIndicators_SetGameLabel ">Set 1 Game 1</div>
                                    <div class="contestDetailsWithIndicators_MarketCount contestEventCount ">39</div>
                                </div>
                            </div>

                            <div class="MarketGroup ">
                                <div class="HorizontalMarket ">
                                    <!-- <div class="HorizontalMarket_contestant" v-if="oddType=='winner' && typeof match.odds.main != 'undefined' && typeof match.odds.main.sp.to_win_match != 'undefined'">
                                        <div class="HorizontalMarket_player playerOddsOnly gl-player_General">
                                            <span class="playerOddsOnly_Odds">{{ match.odds.main.sp.to_win_match.odds[0].odds }}</span>
                                        </div>
                                        <div class="HorizontalMarket_player playerOddsOnly gl-player_General">
                                            <span class="playerOddsOnly_Odds">{{ match.odds.main.sp.to_win_match.odds[1].odds }}</span>
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
  name: "BadmintonInplay",
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
