{% extends 'layouts/base.volt' %}

{% block title %}
{% endblock %}

{% block morecss%}
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{url('public/assets/js/plugins/datatables/dataTables.bootstrap4.min.css')}}">
{% endblock %}

{% block content %}
    {% if session.get('role') === 'Pelanggan' %}
        {% include 'pelanggan/dashboard.volt' %}
    {% elseif session.get('role') === 'Pemijat' %}
        {% include 'pemijat/dashboard.volt' %}
    {% endif %}

{% endblock %}

{% block footer %}
{% endblock %}

{% block morejs %}
    <!-- Page JS Plugins -->
    <script src="{{url('public/assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('public/assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page JS Code -->
    <script src="{{url('assets/js/pages/be_tables_datatables.js')}}"></script>
{% endblock %}

