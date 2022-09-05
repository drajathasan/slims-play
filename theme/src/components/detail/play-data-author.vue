<template>
    <div class="flex flex-rpw items-center">
        <h3 class="text-lg font-bold h-poppins my-2">
            {{ props.result.length }} {{ label }} {{ route.params.name }}
        </h3>
    </div>
    <div class="flex flex-wrap">
        <router-link class="flex flex-col my-2 hover:shadow-xl cursor-pointer p-5 w-4/12" v-for="book in props.result" :to="`/detail/${book.biblio_id}`">
            <div class="flex flex-row">
                <img class="w-[88px] h-[132px] rounded-lg shadow-lg cursor-pointer hover:shadow-2xl shadow-2xl" :title="book.title" loading="lazy" :src="`https://dlibrary.ittelkom-pwt.ac.id/lib/minigalnano/createthumb.php?filename=../../images/docs/${book.image}&width=250`" alt="Sample 1">
                <div class="flex flex-col ml-2">
                    <h4 class="text-lg font-bold text-gray-600 h-poppins">{{ book.title }}</h4>
                    <span class="text-sm">{{ book.author }}</span>
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

    const route = useRoute()

    const props = defineProps({
        result: Object,
        label: {
            type: String,
            default: 'Buku oleh'
        },
    })
</script>