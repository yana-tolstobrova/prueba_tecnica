<template>
  <div class="q-pa-md" style="max-width: 55%; margin: auto; background-color:#F4F4F4; padding: 2em 3em">

    <q-form
      @submit="onSubmit"
      @reset="onReset"
      class="q-gutter-md flex"
    >
    <div style="width: 45%">
        <q-input v-model="name" label="Your name"
            lazy-rules
            no-error-icon
            :rules="[ val => val && val.length > 0 || 'Please fill your name']">
            <template v-slot:before>
            <q-icon name="person" style="height: 3em"/>
            </template>
        </q-input>
        <q-input v-model="company" label="Company name"
            lazy-rules
            no-error-icon
            :rules="[ val => val && val.length > 0 || 'Please fill company name']">
            <template v-slot:before>
            <q-icon name="apartment"/>
            </template>
        </q-input>
        <q-input v-model="email" label="Email"
            lazy-rules
            no-error-icon
            type="email"
            :rules="[ val => val && val.length > 0 || 'We need a valid email']">
            <template v-slot:before>
            <q-icon name="email"/>
            </template>
        </q-input>
    </div>
    <div style="width:45%">
        <q-input
            v-model="text"
            type="textarea"
            label="Your message"
            lazy-rules
            no-error-icon
            :rules="[ val => val && val.length > 0 || '']"
        />
      <div><q-checkbox v-model="accept" label="I accept the Legal" /><a class="q-ml-xs" style="text-decoration: underline; color: blue">Conditions</a></div>
      <div class="q-pt-lg">
        <q-btn label="Send message" type="submit" style="background-color:#517091; color: white" rounded/>
        <p><a style="text-decoration: underline;">or post a job</a></p>
      </div>
    </div>
    </q-form>

  </div>
</template>

<script>
import { useQuasar } from 'quasar'
import { ref } from 'vue'

export default {
  setup () {
    const $q = useQuasar()

    const name = ref(null)
    const company = ref(null)
    const email = ref(null)
    const text = ref(null)
    const accept = ref(null)

    return {
      name,
      company,
      accept,
      email,
      text,

      onSubmit () {
        if (accept.value !== true) {
          $q.notify({
            color: 'red-5',
            textColor: 'white',
            message: 'You need to accept the license and terms first'
          })
        }
        else {
          $q.notify({
            color: 'green-4',
            textColor: 'white',
            icon: 'cloud_done',
            message: 'Submitted'
          })
        }
      },

      onReset () {
        name.value = null
        company.value = null
        email.value = null
        text.value = null
        accept.value = false
      }
    }
  }
}
</script>