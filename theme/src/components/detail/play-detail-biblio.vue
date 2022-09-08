<template>
    <div class="flex flex-col">
        <dl class="flex flex-wrap">
            <template v-for="label in getLabel()">
                <dt class="w-2/6 my-1"><strong>{{ label.text }}</strong></dt>
                <dd class="w-4/6 my-1">{{ label.value }}</dd>
            </template>
        </dl>
    </div>
</template>

<script setup>
    import {onMounted} from 'vue'

    const props = defineProps({
        result: Object
    })

    const data = {
        label: {
            'Judul Seri': 'series_title',
            'No. Panggil': 'call_number',
            'Penerbit': 'publisher',
            'Deskripsi Fisik': 'collation',
            'Bahasa': 'language',
            'ISBN/ISSN':'isbn_issn',
            'Klasifikasi':'classification',
            'Pernyataan Tanggungjawab': 'sor'
        }
    }

    const getLabel = () => {
        let label = Object.keys(data.label)
        let value = Object.values(data.label)

        let detailLabel = []
        value.forEach((val,index) => {
            detailLabel.push({text: label[index], value:  props.result[val]})
        });

        return detailLabel
    }

    onMounted(() => {
        console.log(props.result)
    })
</script>