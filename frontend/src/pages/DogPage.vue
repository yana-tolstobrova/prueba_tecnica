<template>
  <q-page padding style="width: 80%; margin: 0 auto;">
    <ContentWrapper>
        <div v-if="dog">
            <div class="flex justify-between items-start">
                <img :src="dog.photo" alt="Dog Photo" style="width: 25em; height: 25em; object-fit: cover; margin-top:3em">
                <div style="width: 45%; margin-top: 3em; padding-left: 1em">
                    <p class="text-h4">{{ dog.breed }}</p>
                    <p><strong>Tamaño:</strong> {{ dog.size }}</p>
                    <p><strong>Color:</strong> {{ dog.color }}</p>
                    <p style="word-wrap: break-word;"><strong>Descripción:</strong> {{ dog.description }}</p>
                </div>
                <div>
                    <q-btn round color="primary" icon="edit" @click="navigateToEdit" class="q-mr-md"></q-btn>
                    <q-btn round color="negative" icon="delete" @click="deleteDog"></q-btn>
                </div>
            </div>
        </div>
            <div v-else class="flex justify-center" style="width: 100%">
                <q-spinner
                color="primary"
                size="3em"
                />
            </div>
    </ContentWrapper>
  </q-page>
</template>

<script>
import ContentWrapper from 'src/components/ContentWrapper.vue'
import axios from 'axios'
import { defineComponent, ref, onMounted } from 'vue'
import { useRouter, useRoute } from 'vue-router'

export default defineComponent({
  components: { ContentWrapper },
  setup() {
    const router = useRouter()
    const route = useRoute()
    const dogId = ref(route.params.id)
    const dog = ref(null)

    const fetchDog = () => {
      axios.get(`http://localhost:8000/api/dogs/${dogId.value}`)
        .then(response => {
          dog.value = response.data['dog']
        })
        .catch(error => {
          console.error('Error fetching dog:', error)
        })
    }

    const navigateToEdit = () => {
        if (dog.value) {
            router.push(`/edit/${dog.value.id}`) 
        }
    }

    const deleteDog = () => {
      axios.delete(`http://localhost:8000/api/dogs/${dogId.value}`)
        .then(response => {
          router.back()
        })
        .catch(error => {
          console.error('Error deleting dog:', error);
        });
    }

    onMounted(fetchDog)

    return { dog, navigateToEdit, deleteDog }
  }
})
</script>
