<template>
    <h3 class="text-lg font-bold h-poppins my-2">Buku lain</h3>
    <div class="flex flex-row">
        <img class="w-[88px] h-[132px] rounded-lg shadow-lg cursor-pointer hover:shadow-2xl shadow-2xl" :title="result.title" loading="lazy" :src="`https://dlibrary.ittelkom-pwt.ac.id/lib/minigalnano/createthumb.php?filename=../../images/docs/${result.image}&width=250`" alt="Sample 1">
        <div class="flex flex-col ml-2">
            <h4 class="font-bold text-gray-600">{{ result.title }}</h4>
            <span class="text-md">{{ result.author }}</span>
            <small>{{ result.gmd }}</small>
        </div>
    </div>
</template>

<script setup>
    const props = defineProps({
        result: Object
    })
</script>