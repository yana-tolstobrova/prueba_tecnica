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

    const fetchDogs = () => {
      axios.get('http://localhost:8000/api/dogs')
        .then(response => {
          dogs.value = response.data
        })
        .catch(error => {
          console.error('Error fetching dogs:', error)
        })
    }

    const navigateToDogDetails = (id) => {
      router.push(`/dog/${id}`)
    }

    onMounted(fetchDogs)

    return { dogs, navigateToDogDetails }
  }
})
</script>

<template>
  <q-page padding>
    <ContentWrapper>
      <div class="flex items-center justify-between">
        <div>
          <q-btn round color="positive" icon="add" to="/create"></q-btn>
        </div>
      </div>
      <div class="flex wrap justify-between">
          <template v-if="dogs.length > 0">
          <DogCard
            v-for="dog in dogs"
            :key="dog.id"
            :photo="dog.photo"
            :breed="dog.breed"
            @click="navigateToDogDetails(dog.id)"
          />
        </template>
        <div v-else class="flex justify-center" style="width: 100%">
          <q-spinner
          color="primary"
          size="3em"
        />
        </div>
      </div>
    </ContentWrapper>
  </q-page>
</template>
