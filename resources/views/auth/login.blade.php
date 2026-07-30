<!DOCTYPE html>
<html lang="en">
@include('template.admin.metadata')

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5 cen">
                            <center>
                                <div class="brand-logo">
                                    <img src="{{asset('assets/admin/images/logo/LogoSMT.png')}}" alt="Logo Admin">
                                </div>
                                <h4>Login Administrator</h4>
                                <h6 class="font-weight-light">Silahkan mengisi form di bawah</h6>
                            </center>
                            <form class="pt-3" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="username" name="username"
                                        class="form-control form-control-lg @error('username') is-invalid @enderror"
                                        id="exampleInputusername1" placeholder="Username">

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        id="password" placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                              <input type="checkbox" onclick="showPwd()" class="form-check-input">
                                              Lihat Password
                                            <i class="input-helper"></i></label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <a href="#" class="float-right" data-toggle="modal" data-target="#forgetpass"><b>Lupa Password</b></a>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <div class="g-recaptcha" name="g-recaptcha-response"
                                        data-sitekey="{{env('CAPTCHA_SITE_KEY')}}"></div>
                                    @if($errors->has('g-recaptcha-response'))
                                    <span class="help-block text-danger">
                                        <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn mr-1"
                                        style="background: #25668E">
                                        Masuk <i class="icon-login mr-2"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
<!-- Modal -->
<div class="modal fade" id="forgetpass" tabindex="-1" role="dialog" aria-labelledby="forgetpass" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="forgetpasslabel">Form Lupa Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Masukan Email" name="email" id="email">
            </div>
       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary btn-simpan-password">Kirim</button>
        </div>
      </div>
    </div>
</div>
</body>

@include('template.admin.scripts')
<script>
    function showPwd() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    $(function () {
        $('.btn-simpan-password').on('click',function () {
            $.ajax({
                url:"{{ route('password.email') }}",
                type:"post",
                data:{
                    _token: $('input[name="_token"]').val(),
                    email:$('input[name="email"]').val()
                },
                dataType: "json",
                success:function(response){
                    console.log(response)
                    if (response.status==true) {
                        swal({title: "Berhasil!", text: response.message, icon: "success"})
                                .then(function(){ 
                                    document.location='/home';
                        });
                    }else{
                        swal("Error!", response.message, "error");
                    }
                }
            })
        })
    })
</script>

</html>
