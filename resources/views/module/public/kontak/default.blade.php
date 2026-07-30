<!-- Kontak -->
@php
    $data = \App\Models\Contact::first();
    $option = \App\Models\Option::first();
@endphp
<div class="page-section pt-100">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-5 col-sm-5 mb-50 phone-respon">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        <form id="contact-form" class="form-kontak k-card" action="{{url('create_contact')}}" method="POST">
                            <h3>
                                <span class=" blue1">Kirim Pesan Kepada Kami
                               </span>
                            </h3>
                            <div class="garis-kontak"></div>
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- <label>Your name *</label> -->
                                    <input type="text" value="" data-msg-required="Please enter your name" maxlength="100" class="controled" name="name" id="name" placeholder="NAME" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <!-- <label>Your email address *</label> -->
                                    <input type="email" value="" data-msg-required="Please enter your email address" data-msg-email="Please enter a valid email address" maxlength="100" class="controled" name="email" id="email" placeholder="EMAIL" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- <label>Your email address *</label> -->
                                    <input type="number" value="" data-msg-required="Please enter your Phone " data-msg-email="Please enter a valid Phone" maxlength="100" class="controled" name="telephone" id="telephone" placeholder="PHONE" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-40">
                                    <!-- <label>Message *</label> -->
                                    <textarea maxlength="5000" data-msg-required="Please enter your message" rows="3" class="controled" name="message" id="message" placeholder="MESSAGE" required></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 text-center-xxs tengah">
                                    <input type="button" id="btn-save" style="font-weight:bold;" value="KIRIM PESAN" class="button medium blue mb-20" data-loading-text="Loading...">
                                </div>
                            </div>
                        </form>
                        
                        <script>
                            $(document).ready(function()
                            {
                                $('#btn-save').click(function(){
                                    $('#contact-form').ajaxForm({
                                        success:  function(response){
                                            alert("Terimakasih sudah mengirim pesan kepada kami!");
                                            document.location.href="";
                                        },
                                        error: function(){
                                            alert("Pastikan anda mengisi semua form!");
                                        }
                                    }).submit();
                                });
                            });
                        </script>

                    </div>
                    <div class="col-md-7 col-sm-7 ">
                        <h3>
                            <span class="blue1 text-center">Kontak Informasi </span>
                        </h3>
                        <div class="garis-kontak"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="cis-cont">
                                    <div class="cis-icon">
                                        <div class="icon icon-basic-geolocalize-05"></div>
                                    </div>
                                    <div class="cis-text">
                                        <p class="font-kontak">{{strip_tags($data->alamat)}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="cis-cont">
                                    <div class="cis-icon">
                                        <div class="icon icon-basic-ipod"></div>
                                    </div>
                                    <div class="cis-text">
                                        <p class="font-kontak mt-10"><a href="https://wa.me/{{$data->phone}}">{{$data->phone}}</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="cis-cont">
                                    <div class="cis-icon">
                                        <div class="icon icon-basic-paperplane"></div>
                                    </div>
                                    <div class="cis-text">
                                        <p class="font-kontak mt-10">{{$data->email}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!--<div class="row">-->
                        <!--    <div class="col-md-12 col-sm-12">-->
                        <!--        <label>BRANCH OFFICE - PEKALONGAN KAB.</label>-->
                        <!--    </div>-->
                        <!--    <div class="col-md-12 col-sm-12">-->
                        <!--        <div class="cis-cont">-->
                        <!--            <div class="cis-icon">-->
                        <!--                <div class="icon icon-basic-geolocalize-05"></div>-->
                        <!--            </div>-->
                        <!--            <div class="cis-text">-->
                        <!--                <p class="font-kontak">Puri Utara 1C No. 12, Perum Puri Kedungwuni, Kab. Pekalongan.</p>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="col-md-12 col-sm-12">-->
                        <!--        <div class="cis-cont">-->
                        <!--            <div class="cis-icon">-->
                        <!--                <div class="icon icon-basic-ipod"></div>-->
                        <!--            </div>-->
                        <!--            <div class="cis-text">-->
                        <!--                <p class="font-kontak mt-10"><a href="https://wa.me/6285742509672">0857-4250-9672 (Arif Yunanto)</a></p>-->
                        <!--                <p class="font-kontak mt-10"><a href="https://wa.me/6285642958049">0856-4295-8049 (Nufan Rizqi Prasetya)</a></p>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->

                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>

        <!-- maps -->
        <div class="page-section">
            <div class="container-fluid">
                <div class="row">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15840.067534731299!2d110.3904599!3d-7.00729445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e705fe9c70586e9%3A0x76accfa1f41ef8ca!2sSMK%20Texmaco%20Semarang!5e0!3m2!1sen!2sid!4v1659927847355!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            </div>
        </div>

        