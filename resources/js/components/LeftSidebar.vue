<template>
    <aside class="main-sidebar  elevation-4 grey1">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="">
                <div class="wn-WebNavModule_NarrowContainer ">
                    <div class="wn-SiteSearch ">
                        <div class="wn-SiteSearch_SearchIcon "></div><input placeholder="Search..." type="text" class="wn-SiteSearch_SearchInput "></div>
                    <div class="wn-ProductNavigation ">
                        <div class="wn-Product wn-Product_Title-selected ">
                            <div class="wn-Product_Image wn-Product_Image-sports "></div>
                            <div class="wn-Product_Title ">Sports</div>
                        </div>
                        <div class="wn-Product ">
                            <div class="wn-Product_Image wn-Product_Image-inplay "></div>
                            <div class="wn-Product_Title ">In-Play</div>
                        </div>
                        <div class="wn-Product ">
                            <div class="wn-Product_Image wn-Product_Image-gaming "></div>
                            <div class="wn-Product_Title ">Gaming</div>
                        </div>
                        <div class="wn-Product ">
                            <div class="wn-Product_Image wn-Product_Image-offer "></div>
                            <div class="wn-Product_Title ">Offers</div>
                        </div>
                        <div class="wn-ProductNavigation_Indicator " style="width: 36.5781px; transform: translateX(14px);"></div>
                    </div>
                </div>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

                    <li class="nav-item has-treeview menu-open">
                        <div class="allow-hover wn-PreMatchItem">
                            Offer
                            <i class="fa fa-star-o right"></i>
                        </div>
                        <div class="allow-hover wn-PreMatchItem" v-for="sport in sports">
                            {{ sport }}
                            <i class="fa fa-star-o right"></i>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</template>
 
<script>
import Vue from 'vue'
const axios = require('axios');

export default Vue.extend({
    name: 'LeftSidebar',
    data() {
        return {
            sports: []
        }
    },
    mounted() {
        let self = this;
        axios.get('/games/sports')
        .then(function(response){
            self.sports = response.data
        })
    }
})
</script>