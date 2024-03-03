<template>
  <q-card
    flat
    bordered
    class=" cursor-pointer"
    style="width: 15em; height: 16em; margin: 10px; overflow: hidden;"
    @click="$emit('click', $event)"
  >
    <q-card-section class="" style="padding: 0px">
        <img :src=photo alt="Dog Photo" style="width: 100%; height:13em; object-fit: cover;">
      <div class="text-h5 q-mt-sm q-mb-xs">{{ breed }}</div>
    </q-card-section>
  </q-card>
</template>

<script>
export default {
  props: {
    photo: String,
    breed: String,
    size: String,
    color: String
  }
}
</script>