<template>
    <play-navbar :site-name="props.siteName" :site-subname="props.siteSubname" :site-logo="props.siteLogo"/>
    <play-detail-template v-if="state.ready" :result="state.detail"/>
</template>

<script setup>
    import {reactive,onMounted} from 'vue'
    import { useRouter, useRoute } from 'vue-router'

    // state
    import {useTriggerId} from '../store/biblio.js'

    // components
    import PlayNavbar from '../components/play-navbar.vue'
    import PlayDetailTemplate from '../components/play-detail.vue'
    
    const route = useRoute()
    const router = useRouter()
    const state = useTriggerId()

    const props = defineProps({
        siteName: String,
        siteSubname: String,
        siteLogo: String,
        id: 0,
    })

    const data = reactive({
        detail: {}
    })

    onMounted(() => {
        state.getDetail(route.params.id)
    })
</script>