<template>
  <q-page padding>
    <ContentWrapper>
      <form @submit.prevent="submit" style="width:50%; margin: 0 auto;">
        <q-card>
          <q-card-section>
            <p class="text-h5">Editar perro</p>
            <q-input v-model="dog.breed" label="Raza" />
            <div class="flex justify-between">
            <q-file color="grey-3" style="width: 48%; margin-top: 1em" outlined label-color="orange" v-model="dog.photo" @change="handleFileUpload" label="Seleccionar foto">
              <template v-slot:append>
                <q-icon name="attachment" color="orange" />
              </template>
            </q-file>
            <q-input v-model="dog.color" label="Color de pelo" style="width: 48%; margin-top: 1em"/>
            </div>
                <div class="q-gutter-md flex items-center q-pt-md">
                  <span style="font-size:1.2em; color: grey">Tamaño</span>
                  <q-radio v-model="dog.size" val="Pequeño" label="Pequeño" color="orange" />
                  <q-radio v-model="dog.size" val="Mediano" label="Mediano" color="orange" />
                  <q-radio v-model="dog.size" val="Grande" label="Grande" color="orange" />
                </div>
            <q-input v-model="dog.description" autogrow label="Descripción"/>
        </q-card-section>
        <q-card-actions align="right">
            <q-btn label="Cancelar" @click="cancelEdit" type="reset" class="q-ma-md"/>
            <q-btn label="Guardar" color="positive" type="submit" />
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
        color: '',
        description: ''
    })

    const fetchDog = () => {
      axios.get(`http://localhost:8000/api/dogs/${dogId.value}`)
        .then(response => {
            const fetchedDog = response.data['dog']
            dog.breed = fetchedDog.breed
            dog.size = fetchedDog.size
            dog.color = fetchedDog.color
            dog.photo = fetchedDog.photo
            dog.description = fetchedDog.description
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
        formData.append('description', dog.description)
        formData.append("_method", "put");

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
