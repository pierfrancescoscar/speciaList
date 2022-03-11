<template>
  <section class="container p-0">

      <div class="row white_bg">

          <div class="col-12 p-4 contact-doctor-col">
              <!-- Sent Successfully Message Alert -->
              <div v-show="success" class="alert alert-success">
                  Messaggio inviato correttamente.
              </div>

              <form @submit.prevent="contactDoctor">
                <h3 class="mb-4 card_doctor_title">Contatta lo speciaLista</h3>
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
                      <input placeholder="Inserisci qui la tua mail..." type="email" class="form-control" id="email" v-model="email" required>
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
                  <button type="submit" class="btn btn_details">Invia</button>
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
    props: {
        doctorMessages: Object,
    },
    created() {
        this.getDate();
    },
    methods: {
        contactDoctor() {
            // console.log('Send');
            axios.post('http://127.0.0.1:8000/api/contactdoctor', {

                doctor_id: this.doctorMessages.id,
                name: this.name,
                surname: this.surname,
                email: this.email,
                object: this.object,
                content: this.message,
                date: this.date,
                slug: this.doctorMessages.slug,

            })
            .then(res => {
                console.log(res.data);
                if(res.data.errors) {
                    this.errors = res.data.errors;
                    this.success = false;
                } else {
                    this.name = '';
                    this.email = '';
                    this.object = '';
                    this.message = '';

                    // Feedback
                    this.errors = {};
                    this.success = true;
                    this.name = '';
                    this.surname = '';
                    this.email = '';
                    this.content = '';
                    this.content = '';
                }
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
.contact-doctor-col {
  box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
}

.card_doctor_title {
    background-color: #0071c3;
    color: white;
    margin-bottom: 0;
    font-size: 18px;
    line-height: 3;
    border-radius: 1rem;
    font-size: 18px;
    text-align: center;
    padding:1rem;
}

.white_bg {
    background-color: white;
    color: #0071c3;
}

.btn_details {
        background-color: #0071c3;
        color: white;

    &:hover {
        background-color: #0072c3de;
        color: white;
    }
}
</style>