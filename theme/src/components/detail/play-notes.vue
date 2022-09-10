<template>
    <section class="w-full flex lg:my-5 justify-center px-5 lg:px-0">
        <div class="lg:w-9/12 2xl-w-7/12 4xl:w-7/12 flex flex-col lg:pr-4">
            <div class="w-full flex flex-row items-center">
                <h3 class="text-lg font-bold h-poppins">Tentang Buku ini ini</h3>
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="cursor-pointer mx-5 hover:bg-gray-100 rounded-full p-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                </svg>
            </div>
            <div class="my-2">
                <p class="text-justify lg:pr-5">{{ result.notes }}</p>
            </div>
            <PlayBookListAuthor v-if="countAuthor(result.author) === 1" :result="result"/>
        </div>
    </section>
</template>

<script setup>
    import PlayBookListAuthor from './play-data-per-author.vue'

    const props = defineProps({
        result: Object
    })

    function countAuthor(authors)
    {
        return authors?.split(' - ').length
    }
</script>