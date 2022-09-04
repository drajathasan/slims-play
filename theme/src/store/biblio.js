import { defineStore } from 'pinia'

export const useTriggerId = defineStore('biblio', {
  state: () => {
    return { id: 0, ready: false, data: {} }
  },
  actions: {
      async getDetail(id) {
        try {
            this.ready = false
            let request = await (await fetch(`?p=play&route=/book/detail/${id}`)).json()

            if (request.status)
            {
                this.detail = request.result.Data;
                this.ready = true
            }
        } catch (error) {
            console.log(error)
        }
      }
  },
})