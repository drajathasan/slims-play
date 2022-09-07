import { defineStore } from 'pinia'

export const useModal = defineStore('modal', {
  state: () => {
    return { 
        ready: false,
        button: false,
        data: {
            title: '',
            buttonAttribute: []
        } 
    }
  },
  actions: {
      open(optionalAttributes)
      {
        this.setAttribute(optionalAttributes)
          this.ready = true
      },
      close()
      {
        this.ready = false
      },
      reset()
      {
        this.ready = false
        this.data.title = ''
      },
      setAttribute(attribute)
      {
        let attributeValues = Object.values(attribute)
        Object.keys(attribute)?.forEach((attr, index) => {
          this.data[attr] = attributeValues[index]
        })
      }
  },
})