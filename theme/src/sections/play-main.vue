<template>
    <play-navbar :site-name="props.siteName" :site-subname="props.siteSubname" :site-logo="props.siteLogo"/>
    <div class="w-full flex flex-col items-center my-14">
        <play-book-promote/>
        <play-book-popular/>
        <play-book-new/>
    </div>
</template>

<script setup>
    import PlayNavbar from '../components/play-navbar.vue'
    import PlayBookPopular from '../components/play-book-popular.vue'
    import PlayBookPromote from '../components/play-book-promote.vue'
    import PlayBookNew from '../components/play-book-new.vue'
    
    const props = defineProps({
        siteName: String,
        siteSubname: String,
        siteLogo: String
    })
</script>