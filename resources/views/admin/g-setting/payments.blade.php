@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css\g-setting\index.css') }}">
    <link rel="stylesheet" href="{{ asset('css\g-setting\pages.css') }}">
    <div class="container">
        <main class="main-content">
            <div class="save-button-container">
                {{-- <a href="#" class="save-button">Save</a> --}}
            </div>
            <section class="settings-management">
                <div class="settings-categories">
                    <div class="category">
                        <h3>
                            <a href="{{ route('admin.g-setting.general') }}"
                                class="action-button {{ Request::is('admin/g-setting/general') || Request::is('admin/g-setting') ? 'active' : '' }}">
                                General
                            </a>
                        </h3>
                    </div>
                    <div class="category">
                        <h3><a href="{{ route('admin.g-setting.payments') }}"
                                class="action-button {{ Request::is('admin/g-setting/payments') ? 'active' : '' }}">Payments</a>
                        </h3>
                    </div>
                    <div class="category">
                        <h3><a href="{{ route('admin.g-setting.social_link') }}"
                                class="action-button {{ Request::is('admin/g-setting/social_link') ? 'active' : '' }}">Social
                                Link</a></h3>
                    </div>
                    <div class="category">
                        <h3><a href="{{ route('admin.g-setting.third_party_package') }}"
                                class="action-button {{ Request::is('admin/g-setting/third_party_package') ? 'active' : '' }}">Third
                                Party Package</a></h3>
                    </div>
                    <div class="category">
                        <h3><a href="{{ route('admin.g-setting.master_image') }}"
                                class="action-button {{ Request::is('admin/g-setting/master_image') ? 'active' : '' }}">Master
                                Image</a></h3>
                    </div>
                    <div class="category">
                        <h3><a href="{{ route('admin.g-setting.website_config') }}"
                                class="action-button {{ Request::is('admin/g-setting/website_config') ? 'active' : '' }}">Website
                                Config</a></h3>
                    </div>
                </div>
            </section>
        </main>

        <div class="container-settings">

            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="label-text">GST Rate <i class="fas fa-info-circle info-icon"
                            title="Set Default GST"></i></label>
                    <input type="text" class="input-field" name="Api_Key">
                </div>
                <label class="label-text">Select the Payment Gateway</label>

                <h3 class="heading-main">
                    Paypal
                    <i class="fas fa-info-circle info-icon" title="Set paypal key."></i>
                </h3>
                <div class="form-group">
                    <label class="label-text">Firebase Api Key</label>
                    <br>
                    <div class="radio-group">
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="Yes" checked> Enable
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="No"> Disable
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label class="label-text">Paypal Sandbox Business Email</label>
                    <input type="text" class="input-field" name="Business_Email">

                </div>

                <div class="form-group">
                    <label class="label-text">Paypal Production Business Email</label>
                    <input type="text" class="input-field" name="Production_email">
                </div>
                <div class="form-group">
                    <label class="label-text">Paypal Sandbox Url</label>
                    <input type="text" class="input-field" name="Sandbox_Url">
                </div>
                <div class="form-group">
                    <label class="label-text">Paypal Prod Url</label>
                    <input type="text" class="input-field" name=" Paypal_Prod_Url">
                </div>
                <div class="form-group">
                    <label class="label-text">Test Mode</label>
                    <input type="text" class="input-field" name="Test_Mode">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency (Kindly check the currency with gateway before saving)</label>
                    <input type="text" class="input-field" name="currency">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency Symbol</label>
                    <input type="text" class="input-field" name="Currency_Symbol">
                </div>
                <br>

                <div class="form-group">
                    <label class="label-text">Paytm <i class="fas fa-info-circle info-icon"
                            title="Set Default GST"></i></label>
                    <br>
                    <div class="radio-group">
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="Yes" checked> Enable
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="No"> Disable
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="label-text">Paytm Merchant Testing Mid Key</label>
                    <input type="text" class="input-field" name="mid_key">
                </div>
                <div class="form-group">
                    <label class="label-text">Paytm Merchant Testing Secret Key</label>
                    <input type="text" class="input-field" name="secret_key">
                </div>
                <div class="form-group">
                    <label class="label-text">Paytm Merchant Live Mid Key</label>
                    <input type="text" class="input-field" name="live_mid_key">
                </div>
                <div class="form-group">
                    <label class="label-text">Paytm Merchant Live Secret Key</label>
                    <input type="text" class="input-field" name="live_secret_key">
                </div>
                <div class="form-group">
                    <label class="label-text">Paytm Txn Url</label>
                    <input type="text" class="input-field" name="live_mid_key">
                </div>
                <div class="form-group">
                    <label class="label-text">Test Mode</label>
                    <input type="text" class="input-field" name="Test_Mode">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency (Kindly check the currency with gateway before saving)</label>
                    <input type="text" class="input-field" name="currency">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency Symbol</label>
                    <input type="text" class="input-field" name="currency">
                </div>
                <br>
                <div class="form-group">
                    <label class="label-text">Instamojo <i class="fas fa-info-circle info-icon"
                            title="Set instamojo Key"></i></label>
                    <br>
                    <div class="radio-group">
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="Yes" checked>
                        Enable
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="No"> Disable
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="label-text">Instamojo Testing Api Key</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Instamojo Testing Auth Token Key</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Instamojo Live Api Key</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Instamojo Live Auth Token Key</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Instamojo Sandbox Redirect Url</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Instamojo Prod Redirect Url</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Test Mode</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency (Kindly check the currency with gateway before saving)</label>
                    <input type="text" class="input-field" name="currency">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency Symbol</label>
                    <input type="text" class="input-field" name="currency">
                </div>
                <div class="form-group">
                    <label class="label-text">Paytm <i class="fas fa-info-circle info-icon"
                            title="Set Default GST"></i></label>
                    <br>
                    <div class="radio-group">
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="Yes" checked>
                        Enable
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="No"> Disable
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="label-text">Paytm Merchant Testing Mid Key</label>
                    <input type="text" class="input-field" name="mid_key">
                </div>
                <div class="form-group">
                    <label class="label-text">Paytm Merchant Testing Secret Key</label>
                    <input type="text" class="input-field" name="secret_key">
                </div>
                <div class="form-group">
                    <label class="label-text">Paytm Merchant Live Mid Key</label>
                    <input type="text" class="input-field" name="live_mid_key">
                </div>
                <div class="form-group">
                    <label class="label-text">Paytm Merchant Live Secret Key</label>
                    <input type="text" class="input-field" name="live_secret_key">
                </div>
                <div class="form-group">
                    <label class="label-text">Paytm Txn Url</label>
                    <input type="text" class="input-field" name="live_mid_key">
                </div>
                <div class="form-group">
                    <label class="label-text">Test Mode</label>
                    <input type="text" class="input-field" name="Test_Mode">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency (Kindly check the currency with gateway before saving)</label>
                    <input type="text" class="input-field" name="currency">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency Symbol</label>
                    <input type="text" class="input-field" name="currency">
                </div>

                <br>
                <div class="form-group">
                    <label class="label-text">Paystack <i class="fas fa-info-circle info-icon"
                            title="Set paystack Key"></i></label>
                    <br>
                    <div class="radio-group">
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="Yes" checked>
                        Enable
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="No"> Disable
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="label-text">Paystack Testing Secret Key</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Paystack Testing Public Key</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Paystack Live Secret Key</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Paystack Live Public Key</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Test Mode</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency (Kindly check the currency with gateway before saving)</label>
                    <input type="text" class="input-field" name="currency">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency Symbol</label>
                    <input type="text" class="input-field" name="currency">
                </div>


                <br>
                <div class="form-group">
                    <label class="label-text">Stripe<i class="fas fa-info-circle info-icon"
                            title="Set stripe Key"></i></label>
                    <br>
                    <div class="radio-group">
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="Yes" checked>
                        Enable
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="No"> Disable
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="label-text">Stripe Testing Secret Key</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Stripe Testing Publish Key</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Stripe Live Secret Key</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Stripe Live Publish Key</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Test Mode</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency (Kindly check the currency with gateway before saving)</label>
                    <input type="text" class="input-field" name="currency">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency Symbol</label>
                    <input type="text" class="input-field" name="currency">
                </div>

                <br>
                <div class="form-group">
                    <label class="label-text">Razorpay <i class="fas fa-info-circle info-icon"
                            title="Set razorpay Key"></i></label>
                    <br>
                    <div class="radio-group">
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="Yes" checked>
                        Enable
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="No"> Disable
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="label-text">Razorpay Testingkey Id</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Razorpay Testing Secretkey</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Razorpay Livekey Id</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Razorpay Live Secretkey</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Test Mode</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency (Kindly check the currency with gateway before saving)</label>
                    <input type="text" class="input-field" name="currency">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency Symbol</label>
                    <input type="text" class="input-field" name="currency">
                </div>

                <br>
                <div class="form-group">
                    <label class="label-text">Iyzico <i class="fas fa-info-circle info-icon"
                            title="Set iyzico Key"></i></label>
                    <br>
                    <div class="radio-group">
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="Yes" checked>
                        Enable
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="No"> Disable
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="label-text">Iyzico Testing Api Key
                    </label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Iyzico Testing Secretkey</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Iyzico Live Api Key</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Iyzico Live Secretkey</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Iyzico Sandbox Mode Url</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Iyzico Production Mode Url</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Test Mode</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency (Kindly check the currency with gateway before saving)</label>
                    <input type="text" class="input-field" name="currency">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency Symbol</label>
                    <input type="text" class="input-field" name="currency">
                </div>

                <br>
                <div class="form-group">
                    <label class="label-text">Authorize-net <i class="fas fa-info-circle info-icon"
                            title="Set authorize-net Key"></i></label>
                    <br>
                    <div class="radio-group">
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="Yes" checked>
                        Enable
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="No"> Disable
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="label-text">Authorize Net Test Api Login Id
                    </label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Authorize Net Test Transaction Key</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Authorize Net Live Api Login Id</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Authorize Net Live Transaction Key</label>
                    <input type="text" class="input-field" name="testing">
                </div>

                <div class="form-group">
                    <label class="label-text">Test Mode</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency (Kindly check the currency with gateway before saving)</label>
                    <input type="text" class="input-field" name="currency">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency Symbol</label>
                    <input type="text" class="input-field" name="currency">
                </div>

                <br>
                <div class="form-group">
                    <label class="label-text">Mercadopago <i class="fas fa-info-circle info-icon"
                            title="Set mercadopago Key"></i></label>
                    <br>
                    <div class="radio-group">
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="Yes" checked>
                        Enable
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="No"> Disable
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="label-text">Test Access Token
                    </label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Live Access Token</label>
                    <input type="text" class="input-field" name="testing">
                </div>

                <div class="form-group">
                    <label class="label-text">Test Mode</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency (Kindly check the currency with gateway before saving)</label>
                    <input type="text" class="input-field" name="currency">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency (Kindly check the currency with gateway before saving)Currency
                        Symbol</label>
                    <input type="text" class="input-field" name="currency">
                </div>

                <br>
                <div class="form-group">
                    <label class="label-text">Payumoney <i class="fas fa-info-circle info-icon"
                            title="Set payumoney Key"></i></label>
                    <br>
                    <div class="radio-group">
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="Yes" checked>
                        Enable
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="No"> Disable
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="label-text">Merchant Test Key
                    </label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Merchant Test Salt</label>
                    <input type="text" class="input-field" name="testing">
                </div>

                <div class="form-group">
                    <label class="label-text">Merchant Live Key
                    </label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Merchant Live Salt
                    </label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Test Mode</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency (Kindly check the currency with gateway before saving)</label>
                    <input type="text" class="input-field" name="currency">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency Symbol
                        </label>
                    <input type="text" class="input-field" name="currency">
                </div>
                <br>
                <div class="form-group">
                    <label class="label-text">Mollie<i class="fas fa-info-circle info-icon"
                            title="Set mollie Key"></i></label>
                    <br>
                    <div class="radio-group">
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="Yes" checked>
                        Enable
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="No"> Disable
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="label-text">Test Api Key
                    </label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Live Api Key</label>
                    <input type="text" class="input-field" name="testing">
                </div>

                <div class="form-group">
                    <label class="label-text">Test Mode</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency (Kindly check the currency with gateway before saving)</label>
                    <input type="text" class="input-field" name="currency">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency Symbol
                        </label>
                    <input type="text" class="input-field" name="currency">
                </div>


                <br>
                <div class="form-group">
                    <label class="label-text">Ravepay  <i class="fas fa-info-circle info-icon"
                            title="Set ravepay Key"></i></label>
                    <br>
                    <div class="radio-group">
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="Yes" checked>
                        Enable
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="No"> Disable
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="label-text">Test Public Api Key
                    </label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Test Secret Api Key</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Live Public Api Key</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Live Secret Api Key</label>
                    <input type="text" class="input-field" name="testing">
                </div>

                <div class="form-group">
                    <label class="label-text">Test Mode</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency (Kindly check the currency with gateway before saving)</label>
                    <input type="text" class="input-field" name="currency">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency Symbol
                        </label>
                    <input type="text" class="input-field" name="currency">
                </div>

                <br>
                <div class="form-group">
                    <label class="label-text">Pagseguro<i class="fas fa-info-circle info-icon"
                            title="Set pagseguro Key"></i></label>
                    <br>
                    <div class="radio-group">
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="Yes" checked>
                        Enable
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="No"> Disable
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="label-text">Test Token
                    </label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Live Token</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Test Mode</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency (Kindly check the currency with gateway before saving)</label>
                    <input type="text" class="input-field" name="currency">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency Symbol
                        </label>
                    <input type="text" class="input-field" name="currency">
                </div>
                <br>
                <div class="form-group">
                    <label class="label-text">Coingate  <i class="fas fa-info-circle info-icon"
                            title="Set coingate Key"></i></label>
                    <br>
                    <div class="radio-group">
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="Yes" checked>
                        Enable
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="No"> Disable
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="label-text">Test Token
                    </label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Live Token</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Test Mode</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency (Kindly check the currency with gateway before saving)</label>
                    <input type="text" class="input-field" name="currency">
                </div>
                <div class="form-group">
                    <label class="label-text">Currency Symbol
                        </label>
                    <input type="text" class="input-field" name="currency">
                </div>
                <br>
                <div class="form-group">
                    <label class="label-text">Phonepe <i class="fas fa-info-circle info-icon"
                            title="Set phonepe Key"></i></label>
                    <br>
                    <div class="radio-group">
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="Yes" checked>
                        Enable
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="No"> Disable
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="label-text">Phonepe Merchant Id
                    </label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Phonepe Salt Index</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Phonepe Salt Key</label>
                    <input type="text" class="input-field" name="testing">
                </div>
                <div class="form-group">
                    <label class="label-text">Merchant UserId</label>
                    <input type="text" class="input-field" name="testing">
                </div>

                <button type="submit" class="save-btn">Save Settings</button>
            </form>
        </div>
    </div>
@endsection
