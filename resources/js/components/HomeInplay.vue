<template>
    <div class="middlecol">
        <div class="w-100 inplayy">
            <div class="row">
                <div class="col-8 col-sm-8 col-md-8 col-lg-8">
                    <div class="greentxt inplay">
                        Inplay
                    </div>
                </div>
                <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                    <div class="event">
                        Event <i class="fa fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>
        <table>
            <tbody>
                <tr class="borderg-b">
                    <td class="tablepad">
                        <b class="whitetxt" style="font-size: 16px;">Soccer</b>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td>1</td>
                                <td>X</td>
                                <td>2</td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="border-b" v-for="event in soccerEvents">
                    <td class="tablepad">
                        <table class="border-r" @click="openEvent(event)">
                            <tr>
                                <td>{{ JSON.parse(event.home).name }}</td>
                                <td class="text-right" style="padding-right:15px;"><b>{{ score(event.ss, 'home') }}</b></td>
                            </tr>
                            <tr>
                                <td>{{ JSON.parse(event.away).name }}</td>
                                <td class="text-right" style="padding-right:15px;"><b>{{ score(event.ss, 'away') }}</b></td>
                            </tr>
                            <tr>
                                <td class="him-InPlayTimer">00:00 <span> 11 ></span></td>
                                <td></td>
                            </tr>
                        </table>
                    </td>
                    <td class="tablepad2">
                        <table>
                            <tr class="">
                                <td class="yellowtxthov" 
                                    :class="{'active': betKeys.includes(event.id+'_home')}" 
                                    @click="addToBet(event, 0, 'home', 'Fulltime Result')"
                                    >
                                    {{ fulltimeResult(event.fulltime_result, 0) }}
                                </td>
                                <td class="yellowtxthov" 
                                    :class="{'active': betKeys.includes(event.id+'_draw')}" 
                                    @click="addToBet(event, 1, 'draw', 'Fulltime Result')"
                                    >
                                    {{ fulltimeResult(event.fulltime_result, 1) }}
                                </td>
                                <td class="yellowtxthov" 
                                    :class="{'active': betKeys.includes(event.id+'_away')}" 
                                    @click="addToBet(event, 2, 'away', 'Fulltime Result')"
                                    >
                                    {{ fulltimeResult(event.fulltime_result, 2) }}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <table>
            <tbody>
                <tr class="borderg-b">
                    <td class="tablepad">
                        <b class="whitetxt" style="font-size: 16px;">Tennis</b>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td>1</td>
                                <td>2</td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="border-b" v-for="event in tennisEvents">
                    <td class="tablepad">
                        <table class="border-r" @click="openEvent(event)">
                            <tr>
                                <td>{{ event.home.name }}</td>
                                <td class="text-right" style="padding-right:15px;"><b>{{ score(event.ss, 'home') }}</b></td>
                            </tr>
                            <tr>
                                <td>{{ event.away.name }}</td>
                                <td class="text-right" style="padding-right:15px;"><b>{{ score(event.ss, 'away') }}</b></td>
                            </tr>
                            <tr>
                                <td class="him-InPlayTimer">00:00 <span> 11 ></span></td>
                                <td></td>
                            </tr>
                        </table>
                    </td>
                    <td class="tablepad2">
                        <table>
                            <tr class="">
                                <td class="yellowtxthov" :class="{'active': betKeys.includes(event.id+'_home')}" @click="addToBet(event, event.odds[0].odds, 'home', 'Fulltime Result')">{{event.odds[0].odds }}</td>
                                <td class="yellowtxthov" :class="{'active': betKeys.includes(event.id+'_away')}" @click="addToBet(event, event.odds[1].odds, 'away', 'Fulltime Result')">{{event.odds[1].odds }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>

        
    </div>
</template>
 
<script>
import Vue from 'vue'
const axios = require('axios');

export default Vue.extend({
    name: 'HomeInplay',
    data() {
        return {
            soccerEvents: [],
            tennisEvents: [],
        }
    },
    mounted() {
        this.loadInplayGames();
        this.$nextTick(function () {
            window.setInterval(() => {
                this.loadInplayGames();
            }, 45000);
        })
    },
    computed: {
        betKeys() {
            return this.$store.state.betKeys;
        }
    },
    methods: {
        loadInplayGames() {
            let self = this;
            axios.get('/games/inplay/1')
            .then(function(response){
                self.soccerEvents = response.data
            })
            axios.get('/games/inplay/13?limit=5')
            .then(function(response){
                self.tennisEvents = response.data
            })
        },
        score(ss, team)
        {
            if(ss) {
                let score = ss.split('-')
                if(team == 'home') {
                    return score[0]
                } else {
                    return score[1]
                }
            }else{
                return '';
            }
        },
        openEvent(event) {
            this.$store.dispatch('setActiveEvent', event);
            this.$router.push({ name: 'event_detail', params: { sportID: event.sport_id, eventID: event.event_id } })
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
        fulltimeResult(result, index) {
            var parseResult = JSON.parse(result)
            if(typeof parseResult[index] != 'undefined') {
                return parseFloat(parseResult[index].odds).toFixed(2)
            }else{
                return ''
            }
        }
    }
})
</script>