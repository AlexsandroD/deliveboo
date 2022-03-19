<template>

    <form @submit.prevent="payWithCreditCard()">
        <!-- nome -->
        <label for="name" class="text-gold">Nome *</label>
        <input v-model="name" type="text" id="name" class="form-control" placeholder="Inserisci il tuo nome" required maxlength="80">

        <!-- cognome -->
        <label for="surname" class="text-gold">Cognome *</label>
        <input v-model="surname" type="text" id="surname" class="form-control" placeholder="Inserisci il tuo cognome" required maxlength="80">

        <!-- email -->
        <label for="email" class="text-gold">Email *</label>
        <input v-model="email" type="email" id="email" class="form-control" placeholder="Inserisci la tua email" required maxlength="100">

        <!-- indirizzo -->
        <label for="address" class="text-gold">Indirizzo *</label>
        <input v-model="address" type="text" id="address" class="form-control" placeholder="Inserisci il tuo indirizzo" required maxlength="255">

        <!-- telefono -->
        <label for="phone" class="text-gold">Telefono *</label>
        <input v-model="phone" type="tel" id="phone" class="form-control" placeholder="Inserisci il tuo numero di telefono" pattern="[0-9]{10,15}" minlength="10" maxlength="15" required>

        <!-- commento -->
        <label for="comment" class="form-label">Commento</label>
        <textarea v-model="comment" class="form-control" id="comment" rows="3" placeholder="Inserisci un commento"></textarea>

        <!-- prezzo totale -->
        <label for="total_price" class="text-gold my-2">Prezzo totale: &euro;{{cartLogic.totalPrice}}</label>

        <hr>

        <!-- numero carta -->
        <label class="text-gold col-12 p-0">Numero carta di credito *</label>
        <div id="creditCardNumber" class="form-control" required></div>
        <div v-if="errorNumber">Numero carta non valido</div>

        <div class="row my-2">
            <div class="col-6">
                <!-- data scadenza -->
                <label class="text-gold">Data scadenza *</label>
                <div id="expireDate" class="form-control"></div>
                <div v-if="errorExpirationDate">Data scadenza non valida</div>
            </div>
            <div class="col-6">
                <!-- cvv -->
                <label class="text-gold">CVV *</label>
                <div id="cvv" class="form-control"></div>
                <div v-if="errorCvv">CVV non valido</div>
            </div>
        </div>

        <div v-if="errorEmpty">Campi carta vuoti!</div>

        <input id="nonce" name="payment_method_nonce" hidden>
        <button type="submit" class="btn-gold btn-block mt-4">Confirm and Pay</button>
    </form>

</template>

<script>
import cartLogic from "../../cartLogic";
import braintree from "braintree-web";
export default {
    name:'Checkout',
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
        }
    },

    created(){
        const axios = require('axios').default;
        axios.get('http://127.0.0.1:8000/api/orders-token')
            .then((response) => {
                this.token = response.data;
                this.braintreeInit();
             })
    },

    methods:{
        braintreeInit() {
            braintree.client.create({
            authorization: this.token,
        })
            .then(clientInstance => {

                let options = {
                    client: clientInstance,
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
                    form.submit();

                    this.errorEmpty = false;
                    this.errorNumber = false;
                    this.errorExpirationDate = false;
                    this.errorCvv = false;

                    this.sendOrder();
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
                    }
                })
            .then((response) => {
                console.log(response);

                // controllo se risposta postiviva o negativa
                // se positiva messaggio ordine avvenuto con successo
                // se negativa messaggio di errore

            })
            
        }
    },


}
</script>

<style lang="scss" scoped>

</style>