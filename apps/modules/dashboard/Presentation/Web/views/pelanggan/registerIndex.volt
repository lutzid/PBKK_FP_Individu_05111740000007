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
				<h1 class="h4 font-w700 mt-10 mb-10">Buat Akun Pelanggan</h1>
			</div>
			<!-- END Header -->

			<!-- Sign Up Form -->
			<!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.js) -->
			<!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
			<form class="js-validation-signup" action="{{url('register/pelanggan')}}" method="post">
				<div class="block block-themed block-rounded block-shadow">
					<div class="block-header bg-gd-emerald">
						<h3 class="block-title">Silahkan Isi Data Diri Anda</h3>
					</div>
					<div class="block-content">
						<div class="form-group row">
							<div class="col-12">
								<label for="nama">Nama</label>
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-12">
								<label for="ktp">Nomor KTP</label>
								<input type="text" class="form-control" id="ktp" name="ktp" placeholder="No KTP">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-12">
							<label for="jenis_kelamin">Jenis Kelamin</label>
								<select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
									<option value="L">Laki-Laki</option>
									<option value="P">Perempuan</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-12">
								<label for="alamat">Alamat</label>
								<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-12">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="Email">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-12">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="********">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-12">
								<label for="password-confirm">Konfirmasi Password</label>
								<input type="password" class="form-control" id="password-confirm" name="password-confirm" placeholder="********">
							</div>
						</div>
						<div class="form-group row mb-0">
							<div class="col-sm-6 push">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="terms" name="terms">
									<label class="custom-control-label" for="terms">Saya Menyetujui Persyaratan</label>
								</div>
							</div>
							<div class="col-sm-6 text-sm-right push">
								<button type="submit" class="btn btn-alt-success">
									<i class="fa fa-plus mr-10"></i> Buat Akun
								</button>
							</div>
						</div>
					</div>
					<div class="block-content bg-body-light">
						<div class="form-group text-center">
							<label>Sudah Memiliki Akun? </label>
							<a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{url('login/pelanggan')}}">
								<i class="fa fa-user text-muted mr-5"></i> Login
							</a>
						</div>
					</div>
				</div>
			</form>
			<!-- END Sign Up Form -->
		</div>
	</div>
</div>

{% endblock %}

{% block footer %}
{% endblock %}

{% block morejs %}
<script src="{{url('public/assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{url('public/assets/js/pages/op_auth_signup.js')}}"></script>
{% endblock %}

