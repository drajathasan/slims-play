<template>
    <play-navbar :site-name="props.siteName" :site-subname="props.siteSubname"/>
</template>

<script setup>
    import PlayNavbar from '../components/play-navbar.vue'
    
    const props = defineProps({
        siteName: String,
        siteSubname: String,
    })
</script>