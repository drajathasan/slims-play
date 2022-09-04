<template>
    <play-navbar :site-name="props.siteName" :site-subname="props.siteSubname"/>
    <play-detail-template v-if="data.ready" :result="data.detail"/>
</template>

<script setup>
    import {reactive,onMounted} from 'vue'
    import { useRouter, useRoute } from 'vue-router'
    import PlayNavbar from '../components/play-navbar.vue'
    import PlayDetailTemplate from '../components/play-detail.vue'
    
    const route = useRoute()
    const router = useRouter()

    const props = defineProps({
        siteName: String,
        siteSubname: String,
        id: 0,
        ready: false,
    })

    const data = reactive({
        detail: {}
    })

    const getDetail = async (id) => {
        try {
            let request = await (await fetch(`?p=play&route=/book/detail/${id}`)).json()

            if (request.status)
            {
                data.detail = request.result.Data;
                data.ready = true
            }
        } catch (error) {
            
        }
    }

    onMounted(() => {
        getDetail(route.params.id)
    })
</script>