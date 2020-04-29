
<!-- User Info -->
<div class="bg-image bg-image-bottom bg-gd-emerald">
    <div class="bg-primary-dark-op py-30">
        <div class="content content-full text-center">
            <!-- Avatar -->
            <div class="mb-15">
                <a class="img-link" href="">
                    <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{url('public/' ~ user.gambar)}}" alt="">
                </a>
            </div>
            <!-- END Avatar -->

            <!-- Personal -->
            <h1 class="h3 text-white font-w700 mb-10">{{ user.nama }}</h1>
            <!-- END Personal -->
        </div>
    </div>
</div>
<!-- END User Info -->
<h2 class="content-heading">
    <i class="si si-note mr-5"></i> Data Diri
</h2>
<form class="js-validation-signup" action="{{url('edit/pemijat')}}" method="post" enctype="multipart/form-data">
    <div class="block block-themed block-rounded block-shadow">
        <div class="block-content">
            {{ flashSession.output() }}
            <div class="form-group row">
                <div class="col-12">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ user.nama }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12">
                    <label for="ktp">Nomor KTP</label>
                    <input type="text" class="form-control" id="ktp" name="ktp" value="{{ user.ktp }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                        <option value="L" {% if user.jenis_kelamin == "L" %}selected{% endif %}>Laki-Laki</option>
                        <option value="P" {% if user.jenis_kelamin == "P" %}selected{% endif %}>Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ user.alamat }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ user.email }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{ user.password }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12">
                    <label for="password-confirm">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password-confirm" name="password-confirm" value="{{ user.password }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12">
                    <label for="tarif">Tarif</label>
                    <input type="number" class="form-control" id="tarif" name="tarif" value="{{ user.tarif }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12">
                <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="Tidak Aktif" {% if user.status == "Tidak Aktif" %}selected{% endif %}>Tidak Aktif</option>
                        <option value="Aktif" {% if user.status == "Aktif" %}selected{% endif %}>Aktif</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12">
                <label for="gambar">Gambar</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" accept=".jpg, .jpeg, .png" id="gambar" name="gambar">
                        <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-sm-6 text-sm-right push">
                    <button type="submit" class="btn btn-alt-success">
                        <i class="si si-note mr-10"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>