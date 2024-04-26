@extends('frontend.layouts.master')

@section('styles')
<script src="https://js.stripe.com/v3/"></script>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        form {
            max-width: 80%;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        #cardElement {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
@endsection
@section('content')

 <!-- checkout main wrapper start -->
 <div class="checkout-page-wrapper pt-98 pb-98 pt-sm-60 pb-sm-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Checkout Login Coupon Accordion Start -->
                <div class="checkoutaccordion" id="checkOutAccordion">
                    <div class="card">
                        <h3>Returning Customer? <span data-bs-toggle="collapse" data-bs-target="#logInaccordion">Click Here To Login</span></h3>

                        <div id="logInaccordion" class="collapse" data-parent="#checkOutAccordion">
                            <div class="card-body">
                                <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                <div class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-7 m-auto">
                                            <form action="#" method="post">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="single-input-item">
                                                            <input type="email" placeholder="Enter your Email" required />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="single-input-item">
                                                            <input type="password" placeholder="Enter your Password" required />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="single-input-item">
                                                    <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                                        <div class="remember-meta">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="rememberMe" required />
                                                                <label class="custom-control-label" for="rememberMe">Remember Me</label>
                                                            </div>
                                                        </div>

                                                        <a href="#" class="forget-pwd">Forget Password?</a>
                                                    </div>
                                                </div>

                                                <div class="single-input-item">
                                                    <button class="check-btn sqr-btn">Login</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="card">
                        <h3>Have A Coupon? <span data-bs-toggle="collapse" data-bs-target="#couponaccordion">Click Here To Enter Your Code</span></h3>
                        <div id="couponaccordion" class="collapse" data-parent="#checkOutAccordion">
                            <div class="card-body">
                                <div class="cart-update-option">
                                    <div class="apply-coupon-wrapper">
                                        <form action="#" method="post" class=" d-block d-md-flex">
                                            <input type="text" placeholder="Enter Your Coupon Code" required />
                                            <button class="check-btn sqr-btn">Apply Coupon</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <!-- Checkout Login Coupon Accordion End -->
            </div>
        </div>

        <div class="row">
            <!-- Checkout Billing Details -->
            <div class="col-lg-12">
                <div class="checkout-billing-details-wrap">
                    <h2>Billing Details</h2>
                    <div class="billing-form-wrap">
                        <form action="{{route('checkout-account-create-or-login')}}" method="post">

                            <!-- Email Address -->
                            <div class="single-input-item">
                                <label for="email" class="required">Email Address</label>
                                <input type="email" id="email" name="email" placeholder="Email Address" required value="{{ old('email') }}" />

                                <div id="email-error" class="text-danger mt-2" style="display: none;"></div>

                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- First Name and Last Name -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="f_name" class="required">First Name</label>
                                        <input type="text" id="f_name" name="first_name" placeholder="First Name" required value="{{ old('first_name') }}" />
                                        @error('first_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="l_name" class="required">Last Name</label>
                                        <input type="text" id="l_name" name="last_name" placeholder="Last Name" required value="{{ old('last_name') }}" />
                                        @error('last_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Street Address -->
                            <div class="single-input-item">
                                <label for="street_address" class="required">Street address & house number</label>
                                <input type="text" id="street_address" name="street_address" placeholder="Street address & house number" required value="{{ old('street_address') }}" />
                                @error('street_address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Apartment, Suite, etc. (optional) -->
                            <div class="single-input-item">
                                <label for="apartment">Apartment, Suite, etc (optional)</label>
                                <input type="text" id="apartment" name="apartment" placeholder="Apartment, Suite etc (optional)" value="{{ old('apartment') }}" />
                            </div>

                            <!-- Town / City -->
                            <div class="single-input-item">
                                <label for="city" class="required">Town / City</label>
                                <input type="text" id="city" name="city" placeholder="Town / City" required value="{{ old('city') }}" />
                                @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Postcode / ZIP -->
                            <div class="single-input-item">
                                <label for="postcode" class="required">Postcode / ZIP</label>
                                <input type="text" id="postcode" name="postcode" placeholder="Postcode / ZIP" required value="{{ old('postcode') }}" />
                                @error('postcode')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="single-input-item">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" name="phone" placeholder="Phone" value="{{ old('phone') }}" />
                            </div>

                            <!-- Checkbox for Creating an Account -->
                            <div class="checkout-box-wrap">
                                <div class="single-input-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="create_pwd" name="create_account">
                                        <label class="custom-control-label" for="create_pwd">Create an account?</label>
                                    </div>
                                </div>
                                <div class="account-create single-form-row">
                                    <p>Create an account by entering the information below. If you are a returning customer, please login at the top of the page.</p>
                                    <div class="single-input-item">
                                        <label for="account_password" class="required">Account Password</label>
                                        <input type="password" id="account_password" name="account_password" placeholder="Account Password" />
                                        @error('account_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Checkbox for Shipping to a Different Address -->
                            <div class="checkout-box-wrap">
                                <div class="single-input-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ship_to_different" name="ship_to_different_address">
                                        <label class="custom-control-label" for="ship_to_different">Ship to a different address?</label>
                                    </div>
                                </div>

                                <!-- Shipping to a Different Address Form -->
                                <div class="ship-to-different single-form-row">
                                     <!-- Street Address -->
                                    <div class="single-input-item">
                                        <label for="street_address_2" class="required">Street address & house number</label>
                                        <input type="text" id="street_address_2" name="street_address_2" placeholder="Street address & house number" value="{{ old('street_address_2') }}" />
                                        @error('street_address_2')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Apartment, Suite, etc. (optional) -->
                                    <div class="single-input-item">
                                        <label for="apartment_2">Apartment, Suite, etc (optional)</label>
                                        <input type="text" id="apartment_2" name="apartment_2" placeholder="Apartment, Suite etc (optional)" value="{{ old('apartment_2') }}" />
                                    </div>

                                    <!-- Town / City -->
                                    <div class="single-input-item">
                                        <label for="city_2" class="required">Town / City</label>
                                        <input type="text" id="city_2" name="city_2" placeholder="Town / City"  value="{{ old('city_2') }}" />
                                        @error('city_2')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Postcode / ZIP -->
                                    <div class="single-input-item">
                                        <label for="postcode_2" class="required">Postcode / ZIP</label>
                                        <input type="text" id="postcode_2" name="postcode_2" placeholder="Postcode / ZIP"  value="{{ old('postcode_2') }}" />
                                        @error('postcode_2')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Order Note -->
                            <div class="single-input-item">
                                <label for="order_note">Order Note</label>
                                <textarea name="order_note" id="order_note" cols="30" rows="3" placeholder="Notes about your order, e.g. special notes for delivery.">{{ old('order_note') }}</textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="single-input-item">
                                @csrf
                                <button type="submit" id="submit-button" class="check-btn sqr-btn">Submit & Pay</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- checkout main wrapper end -->

@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $('#email').on('blur', function () {
            var email = $(this).val();

            // Make an AJAX request to check the email
            $.ajax({
                url: "{{ route('checkout.check.email') }}", // Replace with your route
                type: 'GET',
                data: { email: email},
                success: function (response) {
                    if (response.exists) {
                        $('#email-error').text('Email already exists.').show();
                        $('#submit-button').prop('disabled', true);
                    } else {
                        $('#email-error').hide();
                        $('#submit-button').prop('disabled', false);
                    }
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>
@endsection
