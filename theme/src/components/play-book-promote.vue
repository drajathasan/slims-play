<template>
    <div class="w-8/12 min-h-[20rem] my-3 flex flex-col">
        <strong class="text-xl leading-[1.5rem]">Buku Yg dipromosikan</strong>
        <small class="text-xs">Daftar buku rekomendasi</small>
        <Splide v-if="data.promote.length > 0" :options="data.splideOptions" class="my-5" aria-label="My Favorite Images">
            <SplideSlide v-for="img in data.promote" class="flex flex-col items-center">
                <router-link :to="`/detail/${img.Data.biblio_id}`" class="flex flex-col items-center mx-2">
                    <img class="w-[196px] xl:h-[200px] 2xl:h-[250px] 4xl:h-[306px] rounded-lg shadow-lg cursor-pointer hover:shadow-2xl" :title="img.Data.title" loading="lazy" :src="`https://dlibrary.ittelkom-pwt.ac.id/lib/minigalnano/createthumb.php?filename=../../images/docs/${img.Data.image}&width=250`" alt="Sample 1">
                    <span class="text-sm text-center my-2">{{ img.Data.title }}</span>
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

    const data = reactive({
        splideOptions: {
            perPage: 6,
            rewind : true
        },
        promote: {}
    })

    const getPromote = async () => {
        try {
            let result = await (await fetch('?p=play&route=/book/promote')).json();
            
            if (result.status)
            {
                data.promote = result.data
            }

        } catch (error) {
            console.log(error)
        }
    }

    onMounted(() => {
        getPromote()
    })

</script>