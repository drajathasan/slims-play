<template>
    <div class="flex flex-col">
        <strong>Ketersediaan</strong>
        <table class="w-full">
            <tr v-for="item in data.items">
                <td>{{ item.item_code }}</td>
                <td>{{ item.call_number }}</td>
                <td>{{ item.DueDate }}</td>
            </tr>
        </table>
        <dl class="flex flex-wrap">
            <template v-for="label in getLabel()">
                <dt class="w-2/6 my-1"><strong>{{ label.text }}</strong></dt>
                <dd class="w-4/6 my-1">{{ label.value }}</dd>
            </template>
        </dl>
    </div>
</template>

<script setup>
    import {onMounted, reactive} from 'vue'

    const props = defineProps({
        result: Object
    })

    const data = reactive({
        label: {
            'Judul Seri': 'series_title',
            'No. Panggil': 'call_number',
            'Penerbit': 'publisher',
            'Deskripsi Fisik': 'collation',
            'Bahasa': 'language',
            'ISBN/ISSN':'isbn_issn',
            'Klasifikasi':'classification',
            'Pernyataan Tanggungjawab': 'sor'
        },
        items: []
    })

    const getLabel = () => {
        let label = Object.keys(data.label)
        let value = Object.values(data.label)

        let detailLabel = []
        value.forEach((val,index) => {
            detailLabel.push({text: label[index], value:  props.result[val]})
        });

        return detailLabel
    }

    const getItems = async (id) => {
        try {
            let request = await ( await fetch(`?p=play&route=/book/items/${id}`)).json()
            data.items = request.data
        } catch (error) {
            console.log(error)
        }
    }

    onMounted(() => {
        getItems(props.result.biblio_id)
    })
</script>