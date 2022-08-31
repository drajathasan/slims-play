<template>
    <play-navbar :site-name="props.siteName" :site-subname="props.siteSubname"/>
    <div class="h-screen w-full">

    </div>
</template>

<script setup>
    import PlayNavbar from '../components/play-navbar.vue'
    
    const props = defineProps({
        siteName: String,
        siteSubname: String,
    })
</script>