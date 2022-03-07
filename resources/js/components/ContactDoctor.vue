<template>
  <section class="container">
      <h3 class="mb-5">Contattaci</h3>

      <div class="row">
          <div class="col-6">
              <h4>speciaList</h4>
              <div>Via del tutto Eccezionale, 99</div>
              <div>hello@specialist.it</div>
          </div>

          <div class="col-6">
              <!-- Sent Successfully Message Alert -->
              <div v-show="success" class="alert alert-success">
                  Messaggio inviato correttamente.
              </div>

              <h2 class="mb-4">Contattaci</h2>

              <form @submit.prevent="contactDoctor">
                <!-- Send Name -->
                  <div class="mb-3">
                      <label for="name" class="form-label">Nome*</label>
                      <input placeholder="Inserisci qui il tuo nome completo..." type="text" class="form-control" id="name" v-model="name">
                      <!-- Check Errors Name -->
                      <div
                            v-for="(error, index) in errors.name"
                            :key="`err-name-${index}`"
                            class="text-danger"
                      >
                        {{ error }}
                      </div>
                  </div>
                <!-- Send Surname -->
                  <div class="mb-3">
                      <label for="surname" class="form-label">Cognome*</label>
                      <input placeholder="Inserisci qui il tuo cognome completo..." type="text" class="form-control" id="surname" v-model="surname">
                      <!-- Check Errors Surname -->
                      <div
                            v-for="(error, index) in errors.surname"
                            :key="`err-surname-${index}`"
                            class="text-danger"
                      >
                        {{ error }}
                      </div>
                  </div>
                <!-- Send Email -->
                  <div class="mb-3">
                      <label for="email" class="form-label">Email*</label>
                      <input placeholder="Inserisci qui la tua mail..." type="text" class="form-control" id="email" v-model="email" required>
                      <!-- Check Errors Email -->
                      <div
                            v-for="(error, index) in errors.email"
                            :key="`err-email-${index}`"
                            class="text-danger"
                      >
                        {{ error }}
                      </div>
                  </div>
                  <!-- Send Object -->
                  <div class="mb-3">
                      <label for="object" class="form-label">Oggetto*</label>
                      <input placeholder="Inserisci qui il tuo oggetto..." type="text" class="form-control" id="object" v-model="object" required>
                      <!-- Check Errors Object -->
                      <div
                            v-for="(error, index) in errors.object"
                            :key="`err-object-${index}`"
                            class="text-danger"
                      >
                        {{ error }}
                      </div>
                  </div>
                <!-- Send Message Text -->
                  <div class="mb-3">
                      <label for="message" class="form-label">Messaggio*</label>
                      <textarea placeholder="Inserisci qui il tuo messaggio..." type="text" class="form-control" id="message" v-model="message" rows="6" required></textarea>
                      <!-- Check Errors Messages -->
                      <div
                            v-for="(error, index) in errors.message"
                            :key="`err-message-${index}`"
                            class="text-danger"
                      >
                        {{ error }}
                      </div>
                  </div>
                  <!-- Submit Button -->
                  <button type="submit" class="btn btn-primary">Invia</button>
              </form>

          </div>
      </div>
  </section>
</template>

<script>
import axios from 'axios';

export default {
    name: 'ContactDoctor',
    data() {
        return {
            name: '',
            surname: '',
            email: '',
            object: '',
            message: '',
            errors: {},
            success: false,
            date: '',
        }
    },
    created() {
        this.getDate();
    },
    methods: {
        contactDoctor() {
            // console.log('Send');
            axios.post('http://127.0.0.1:8000/api/contactdoctor', {
                name: this.name,
                surname: this.surname,
                email: this.email,
                object: this.object,
                content: this.message,
                date: this.date,
                slug: `message-${this.name}-${this.surname}`,

            })
            .then(res => {
                console.log(res.data);
                // if(res.data.errors) {
                //     this.errors = res.data.errors;
                //     this.success = false;
                // } else {
                //     this.name = '';
                //     this.email = '';
                //     this.object = '';
                //     this.message = '';

                //     // Feedback
                //     this.errors = {};
                //     this.success = true;
                // }
            })
            .catch(err => console.log(err));
        },
        getDate() {
            const day = new Date();
            const month = new Date();
            const year = new Date();
            this.date = `${day.getDate()}/${month.getMonth()}/${year.getFullYear()}`;
        }
    }


}
</script>

<style scoped lang="scss">

</style>