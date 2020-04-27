{% extends 'layouts/base.volt' %}

{% block title %}
{% endblock %}

{% block morecss%}
{% endblock %}

{% block content %}
<div class="row mx-0 justify-content-center">
    <div class="hero-static col-lg-6 col-xl-5">
        <div class="content content-full overflow-hidden">
			<!-- Header -->
			<div class="py-20 text-center">
				<h1 class="h4 font-w700 mt-10 mb-10">Login Pelanggan</h1>
			</div>
			<!-- END Header -->
            <!-- Sign In Form -->
            <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.js) -->
            <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
            <form class="js-validation-signin" action="{{url('login/pelanggan')}}" method="post">
                <div class="block block-themed block-rounded block-shadow">
                    <div class="block-header bg-gd-emerald">
                        <h3 class="block-title">Silahkan Log In</h3>
                    </div>
                    <div class="block-content">
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-sm-6 d-sm-flex align-items-center push">
                                <div class="custom-control custom-checkbox mr-auto ml-0 mb-0">
                                    <input type="checkbox" class="custom-control-input" id="remember-me" name="remember-me">
                                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-sm-6 text-sm-right push">
                                <button type="submit" class="btn btn-alt-primary">
                                    <i class="si si-login mr-10"></i> Sign In
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="block-content bg-body-light">
                        <div class="form-group text-center">
                            <label>Belum Memiliki Akun?</label>
                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{url('register/pelanggan')}}">
                                <i class="fa fa-plus mr-5"></i> Buat Akun
                            </a>
                        </div>
                    </div>
                </div>
            </form>
            <!-- END Sign In Form -->
        </div>
    </div>
</div>
{% endblock %}

{% block footer %}
{% endblock %}

{% block morejs %}
{% endblock %}

