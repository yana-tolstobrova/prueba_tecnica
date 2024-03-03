<template>
  <q-page padding>
    <ContentWrapper>
      <form @submit.prevent="submit" style="width:50%; margin: 0 auto;">
        <q-card>
          <q-card-section>
            <h4>Crear nuevo perro</h4>
            <input type="file" accept="image/*" @change="handleFileUpload" />
            <q-input v-model="dog.breed" label="Breed" />
            <q-input v-model="dog.size" label="Size" />
            <q-input v-model="dog.color" label="Color" />
          </q-card-section>
          <q-card-actions align="right">
            <q-btn label="Cancelar" to="/" type="reset" />
            <q-btn label="Crear" color="positive" type="submit" />
          </q-card-actions>
        </q-card>
      </form>
    </ContentWrapper>
  </q-page>
</template>

<script>
import ContentWrapper from 'src/components/ContentWrapper.vue'
import { defineComponent, reactive } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default defineComponent({
  components: { ContentWrapper },
  name: 'PageNew',
  setup() {
    const router = useRouter()

    const dog = reactive({
      photo: '',
      breed: '',
      size: '',
      color: ''
    })

    const handleFileUpload = (event) => {
      dog.photo = event.target.files[0]
    }

    const submit = () => {
      const formData = new FormData()
      formData.append('photo', dog.photo)
      formData.append('breed', dog.breed)
      formData.append('size', dog.size)
      formData.append('color', dog.color)

      axios.post('http://localhost:8000/api/dogs', formData)
        .then(response => {
          router.push('/')
        })
        .catch(error => {
          console.error('Error creating dog:', error)
        })
    }

    return { dog, handleFileUpload, submit }
  }
})
</script>
