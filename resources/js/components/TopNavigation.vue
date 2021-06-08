<template>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light nav1 grey1">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item d-none d-sm-inline-block">
                <router-link class="nav-link" :to="{ name: 'home'}" :class="{'active': routeName == 'home'}">Sports</router-link>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <router-link class="nav-link" :to="{ name: 'inplay', params: {sportID: 1}}" :class="{'active': routeName == 'inplay'}">In-play</router-link>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Casino</a>
            </li>
            <!-- <li class="nav-item d-none d-sm-inline-block">
                <a href="/casino" class="nav-link">Casino</a>
            </li> -->
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Extra</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto extra-rightlink">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link whitetxt">Responsible Gambling</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link whitetxt">Help</a>
            </li>
        </ul>
    </nav>
</template>
 
<script>
import Vue from 'vue'

export default Vue.extend({
    name: 'TopNavigation',
    computed: {
        routeName(){
            return this.$route.name
        }
    },
    mounted() {

    }
})
</script>