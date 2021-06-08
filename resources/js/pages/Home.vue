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
            <section class="content px-0 borderg-bb scrollable-section">

                <div class="container-fluid px-0 scrolldiv">
                    <!-- Small boxes (Stat box) -->
                    <div class="row mx-0">
                        <HomeInplay />
                        <HighlightEvents />
                    </div>
                    <OfferFooter />
                    <Footer />
                </div>
            </section>

        </div>
    </div>
    <!-- /.content-wrapper -->

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

export default Vue.extend({
    name: 'Home',
    components: {
        Footer,
        TopNavigation,
        MainNavigation,
        LeftSidebar,
        HomeInplay,
        HighlightEvents,
        OfferFooter,
        SportsList,
    },
    mounted() {

    }
})
</script>