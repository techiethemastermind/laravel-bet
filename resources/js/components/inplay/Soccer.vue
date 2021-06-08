<template>
<div class="Inplay-Section">
    <div class="inply-header">
        <div class="inply-header_Text">Soccer</div>
        <div class="dropdown inplydropdown display-responsive">
            <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Fulltime result
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li class="DropdownPopup_Item"><a>Fulltime result</a></li>
                <li class="DropdownPopup_Item"><a>Match Goals</a></li>
                <li class="DropdownPopup_Item"><a>Asian Handicap In-Play</a></li>
                <li class="DropdownPopup_Item"><a>Goal Line In-Play</a></li>
            </ul>
        </div>
        <div class="hide-responsive tabclassification">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" :class="{'active': oddType=='soccerFulltimeResult'}" @click="changeOddType('soccerFulltimeResult')">Fulltime result</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" :class="{'active': oddType=='soccerMatchGoals'}" @click="changeOddType('soccerMatchGoals')">Match Goals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" :class="{'active': oddType=='soccerAsianHandicap'}" @click="changeOddType('soccerAsianHandicap')">Asian Handicap In-Play</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" :class="{'active': oddType=='soccerGoalLine'}" @click="changeOddType('soccerGoalLine')">Goal Line In-Play</a>
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
                        <div class="CompetitionHeading_Markets" v-if="oddType=='soccerFulltimeResult'">
                            <div class="CompetitionHeading_numb ">1</div>
                            <div class="CompetitionHeading_numb ">X</div>
                            <div class="CompetitionHeading_numb ">2</div>
                        </div>
                        <div class="CompetitionHeading_Markets" v-if="oddType=='soccerMatchGoals' || oddType=='soccerGoalLine'">
                            <div class="CompetitionHeading_numb ">Over</div>
                            <div class="CompetitionHeading_numb ">Under</div>
                        </div>
                        <div class="CompetitionHeading_Markets" v-if="oddType=='soccerAsianHandicap'">
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
                                                    <div class="contestDetailsTwoWay_TeamName ">{{ JSON.parse(match.home).name }}</div>
                                                </div>
                                                <div class="contestDetailsTwoWay_Team">
                                                    <div class="contestDetailsTwoWay_TeamName ">{{ JSON.parse(match.away).name }}</div>
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
                                    <div class="HorizontalMarket_contestant" v-if="oddType=='soccerFulltimeResult' && typeof match.fulltime_result != 'undefined'">
                                        <div class="HorizontalMarket_player playerOddsOnly gl-player_General"
                                            :class="{'active': betKeys.includes(match.id+'_home')}" 
                                            @click="addToBet(match, 0, 'home', 'Fulltime Result')"
                                            >
                                            <span class="playerOddsOnly_Odds">{{ fulltimeResult(match.fulltime_result, 0) }}</span>
                                        </div>
                                        <div class="HorizontalMarket_player playerOddsOnly gl-player_General"
                                            :class="{'active': betKeys.includes(match.id+'_draw')}" 
                                            @click="addToBet(match, 1, 'draw', 'Fulltime Result')"
                                            >
                                            <span class="playerOddsOnly_Odds">{{ fulltimeResult(match.fulltime_result, 1) }}</span>
                                        </div>
                                        <div class="HorizontalMarket_player playerOddsOnly gl-player_General"
                                            :class="{'active': betKeys.includes(match.id+'_away')}" 
                                            @click="addToBet(match, 2, 'away', 'Fulltime Result')"
                                            >
                                            <span class="playerOddsOnly_Odds">{{ fulltimeResult(match.fulltime_result, 2) }}</span>
                                        </div>
                                    </div>
                                    <!-- <div class="HorizontalMarket_contestant" v-if="oddType=='soccerMatchGoals' && typeof match.odds.match_goals != 'undefined'">
                                        <div class="HorizontalMarket_player contestanttackedCentered gl-player_General">
                                            <span class="contestanttackedCentered_Handicap">{{ match.odds.match_goals[0].handicap }}</span>
                                            <span class="contestanttackedCentered_Odds">{{ parseFloat(match.odds.match_goals[0].odds).toFixed(2) }}</span>
                                        </div>
                                        <div class="HorizontalMarket_player contestanttackedCentered gl-player_General">
                                            <span class="contestanttackedCentered_Handicap">{{ match.odds.match_goals[1].handicap }}</span>
                                            <span class="contestanttackedCentered_Odds">{{ parseFloat(match.odds.match_goals[1].odds).toFixed(2) }}</span>
                                        </div>
                                    </div>
                                    <div class="HorizontalMarket_contestant" v-if="oddType=='soccerAsianHandicap' && typeof match.odds.asian_lines != 'undefined' && typeof match.odds.asian_lines.sp != 'undefined' && typeof match.odds.asian_lines.sp.asian_handicap != 'undefined'">
                                        <div class="HorizontalMarket_player contestanttackedCentered gl-player_General">
                                            <span class="contestanttackedCentered_Handicap">{{ match.odds.asian_lines.sp.asian_handicap.odds[0].name }}</span>
                                            <span class="contestanttackedCentered_Odds">{{ match.odds.asian_lines.sp.asian_handicap.odds[0].odds }}</span>
                                        </div>
                                        <div class="HorizontalMarket_player contestanttackedCentered gl-player_General">
                                            <span class="contestanttackedCentered_Handicap">{{ match.odds.asian_lines.sp.asian_handicap.odds[1].name }}</span>
                                            <span class="contestanttackedCentered_Odds">{{ match.odds.asian_lines.sp.asian_handicap.odds[1].odds }}</span>
                                        </div>
                                    </div>
                                    <div class="HorizontalMarket_contestant" v-if="oddType=='soccerGoalLine' && typeof match.odds.main != 'undefined' && typeof match.odds.main.sp != 'undefined' && typeof match.odds.main.sp.goal_line != 'undefined'">
                                        <div class="HorizontalMarket_player contestanttackedCentered gl-player_General">
                                            <span class="contestanttackedCentered_Handicap">{{ match.odds.main.sp.goal_line.odds[0].name }}</span>
                                            <span class="contestanttackedCentered_Odds">{{ match.odds.main.sp.goal_line.odds[0].odds }}</span>
                                        </div>
                                        <div class="HorizontalMarket_player contestanttackedCentered gl-player_General">
                                            <span class="contestanttackedCentered_Handicap">{{ match.odds.main.sp.goal_line.odds[1].name }}</span>
                                            <span class="contestanttackedCentered_Odds">{{ match.odds.main.sp.goal_line.odds[1].odds }}</span>
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
    name: "SoccerInplay",
    data() {
        return {
            events: [],
            oddType: 'soccerFulltimeResult',
            loader: true,
        };
    },
    computed: {
        sportID() {
            return this.$route.params.sportID;
        },
        betKeys() {
            return this.$store.state.betKeys;
        }
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
                self.loader = false
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
                params: { sportID: event.sport_id, eventID: event.event_id },
            });
        },
        addToBet(event, index, type, oddType) {
            var odd = this.fulltimeResult(event.fulltime_result, index)
            this.$root.$emit('addToBet', {
                event,
                odd,
                type,
                oddType
            })
        },
        changeOddType(type) {
            this.oddType = type
        },
        fulltimeResult(result, index) {
            var parseResult = JSON.parse(result)
            if(typeof parseResult[index] != 'undefined') {
                return parseFloat(parseResult[index].odds).toFixed(2)
            }else{
                return ''
            }
        },
        log(data){
            console.log(data)
        }
    },
});
</script>
