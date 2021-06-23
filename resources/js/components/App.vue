<template>
    <v-app id="main">
        <app-header @toggle-drawer="$refs.navbar.drawer = !$refs.navbar.drawer"></app-header>
        <navbar ref="navbar"></navbar>
        <v-main>
            <v-container>

                <router-view></router-view>
            </v-container>
        </v-main>

        <app-footer></app-footer>
    </v-app>
</template>

<script>
import Navbar from './Navbar'
import Header from './Header'
import Footer from './Footer'
import Alert from './Alert'

export default ({
    name: 'App',
    components: {
        'navbar': Navbar,
        'app-header': Header,
        'app-footer': Footer,
        'alert-msj': Alert,
    }
})
</script>
