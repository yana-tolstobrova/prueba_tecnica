<template>
  <q-page padding>
    <ContentWrapper>
      <div class="flex items-center justify-between" style="width: 60%; margin:0 auto 2em auto">
      <div class="flex items-center">
        <div class="col-md-2">
          <q-input class="q-mr-md" v-model="search_term" label="Buscar">
            <template v-slot:append>
              <q-icon name="search" />
            </template>
          </q-input>
        </div>
        <div class="col-md-2">
          <q-btn color="primary" label="Buscar" @click="searchDogs" />
        </div>
      </div>
        <div>
          <q-btn round color="positive" icon="add" to="/create"></q-btn>
        </div>
      </div>
      <div class="flex wrap justify-between">
        <template v-if="loading">
          <div class="flex justify-center" style="width: 100%">
            <q-spinner color="primary" size="3em" />
          </div>
        </template>
        <template v-else-if="dogs.length > 0">
          <DogCard
            v-for="dog in dogs"
            :key="dog.id"
            :photo="dog.photo"
            :breed="dog.breed"
            @click="navigateToDogDetails(dog.id)"
          />
        </template>
        <template v-else>
          <div class="flex justify-center" style="width: 100%">
            <p>No se encontraron perros :(</p>
          </div>
        </template>
      </div>
    </ContentWrapper>
  </q-page>
</template>

<script>
import ContentWrapper from 'src/components/ContentWrapper.vue'
import DogCard from 'src/components/DogCard.vue'
import axios from 'axios'
import { defineComponent, ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'

export default defineComponent({
  components: { DogCard, ContentWrapper },
  name: 'PageIndex',
  setup() {
    const router = useRouter()
    const dogs = ref([])
    const search_term = ref('')
    const loading = ref(false)

    const fetchDogs = () => {
      loading.value = true
      axios.get('http://localhost:8000/api/dogs')
        .then(response => {
          dogs.value = response.data
        })
        .catch(error => {
          console.error('Error fetching dogs:', error)
        })
        .finally(() => {
          loading.value = false
        })
    }

    const navigateToDogDetails = (id) => {
      router.push(`/dog/${id}`)
    }

    const searchDogs = () => {
      loading.value = true
      axios.get('http://localhost:8000/api/search', {
        params: {
          search_term: search_term.value
        }
      })
      .then(response => {
        dogs.value = response.data
      })
      .catch(error => {
        console.error('Error searching dogs:', error)
      })
      .finally(() => {
          loading.value = false
      })
    }

    onMounted(fetchDogs)

    return { dogs, search_term, fetchDogs, navigateToDogDetails, loading, searchDogs }
  }
})
</script>
