<template>
    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
            <div class="result-table-sec" v-if="typeof odds.main != 'undefined'">
                <h4>To Win</h4>
                <div class="col-6 col-md-6 participant-border">{{ event.home.name }}</div>
                <div class="col-6 col-md-6 participant-border">{{ event.away.name }}</div>
                <div class="col-6 col-md-6 player-cat parti-goal bord-bottm" v-for="row in odds.main.sp.to_win_match">
                    <span class="partnumb"> {{ row.odds }} </span>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="result-table-sec" v-if="typeof odds.games != 'undefined'">
                <h4>Player Games Won</h4>
                <div class="col-6 col-md-6 participant-border">{{ event.home.name }}</div>
                <div class="col-6 col-md-6 participant-border">{{ event.away.name }}</div>
                <div class="col-6 col-md-3 player-cat parti-goal bord-bottm" v-for="row in odds.games.sp.player_games_won">
                    <span class="part-nme">{{ row.handicap }}</span>
                    <span class="partnumb">{{ row.odds }} </span>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="result-table-sec" v-if="typeof odds.games != 'undefined'">
                <h4>Match Result and Total Games</h4>
                <div class="col-6 col-md-6 participant-border">{{ event.home.name }}</div>
                <div class="col-6 col-md-6 participant-border">{{ event.away.name }}</div>
                <div class="col-6 col-md-3 player-cat parti-goal bord-bottm" v-for="row in odds.games.sp.match_result_and_total_games">
                    <span class="part-nme">{{ row.handicap }}</span>
                    <span class="partnumb">{{ row.odds }} </span>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="result-table-sec borde-non" v-if="first_set_score.label.length > 0">
                <h4>Set 1 Score</h4>

                <div class="col-6 col-md-4 participant-border">&nbsp</div>
                <div class="col-6 col-md-4 participant-border">Over</div>
                <div class="col-6 col-md-4 participant-border">Under</div>
                <div v-for="(label, index) in first_set_score.label">
                    <div class="col-6 col-md-4 player-cat parti-goal bord-rght bord-bottm"><span class="part-nme">{{ label }}</span></div>
                    <div class="col-6 col-md-4 player-cat parti-goal bord-bottm"><span class="partnumb">{{ first_set_score.over[index] }}</span></div>
                    <div class="col-6 col-md-4 player-cat parti-goal bord-bottm"><span class="partnumb">{{ first_set_score.under[index] }}</span></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="result-table-sec borde-non" v-if="total_tie_breaks_in_match.label.length > 0">
                <h4>Total Tie Breaks in Match</h4>

                <div class="col-6 col-md-4 participant-border">&nbsp</div>
                <div class="col-6 col-md-4 participant-border">Over</div>
                <div class="col-6 col-md-4 participant-border">Under</div>
                <div v-for="(label, index) in total_tie_breaks_in_match.label">
                    <div class="col-6 col-md-4 player-cat parti-goal bord-rght bord-bottm"><span class="part-nme">{{ label }}</span></div>
                    <div class="col-6 col-md-4 player-cat parti-goal bord-bottm"><span class="partnumb">{{ total_tie_breaks_in_match.over[index] }}</span></div>
                    <div class="col-6 col-md-4 player-cat parti-goal bord-bottm"><span class="partnumb">{{ total_tie_breaks_in_match.under[index] }}</span></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="result-table-sec borde-non" v-if="total_games_2_way.label.length > 0">
                <h4>Total Game 2 Way</h4>

                <div class="col-6 col-md-4 participant-border">&nbsp</div>
                <div class="col-6 col-md-4 participant-border">Over</div>
                <div class="col-6 col-md-4 participant-border">Under</div>
                <div v-for="(label, index) in total_games_2_way.label">
                    <div class="col-6 col-md-4 player-cat parti-goal bord-rght bord-bottm"><span class="part-nme">{{ label }}</span></div>
                    <div class="col-6 col-md-4 player-cat parti-goal bord-bottm"><span class="partnumb">{{ total_games_2_way.over[index] }}</span></div>
                    <div class="col-6 col-md-4 player-cat parti-goal bord-bottm"><span class="partnumb">{{ total_games_2_way.under[index] }}</span></div>
                </div>
                <div class="clearfix"></div>
            </div>

            <!-- <div class="result-table-sec" v-if="typeof odds.main.sp.double_chance != 'undefined'">
                <h4>Double Chance</h4>
                 <div class="col-6 col-md-4 player-cat" v-for="row in odds.main.sp.double_chance">
                    <span class="part-nme">{{ row.name }}</span>
                    <span class="partnumb"> {{ row.odds }} </span>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="result-table-sec" v-if="typeof odds.half.sp.hal_time_result != 'undefined'">
                <h4>Half Time Result</h4>
                 <div class="col-6 col-md-4 player-cat" v-for="row in odds.half.sp.hal_time_result">
                    <span class="part-nme">{{ row.name }}</span>
                    <span class="partnumb"> {{ row.odds }} </span>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="result-table-sec borde-non" v-if="typeof odds.asian_lines.sp.asian_handicap != 'undefined'">
                <h4>Asian Handicap (0-0)</h4>
                <div class="row">
                    <div class="col-6 col-md-6 participant-border">{{ event.home.name }}</div>
                    <div class="col-6 col-md-6 participant-border">{{ event.away.name }}</div>
                </div>
                <div class="col-6 col-md-6 player-cat parti-goal bord-rght" v-for="row in odds.asian_lines.sp.asian_handicap">
                    <span class="part-nme">{{ row.name }}</span>
                    <span class="partnumb"> {{ row.odds }} </span>
                </div>
                <div class="clearfix"></div>
            </div>
            
            <div class="result-table-sec borde-non" v-if="typeof odds.main.sp.goal_line != 'undefined'">
                <h4>Goal Line</h4>

                <div class="col-6 col-md-4 participant-border">&nbsp</div>
                <div class="col-6 col-md-4 participant-border">Over</div>
                <div class="col-6 col-md-4 participant-border">Under</div>
                <div v-for="(label, index) in goal_line.label">
                    <div class="col-6 col-md-4 player-cat parti-goal bord-rght bord-bottm"><span class="part-nme">{{ label }}</span></div>
                    <div class="col-6 col-md-4 player-cat parti-goal bord-bottm"><span class="partnumb">{{ goal_line.over[index] }}</span></div>
                    <div class="col-6 col-md-4 player-cat parti-goal bord-bottm"><span class="partnumb">{{ goal_line.under[index] }}</span></div>
                </div>
                <div class="clearfix"></div>
            </div>
            
            <div class="result-table-sec borde-non" v-if="first_half_asian_handicap.home.length > 0">
                <h4>1st Half Asian Handicap (0-0)</h4>
                <div class="row">
                    <div class="col-6 col-md-6 participant-border">{{ event.home.name }}</div>
                    <div class="col-6 col-md-6 participant-border">{{ event.away.name }}</div>
                </div>
                <div class="row" v-for="(row, index) in first_half_asian_handicap.home">
                    <div class="col-6 col-md-6 player-cat parti-goal bord-rght">
                        <span class="part-nme">{{ row.name }}</span>
                        <span class="partnumb"> {{ row.odds }} </span>
                    </div>
                    <div class="col-6 col-md-6 player-cat parti-goal bord-rght">
                        <span class="part-nme">{{ first_half_asian_handicap.away[index].name }}</span>
                        <span class="partnumb"> {{ first_half_asian_handicap.away[index].odds }} </span>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="result-table-sec borde-non" v-if="first_half_goal_line.label.length > 0">
                <h4>First Half Goal Line</h4>
                <div class="col-6 col-md-4 participant-border">&nbsp</div>
                <div class="col-6 col-md-4 participant-border">Over</div>
                <div class="col-6 col-md-4 participant-border">Under</div>
                <div v-for="(label, index) in first_half_goal_line.label">
                    <div class="col-6 col-md-4 player-cat parti-goal bord-rght bord-bottm"><span class="part-nme">{{ label }}</span></div>
                    <div class="col-6 col-md-4 player-cat parti-goal bord-bottm"><span class="partnumb">{{ first_half_goal_line.over[index] }}</span></div>
                    <div class="col-6 col-md-4 player-cat parti-goal bord-bottm"><span class="partnumb">{{ first_half_goal_line.under[index] }}</span></div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="result-table-sec borde-non" v-if="corners_2_way.label.length > 0">
                <h4>2-Way Corners</h4>
                <div class="col-6 col-md-4 participant-border">&nbsp</div>
                <div class="col-6 col-md-4 participant-border">Over</div>
                <div class="col-6 col-md-4 participant-border">Under</div>
                <div v-for="(label, index) in corners_2_way.label">
                    <div class="col-6 col-md-4 player-cat parti-goal bord-rght bord-bottm"><span class="part-nme">{{ label }}</span></div>
                    <div class="col-6 col-md-4 player-cat parti-goal bord-bottm"><span class="partnumb">{{ corners_2_way.over[index] }}</span></div>
                    <div class="col-6 col-md-4 player-cat parti-goal bord-bottm"><span class="partnumb">{{ corners_2_way.under[index] }}</span></div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="result-table-sec borde-non" v-if="asian_total_corners.label.length > 0">
                <h4>Asian Corners</h4>
                <div class="col-6 col-md-4 participant-border">&nbsp</div>
                <div class="col-6 col-md-4 participant-border">Over</div>
                <div class="col-6 col-md-4 participant-border">Under</div>
                <div v-for="(label, index) in asian_total_corners.label">
                    <div class="col-6 col-md-4 player-cat parti-goal bord-rght bord-bottm"><span class="part-nme">{{ label }}</span></div>
                    <div class="col-6 col-md-4 player-cat parti-goal bord-bottm"><span class="partnumb">{{ asian_total_corners.over[index] }}</span></div>
                    <div class="col-6 col-md-4 player-cat parti-goal bord-bottm"><span class="partnumb">{{ asian_total_corners.under[index] }}</span></div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="result-table-sec borde-non" v-if="corners.label.length > 0">
                <h4>Match Corners</h4>
                <div class="col-6 col-md-3 participant-border">&nbsp</div>
                <div class="col-6 col-md-3 participant-border">Over</div>
                <div class="col-6 col-md-3 participant-border">Exatly</div>
                <div class="col-6 col-md-3 participant-border">Under</div>
                <div v-for="(label, index) in corners.label">
                    <div class="col-6 col-md-3 player-cat parti-goal bord-rght bord-bottm"><span class="part-nme">{{ label }}</span></div>
                    <div class="col-6 col-md-3 player-cat parti-goal bord-bottm"><span class="partnumb">{{ corners.over[index] }}</span></div>
                    <div class="col-6 col-md-3 player-cat parti-goal bord-bottm"><span class="partnumb">{{ corners.exactly[index] }}</span></div>
                    <div class="col-6 col-md-3 player-cat parti-goal bord-bottm"><span class="partnumb">{{ corners.under[index] }}</span></div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="result-table-sec borde-non" v-if="typeof odds.main != 'undefined'">
                <h4>Both Teams to Score</h4>
                <div class="col-6 col-md-6 player-cat parti-goal bord-rght bord-bottm" v-for="row in odds.main.sp.both_teams_to_score">
                    <span class="part-nme">{{ row.name }}</span>
                    <span class="partnumb">{{ row.odds }}</span>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="result-table-sec borde-non" v-if="typeof odds.goals != 'undefined'">
                <h4>Both Teams to Score in 1st Half</h4>
                <div class="col-6 col-md-6 player-cat parti-goal bord-rght bord-bottm" v-for="row in odds.goals.sp.both_teams_to_score_in_1st_half">
                    <span class="part-nme">{{ row.name }}</span>
                    <span class="partnumb">{{ row.odds }}</span>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="result-table-sec borde-non" v-if="typeof odds.goals != 'undefined'">
                <h4>Both Teams to Score in 2nd Half</h4>
                <div class="col-6 col-md-6 player-cat parti-goal bord-rght bord-bottm" v-for="row in odds.goals.sp.both_teams_to_score_in_2nd_half">
                    <span class="part-nme">{{ row.name }}</span>
                    <span class="partnumb">{{ row.odds }}</span>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="result-table-sec borde-non" v-if="typeof odds.main != 'undefined'">
                <h4>Draw No Bet</h4>
                <div class="col-6 col-md-6 player-cat parti-goal bord-rght bord-bottm" v-for="row in odds.main.sp.draw_no_bet">
                    <span class="part-nme">{{ row.name }}</span>
                    <span class="partnumb">{{ row.odds }}</span>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="result-table-sec borde-non" v-if="typeof odds.goals != 'undefined'">
                <h4>Goals Odd / Even</h4>
                <div class="col-6 col-md-6 player-cat parti-goal bord-rght bord-bottm" v-for="row in odds.goals.sp.goals_odd_even">
                    <span class="part-nme">{{ row.name }}</span>
                    <span class="partnumb">{{ row.odds }}</span>
                </div>
                <div class="clearfix"></div>
            </div> -->

        </div>

    </div>
</template>
 
<script>
import Vue from 'vue'

export default Vue.extend({
    name: 'TennisEventDetail',
    data(){
        return {
            odds: {}
        }
    },
    components: {

    },
    computed:{
        event(){
            return this.$store.state.activeEvent
        },
        first_set_score() {
            var data = {
                label: [],
                over: [],
                under: []
            }
            if(typeof this.odds.goals != 'undefined') {
                
                this.odds.main.sp.first_set_score.forEach((row) => {
                    if(typeof row.name != 'undefined'){
                        data.label.push(row.name)
                    }else{
                        if(row.header == 'Under'){
                            data.under.push(row.odds)
                        }else{
                            data.over.push(row.odds)
                        }
                    }
                })
            }
            return data; 
        },
        total_tie_breaks_in_match() {
            var data = {
                label: [],
                over: [],
                under: []
            }
            if(typeof this.odds.goals != 'undefined') {
                
                this.odds.main.sp.total_tie_breaks_in_match.forEach((row) => {
                    if(typeof row.name != 'undefined'){
                        data.label.push(row.name)
                    }else{
                        if(row.header == 'Under'){
                            data.under.push(row.odds)
                        }else{
                            data.over.push(row.odds)
                        }
                    }
                })
            }
            return data; 
        },
        total_games_2_way() {
            var data = {
                label: [],
                over: [],
                under: []
            }
            if(typeof this.odds.goals != 'undefined') {
                
                this.odds.games.sp.total_games_2_way.forEach((row) => {
                    if(typeof row.name != 'undefined'){
                        data.label.push(row.name)
                    }else{
                        if(row.header == 'Under'){
                            data.under.push(row.odds)
                        }else{
                            data.over.push(row.odds)
                        }
                    }
                })
            }
            return data; 
        },
        // first_half_asian_handicap() {
        //     let self = this;
        //     var data = {
        //         home: [],
        //         away: []
        //     }
        //     if(typeof this.odds.asian_lines.sp['1st_half_asian_handicap'] != 'undefined') {
        //         this.odds.asian_lines.sp['1st_half_asian_handicap'].forEach((row) => {
        //             console.log(row.header+'--'+self.event.home.name)
        //             if(row.header == self.event.home.name){
        //                 data.home.push(row)
        //             }else{
        //                 data.away.push(row)
        //             }
        //         })
        //     }
        //     return data; 
        // },
        // goal_line() {
        //     var data = {
        //         label: [],
        //         over: [],
        //         under: []
        //     }
        //     if(typeof this.odds.main != 'undefined') {
                
        //         this.odds.main.sp.goal_line.forEach((row) => {
        //             if(typeof row.name != 'undefined'){
        //                 data.label.push(row.name)
        //             }else{
        //                 if(row.header == 'Under'){
        //                     data.under.push(row.odds)
        //                 }else{
        //                     data.over.push(row.odds)
        //                 }
        //             }
        //         })
        //     }
        //     return data; 
        // },
        // first_half_goal_line() {
        //     var data = {
        //         label: [],
        //         over: [],
        //         under: []
        //     }
        //     if(typeof this.odds.asian_lines.sp['1st_half_goal_line'] != 'undefined') {
                
        //         this.odds.asian_lines.sp['1st_half_goal_line'].forEach((row) => {
        //             if(typeof row.name != 'undefined'){
        //                 data.label.push(row.name)
        //             }else{
        //                 if(row.header == 'Under'){
        //                     data.under.push(row.odds)
        //                 }else{
        //                     data.over.push(row.odds)
        //                 }
        //             }
        //         })
        //     }
        //     return data; 
        // },
        // corners_2_way() {
        //     var data = {
        //         label: [],
        //         over: [],
        //         under: []
        //     }
        //     if(typeof this.odds.corners != 'undefined') {
                
        //         this.odds.corners.sp['corners_2_way'].forEach((row) => {
        //             if(typeof row.name != 'undefined'){
        //                 data.label.push(row.name)
        //             }else{
        //                 if(row.header == 'Under'){
        //                     data.under.push(row.odds)
        //                 }else{
        //                     data.over.push(row.odds)
        //                 }
        //             }
        //         })
        //     }
        //     return data; 
        // },
        // asian_total_corners() {
        //     var data = {
        //         label: [],
        //         over: [],
        //         under: []
        //     }
        //     if(typeof this.odds.corners != 'undefined') {
                
        //         this.odds.corners.sp['asian_total_corners'].forEach((row) => {
        //             if(typeof row.name != 'undefined'){
        //                 data.label.push(row.name)
        //             }else{
        //                 if(row.header == 'Under'){
        //                     data.under.push(row.odds)
        //                 }else{
        //                     data.over.push(row.odds)
        //                 }
        //             }
        //         })
        //     }
        //     return data; 
        // },
        // corners() {
        //     var data = {
        //         label: [],
        //         over: [],
        //         exactly: [],
        //         under: []
        //     }
        //     if(typeof this.odds.corners != 'undefined') {
                
        //         this.odds.corners.sp['corners'].forEach((row) => {
        //             if(typeof row.name != 'undefined'){
        //                 data.label.push(row.name)
        //             }else{
        //                 if(row.header == 'Under'){
        //                     data.under.push(row.odds)
        //                 }else if(row.header == 'Over'){
        //                     data.over.push(row.odds)
        //                 }else{
        //                     data.exactly.push(row.odds)
        //                 }
        //             }
        //         })
        //     }
        //     return data; 
        // },
    },
    mounted() {
        this.loadOdds()
    },
    methods: {
        loadOdds() {
            let self = this;
            axios.get('/prematch/odds/'+this.event.id)
            .then(function(response){
                self.odds = response.data[0]
            })
        }
    }
})
</script>