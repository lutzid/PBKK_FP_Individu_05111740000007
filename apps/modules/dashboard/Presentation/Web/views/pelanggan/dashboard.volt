<h2 class="content-heading">
    <i class="si si-users mr-5"></i> Pemesanan
</h2>
<!-- Hover Table -->
<div class="block">
    <div class="block-content">
        <table class="table table-hover table-vcenter">
            <thead>
                <tr>
                    
                    <th class="text-center">#</th>
                    <th>Nama Pemijat</th>
                    <th class="text-center" style="width: 15%;">Tarif</th>
                    <th class="text-center">Email</th>
                    <th class="d-none d-sm-table-cell" style="width: 15%;">Status</th>
                    <th class="text-center" style="width: 100px;">Tanggal</th>
                    <th class="text-center" style="width: 100px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {% if pemesanans|length %}
                    {% set counter = 1 %}
                    {% for pemesanan in pemesanans %}
                    <tr>
                        <td class="text-center">{{ counter }}</td>
                        <td>{{ pemesanan.pemijat.nama }}</td>
                        <td class="text-center">
                            Rp{{ pemesanan.pemijat.tarif }},00
                        </td>
                        <td class="text-center">{{pemesanan.pemijat.email}}</td>
                        <td class="d-none d-sm-table-cell">
                            {% if pemesanan.status === 'Selesai' %}
                            <span class="badge badge-success">{{ pemesanan.status }}</span>
                            {% elseif pemesanan.status === 'Pending' %}
                            <span class="badge badge-warning">{{ pemesanan.status }}</span>
                            {% elseif pemesanan.status === 'Proses' %}
                            <span class="badge badge-primary">{{ pemesanan.status }}</span>
                            {% elseif pemesanan.status === 'Ditolak' %}
                            <span class="badge badge-danger">{{ pemesanan.status }}</span>
                            {% endif %}
                        </td>
                        <td class="text-center">
                            {{ pemesanan.created_at }}
                        </td>
                        <td class="text-center">
                            {% if pemesanan.status === 'Pending' %}
                            <form action="{{url('pesan/cancel/' ~ pemesanan.id )}}" method="delete">
                                <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batalkan Pemesanan">
                                    Batal
                                </button>
                            </form>
                            {% else %}
                            <form action="{{url('pesan/selesai/' ~ pemesanan.id )}}" method="put">
                                <button type="submit" class="btn btn-sm btn-success" data-toggle="tooltip" title="Selesaikan Pemesanan">
                                    Selesai
                                </button>
                            </form>
                            {% endif %}
                        </td>
                    </tr>
                    {% set counter = counter + 1 %}
                    {% endfor %}
                {% else %}
                    <tr>
                        <td class="text-center" colspan = "6">Data Tidak Ditemukan</td>
                    </tr>
                {% endif %}
            </tbody>
        </table>
    </div>
</div>
<!-- END Hover Table -->
<h2 class="content-heading">
    <i class="si si-users mr-5"></i> List Pemijat
</h2>
<div class="row items-push">
    {% for pemijat in pemijats %}
    <div class="col-md-6 col-xl-3">
        <div class="block block-rounded text-center">
            <div class="block-content block-content-full">
                <img class="img-avatar" src="{{url('public/' ~ pemijat.gambar)}}" alt="">
            </div>
            <div class="block-content block-content-full block-content-sm bg-body-light">
                <div class="font-w600 mb-5">{{ pemijat.nama }}</div>
                <div style="display:block;text-overflow: ellipsis;width: 229.5px;overflow: hidden; white-space: nowrap;"class="font-size-sm text-muted">{{ pemijat.alamat }}</div>
                <div style="display:block;text-overflow: ellipsis;width: 229.5px;overflow: hidden; white-space: nowrap;"class="font-size-sm text-muted">Rp{{ pemijat.tarif }},00</div>
            </div>
            <div class="block-content block-content-full">
                <a class="btn btn-rounded btn-alt-success" href="{{url('pesan/' ~ pemijat.id )}}">
                    <i class="fa fa-plus mr-5"></i>Pesan
                </a>
                <a class="btn btn-rounded btn-alt-secondary" href="javascript:void(0)">
                    <i class="fa fa-user-circle mr-5"></i>Profile
                </a>
            </div>
        </div>
    </div>    
    {% endfor  %}
</div>