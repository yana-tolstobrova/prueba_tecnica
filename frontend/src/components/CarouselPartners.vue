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
        style="background:transparent; height:120px"
        >
        <q-carousel-slide :name="1" class="column no-wrap">
        <div class="row fit justify-around items-center q-gutter-xs q-col-gutter no-wrap" style="height:80px">
            <q-img class="col-2" src="https://www.europelanguagejobs.com/statics/images/broadbean.svg" />
            <q-img class="col-2" src="https://www.europelanguagejobs.com/statics/images/hrlink.svg" />
            <q-img class="col-3" src="https://www.europelanguagejobs.com/statics/images/logicmelon.svg"/>
        </div>
      </q-carousel-slide>
        <q-carousel-slide :name="2" class="column no-wrap">
        <div class="row fit justify-around items-center q-gutter-xs q-col-gutter no-wrap" style="height:80px">
            <q-img class="col-2" src="https://www.europelanguagejobs.com/statics/images/equest.png" />
            <q-img class="col-2" src="https://www.europelanguagejobs.com/statics/images/recruitly.png" />
            <q-img class="col-2" src="https://www.europelanguagejobs.com/statics/images/lever.png"/>
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