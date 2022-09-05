<template>
    <play-navbar :site-name="props.siteName" :site-subname="props.siteSubname" :site-logo="props.siteLogo"/>
    <div class="w-full flex flex-col items-center my-14">
        <div class="w-8/12">
            <play-book-list-author v-if="data.ready" :result="data.result"/>
        </div>
    </div>
</template>

<script setup>
    import {reactive,onMounted} from 'vue'
    import { useRouter, useRoute } from 'vue-router'

    // components
    import PlayNavbar from '../components/play-navbar.vue'
    import PlayBookListAuthor from '../components/detail/play-data-author.vue'

    const route = useRoute()
    const router = useRouter()

    const props = defineProps({
        siteName: String,
        siteSubname: String,
        siteLogo: String,
        name: String,
        id: 0,
    })

    const data = reactive({
        result: Object,
        ready: false
    })

    const getAuthorBook = async (authorName) => {

        try {
            let request = await ( await fetch(`?p=play&route=/book/author&name=${authorName}&limit=100`)).json()
            
            if (request.status)
            {
                data.ready = false
                data.result = request.data
                data.ready = true
            }
        } catch (error) {
            console.log(error)
        }
    }

    onMounted(() => {
        getAuthorBook(route.params.name)
    })
</script>