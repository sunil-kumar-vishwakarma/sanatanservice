<style>
    .scrollable-menu {
        max-height: 450px;
        /* Adjust this value as needed */
        overflow-y: auto;

    }

    .dropdown-menu.show {
        display: block;
    }

    .btn-chataccept {
        border-radius: 30px;
        border: 1px solid #5bbe2a;
        background-color: #5bbe2a !important;
        color: white !important;
    }

    .btn-chatreject {
        border-radius: 30px;
        border: 1px solid #ee4e5e;
        background-color: #ffffff !important;
        color: #ee4e5e !important;
    }

    .btn.clear-notification {
        font-size: 15px !important;
        padding: 8px 30px !important;
    }

    .btn.clear-notification:hover,
    .btn.clear-notification:focus,
    .btn.clear-notification:active {
        color: #fff !important;
        background: #ee4e5e !important;
    }

    @media screen and (max-width: 520px) {
    #notificationList{
        width: 370px !important;
    }
}



</style>

{{-- Noti sound Modal --}}
<div class="wzrk-alert wzrk-hidden  wiz-show-animate">
    <div class="wzrk-alert-heading">Would you like to receive Push Notifications?</div>
    <div class="wzrk-alert-body">We promise to only send you relevant content and give you updates on your transactions
    </div>
    <div class="wzrk-button-container"><button id="wzrk-cancel" class="No thanks">No thanks</button><button
            id="wzrk-confirm" class="Sign me Up!" style="background-color: rgb(242, 128, 70);">Sign me up!</button></div>
</div>

<div class="header">
    <nav class="navbar navbar-light fixed-top">
        <div class="container">
            <div class="d-flex align-items-center w-100 justify-content-between">
                <div class="d-flex align-items-center w-50">
                    <button class="navbar-toggler d-inline d-lg-none mr-2" type="button" data-toggle="collapse"
                        data-target="#main_nav" aria-controls="navbarCollapse" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"
                            style="background-image:url({{asset('public/frontend/astrowaycdn/dashaspeaks/web/content/astroway/images/nav-toggle.svg')}});"></span>
                    </button>


                  

                   
                </div>

                <div class="d-flex align-items-center header-call-chat-btn w-50 justify-content-end">
                    

                    <div id="google_translate_button" style="height:38px;"></div>


                    <ul class="list-inline mb-0 d-flex align-items-center userprofileicon">


                            

                        {{-- End Profile Section --}}

                    </ul>
                    <button class="navbar-toggler collapsed d-lg-inline position-relative border-0 d-none ml-2"
                        type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="navbarCollapse"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span style="color: #000">
                            <i class="fa-solid fa-list"></i>
                        </span>
                    </button>

                </div>
            </div>
        </div>
    </nav>
</div>

{{-- Chat Accept Reject Model --}}
<div id="chatinfomodal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm h-100 d-flex align-items-center">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title font-weight-bold">
                    Accept Chat Request
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <form id="chatForm">
                    <input type="hidden" name="chatId" id="chatIdInput" value="">
                    <input type="hidden" id="astrologerIdInput" name="astrologerId" value="">
                    <div class="text-center">
                        <a class="btn btn-chataccept  active d-inline-block m-2" id="startchat" role="button"
                            data-toggle="modal">
                            Start Chat
                        </a>
                        <a class="btn btn-chatreject active d-inline-block m-2" id="rejectchat" role="button"
                            data-toggle="modal">
                            Reject Chat
                        </a>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

{{-- Call Accept Reject Modal --}}

<div id="callinfomodal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm h-100 d-flex align-items-center">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title font-weight-bold">
                    Accept Call Request
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <form id="callForm">
                    <input type="hidden" name="callId" id="callIdInput" value="">
                    <input type="hidden" id="astrologerIdInput" name="astrologerId" value="">
                    <input type="hidden" id="calltypeInput" name="call_type" value="">
                    <div class="text-center">
                        <a class="btn btn-chataccept  active d-inline-block m-2" id="startcall" role="button"
                            data-toggle="modal">
                            Start Call
                        </a>
                        <a class="btn btn-chatreject active d-inline-block m-2" id="rejectcall" role="button"
                            data-toggle="modal">
                            Reject Call
                        </a>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

{{-- End Model --}}

<div class="modal fade rounded mt-2 mt-md-5 login-offer" id="loginSignUp" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body pt-0 pb-0">
                <div class="login-offer-bg d-none">
                    <p class="text-white font-22 text-center font-weight-bold p-0 m-0 offertxt1">Get
                        Consultation from Experts</p>
                    <p class="text-center p-0 m-0 offertxt2 ">First Chat Free</p>

                </div>
                <button type="button" class="close login-sig-close-btn loginCloseBut" data-dismiss="modal"
                    aria-hidden="true">
                    ×
                </button>
                <div class="bg-white body">
                    <div class="row ">
                        <div class="col-md-12 px-4 py-5">

                            <ul class="nav nav-tabs">

                            </ul>

                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



<script src="https://www.gstatic.com/firebasejs/7.9.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.9.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.9.1/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.9.1/firebase-storage.js"></script>







