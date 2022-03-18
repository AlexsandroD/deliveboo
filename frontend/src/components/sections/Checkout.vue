<template>
    <form>

        <div class="mb-3">
            <label for="name" class="form-label">Nome *</label>
            <input v-model="name" type="text" class="form-control" id="name" required maxlength="80">
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Cognome *</label>
            <input v-model="surname" type="text" class="form-control" id="surname" required maxlength="80">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email *</label>
            <input v-model="email" type="email" class="form-control" id="email"  required maxlength="100">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Indirizzo *</label>
            <input v-model="address" type="text" class="form-control" id="address" required maxlength="255" >
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Telefono *</label> 
            <input v-model="phone" type="tel" class="form-control" id="phone" required  pattern="[0-9]{10-15}" maxlength="15" >
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Commento</label>
            <textarea v-model="comment" class="form-control" id="comment" rows="3" maxlength="150"></textarea>
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
        <button
            class="btn btn-block text-white mt-3"
            type="submit"
        >
            Paga
        </button>
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
    }
}
</script>

<style lang="scss" scoped>
    /*--------------------
SHARED VARIABLES
--------------------*/
$red: #E91E63;
$blue: #3F51B5;
$grey: #EAE8E9;
$grey2: #f3f3f3;
$white: #FFF;

/*--------------------
GENERAL
--------------------*/

*,
*:before,
*:after {
  box-sizing: inherit;
}

html {
  box-sizing: border-box;
  height: 100%;
  overflow: hidden;
}

body {
  background: #f2f2f2;
  font-family: 'Roboto', verdana, sans-serif;
  height: 100%;
}

h1 {
  font-size: 1.5em;
  font-weight: 100;
}

#cardForm {
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}


/*--------------------
PANEL FORM
--------------------*/

.panel {
  background: $white;
  width: 80%;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, .16), 0 0 2px 0 rgba(0, 0, 0, .12);
}

.panel__header {
  background: $blue;
  color: $white;
}

.panel__header,
.panel__footer {
  padding: 1em 2em;
}

.panel__footer {
  background: $grey2;
}

.panel__content {
  padding: 1em 2em;
  overflow: hidden;
}

.textfield--float-label {
  width: 50%;
  float: left;
  display: inline-block;
  padding-right: 5px;
}

.hosted-field--label {
  transform: translateY(0.4em);
  font-size: 1.125em;
  line-height: 32px;
  transition: all .15s ease-out;
  display: block;
  width: 100%;
  font-weight: 400;
  overflow: hidden;
  margin-bottom: 0.5em;
  &.label-float {
    text-overflow: ellipsis;
    color: #2196F3;
    transition: all .15s ease-out
  }
  &.filled {
    @extend .label-float;
    color: rgba(0, 0, 0, .54);
  }
  &.invalid {
    @extend .label-float;
    color: #F44336;
  }
}

span.icon {
  position: relative;
  top: 0.2em;
  margin-right: 0.2em;
}

svg {
  fill: #333;
}

.hosted-field {
  height: 32px;
  margin-bottom: 1em;
  display: block;
  background-color: transparent;
  color: rgba(0, 0, 0, .87);
  border: none;
  border-bottom: 1px solid rgba(0, 0, 0, .26);
  outline: 0;
  width: 100%;
  font-size: 16px;
  padding: 0;
  box-shadow: none;
  border-radius: 0;
  position: relative;
}

.pay-button {
  background: #E91E63;
  color: #fff;
  margin: 0 auto;
  border: 0;
  border-radius: 3px;
  padding: 1em 3em;
  font-size: 1em;
  text-transform: uppercase;
  box-shadow: 0 0 2px rgba(0, 0, 0, .12), 0 2px 2px rgba(0, 0, 0, .2);
}


/*--------------------
BT HOSTED FIELDS SPECIFIC 
--------------------*/

.braintree-hosted-fields-focused {
  border-bottom: 2px solid $blue;
  transition: all 200ms ease;
}

.braintree-hosted-fields-invalid {
  border-bottom: 2px solid $red;
  transition: all 200ms ease;
}


/*---------------------
Media Queries
----------------------*/

@media (max-width: 600px) {
  html {
    overflow: auto;
  }
  #cardForm {
    height: auto;
    margin: 2em;
    font-size: 13px;
  }
  .panel {
    width: 100%;
  }
  .textfield--float-label {
    width: 100%;
    float: none;
    display: inline-block;
  }
  .pay-button {
    width: 100%;
  }
}
</style>