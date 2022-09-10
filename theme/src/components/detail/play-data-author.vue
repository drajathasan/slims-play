<template>
    <div class="flex flex-rpw items-center">
        <h3 class="text-lg font-bold h-poppins my-2">
            {{ props.result.length }} {{ label }} {{ route.params.name }}
        </h3>
    </div>
    <div class="flex flex-wrap">
        <router-link class="flex flex-col my-2 hover:shadow-xl cursor-pointer p-5 w-full lg:w-4/12" v-for="book in props.result" :to="`/detail/${book.biblio_id}`">
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
</template>

<script setup>
    import { onMounted } from 'vue'
    import { useRoute } from 'vue-router'

    import PlayImg from '../play-image.vue'

    const route = useRoute()

    const props = defineProps({
        result: Object,
        label: {
            type: String,
            default: 'Buku oleh'
        },
    })

    function shortAuthor(author)
    {
        author = author?.split(' - ')

        if (author.length > 1) return author[0] + ', dkk'
        return author[0]
    }
</script>