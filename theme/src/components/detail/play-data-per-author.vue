<template>
    <div class="flex flex-rpw items-center">
        <h3 class="text-lg font-bold h-poppins my-2">
            {{ label }} {{ result.author }} 
        </h3>
        <router-link :to="`/author/${result.author}`">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="cursor-pointer mx-5 hover:bg-gray-100 rounded-full p-2" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
            </svg>
        </router-link>
    </div>
    <div class="flex flex-wrap">
        <a v-if="data.ready" class="flex flex-col my-2 hover:shadow-xl cursor-pointer p-5 w-full lg:w-4/12" v-for="otherBook in data.otherAuthorData" @click="redirectTo(otherBook.biblio_id)">
            <div class="flex flex-row">
                <play-img class="w-[88px] h-[132px] rounded-lg shadow-lg cursor-pointer hover:shadow-2xl shadow-2xl" :title="otherBook.title" :src="`${otherBook.image}&width=250`"/>
                <div class="flex flex-col ml-5">
                    <h4 class="text-lg font-bold text-gray-600  h-poppins">{{ otherBook.title }}</h4>
                    <span class="text-sm">{{ shortAuthor(otherBook.author) }}</span>
                    <small>{{ otherBook.gmd }}</small>
                </div>
            </div>
        </a>
    </div>
</template>

<script setup>
    import { reactive, onMounted, getCurrentInstance } from 'vue'
    import { useRoute, useRouter } from 'vue-router'
    import {useTriggerId} from '../../store/biblio.js'
    import PlayImg from '../play-image.vue'

    const route = useRoute()
    const router = useRouter()
    const instance = getCurrentInstance()
    const state = useTriggerId()

    const props = defineProps({
        result: Object,
        label: {
            type: String,
            default: 'Buku lain oleh'
        }
    })

    const data = reactive({
        otherAuthorData: {},
        ready: false
    })

    function shortAuthor(author)
    {
        author = author?.split(' - ')

        if (author.length > 1) return author[0] + ', dkk'
        return author[0]
    }

    const getAnotherBook = async () => {
        try {
            let request = await (await fetch(`?p=play&route=/book/author&name=${props.result.author}&id=${route.params.id}`)).json()
            
            if (request.status)
            {
                data.otherAuthorData = request.data
                data.ready = true
            }
        } catch (error) {
            console.log(error)
        }
    }

    const redirectTo = (biblioId) => {
        state.ready = false
        router.push({path: `/detail/${biblioId}`})
        state.getDetail(biblioId)
    }

    onMounted(() => {
        getAnotherBook()
    })
</script>