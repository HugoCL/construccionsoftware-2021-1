<template>
    <v-app id="main">
        <app-header @toggle-drawer="$refs.navdrawer.drawer = !$refs.navdrawer.drawer"></app-header>
        <navbar ref="navdrawer"></navbar>
        <v-main>
            <v-container>
                <router-view></router-view>
            </v-container>
        </v-main>

        <app-footer></app-footer>
    </v-app>
</template>

<script>
import NavDrawer from './NavDrawer'
import Header from './Header'
import Footer from './Footer'

export default ({
    name: 'App',
    components: {
        'navdrawer': NavDrawer,
        'app-header': Header,
        'app-footer': Footer,
    }
})
</script>
