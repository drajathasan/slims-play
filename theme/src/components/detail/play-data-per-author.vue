<template>
    <div class="flex flex-rpw items-center">
        <h3 class="text-lg font-bold h-poppins my-2">
            Buku lain oleh {{ result.author }} 
        </h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="cursor-pointer mx-5 hover:bg-gray-100 rounded-full p-1" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
        </svg>
    </div>
    <a v-if="data.ready" class="flex flex-col my-2 hover:shadow-xl cursor-pointer p-5" v-for="otherBook in data.otherAuthorData" @click="redirectTo(otherBook.biblio_id)">
        <div class="flex flex-row">
            <img class="w-[88px] h-[132px] rounded-lg shadow-lg cursor-pointer hover:shadow-2xl shadow-2xl" :title="otherBook.title" loading="lazy" :src="`https://dlibrary.ittelkom-pwt.ac.id/lib/minigalnano/createthumb.php?filename=../../images/docs/${otherBook.image}&width=250`" alt="Sample 1">
            <div class="flex flex-col ml-2">
                <h4 class="font-bold text-gray-600">{{ otherBook.title }}</h4>
                <span class="text-sm">{{ otherBook.author }}</span>
                <small>{{ otherBook.gmd }}</small>
            </div>
        </div>
    </a>
</template>

<script setup>
    import { reactive, onMounted, getCurrentInstance } from 'vue'
    import { useRoute, useRouter } from 'vue-router'
    import {useTriggerId} from '../../store/biblio.js'

    const route = useRoute()
    const router = useRouter()
    const instance = getCurrentInstance()
    const state = useTriggerId()

    const props = defineProps({
        result: Object
    })

    const data = reactive({
        otherAuthorData: {},
        ready: false
    })

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