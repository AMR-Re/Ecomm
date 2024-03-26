@extends('layouts.app')
@Section('style')
   

@endsection
@Section('content')

<main class="main">
   
    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('front/assets/images/backgrounds/login-bg.jpg')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="true">Forgot Password</a>
                        </li>
                       </ul>
                    <div class="tab-content">
                        <div class="tab-pane " style="display: block;">
                            @include('layouts.message')
                            <form action="#" id="ForgotPassword" method="POST">
                                {{csrf_field()}}
                                <div class="form-group" style="margin-top: 40px;">
                                    <label for="email">email address *</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div><!-- End .form-group -->


                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>Forgot</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>


                                </div><!-- End .form-footer -->
                            </form>
                           
                  </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</main><!-- End .main -->
@endsection

@Section('script')


@endsection
