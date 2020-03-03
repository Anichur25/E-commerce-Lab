<style>
.paymentWrap {
    padding: 50px;
}

.paymentWrap .paymentBtnGroup {
    max-width: 800px;
    margin: auto;
}

.paymentWrap .paymentBtnGroup .paymentMethod {
    padding: 40px;
    box-shadow: none;
    position: relative;
}

.paymentWrap .paymentBtnGroup .paymentMethod.active {
    outline: none !important;
}

.paymentWrap .paymentBtnGroup .paymentMethod.active .method {
    border-color: #4cd264;
    outline: none !important;
    box-shadow: 0px 3px 22px 0px #7b7b7b;
}

.paymentWrap .paymentBtnGroup .paymentMethod .method {
    position: absolute;
    right: 3px;
    top: 3px;
    bottom: 3px;
    left: 3px;
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    border: 2px solid transparent;
    transition: all 0.5s;
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.handcash {
    background-image: url("https://i.pinimg.com/originals/83/69/69/836969c55aab2c5ecb9f0c3723c29ded.jpg")
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.bkash {
    background-image: url("https://www.assignmentpoint.com/wp-content/uploads/2016/03/bkash-limited.jpg");
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.paypal {
    background-image: url("https://image.opencart.com/cache/5c9dcc95ea2fc-resize-710x380.jpg");
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.vishwa {
    background-image: url("http://i.imgur.com/VkiM7PL.jpg");
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.ez-cash {
    background-image: url("http://www.busbooking.lk/img/carousel/BusBooking.lk_ezCash_offer.png");
}


.paymentWrap .paymentBtnGroup .paymentMethod .method:hover {
    border-color: #4cd264;
    outline: none !important;
}
</style>

<div class="container">
    <div class="row">
        <div class="paymentCont col-md-12">
            <div class="headingWrap">
                <h3 class="headingTop text-center">Select Your Payment Method</h3>
            </div>

           <form action = "{{ url('/complete-payment') }}" method = "post">
             {{ csrf_field() }}
           <input type = "radio"  name = "payment_gateway" value = "handcash" checked>
           <label><img src = "{{ URL :: to ('image/handcash.jpg') }}" width = "200px" height = "80px"></label>
           <br>
           <br>
           <input type = "radio" name = "payment_gateway" value = "bkash">
           <label><img src = "{{ URL :: to ('image/bkash.jpg') }}" width = "200px" height = "80px"></label>
           <br>
           <br>
           <input type = "radio" name = "payment_gateway" value = "paypal">
           <label><img src = "{{ URL :: to ('image/paypal.jpg') }}" width = "200px" height = "80px"></label>
           <br>
           <input type = "submit" class = "btn btn-primary" value = "Pay Bill">
           </form>

    </div>
</div>