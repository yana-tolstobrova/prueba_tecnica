<template>
  <q-page padding>
    <div class="doc-container">
      <div class="padding">
        <div class="row">
          <div class="col-md-12">
            <h2>Clasificador de Perros</h2>
            <q-btn label="Añadir nuevo" class="text text-center" color="blue-10" @click="showModal = true" />
            <div v-for="dog in dogs" :key="dog.id">
              <img :src="dog.photo" alt="Dog Photo" style="width: 100px; height: 100px; object-fit: cover;">
              <div>
                <p><strong>Breed:</strong> {{ dog.breed }}</p>
                <p><strong>Size:</strong> {{ dog.size }}</p>
                <p><strong>Color:</strong> {{ dog.color }}</p>
              </div>
              <q-btn label="Editar" color="blue-10" />
              <q-btn label="Eliminar" color="red-10" @click="deleteDog(dog)" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for adding a new dog -->
    <q-dialog v-model="showModal">
      <q-card>
        <q-card-section>
          <h4>Añadir Nuevo Perro</h4>
          <input type="file" accept="image/*" @change="handleFileUpload" />
          <q-input v-model="newDog.breed" label="Breed" />
          <q-input v-model="newDog.size" label="Size" />
          <q-input v-model="newDog.color" label="Color" />
        </q-card-section>
        <q-card-actions align="right">
          <q-btn label="Cancelar" color="negative" @click="showModal = false" />
          <q-btn label="Crear" color="primary" @click="createDog" />
        </q-card-actions>
      </q-card>
    </q-dialog>
  </q-page>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      dogs: [],
      showModal: false,
      newDog: {
        photo: null,
        breed: '',
        size: '',
        color: ''
      }
    };
  },
  methods: {
    getDogs() {
      axios.get('http://localhost:8000/api/dogs')
        .then(response => {
          this.dogs = response.data;
        })
        .catch(error => {
          console.error('Error fetching dogs:', error);
        });
    },
    handleFileUpload(event) {
      this.newDog.photo = event.target.files[0];
    },
    createDog() {
      let formData = new FormData();
      formData.append('photo', this.newDog.photo);
      formData.append('breed', this.newDog.breed);
      formData.append('size', this.newDog.size);
      formData.append('color', this.newDog.color);
      
      axios.post('http://localhost:8000/api/dogs', formData)
        .then(response => {
          const newDog = response.data.dog;
          this.dogs.push(newDog);
          this.showModal = false;
          this.newDog = {
            photo: null,
            breed: '',
            size: '',
            color: ''
          };
        })
        .catch(error => {
          console.error('Error creating dog:', error);
        });
    },
    deleteDog(dog) {
      axios.delete(`http://localhost:8000/api/dogs/${dog.id}`)
        .then(response => {
          this.dogs = this.dogs.filter(d => d.id !== dog.id);
        })
        .catch(error => {
          console.error('Error deleting dog:', error);
        });
    }
  },
  created() {
    this.getDogs();
  }
};
</script>

<style>

</style>
