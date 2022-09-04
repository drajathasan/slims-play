<template>
    <div class="w-8/12 min-h-[20rem] my-5 flex flex-col">
        <strong class="text-lg leading-[1.2rem]">Buku Populer</strong>
        <small class="text-xs">Bacaan favorit banyak orang</small>
        <Splide :options="data.splideOptions" class="my-5" aria-label="My Favorite Images">
            <SplideSlide v-for="img in data.popularList" class="flex flex-col items-center">
                <router-link :to="`/detail/${img.biblio_id}`" class="flex flex-col items-center">
                    <img class="w-[196px] h-[306px] rounded-lg shadow-lg cursor-pointer hover:shadow-2xl" :title="img.title" loading="lazy" :src="`https://dlibrary.ittelkom-pwt.ac.id/lib/minigalnano/createthumb.php?filename=../../images/docs/${img.image}&width=250`" alt="Sample 1">
                    <span class="text-xs text-center my-2">{{ img.title }}</span>
                </router-link>
            </SplideSlide>
        </Splide>
    </div>
</template>

<script setup>
    import { onMounted, reactive } from 'vue'
    import { Splide, SplideSlide } from '@splidejs/vue-splide'

    const data = reactive({
        splideOptions: {
            perPage: 6,
            rewind : true
        },
        popularList: {}
    })

    const getPopular = async () => {
        try {
            let result = await (await fetch('?p=play&route=/book/popular')).json();
            
            if (result.status)
            {
                data.popularList = result.data
            }

        } catch (error) {
            console.log(error)
        }
    }

    onMounted(() => {
        getPopular()
    })

</script>