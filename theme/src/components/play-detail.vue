<template>
    <section class="w-full flex justify-center my-12">
        <div class="2xl:w-7/12 4xl:w-5/12 min-h-[20rem] flex flex-col">
            <div class="flex flex-col w-[90%]">
                <h1 class="text-[40pt] lg:leading-[4rem] h-poppins font-bold">{{ result.title }}</h1>
                <span class="mt-8 font-bold text-blue-600">
                    <router-link v-for="(author,index) in data.authors" :to="`/author/${author}`">
                        {{ (index === (data.authors.length - 1) ? author : author + ' - ') }}
                    </router-link>
                </span>
                <small class="font-bolder">{{ result.publish_place + ' : ' + result.publisher + ', ' + result.publish_year}}</small>
            </div>
            <div class="flex flex-row items-center my-8">
                <label class="px-5 flex flex-col text-center items-center text-sm" title="GMD">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z"/>
                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                    </svg>
                    {{ result.gmd??'-' }}
                </label>
                <label class="px-5 flex flex-col text-center items-center text-sm" title="Edisi">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                    </svg>
                    {{ result.edition??'-' }}
                </label>
                <label class="px-5 flex flex-col text-center items-center text-sm" title="Topik">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                        <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                        <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
                    </svg>
                    {{ result.topic??'-' }}
                </label>
                <label class="px-5 flex flex-col text-center items-center text-sm cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                        <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z"/>
                        <path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z"/>
                    </svg>
                    {{ (countItems(result.items)??0) + ' eksemplar' }}
                </label>
            </div>
            <div class="flex flex-row items-center my-8">
                <button class="flex flex-row items-center bg-transparent rounded-lg p-2 text-blue-500 hover:bg-blue-500 hover:text-white border-2 border-blue-500 font-bold text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-heart mx-1" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z"/>
                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                    </svg>
                    Tambahkan ke favorit
                </button>
            </div>
        </div>
        <div class="w-2/12 flex flex-row justify-items-end">
            <img class="w-[196px] h-[306px] rounded-lg shadow-lg cursor-pointer hover:shadow-2xl shadow-2xl" :title="result.title" loading="lazy" :src="`https://dlibrary.ittelkom-pwt.ac.id/lib/minigalnano/createthumb.php?filename=../../images/docs/${result.image}&width=250`" alt="Sample 1">
        </div>
    </section>
    <play-notes :result="result"/>
</template>

<script setup>
    import {onMounted, reactive} from 'vue'
    import PlayNotes from './detail/play-notes.vue'

    const props = defineProps({
        result: Object
    })

    const data = reactive({
        authors: []
    })

    const countItems = (items) => { return items?.split(' - ').length }

    const authorArray = (author) => {
        if (countItems(author) === 1) 
        {
            data.authors.push(author)
            return
        }
        data.authors = author.split(' - ')
    }

    onMounted(() => {
        authorArray(props.result.author)
    })
</script>