<template>
  <q-page padding>
    <div class="doc-container">
      <div class="padding">
        <div class="row">
          <div class="col-md-12">
            <h2>Clasificador de Perros</h2>
            <q-btn label="Añadir nuevo" class="text text-center" color="blue-10" />
            <div v-for="dog in dogs" :key="dog.id">
              <img :src="dog.photo" alt="Dog Photo" style="width: 100px; height: 100px; object-fit: cover;">
              <div>
                <p><strong>Breed:</strong> {{ dog.breed }}</p>
                <p><strong>Size:</strong> {{ dog.size }}</p>
                <p><strong>Color:</strong> {{ dog.color }}</p>
              </div>
              <q-btn label="Editar" color="blue-10" />
              <q-btn label="Eliminar" color="red-10" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </q-page>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      dogs: []
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
    }
  },
  created() {
    this.getDogs();
  }
};
</script>

<style>

</style>
