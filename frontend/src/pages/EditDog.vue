<template>
  <q-page padding>
    <ContentWrapper>
      <form  @submit.prevent="submit" style="width:50%; margin: 0 auto;">
        <q-card>
          <q-card-section>
            <h4>Editar perro</h4>
            <input type="file" accept="image/*" @change="handleFileUpload" />
            <q-input v-model="dog.breed" label="Breed" />
            <q-input v-model="dog.size" label="Size" />
            <q-input v-model="dog.color" label="Color" />
          </q-card-section>
          <q-card-actions align="right">
            <q-btn label="Cancelar" @click="cancelEdit" type="reset" />
            <q-btn label="Guardar" color="primary" type="submit" />
          </q-card-actions>
        </q-card>
      </form>
    </ContentWrapper>
  </q-page>
</template>

<script>
import ContentWrapper from 'src/components/ContentWrapper.vue'
import { defineComponent, reactive, ref, onMounted } from 'vue'
import axios from 'axios'
import { useRouter, useRoute } from 'vue-router'

export default defineComponent({
  components: { ContentWrapper },
  setup() {
    const router = useRouter()
    const route = useRoute()
    const dogId = ref(route.params.id)
    const dog = reactive({
      photo: '',
      breed: '',
      size: '',
      color: ''
    })

    const fetchDog = () => {
      axios.get(`http://localhost:8000/api/dogs/${dogId.value}`)
        .then(response => {
          const fetchedDog = response.data['dog']
          dog.breed = fetchedDog.breed
          dog.size = fetchedDog.size
          dog.color = fetchedDog.color
          dog.photo = fetchedDog.photo
          console.log(dog.photo)
        })
        .catch(error => {
          console.error('Error fetching dog:', error)
        })
    }

    const handleFileUpload = (event) => {
      dog.photo = event.target.files[0]
    }

    const submit = () => {
      const formData = new FormData()
      formData.append('photo', dog.photo)
      formData.append('breed', dog.breed)
      formData.append('size', dog.size)
      formData.append('color', dog.color)
      formData.append("_method", "put");
        console.log(dog.breed)
  axios.post(`http://localhost:8000/api/dogs/${dogId.value}`, formData)
     .then(response => {
          router.push('/')
        })
        .catch(error => {
          console.error('Error updating dog:', error)
        })
    }

    const cancelEdit = () => {
      router.back()
    }

    onMounted(fetchDog)

    return { dog, handleFileUpload, submit, cancelEdit }
  }
})
</script>
