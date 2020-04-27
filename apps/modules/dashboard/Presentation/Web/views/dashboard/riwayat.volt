{% extends 'layouts/base.volt' %}

{% block title %}
{% endblock %}

{% block morecss%}
{% endblock %}

{% block content %}
<h2 class="content-heading">
    <i class="si si-users mr-5"></i> Riwayat
</h2>
<!-- Hover Table -->
<div class="block">
    <div class="block-content">
        <table class="table table-hover table-vcenter">
            <thead>
                <tr>
                    
                    <th class="text-center">#</th>
                    {% if session.get('role') === 'Pelanggan' %}
                    <th>Nama Pemijat</th>
                    <th class="text-center" style="width: 15%;">Tarif</th>
                    {% elseif session.get('role') === 'Pemijat' %}
                    <th>Nama Pelanggan</th>
                    {% endif %}
                    <th class="text-center">Email</th>
                    <th class="d-none d-sm-table-cell" style="width: 15%;">Status</th>
                    <th class="text-center" style="width: 100px;">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                {% if pemesanans|length %}
                    {% set counter = 1 %}
                    {% for pemesanan in pemesanans %}
                    <tr>
                        <td class="text-center">{{ counter }}</td>
                        {% if session.get('role') === 'Pelanggan' %}
                        <td>{{ pemesanan.pemijat.nama }}</td>
                        <td class="text-center">
                            Rp{{ pemesanan.pemijat.tarif }},00
                        </td>
                        <td class="text-center">{{pemesanan.pemijat.email}}</td>
                        {% elseif session.get('role') === 'Pemijat' %}
                        <td>{{ pemesanan.pelanggan.nama }}</td>
                        <td class="text-center">{{pemesanan.pelanggan.email}}</td>
                        {% endif %}
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
{% endblock %}

{% block footer %}
{% endblock %}

{% block morejs %}
{% endblock %}

