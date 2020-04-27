{% extends 'layouts/base.volt' %}

{% block title %}
{% endblock %}

{% block morecss%}
{% endblock %}

{% block content %}
    {% if session.get('role') === 'Pelanggan' %}
        {% include 'pelanggan/profile.volt' %}
    {% elseif session.get('role') === 'Pemijat' %}
        {% include 'pemijat/profile.volt' %}
    {% endif %}
{% endblock %}

{% block footer %}
{% endblock %}

{% block morejs %}>
{% endblock %}

