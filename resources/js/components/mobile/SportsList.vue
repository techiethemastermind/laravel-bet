<template>
    <div class="crm-ClassificationRibbonScroller_HScroll-1 ">
        <div class="crm-ClassificationRibbonScroller_ScrollContent crm-ClassificationRibbon ">

            <div class="crm-ClassificationRibbon_Item" v-for="(sport, index) in sports" @click="openSport(index)">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-1 "></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">{{ sport }}</div>
                </div>
            </div>

            <!-- <div class="crm-ClassificationRibbon_Item ">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-13 "></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Tennis</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item ">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-18 "></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Basketball</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item ">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-2 "></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Racing</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item ">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-92 "></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">T. Tennis </div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item ">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-992 "></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Roulette </div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item ">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-3 "></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Cricket</div>
                </div>
            </div> -->
        </div>
    </div>
</template>
 
<script>
import Vue from 'vue'

export default Vue.extend({
    name: 'SportsList',
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
    },
    methods: {
        openSport(index) {
            this.$router.push({ name: 'inplay', params: { sportID: index } })
        }
    }
})
</script>