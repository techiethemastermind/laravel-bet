<template>
    <div class="crm-ClassificationRibbonScroller_HScroll ">
        <div class="crm-ClassificationRibbonScroller_ScrollContent crm-ClassificationRibbon crm-ClassificationRibbon-1">
            <div class="crm-ClassificationRibbon_Item inplyblck1" @click="openSport(1)">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-1"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Soccer</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck2" @click="openSport(13)">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-2"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Tennis</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck28" @click="openSport(36)">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-28"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Australian Rules</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck3" @click="openSport(94)">
                <div class="crm-RibbonItem_Icon">
                <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-3"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                <div class="crm-RibbonItemTitle_Title ">Badminton</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck4" @click="openSport(16)">
                <div class="crm-RibbonItem_Icon">
                <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-4"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                <div class="crm-RibbonItemTitle_Title ">Baseball</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck4" @click="openSport(18)">
                <div class="crm-RibbonItem_Icon">
                <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-4"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                <div class="crm-RibbonItemTitle_Title ">Basketball</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck5" @click="openSport(95)">
                <div class="crm-RibbonItem_Icon">
                <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-5"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                <div class="crm-RibbonItemTitle_Title ">Beach Volleyball</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck6" @click="openSport(3)">
                <div class="crm-RibbonItem_Icon">
                <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-6"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                <div class="crm-RibbonItemTitle_Title ">Cricket</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck25" @click="openSport(15)">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-25"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Darts</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck7" @click="openSport(151)">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-7"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Esports</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck24" @click="openSport(83)">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-24"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Futsal</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck9">
                <div class="crm-RibbonItem_Icon">
                <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-9"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                <div class="crm-RibbonItemTitle_Title ">Greyhounds</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck22" @click="openSport(78)">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-22"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Handball</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck13" @click="openSport(17)">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-13"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Ice Hockey</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck27" @click="openSport(19)">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-27"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Rugby League</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck26" @click="openSport(8)">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-26"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Rugby Union</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck16" @click="openSport(14)">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-16"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Snooker</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck17" @click="openSport(92)">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-17"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Table Tennis</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck18" @click="openSport(91)">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-18"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Volleyball</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck21" @click="openSport(107)">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-21"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Squash</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck34" @click="openSport(110)">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-34"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Water Polo</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck29">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-29"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Bowls</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck30">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-30"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Boxing/UFC</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck31">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-31"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Gaelic Sports</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck32">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-32"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Floorball</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck33">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-33"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Beach Volleyball</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck19">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-19"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Streaming</div>
                </div>
            </div>
            <div class="crm-ClassificationRibbon_Item inplyblck20">
                <div class="crm-RibbonItem_Icon">
                    <div class="cil-ClassificationIconLarge cil-ClassificationIconLarge-20"></div>
                </div>
                <div class="crm-RibbonItemTitle ">
                    <div class="crm-RibbonItemTitle_Title ">Schedule</div>
                </div>
            </div>
            <!---->
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
        // let self = this;
        // axios.get('/games/sports')
        // .then(function(response){
        //     self.sports = response.data
        // })
    },
    methods: {
        openSport(index) {
            this.$router.push({ name: 'inplay', params: { sportID: index } })
        },
    }
})
</script>