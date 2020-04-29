<div class="row gutters-tiny invisible" data-toggle="appear">
    <!-- Row #1 -->
    <div class="col-6 col-xl-3">
        <a class="block block-link-shadow text-right" href="javascript:void(0)">
            <div class="block-content block-content-full clearfix">
                <div class="float-left mt-10 d-none d-sm-block">
                    <i class="si si-bag fa-3x text-body-bg-dark"></i>
                </div>
                <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="{{ pemijatan }}">0</div>
                <div class="font-size-sm font-w600 text-uppercase text-muted">Pemijatan</div>
            </div>
        </a>
    </div>
    <div class="col-6 col-xl-3">
        <a class="block block-link-shadow text-right" href="javascript:void(0)">
            <div class="block-content block-content-full clearfix">
                <div class="float-left mt-10 d-none d-sm-block">
                    <i class="si si-wallet fa-3x text-body-bg-dark"></i>
                </div>
                <div class="font-size-h3 font-w600">Rp<span data-toggle="countTo" data-speed="1000" data-to="{{ penghasilan }}">0</span></div>
                <div class="font-size-sm font-w600 text-uppercase text-muted">Penghasilan</div>
            </div>
        </a>
    </div>
    <div class="col-6 col-xl-3">
        <a class="block block-link-shadow text-right" href="javascript:void(0)">
            <div class="block-content block-content-full clearfix">
                <div class="float-left mt-10 d-none d-sm-block">
                    <i class="si si-envelope-open fa-3x text-body-bg-dark"></i>
                </div>
                <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="{{ pemesanans|length }}">0</div>
                <div class="font-size-sm font-w600 text-uppercase text-muted">Pemesanan</div>
            </div>
        </a>
    </div>
    <div class="col-6 col-xl-3">
        <a class="block block-link-shadow text-right" href="javascript:void(0)">
            <div class="block-content block-content-full clearfix">
                <div class="float-left mt-10 d-none d-sm-block">
                    <i class="si si-users fa-3x text-body-bg-dark"></i>
                </div>
                <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="{{ orang }}">0</div>
                <div class="font-size-sm font-w600 text-uppercase text-muted">Orang</div>
            </div>
        </a>
    </div>
    <!-- END Row #1 -->
</div>
<!-- Dynamic Table Full Pagination -->
<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Pemesanan</h3>
    </div>
    <div class="block-content block-content-full">
        {{ flashSession.output() }}
        <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality initialized in js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
            <thead>
                <tr>
                    <th class="text-center"></th>
                    <th>Name</th>
                    <th class="d-none d-sm-table-cell">Email</th>
                    <th class="d-none d-sm-table-cell" style="width: 15%;">Status</th>
                    <th class="text-center" style="width: 15%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {% set counter = 1 %}
                {% for pemesanan in pemesanans %}
                <tr>
                    <td class="text-center">{{ counter }}</td>
                    <td class="font-w600">{{ pemesanan.pelanggan.nama }}</td>
                    <td class="d-none d-sm-table-cell">{{ pemesanan.pelanggan.email }}</td>
                    <td class="d-none d-sm-table-cell">
                        <span class="badge badge-warning">{{ pemesanan.status }}</span>
                    </td>
                    <td class="text-center">
                        
                        <form action="{{url('pesan/tolak/' ~ pemesanan.id )}}" method="post">
                            <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Tolak Pemesanan">
                                Tolak
                            </button>
                        </form>
                        <form action="{{url('pesan/terima/' ~ pemesanan.id )}}" method="post">
                            <button type="submit" class="btn btn-sm btn-success" data-toggle="tooltip" title="Terima Pemesanan">
                                Terima
                            </button>
                        </form>
                    </td>
                </tr>
                {% set counter = counter + 1 %}
                {% endfor %}
            </tbody>
        </table>
    </div>
</div>
<!-- END Dynamic Table Full Pagination -->