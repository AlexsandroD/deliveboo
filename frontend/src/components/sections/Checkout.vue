<template>
    <form @submit.prevent="sendOrder" >

        <div class="mb-3">
            <label for="name" class="form-label">Nome *</label>
            <input v-model="name" type="text" class="form-control" id="name" required maxlength="80">
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Cognome *</label>
            <input v-model="surname" type="text" class="form-control" id="surname" required aria-required="true" maxlength="80">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email *</label>
            <input v-model="email" type="email" class="form-control" id="email"  required aria-required="true" maxlength="100">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Indirizzo *</label>
            <input v-model="address" type="text" class="form-control" id="address" required aria-required="true" maxlength="255" >
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Telefono *</label> 
            <input v-model="phone" type="tel" class="form-control" id="phone" required aria-required="true"  pattern="[0-9]{10-15}" maxlength="15" >
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Commento</label>
            <textarea v-model="comment" class="form-control" id="comment" rows="3"  maxlength="150" aria-required="true"></textarea>
        </div>

        <hr />
        <div class="form-group">
            <label for="creditCardNumber">Numero carta di credito</label>
            <div
            id="creditCardNumber"
            name="creditCardNumber"
            class="form-control"
            ></div>
        </div>
        <div class="form-group">
            <div class="row">
            <div class="col-6">
                <label>Data di scadenza</label>
                <div id="expireDate" class="form-control"></div>
            </div>
            <div class="col-6">
                <label>CVV</label>
                <div id="cvv" class="form-control"></div>
            </div>
            </div>
        </div>
        <div class="cards">
            <!-- <img src="../../assets/img/visa.png" alt="visa" />
            <img src="../../assets/img/mastercard.png" alt="mastercard" />
            <img src="../../assets/img/americanexpress.png" alt="amex" /> -->
        </div>

        <!-- <div v-if="nonce || error" class="advises mb-2 mt-2">
            <div class="alert alert-success" v-if="nonce">
            Il pagamento è andato a buon fine.
            </div>
            <div class="alert alert-danger" v-if="error" v-show="!nonce">
            Il pagamento è stato respinto. Riprova.
            </div>
        </div> -->
        <button type="submit">eren yeager</button>
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
        }
    },

    created(){
        const axios = require('axios').default;
        axios.get('http://127.0.0.1:8000/api/orders-token')
            .then((response) => {
                this.token = response.data;
                this.braintreeSystem();
             })
    },

    methods:{
        braintreeSystem() {
            braintree.client
                .create({
                authorization: this.token,
                })
                .then((clientInstance) => {
                let options = {
                    client: clientInstance,
                    styles: {
                    input: {
                        "font-size": "16px",
                        "font-family": "sans-serif",
                    },
                    },
                    fields: {
                    number: {
                        selector: "#creditCardNumber",
                        placeholder: "Inserisci la carta di credito",
                    },
                    cvv: {
                        selector: "#cvv",
                        placeholder: "Inserisci il CVV",
                    },
                    expirationDate: {
                        selector: "#expireDate",
                        placeholder: "00 / 0000",
                    },
                    },
                };
                return braintree.hostedFields.create(options);
                })
                .then((hostedFieldInstance) => {
                this.hostedFieldInstance = hostedFieldInstance;
                });
            },

            sendOrder(){
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
                     }
                 })
                .then((response) => {
                    console.log(response);
                })
            }
    }
}
</script>

<style lang="scss" scoped>

</style>