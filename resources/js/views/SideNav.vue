<template>
    <div>
        <nav class="nav nav-sidebar tx-13">

            <router-link :to="{ name: 'home' }">Home</router-link>
            <router-link class="nav-link" active-class="active" to="{ name: 'home' }" exact> <bar-chart-2-icon size="24"></bar-chart-2-icon>SAF Monitor  </router-link>
            <router-link class="nav-link" active-class="active" to="/balances" exact> <settings-icon size="24"></settings-icon> Balances </router-link>
            <router-link class="nav-link" active-class="active" to="/balances/partial" exact> <settings-icon size="24"></settings-icon> Partial Load </router-link>
            <router-link class="nav-link" active-class="active" to="/transactions/saf" exact> <activity-icon size="24"></activity-icon>SAF Aborting </router-link>
            <router-link class="nav-link" active-class="active" to="/transactions/requests" exact> <zap-icon size="24"></zap-icon> Requests </router-link>
            <router-link class="nav-link" active-class="active" to="/transactions/reports" exact> <folder-icon size="24"></folder-icon> Reports </router-link>
            <router-link class="nav-link" active-class="active" to="/transactions/reports/create" exact> <plus-circle-icon size="24"></plus-circle-icon> Create Report  </router-link>
        </nav>
    </div>
</template>

<script>
    export default {
        name: "SideNav"
    }
</script>

<style scoped>

</style>
