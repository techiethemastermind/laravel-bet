<template>
    <table class="borderg-bb">
        <tr>
            <td>
                <div class="w-100 inplayy">
                    <div class="greentxt inplay">
                        Features Matches
                    </div>
                </div>
            </td>
            <td>
                <div class="event">
                    <!-- Event <i class="fa fa-angle-right"></i> -->
                </div>
            </td>
        </tr>
        <tr class="border-bb" v-for="event in events">
            <td class="tablepad wid50">
                <table class="border-rr">
                    <tr>
                        <td><svg class="tk-TeamKit_SVG" width="48" height="44" viewBox="0 0 48 44" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>K10-2</title><defs><path d="M36 4l12 11.636-6.384 6.717L36 17.48V44H12V17.48l-5.374 4.6L0 15.525 12 4l5.892-1.406 1.24-2.001C20.799.305 21.835 0 23.859 0c2.063 0 2.308.21 4.662.448l1.586 2.226L36 4z" id="K10-2-path-1"></path><mask id="K10-2-mask-2" x="0" y="0" width="48" height="44" fill="#fff"><use xlink:href="#K10-2-path-1"></use></mask><mask id="K10-2-mask-3" x="0" y="0" width="48" height="44" fill="#fff"><use xlink:href="#K10-2-path-1"></use></mask></defs><g id="SVG-Team-Kits-Separated" fill="none" fill-rule="evenodd"><g id="K10-2"><path d="M36 4l12 11.636-6.384 6.717L36 17.48V44H12V17.48l-5.374 4.6L0 15.525 12 4l5.892-1.406 1.24-2.001C20.799.305 21.835 0 23.859 0c2.063 0 2.308.21 4.662.448l1.586 2.226L36 4z" id="color1" fill="#0A0A0A"></path><path d="M16 3.05V44h-4l.004-40L16 3.05zm16 .055l4 .905V44h-4V3.105z" id="color2" fill="#0A0A0A"></path><g id="hires-detail"><g id="Outline7"><g id="hires-detail"><use stroke-opacity=".07" stroke="#FFF" mask="url(#K10-2-mask-2)" stroke-width="4" xlink:href="#K10-2-path-1"></use><use stroke="#272727" mask="url(#K10-2-mask-3)" stroke-width="2" xlink:href="#K10-2-path-1"></use></g></g></g></g></g></svg>                                                    {{ event.home.name }}</td>

                    </tr>
                    <tr>
                        <td><svg class="tk-TeamKit_SVG" width="48" height="44" viewBox="0 0 48 44" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>K10-2</title><defs><path d="M36 4l12 11.636-6.384 6.717L36 17.48V44H12V17.48l-5.374 4.6L0 15.525 12 4l5.892-1.406 1.24-2.001C20.799.305 21.835 0 23.859 0c2.063 0 2.308.21 4.662.448l1.586 2.226L36 4z" id="K10-2-path-1"></path><mask id="K10-2-mask-2" x="0" y="0" width="48" height="44" fill="#fff"><use xlink:href="#K10-2-path-1"></use></mask><mask id="K10-2-mask-3" x="0" y="0" width="48" height="44" fill="#fff"><use xlink:href="#K10-2-path-1"></use></mask></defs><g id="SVG-Team-Kits-Separated" fill="none" fill-rule="evenodd"><g id="K10-2"><path d="M36 4l12 11.636-6.384 6.717L36 17.48V44H12V17.48l-5.374 4.6L0 15.525 12 4l5.892-1.406 1.24-2.001C20.799.305 21.835 0 23.859 0c2.063 0 2.308.21 4.662.448l1.586 2.226L36 4z" id="color1" fill="#FFDF1B"></path><path d="M16 3.05V44h-4l.004-40L16 3.05zm16 .055l4 .905V44h-4V3.105z" id="color2" fill="#4BD43B"></path><g id="hires-detail"><g id="Outline7"><g id="hires-detail"><use stroke-opacity=".07" stroke="#FFF" mask="url(#K10-2-mask-2)" stroke-width="4" xlink:href="#K10-2-path-1"></use><use stroke="#272727" mask="url(#K10-2-mask-3)" stroke-width="2" xlink:href="#K10-2-path-1"></use></g></g></g></g></g></svg>                                                    {{ event.away.name }}</td>

                    </tr>
                    <tr>
                        <td>00:00</td>
                    </tr>
                </table>
            </td>
            <td class="tablepad2 wid50">
                <table>
                    <tr class="">
                        <td class="yellowtxthov">{{ event.odds[0].odds }}</td>
                        <td class="yellowtxthov">{{ event.odds[1].odds }}</td>
                        <td class="yellowtxthov">{{ event.odds[2].odds }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</template>
 
<script>
import Vue from 'vue'
const axios = require('axios');

export default Vue.extend({
    name: 'FeaturedMatches',
    data() {
        return {
            events: []
        }
    },
    mounted() {
        let self = this;
        axios.get('/featured/games/1')
        .then(function(response){
            self.events = response.data
        })
    },
    methods: {

    }
})
</script>