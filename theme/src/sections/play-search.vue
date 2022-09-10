<template>
    <play-navbar :site-name="props.siteName" :site-subname="props.siteSubname" :site-logo="props.siteLogo"/>
    <div class="w-full flex flex-col items-center my-14">
        <div class="w-8/12">
            <div class="flex flex-rpw items-center">
                <h3 class="text-lg font-bold h-poppins my-2">
                    Pencarian untuk kata kunci {{ state.keywords }}
                </h3>
            </div>
            <div class="flex flex-wrap">
                <router-link v-if="state.ready" class="flex flex-col my-2 hover:shadow-xl cursor-pointer p-5 w-full lg:w-4/12" v-for="book in state.result" :to="`/detail/${book.biblio_id}`">
                    <div class="flex flex-row">
                        <play-img class="w-[88px] h-[132px] rounded-lg shadow-lg cursor-pointer hover:shadow-2xl shadow-2xl" :title="book.title" :src="`${book.image}&width=250`"/>
                        <div class="flex flex-col ml-2">
                            <h4 class="text-lg font-bold text-gray-600 h-poppins">{{ book.title?.substr(0,50) }}...</h4>
                            <span class="text-sm">{{ shortAuthor(book.author) }}</span>
                            <p>{{ book.notes }}</p>
                            <small>{{ book.gmd }}</small>
                        </div>
                    </div>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script setup>
    import {reactive,onMounted} from 'vue'
    import { useRouter, useRoute } from 'vue-router'

    import PlayImg from '../components/play-image.vue'

    // state
    import {useSearch} from '../store/search.js'

    const route = useRoute()
    const router = useRouter()
    const state = useSearch()

    // components
    import PlayNavbar from '../components/play-navbar.vue'

    const props = defineProps({
        siteName: String,
        siteSubname: String,
        siteLogo: String,
        keywords: String,
    })

    function shortAuthor(author)
    {
        author = author?.split(' - ')

        if (author?.length > 1) return author[0] + ', dkk'
        return author?.join('')
    }

    onMounted(() => {
        state.searchData()
    })
</script>