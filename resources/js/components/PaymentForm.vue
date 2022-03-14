<template>
    <section>
        <div v-if="disableForm" class="padding">
            <div class="row">
                <div class="container-fluid d-flex justify-content-center">
                    <div class="col-sm-8 col-md-6">
                        <div class="card">
                            <div class="card-header">

                                <div class="row">

                                    <div class="col-md-6"> <span>Carta di Credito - di Debito</span> </div>
                                    

                                    <div class="col-md-6 text-right" style="margin-top: -5px;">

                                        <img src="https://img.icons8.com/color/36/000000/visa.png">
                                        <img src="https://img.icons8.com/color/36/000000/mastercard.png">
                                        <img src="https://img.icons8.com/color/36/000000/amex.png">
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">

                                <!-- card number -->
                                <div class="form-group">

                                    <label for="cc-number" class="control-label">Numero della carta</label>
                                    <input id="cc-number" type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="•••• •••• •••• ••••" required v-payment:formatCardNumber> 
                                </div>

                                <div class="row">

                                    <!-- date expire -->
                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label for="cc-exp" class="control-label">Scadenza</label>
                                            <input id="cc-exp" type="tel" class="input-lg form-control cc-exp" autocomplete="cc-exp" placeholder="•• / ••" required v-payment:formatCardExpiry v-model="dateExpire">
                                        </div>
                                    </div>

                                    <!-- CVC -->
                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label for="cc-cvc" class="control-label">CVC</label>
                                            <input id="cc-cvc" type="tel" class="input-lg form-control cc-cvc" autocomplete="off" placeholder="••••" required v-payment:formatCardCVC > 
                                        </div>
                                    </div>
                                </div>

                                <!-- doctor name -->
                                <div class="form-group mb-2">

                                    <label for="numeric" class="control-label">Proprietario della Carta</label>
                                    <input type="text" placeholder="Inserisci qui il tuo nome completo..." class="input-lg form-control" v-model="nameDoctor" pattern="[A-Za-z]">
                                </div>
                                <hr>

                                <div class="recup my-2 mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span class="recup-sub">Abbonamento <strong>{{paymentdata.type}}</strong> dalla durata di {{paymentdata.duration}} ore</span>
                                        <span class="price-sub">Prezzo: {{paymentdata.price}}€</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input value="Acquista" type="button" class="btn btn-success btn-lg form-control" style="font-size: .8rem;" @click="checkData">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="!disableForm" class="loader">

            <div v-if="success" class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="loader17">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
                <br/><br/>
            </div>

            <div v-if="!success" class="alert alert-success">
                Pagamento effettuato correttamente
            </div>
        </div>
    </section>
</template>

<script>
// import VueMoment from 'vue-moment';
import moment from 'moment';
import VueStripePayment from 'vue-stripe-payment';

// Vue.use(require('vue-moment'));
Vue.use(VueStripePayment);

    export default {
        name: 'PaymentForm',
        data() {
            return {
                dateExpire: '',
                nameDoctor: '',
                date: '',
                disableForm: true,
                success: true,
            }
        },
        props: {
            doctordata: Object,
            paymentdata: Object,
        },
        created() {
            this.GetDate();

        },
        methods: {

            GetDate() {
            const month = new Date();
            const year = new Date();
            this.date = `${month.getMonth()}-${year.getFullYear()}`;
            },


            

            checkData() {

                /* get a card date */
                let dateInFormat = this.dateExpire.trim();
                dateInFormat = dateInFormat.replace('0','')
                dateInFormat = dateInFormat.replace(/ /g,'')

                /* save month and year card */
                let cardMonth;
                let cardYear;

                if(dateInFormat.length == 4){

                    cardMonth = `${dateInFormat[0]}`

                    cardYear = `${dateInFormat[2]}${dateInFormat[3]}`

                }
                if (dateInFormat.length == 5){

                    cardMonth = `${dateInFormat[0]}${dateInFormat[1]}`

                    cardYear = `${dateInFormat[3]}${dateInFormat[4]}`

                }

                /* get current date */
                let month = new Date();
                let year = new Date();

                year = year.getFullYear().toString();

                year = `${year[2]}${year[3]}`

                /* chek validation card */
                let cardDate = new Date(cardYear, cardMonth);
                let today = new Date (year, month.getMonth()+1 );

                let today_month = today.getMonth();
                let card_month = cardDate.getMonth();

                let today_year = today.getYear();
                let card_year = cardDate.getYear();

                /* payment */
                if(card_year > today_year){

                    this.nameDoctor = this.nameDoctor.replace(/ /g,'')

                    var letters = /^[A-Za-z]+$/;

                    if(this.nameDoctor.match(letters)) {

                        this.disableForm = false;

                        setTimeout(() => {
                    
                            this.success = false;

                            setTimeout(() => {
                    
                                window.location.replace(`http://127.0.0.1:8000/admin/confirm/${this.doctordata.slug}/${this.paymentdata.type}`);
                            }, 3000);

                        }, 5000);

                        
                    } else {
                            alert('Il nome inserito non è valido')
                        }

                } else if(card_year = today_year){

                    /* payment */
                    if(card_month >= today_month){

                        this.nameDoctor = this.nameDoctor.replace(/ /g,'')

                        var letters = /^[A-Za-z]+$/;

                        if(this.nameDoctor.match(letters)) {

                            this.disableForm = false;

                            setTimeout(() => {
                        
                                this.success = false;

                                setTimeout(() => {
                        
                                    window.location.replace(`http://127.0.0.1:8000/admin/confirm/${this.doctordata.slug}/${this.paymentdata.type}`);
                                }, 3000);

                            }, 5000);

                            
                        } else {
                            alert('Il nome inserito non è valido.')
                        }

                    } else {

                        alert('La carta inserita è scaduta.')
                    }

                } else {

                    alert('La carta inserita è scaduta.')

                }

            }
        }
    }
</script>

<style scoped lang="scss">
.padding {
    padding: 5rem !important
}

.form-control:focus {
    box-shadow: 10px 0px 0px 0px #ffffff !important;
    border-color: #4ca746
}

.loader{
    min-height: 30vh;
    display: flex;
    justify-content: center;
    align-items: center;
}



.loader17{position:relative;width:65px;border:1px solid transparent;margin:40px auto}
.loader17 span{position:absolute;bottom:0;display:block;width:9px;height:5px;border-radius:5px;background:rgba(0,0,0,.1);-webkit-animation:preloader 2s infinite ease-in-out;animation:preloader 2s infinite ease-in-out}
.loader17 span:nth-child(2){left:11px;-webkit-animation-delay:.2s;animation-delay:.2s}
.loader17 span:nth-child(3){left:22px;-webkit-animation-delay:.4s;animation-delay:.4s}
.loader17 span:nth-child(4){left:33px;-webkit-animation-delay:.6s;animation-delay:.6s}
.loader17 span:nth-child(5){left:44px;-webkit-animation-delay:.8s;animation-delay:.8s}
.loader17 span:nth-child(6){left:55px;-webkit-animation-delay:1s;animation-delay:1s}
@-webkit-keyframes preloader{
	0%,100%,50%{height:5px;-webkit-transform:translateY(0);transform:translateY(0);background:rgba(0,0,0,.1)}
	25%{height:30px;-webkit-transform:translateY(15px);transform:translateY(15px);background:#2b71bd}
}
@keyframes preloader{
	0%,100%,50%{height:5px;-webkit-transform:translateY(0);transform:translateY(0);background:rgba(0,0,0,.1)}
	25%{height:30px;-webkit-transform:translateY(15px);transform:translateY(15px);background:#2b71bd}
}

.blue-title {
    color: #0071c3;
}

</style>