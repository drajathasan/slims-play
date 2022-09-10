<template>
    <img :class="props.class" :title="props.title" :src="baseUrl + props.src" loading="lazy" data-is-component="yes"/>
</template>

<script setup>
    const baseUrl = document.querySelector('meta[name="image_url"]')?.getAttribute('content')

    const props = defineProps({
        class: String,
        title: String,
        src: String
    })
</script>