<template>
    <play-navbar :site-name="props.siteName" :site-subname="props.siteSubname"/>
    <div class="w-full flex flex-col items-center my-14">
        <play-book-popular v-for="book in 5"/>
    </div>
</template>

<script setup>
    import PlayNavbar from '../components/play-navbar.vue'
    import PlayBookPopular from '../components/play-book-popular.vue'
    
    const props = defineProps({
        siteName: String,
        siteSubname: String,
    })
</script>