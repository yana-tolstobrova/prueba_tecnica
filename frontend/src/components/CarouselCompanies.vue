<template>
  <div class="q-pa-xl">
      <q-carousel
        animated
        v-model="slide"
        infinite
        :autoplay="autoplay"
        arrows
        transition-prev="slide-right"
        transition-next="slide-left"
        style="background:transparent; height:160px"
        >
        <q-carousel-slide :name="1" class="column no-wrap">
        <div class="row fit justify-around items-center q-gutter-xs q-col-gutter no-wrap" style="height:80px">
            <q-img class="rounded-borders col-2" style="height: 75px" src="https://static.europelanguagejobs.com/contents/banners/top-companies-posting-foundever-portugal-610-9042.svg" />
            <q-img class="rounded-borders col-2" style="height: 75px" src="https://static.europelanguagejobs.com/contents/banners/logo-ttec-611-874.svg" />
            <q-img class="rounded-borders col-2" style="height: 75px" src="https://static.europelanguagejobs.com/contents/banners/logo-agoda-607-4993.svg"/>
        </div>
      </q-carousel-slide>
        <q-carousel-slide :name="2" class="column no-wrap">
        <div class="row fit justify-around items-center q-gutter-xs q-col-gutter no-wrap" style="height: 80px">
            <q-img class="rounded-borders col-2" style="height: 75px" src="https://static.europelanguagejobs.com/contents/banners/airproducts-logo-612.svg"/>
            <q-img class="rounded-borders col-2" style="height: 75px" src="https://static.europelanguagejobs.com/contents/banners/logo-top-company-apple-609-1600.svg" />
        </div>
      </q-carousel-slide>
      </q-carousel>
</div>
</template>

<script>
import { ref } from 'vue'

export default {
  setup () {
    return {
      slide: ref(1),
      autoplay: ref(true)
    }
  }
}
</script>