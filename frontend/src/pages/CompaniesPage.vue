<template>
    <section>
        <div class="full-height full-width" style="background-image: 
        linear-gradient(rgba(60, 147, 202, 0.9), rgba(60, 147, 202, 0.7)),
        url('https://res.cloudinary.com/dck5v63wz/image/upload/v1709529865/handshake_vivs7i.jpg'); height: 100vh !important; background-position: center; 
        background-size: cover; background-position: 25% 75%;"
        >
        <div class="flex justify-between" style="padding: 2em 5em;">
            <div style="width:45%">
                <h5 style="color: white; font-weight:300">Find the perfect employee in our database of more than 25,000 new multilingual candidates each month.</h5>
                <q-btn class="q-px-xl text-weight-medium" elevated size="18px" rounded color="white" text-color="#0C3866" label="Post a job" />
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
        <div class="q-pa-md text-center col-12" style="color: #0C3866">
            <h5>ELJ's <strong>hiring solutions</strong></h5>
            <div class="flex justify-center col-12" style="gap: 75px">
            <div class="col-3 justify-center">
                <img src="https://www.europelanguagejobs.com/statics/images/job-posting.svg" />
                <p class="text-h6"><strong>JOB POSTING</strong></p>
            </div>       
            <div class="col-3 wrap">
                <img src="https://www.europelanguagejobs.com/statics/images/cv-search.svg" />
                <p class="text-h6"><strong>CV SEARCH</strong></p>
            </div>       
            <div class="col-3">
                <img src="https://www.europelanguagejobs.com/statics/images/exposure-features.svg" />
                <p class="text-h6" style="line-height:1em"><strong>WEBSITE <br> VISIBILITY</strong></p>
            </div>        
            <div class="col-3">
                <img src="https://www.europelanguagejobs.com/statics/images/outreach-features.svg" />
                <p class="text-h6" style="line-height:1em"><strong>OUTREACH <br> FEATURES</strong></p>
            </div>
            </div>
        </div>
        <div class="flex items-center justify-center" style="background-color:#007CC0; padding: 3em;  gap: 1em">
            <span class="text-h5 q-mr-md" style="color: white">Find more about our basic and personalized hiring solutions</span>
            <q-btn class="q-px-xl text-weight-bold" elevated size="16px" rounded color="white" text-color="#0C3866" label="Learn more" />
        </div>
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