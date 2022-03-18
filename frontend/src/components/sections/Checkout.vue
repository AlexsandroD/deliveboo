<template>

    <form>
        <label for="name" class="text-gold">Your Name</label>
        <input type="text" id="name" name="customer_name" class="form-control" placeholder="Type your name">

        <label for="address" class="text-gold mt-2">Address for delivery</label>
        <input type="text" id="address" class="form-control" name="customer_address" placeholder="Type the adress for delivery">

        <label for="customer_phone" class="text-gold mt-2">Phone number</label>
        <input type="text" id="customer_phone" name="customer_phone" class="form-control" placeholder="Type your phone number">

        <input id="code" name="code" hidden>

        <input id="status" name="status" hidden>

        <input id="date" name="date" hidden>

        <input type="text" name="dishes" hidden>

        <label for="total_price" class="text-gold my-2">Amount:</label>
        <input name="total_price" class="amount col-8 text-left my-2" readonly>

        <label class="text-gold col-12 p-0">Credit Card Number</label>
        <div id="creditCardNumber" class="form-control"></div>

        <div class="row my-2">
            <div class="col-6">
            <label class="text-gold">Expire Date</label>
            <div id="expireDate" class="form-control"></div>
            </div>
            <div class="col-6">
            <label class="text-gold">CVV</label>
            <div id="cvv" class="form-control"></div>
            </div>
        </div>

        <input id="nonce" name="payment_method_nonce" hidden>
        <button type="submit" class="btn-gold btn-block mt-4" @click.prevent="payWithCreditCard()">Confirm and Pay</button>
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
            error:null,
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
                    styles: {
                        input: {
                            'font-size': '14px',
                            'font-family': 'Open Sans'
                        }
                    },
                    fields: {
                        number: {
                            selector: '#creditCardNumber',
                            placeholder: 'Enter Credit Card'
                        },
                        cvv: {
                            selector: '#cvv',
                            placeholder: 'Enter CVV'
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
                // @TODO - Use hostedFieldInstance to send data to Braintree
                this.hostedFieldInstance = hostedFieldInstance;
                // console.log(hostedFieldInstance);
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
                    })
                .catch(err => {

                    console.error('error',err);
                    if(err.code =="HOSTED_FIELDS_FIELDS_INVALID"){
                        err.message = 'Card details are invalid.';
                        this.error = err.message;
                    }

                    if(err.code =="HOSTED_FIELDS_FIELDS_EMPTY"){
                        err.message = 'The fields are empty. Please enter your payment information. ';
                        this.error = err.message;
                    }

                })
                
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
                })
            
        }
    },


}
</script>

<style lang="scss" scoped>

</style>