<template>
<div>
    <div class="wrapper">
        <!-- Navbar 1-->
        <TopNavigation />
        <!-- /.navbar -->

        <!-- Navbar 2-->
        <MainNavigation />
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <LeftSidebar />

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper grey3 px-0 ">

            <!-- Main content -->
            <section class="content px-0 borderg-bb" v-if="typeof event.id != 'undefined'">

                <div class="container-fluid px-0">
                    <!-- Small boxes (Stat box) -->
                    <div class="row mx-0">
                        <div class="middlecol">
                            <div class="middle-titleheader">
                                <div class="w-100 inplayy plyhght">
                                    <div class="row">
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                            <div class="event evml">
                                                <i class="fa fa-angle-left"></i> In-Play Soccer - {{ event.league.name }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="event-title">{{ event.home.name }} v {{ event.away.name }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="middlestartsec">
                                <nav>
                                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-all-tab" data-toggle="tab" href="#nav-all" role="tab" aria-controls="nav-all-tab" aria-selected="true">All</a>
                                        <a class="nav-item nav-link" id="nav-bet-tab" data-toggle="tab" href="#nav-bet" role="tab" aria-controls="nav-bet-tab" aria-selected="false">Bet Builder</a>
                                        <a class="nav-item nav-link" id="nav-asian-tab" data-toggle="tab" href="#nav-asian" role="tab" aria-controls="nav-asian-tab" aria-selected="false">Asian Lines</a>
                                        <a class="nav-item nav-link" id="nav-goal-tab" data-toggle="tab" href="#nav-goal" role="tab" aria-controls="nav-goal-tab" aria-selected="false">Goals</a>
                                    </div>
                                </nav>
                                <SoccerEventDetail v-if="event.sport_id == 1"/>
                                <TennisEventDetail v-else-if="event.sport_id == 13"/>
                            </div>
                        </div>

                        <HighlightEvents />
                    </div>
                </div>
            </section>
            <OfferFooter />

        </div>
    </div>
    <!-- /.content-wrapper -->

    <Footer />

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
</template>
 
<script>
import Vue from 'vue'

import Footer from './../components/Footer.vue';
import TopNavigation from './../components/TopNavigation.vue';
import MainNavigation from './../components/MainNavigation.vue';
import LeftSidebar from './../components/LeftSidebar.vue';
import HomeInplay from './../components/HomeInplay.vue';
import HighlightEvents from './../components/HighlightEvents.vue';
import OfferFooter from './../components/OfferFooter.vue';
import SportsList from './../components/mobile/SportsList.vue';
import MobileHighlightEvents from './../components/mobile/HighlightEvents.vue';
import SoccerEventDetail from './../components/SoccerEventDetail.vue';
import TennisEventDetail from './../components/TennisEventDetail.vue';

export default Vue.extend({
    name: 'EventDetail',
    components: {
        Footer,
        TopNavigation,
        MainNavigation,
        LeftSidebar,
        HomeInplay,
        HighlightEvents,
        OfferFooter,
        SportsList,
        MobileHighlightEvents,
        SoccerEventDetail,
        TennisEventDetail,
    },
    computed:{
        event(){
            return this.$store.state.activeEvent
        },
        eventID(){
            return this.$route.params.eventID
        },
        sportID(){
            return this.$route.params.sportID
        },
    },
    mounted() {
        let self = this;
        axios.get('/games/inplay/'+this.sportID+'/event/'+this.eventID)
        .then(function(response){
            if(response.data.status == 'success') {
                self.$store.dispatch('setActiveEvent', response.data.data);
            }else{
                self.$router.push({ name: 'home' })
            }
        })
    }
})
</script>