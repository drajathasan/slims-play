<template>
    <div class="flex flex-col">
        <strong>Ketersediaan</strong>
        <table class="w-full">
            <tr v-for="item in data.items">
                <td class="p-2">{{ item.item_code }}</td>
                <td class="p-2">{{ item.call_number }}</td>
                <td  class="p-2" v-html="setItemStatus(item.DueDate, item.item_status_name)"></td>
            </tr>
        </table>
        <dl class="flex flex-wrap">
            <template v-for="label in getLabel()">
                <dt class="w-2/6 my-1 mr-2 lg:mr-0"><strong>{{ label.text }}</strong></dt>
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

    const setItemStatus = (originalStatus, anotherStatus) => {
        if (anotherStatus !== null) return `<strong class="px-2 py-1 bg-yellow-500 text-gray-800 rounded-lg text-sm">${anotherStatus}</strong>`
        if (originalStatus === 'Tersedia') return originalStatus
        return `<strong class="px-2 py-1 bg-red-500 text-white rounded-lg text-sm">Sedang dipinjam dan jatuh tempo pada ${originalStatus}</strong>`
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