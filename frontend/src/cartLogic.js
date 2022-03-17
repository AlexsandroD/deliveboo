import Vue from 'vue';

export default Vue.observable({
    restaurantName:null,
    restaurantId:null,
    newRestaurantId:null,
    restaurantSlug:null,
    cartError:false,
    totalPrice:0,
    cart:[],

    mountedCart(){
        if(localStorage.getItem('cart') != null){
            this.cart = JSON.parse(localStorage.getItem('cart'));
            this.restaurantSlug=localStorage.getItem('restaurantSlug');
            this.restaurantId=localStorage.getItem('restaurantId');
            this.restaurantName=localStorage.getItem('restaurantName');

        }
    },

      addCartItem(dishId,dishName,dishPrice,restaurantId,restaurantSlug,restaurantName){
        if(this.cart.length < 1){
          localStorage.setItem('restaurantId',restaurantId);
          localStorage.setItem('restaurantSlug', restaurantSlug);
          localStorage.setItem('restaurantName', restaurantName);

          this.restaurantId = restaurantId;
          this.restaurantSlug = restaurantSlug;
          this.restaurantName = restaurantName;

        }
        if(restaurantId == localStorage.getItem('restaurantId') ){

          if (this.cart.filter(e => e.dishId === dishId).length > 0) {
            let objIndex = this.cart.findIndex((obj => obj.dishId == dishId));
            this.cart[objIndex].quantity += 1;
          }else{
            let dish = {
              'dishId' : dishId,
              'quantity': 1,
              'name': dishName,
              'dishPrice':dishPrice,
            }
            this.cart.push(dish);
          }
  
          localStorage.setItem('cart', JSON.stringify(this.cart));
          
        }else{
          this.cartError = true;
        }
      },
          removeCartItem(dishId){
          if (this.cart.filter(e => e.dishId === dishId).length > 0) {
          
            let objIndex = this.cart.findIndex((obj => obj.dishId == dishId));
          

            if(this.cart[objIndex].quantity > 1){
              this.cart[objIndex].quantity -= 1;
            }else{
              this.cart.splice(objIndex,1);
            }
          }

          localStorage.setItem('cart', JSON.stringify(this.cart));

          if(this.cart.length < 1){
            localStorage.removeItem('restaurantId');
            localStorage.removeItem('restaurantSlug');
            localStorage.removeItem('restaurantName');
            this.restaurantId = null;
            this.restaurantSlug = null;
            this.restaurantName = null;
            this.totalPrice=0;
          }
      },

      emptyCart(){
        this.cart=[];
        this.restaurantId = null;
        this.restaurantSlug = null;
        this.restaurantName = null;
        this.totalPrice=0;
        localStorage.clear();
        this.cartError = false;
      }
});