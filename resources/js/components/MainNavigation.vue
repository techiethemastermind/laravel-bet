<template>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light nav2 green">
        <!-- Left navbar links -->
        <ul class="navbar-nav resp-nav">
            <li class="nav-item d-none d-sm-inline-block" style="overflow:hidden">
                <router-link class="nav-link whitetxt" :to="{ name: 'home'}">
                    <img src="frontend/365/img/logo.jpeg" alt="365Plus" style="margin-top: -22px;width: 70%;margin-left: -30px;">
                </router-link>
            </li>

        </ul>

        <ul class="navbar-nav m-auto">
            <li class="nav-item alpharesp">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i><span class="navtxt"> A-Z </span>
                </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block nav-cent">
                <router-link class="nav-link nav-center" :to="{ name: 'home'}" :class="{'active': routeName == 'home'}">Sports</router-link>
            </li>
            <li class="nav-item  d-sm-inline-block nav-cent">
                <router-link class="nav-link nav-center" :to="{ name: 'inplay', params: {sportID: 1}}" :class="{'active': routeName == 'inplay'}">In-play</router-link>
            </li>
            <li class="nav-item m-done  d-sm-inline-block nav-cent">
                <router-link class="nav-link whitetxt active mb-logo" :to="{ name: 'home'}">
                    <img src="/frontend/365/img/logo.jpeg" alt="365Plus">
                </router-link>
            </li>
            <li class="nav-item m-done  d-sm-inline-block nav-cent">
                <button href="#" class="jointxt">Join</button>
            </li>
            <li class="nav-item  m-done d-sm-inline-block nav-cent">
                <button href="#" class="  yellowbtnbtn">Login</button>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav resp-nav">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link active"><img src="frontend/365/img/search.svg" alt="" width="18px"></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <button href="#" class="jointxt">Join</button>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <button href="#" class="  yellowbtnbtn">Login</button>
            </li>
        </ul>
    </nav>
</template>
 
<script>
import Vue from 'vue'

export default Vue.extend({
    name: 'MainNavigation',
    computed: {
        routeName(){
            return this.$route.name
        }
    },
    mounted() {

    }
})
</script>