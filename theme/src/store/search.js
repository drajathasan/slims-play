import { defineStore } from 'pinia'

export const useSearch = defineStore('search', {
  state: () => {
    return { ready: false, keywords: '', result: {}}
  },
  actions: {
      async searchData() {
        try {
            this.ready = false
            let request = await (await fetch(`?p=play&route=/book/search&keywords=${this.keywords}`)).json()

            if (request.status)
            {
                this.result = request.data;
                this.ready = true
            }
        } catch (error) {
            console.log(error)
        }
      }
  },
})