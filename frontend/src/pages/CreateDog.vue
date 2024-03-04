<template>
  <q-page padding>
    <ContentWrapper>
      <form @submit.prevent="submit" style="width:50%; margin: 0 auto;">
        <q-card>
          <q-card-section>
            <p class="text-h5">Crear nuevo perro</p>
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
      color: '',
      description: ''
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
      formData.append('description', dog.description)

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
