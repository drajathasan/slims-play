<template>
    <div class="w-8/12 min-h-[20rem] my-3 flex flex-col">
        <strong class="text-xl leading-[1.5rem]">Buku Populer</strong>
        <small class="text-xs">Bacaan favorit banyak orang</small>
        <Splide v-if="data.popularList.length > 0" :options="data.splideOptions" class="my-5" aria-label="My Favorite Images">
            <SplideSlide v-for="img in data.popularList" class="flex flex-col items-center">
                <router-link :to="`/detail/${img.biblio_id}`" class="flex flex-col items-center mx-2">
                    <play-img class="w-[196px] xl:h-[200px] 2xl:h-[250px] 4xl:h-[306px] rounded-lg shadow-lg cursor-pointer hover:shadow-2xl" :title="img.title" :src="`${img.image}&width=250`"/>
                    <span class="text-sm text-center my-2">{{ img.title.substr(1,20) }}...</span>
                </router-link>
            </SplideSlide>
        </Splide>
        <div class="my-5" v-else>
            <h1 class="text-sm">Data tidak tersedia</h1>
        </div>
    </div>
</template>

<script setup>
    import { onMounted, reactive } from 'vue'
    import { Splide, SplideSlide } from '@splidejs/vue-splide'

    import PlayImg from './play-image.vue'

    const data = reactive({
        splideOptions: {
            perPage: 6,
            rewind : true,
            breakpoints: {
                640: {
                    perPage: 2,
                },
            }
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