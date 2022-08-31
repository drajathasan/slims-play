<template>
    <div class="w-8/12 min-h-[20rem] my-5 flex flex-col">
        <strong class="text-lg leading-[1.2rem]">Buku Populer</strong>
        <small class="text-xs">Bacaan favorit banyak orang</small>
        <Splide :options="data.splideOptions" class="my-5" aria-label="My Favorite Images">
            <SplideSlide v-for="img in 10" class="flex flex-col items-center">
                <img class="w-[196px] h-[306px] rounded-lg shadow-lg cursor-pointer hover:shadow-2xl" src="http://localhost/s9x/lib/minigalnano/createthumb.php?filename=images%2Fdocs%2Finformation_arch.jpg&width=196" alt="Sample 1">
            </SplideSlide>
        </Splide>
    </div>
</template>

<script setup>
    import { Splide, SplideSlide } from '@splidejs/vue-splide'

    const data = {
        splideOptions: {
            perPage: 6,
            rewind : true
        }
    }

</script>