<template>

    <div>
        

        <b-modal id="payment-modal" size="lg" @show="onOpen()" hide-footer :header-bg-variant="headerBgVariant">
            <template #modal-header="{ close }">
                <div class="d-flex justify-content-between p-sm-3 w-100">
                    <h2>Procedi con il pagamento</h2>
                    <button type="button" class="btn-close ms_close-button" data-bs-dismiss="modal" aria-label="Close" @click="close()"></button>
                </div>
            </template>

            <template #default="{ cancel }">
                <!-- form pagamento -->
                <form class="p-sm-3" @submit.prevent="payWithCreditCard()" v-show="paymentSuccess == false && paymentError == false && showLoader == false">

                    <!-- carte valide di test
                    Visa: c
                    Mastercard: 5555 5555 5555 4444
                    Amex: 3714 496353 9843
                    CVV: uno qualsiasi
                    Data scadenza: entro i prossimi 180 anni -->

                    <div class="row row-cols-1 row-cols-sm-2">
                        <div class="col">
                            <!-- nome -->
                            <label for="name" class="ps-2"><i class="fa-solid fa-user color_primary"></i> Nome *</label>
                            <input v-model="name" type="text" id="name" class="form-control ms_form-control mb-3" placeholder="Inserisci il tuo nome" required maxlength="80">
                        </div>
                        <div class="col">
                            <!-- cognome -->
                            <label for="surname" class="ps-2"><i class="fa-solid fa-user color_primary"></i> Cognome *</label>
                            <input v-model="surname" type="text" id="surname" class="form-control ms_form-control mb-3" placeholder="Inserisci il tuo cognome" required maxlength="80">
                        </div>
                    </div>


                    <!-- email -->
                    <label for="email" class="ps-2"><i class="fa-solid fa-envelope color_primary"></i> Email *</label>
                    <input v-model="email" type="email" id="email" class="form-control ms_form-control mb-3" placeholder="Inserisci la tua email" required maxlength="100">

                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <!-- indirizzo -->
                            <label for="address" class="ps-2"><i class="fa-solid fa-location-dot color_primary"></i> Indirizzo *</label>
                            <input v-model="address" type="text" id="address" class="form-control ms_form-control mb-3" placeholder="Inserisci il tuo indirizzo" required maxlength="255">
                        </div>
                        <div class="col-12 col-lg-4">
                            <!-- telefono -->
                            <label for="phone" class="ps-2"><i class="fa-solid fa-phone color_primary"></i> Telefono *</label>
                            <input v-model="phone" type="tel" id="phone" class="form-control ms_form-control mb-3" placeholder="Inserisci il tuo numero di telefono" pattern="[0-9]{10,15}" minlength="10" maxlength="15" required>
                        </div>
                    </div>



                    <!-- commento -->
                    <label for="comment" class="form-label ps-2"><i class="fa-solid fa-comment-dots color_primary"></i> Commento</label>
                    <textarea v-model="comment" class="form-control ms_form-control mb-3" id="comment" rows="3" placeholder="Inserisci un commento"></textarea>

                    <!-- prezzo totale -->
                    <label for="total_price" class="ps-2 my-2">Prezzo totale: <strong>&euro;{{cartLogic.totalPrice}}</strong></label>

                    <hr>

                    <div class="text-center text-md-end mb-2 braintree_logo">
                        <strong class="me-2">Powered by</strong>
                        <img src="../../assets/images/braintree/braintree-logo-black.png" alt="braintree logo">
                    </div>

                    <!-- numero carta -->
                    <label class="ps-2 mt-3 mb-1"><i class="fa-solid fa-credit-card color_primary"></i> Numero carta di credito *</label>
                    <div id="creditCardNumber" class="form-control ms_form-control" required></div>
                    <div class="mt-2 ms-2 card_error" v-if="errorNumber">Numero carta non valido</div>

                    <div class="row row-cols-1 row-cols-sm-2">
                        <div class="col">
                            <!-- data scadenza -->
                            <label class="ps-2 mt-3 mb-1"><i class="fa-solid fa-calendar-day color_primary"></i> Data scadenza *</label>
                            <div id="expireDate" class="form-control ms_form-control"></div>
                            <div class="mt-2 ms-2 card_error" v-if="errorExpirationDate">Data scadenza non valida</div>
                        </div>
                        <div class="col">
                            <!-- cvv -->
                            <label class="ps-2 mt-3 mb-1"><i class="fa-solid fa-lock color_primary"></i> CVV *</label>
                            <div id="cvv" class="form-control ms_form-control"></div>
                            <div class="mt-2 ms-2 card_error" v-if="errorCvv">CVV non valido</div>
                        </div>
                    </div>

                    <div v-if="errorEmpty">Campi carta vuoti!</div>

                    <input id="nonce" name="payment_method_nonce" hidden>

                    <div class="text-end mt-4">
                        <b-button variant="btn btn_close" @click="cancel()">Chiudi</b-button>
                        <button type="submit" class="btn btn_submit ms-2">Conferma e paga</button>
                    </div>
                    
                </form>

                <!-- risposta pagamento -->
                <div v-show="paymentSuccess == true || paymentError == true || showLoader == true">
                    <p class="fs-4 p-sm-3" v-if="paymentSuccess">Pagamento avvenuto con successo. Riceverai una mail con il riepilogo dell'ordine!</p>
                    <p class="fs-4 p-sm-3 payment_error" v-if="paymentError">Pagamento fallito, riprovare più tardi.</p>
                    <div v-if="showLoader">
                        <!-- <Loader/> -->
                        <BicycleLoader class="mb-5"/>
                    </div>
                </div>
            </template>

        </b-modal>

        


    </div>

</template>

<script>
import cartLogic from "../../cartLogic";
import braintree from "braintree-web";
// import Loader from "../micro/Loader.vue";
import BicycleLoader from "../micro/BicycleLoader.vue";
export default {
    name:'Checkout',
    components:{
        // Loader,
        BicycleLoader,
    },
    data(){
        return{
            cartLogic,
            token:null,
            name:null,
            surname:null,
            email:null,
            address:null,
            phone:null,
            comment:null,
            hostedFieldInstance:null,
            nonce:null,
            errorEmpty:false,
            errorNumber:false,
            errorExpirationDate:false,
            errorCvv:false,
            paymentSuccess:false,
            paymentError:false,
            showLoader:false,
            headerBgVariant:"header_primary",
        }
    },
    methods:{

        onOpen() {
            this.headerBgVariant = 'header_primary';
            this.paymentSuccess=false;
            this.paymentError=false;
            this.showLoader = true;
            const axios = require('axios').default;
            axios.get('http://127.0.0.1:8000/api/orders-token')
                .then((response) => {
                    this.token = response.data;
                    this.braintreeInit();
                })
        },

        braintreeInit() {
            braintree.client.create({
            authorization: this.token,
        })
            .then(clientInstance => {

                let options = {
                    client: clientInstance,
                    styles:{
                        '::placeholder':{
                            'font-size':'.9rem'
                        }
                    },
                    fields: {
                        number: {
                            selector: '#creditCardNumber',
                            placeholder: 'Inserisci numero carta',
                        },
                        cvv: {
                            selector: '#cvv',
                            placeholder: 'Inserisci CVV'
                        },
                        expirationDate: {
                            selector: '#expireDate',
                            placeholder: '00 / 0000'
                        }
                    }
                }

                return braintree.hostedFields.create(options)
            })
            .then(hostedFieldInstance => {
                this.hostedFieldInstance = hostedFieldInstance;
                this.showLoader = false;
            })
            .catch(err => {
                console.log(err);
            });
        },

        payWithCreditCard() {

            this.hostedFieldInstance.tokenize()
                .then(payload => {
                    this.nonce = payload.nonce;
                    document.querySelector('#nonce').value = payload.nonce;
                    let form = document.querySelector('#payment-form');

                    this.sendOrder();
                    this.showLoader = true;

                    this.errorEmpty = false;
                    this.errorNumber = false;
                    this.errorExpirationDate = false;
                    this.errorCvv = false;

                    form.submit();
                })
                .catch(err => {

                    this.errorEmpty = false;
                    this.errorNumber = false;
                    this.errorExpirationDate = false;
                    this.errorCvv = false;

                    if(err.code =="HOSTED_FIELDS_FIELDS_INVALID"){
                        err.message = 'Card details are invalid.';
                        for (let i = 0; i < err.details.invalidFieldKeys.length; i++) {
                            if(err.details.invalidFieldKeys[i] == 'number') {
                                this.errorNumber = true;
                            } else if (err.details.invalidFieldKeys[i] == 'expirationDate') {
                                this.errorExpirationDate = true;
                            } else if (err.details.invalidFieldKeys[i] == 'cvv') {
                                this.errorCvv = true;
                            }
                        }
                    }

                    if(err.code =="HOSTED_FIELDS_FIELDS_EMPTY"){
                        err.message = 'The fields are empty. Please enter your payment information. ';
                        this.errorEmpty = true;
                    }

                })

            
        },

        sendOrder() {
            const axios = require('axios').default;
                axios.get('http://127.0.0.1:8000/api/orders-payment',{
                    params: {
                    token:this.token,
                    name:this.name,
                    surname:this.surname,
                    email:this.email,
                    address:this.address,
                    phone:this.phone,
                    comment:this.comment,
                    cart:this.cartLogic.cart,
                    restaurantId:this.cartLogic.restaurantId,
                    totalPrice:this.cartLogic.totalPrice,
                    nonce:this.nonce,
                    restaurantName:this.cartLogic.restaurantName
                    }
                })
            .then(() => {

                this.showLoader = false;
                this.paymentSuccess = true;
                this.name = '';
                this.surname = '';
                this.email = '';
                this.address = '';
                this.phone = '';
                this.comment = '';

                this.cartLogic.emptyCart();


            })
            .catch(() => {
                this.headerBgVariant = 'header_error';
                this.showLoader = false;
                this.paymentError = true;
            })
            
        }
    },


}
</script>

<style lang="scss">
@import "../../assets/style/_variables.scss";

.color_primary {
    color: $_primary;
}

.payment_error{
    color: $_tomato;
}

.bg-header_primary {
    color: #fff;
    background-color: $_primary;
}

.bg-header_error {
    color: #fff;
    background-color: $_tomato;
}

.ms_close-button {
    filter: invert(1);
    opacity: 1;
    transition: all .4s;
}

.ms_form-control {
    border: 1px solid $_primary;
    border-radius: .4rem;

    &::placeholder {
        font-size: .9rem;
    }

    &:focus {
        border-color: $_cherry;
        box-shadow: 0 0 0 0.15rem rgba(192, 29, 100, .50);
    }
}

.btn_submit {
    color: #fff;
    background-color: $_primary;
    border: 1px solid $_primary;
    transition: all .2s;

    &:hover {
        color: #fff;
        background-color: $_darkerPrimaryHover;
    }
}

.btn_close {
    color: #fff;
    background-color: $_darkGrey;
    border: 1px solid $_darkGrey;
    transition: all .2s;

    &:hover {
        color: #fff;
        background-color: $_black;
    }
}

hr {
    border: 1px solid $_cherry;
}

#creditCardNumber,
#expireDate,
#cvv {
    height: 40px;
}

.braintree-hosted-fields-focused {
    border-color: $_cherry;
    box-shadow: 0 0 0 0.15rem rgba(192, 29, 100, .50);
}

.braintree_logo {
    font-size: .75rem;

    img{
        width: 100px;
    }
}

.card_error {
    color: red;
}

</style>