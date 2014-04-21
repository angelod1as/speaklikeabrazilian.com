<section id="main">
    <div class='container'>
        <div class='row'>
            {% include 'partials/moderators/menu.twig.php' %}
            <div class='col-xs-8' style='padding-top: 20px;'>
            {% if definition is defined and definition is not empty %}
                <p>Pending Expression</p>

                {% include 'partials/expressions/pending.twig.php' %}

                <div class='col-xs-offset-3 col-xs-3'>
                {{ Form.open({'url': '/moderators/approveExpression', 'class': 'form-inline center'}) }}
                    <input type='hidden' name='definitionId' value='{{ definition.id }}' />
                    <div class='form-group'>
                        {{ Form.submit('Approve', {'class': 'btn btn-success'}) }}
                    </div>
                {{ Form.close() }}
                </div>
                <div class='col-xs-3'>
                {{ Form.open({'url': '/moderators/rejectExpression', 'class': 'form-inline center'}) }}
                    <input type='hidden' name='definitionId' value='{{ definition.id }}' />
                    <div class='form-group'>
                        {{ Form.submit('Reject', {'class': 'btn btn-danger'}) }}
                    </div>
                {{ Form.close() }}
                </div>

            {% else %}
                <p>There are no pending expressions</p>
            {% endif %}
            </div>
            {# 2 columns wide #}
            {% include 'partials/sidebar.twig.php' %}
        </div>
    </div>
</section>