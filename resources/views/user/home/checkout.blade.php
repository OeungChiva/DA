<!DOCTYPE html>
<html>
<head>
@include('user.css.style')
    <style>
        
        .row{
        width: 90%;
        margin-left: 5%;
        }
        .custom-input {
        width: 30%;
        margin-left: 35%;
        }

    </style>
</head>
<body class="sub_page">
    
    <div class="hero_area">
        <div class="bg-box">
            <img src="frontend/images/hero-bg.jpg" alt="">
        </div>
    <!-- header section strats -->
    @include('user.layout.header')
    <!-- end header section -->
    </div>
<!-- about section -->
<div class="px-4 px-lg-0">
    <div class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                    @include('sweetalert::alert')
                    
                    <form method="POST" action="{{url('/checkout')}}">
                        @csrf
                        <h4>Shipping Details</h4>
                        <hr>
                        <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="order_name" value="{{Auth::guard('web')->user()->name}}" placeholder="Full Name" required>
                        </div>
                        </div>
                        <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="order_phone" value="{{Auth::guard('web')->user()->phone}}" placeholder="Phone Number" required>
                        </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" name="order_email" value="{{Auth::guard('web')->user()->email}}" placeholder="E-mail" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="order_address" value="{{Auth::guard('web')->user()->address}}" placeholder="Address" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="cashOnDelivery" value="cash_on_delivery" checked>
                                <label class="form-check-label" for="cashOnDelivery">
                                    Cash On Delivery
                                </label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="payUsingCard" value="card_payment" onclick="toggleCardForm(this)">
                                <label class="form-check-label" for="payUsingCard">
                                    Pay Using Card
                                </label>
                            </div>
                        </div>
                        <!-- Order Now button -->
                        <div class="form-button mt-3 text-center">
                            <button type="submit" class="btn btn-primary" id="submit">Order Now</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                    <h4>Order Summary</h4>
                    <hr>
                    
                    <div class="d-flex justify-content-between mb-1 ">
                        <span>Subtotal</span> <span>${{$totalPrice}}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-1 ">
                        <span>Shipping</span> <span>$0</span>
                    </div>
                    <div class="d-flex justify-content-between mb-1 ">
                        <span>Tax</span> <span>$0</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-4 ">
                        <strong>TOTAL</strong> <strong class="text-dark">${{$totalPrice}}</strong>
                    </div>
                </div>
                
            </div>
            </div>
        </div>
    </div>
</div>

<!-- end about section -->
@include('user.layout.footer')
<!-- footer section -->
@include('user.js.script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

function toggleCardForm(element) {
    var cardFormContainer = document.getElementById('cardFormContainer');
    if (element.value === 'card_payment') {
        cardFormContainer.style.display = 'block';
    } else {
        cardFormContainer.style.display = 'none';
    }
}
// function toggleCardForm(radio) {
//         const cardFormContainer = document.getElementById('cardFormContainer');
//         const payButton = document.getElementById('payButton');
//         if (radio.checked) {
//             cardFormContainer.style.display = 'block';
//             payButton.disabled = false;
//         } else {
//             cardFormContainer.style.display = 'none';
//             payButton.disabled = true;
//         }
//     }

// Add an event listener to the radio buttons to trigger the toggleCardForm function
var radioButtons = document.querySelectorAll('input[name="payment_method"]');
radioButtons.forEach(function(radioButton) {
    radioButton.addEventListener('click', function() {
        toggleCardForm(this);
    });
});


</script>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    
<script type="text/javascript">

$(function() {

    /*------------------------------------------
    --------------------------------------------
    Stripe Payment Code
    --------------------------------------------
    --------------------------------------------*/
    
    var $form = $(".require-validation");
     
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;
        $errorMessage.addClass('hide');
    
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
     
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
    
    });
      
    /*------------------------------------------
    --------------------------------------------
    Stripe Response Handler
    --------------------------------------------
    --------------------------------------------*/
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
                 
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
     
});
</script>


<script>
    $(function() {
    var $form = $(".require-validation");

    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
            $inputs = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid = true;
        $errorMessage.addClass('hide');

        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
            }
        });

        if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
        }
    });

    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error').removeClass('hide').find('.alert').text(response.error.message);
        } else {
            var token = response['id'];

            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
});

</script>

</body>
</html>




