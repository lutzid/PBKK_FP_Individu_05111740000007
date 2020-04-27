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
				<h1 class="h4 font-w700 mt-10 mb-10">Register</h1>
			</div>
			<!-- END Header -->
            <!-- Sign In Form -->
            <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.js) -->
            <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
            <div class="block block-themed block-rounded block-shadow">
                <div class="block-header bg-gd-emerald">
                    <h3 class="block-title">Pilih Cara Register</h3>
                </div>
                <div class="block-content py-xl-5" style="overflow: hidden">
                    <div class="block-content form-group text-center" style="width: 50%; float:left">
                        <h5>Register Sebagai Pemijat</h5>
                        <form action="{{url('register/pemijat')}}" method="get">
                            <button type="submit" class="btn btn-alt-success">
                                Register
                            </button>
                        </form>
                    </div>
                    <div class="block-content form-group text-center" style="width: 50%; float:right">
                        <h5>Register Sebagai Pelanggan</h5>
                        <form action="{{url('register/pelanggan')}}" method="get">
                            <button type="submit" class="btn btn-alt-success">
                                Register
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END Sign In Form -->
        </div>
    </div>
</div>
{% endblock %}

{% block footer %}
{% endblock %}

{% block morejs %}
{% endblock %}

