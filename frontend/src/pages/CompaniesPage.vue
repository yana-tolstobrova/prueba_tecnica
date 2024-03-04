<template>
    <section>
        <div class="full-height full-width" style="background-image: 
        linear-gradient(rgba(60, 147, 202, 0.9), rgba(60, 147, 202, 0.7)),
        url('https://res.cloudinary.com/dck5v63wz/image/upload/v1709529865/handshake_vivs7i.jpg'); height: 100vh !important; background-position: center; 
        background-size: cover; background-position: 25% 75%;"
        >
        <div class="flex justify-between" style="padding: 2em 5em">
            <div style="width:45%">
                <h5 style="color: white; font-weight:300">Find the perfect employee in our database of more than 25,000 new multilingual candidates each month.</h5>
                <q-btn class="q-px-xl" unelevated size="18px" rounded color="white" text-color="#0C3866" label="Post a job" />
            </div>
            <div style="width:50%; padding-top:2.1em">
            <q-list >
                <q-item class="flex items-center" style="height:90px; padding:0">
                    <q-item-section avatar style="height:90px; padding:0">
                        <q-avatar text-color="white" size="130px" icon="people"/>
                    </q-item-section>
                    <q-item-section style="color:white; font-size: 1.7em">
                        <strong>+2,500</strong>
                        <p style="font-weight: 300; font-size: 0.7em">companies posting in more than 48 countries</p>
                    </q-item-section>
                </q-item>

            <q-item class="flex items-center" style="height:90px; padding:0">
                <q-item-section avatar style="height:90px; padding:0">
                <q-avatar text-color="white" size="130px" icon="alarm" />
                </q-item-section>

                <q-item-section style="color:white; font-size: 1.7em">
                <strong>Post with ease</strong>
                <p style="font-weight: 300; font-size: 0.7em">Publish a job advert in just 2 minutes</p>
                </q-item-section>
            </q-item>

                <q-item class="flex items-center" style="height:90px; padding:0">
                <q-item-section avatar style="height:90px; padding:0">
                <q-avatar text-color="white" size="130px" icon="assignment" />
                </q-item-section>

                <q-item-section style="color:white; font-size: 1.7em">
                <strong>Post with ease</strong>
                <p style="font-weight: 300; font-size: 0.8em">Publish a job advert in just 2 minutes</p>
                </q-item-section>
            </q-item>
            </q-list>
            </div>
        </div>
        <CarouselCompanies />
      </div>
      </section>
</template>

<script>
import CarouselCompanies from 'src/components/CarouselCompanies.vue';
export default {
    components: {
        CarouselCompanies
    }
}
</script>