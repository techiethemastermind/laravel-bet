<template>
<div>
    <div class="wrapper">
        <!-- Navbar 1-->
        <TopNavigation />
        <!-- /.navbar -->

        <!-- Navbar 2-->
        <MainNavigation />
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper grey3 px-0 inplaymodule">
            <!-- Main content -->
            <section class="content px-0 borderg-bb">

                <div class="container-fluid px-0">
                    <!-- Small boxes (Stat box) -->
                    <div class="row mx-0">
                        <InplayEvents />
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

import InplayEvents from './../components/InplayEvents.vue';
import Footer from './../components/Footer.vue';
import TopNavigation from './../components/TopNavigation.vue';
import MainNavigation from './../components/MainNavigation.vue';
import LeftSidebar from './../components/LeftSidebar.vue';
import HomeInplay from './../components/HomeInplay.vue';
import HighlightEvents from './../components/HighlightEvents.vue';
import OfferFooter from './../components/OfferFooter.vue';
import SportsList from './../components/mobile/SportsList.vue';
import MobileHighlightEvents from './../components/mobile/HighlightEvents.vue';

export default Vue.extend({
    name: 'Inplay',
    components: {
        InplayEvents,
        Footer,
        TopNavigation,
        MainNavigation,
        LeftSidebar,
        HomeInplay,
        HighlightEvents,
        OfferFooter,
        SportsList,
        MobileHighlightEvents,
    },
    mounted() {

    }
})
</script>