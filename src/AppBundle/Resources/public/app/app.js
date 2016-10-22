'use strict';

var app = {
    getCausal: function (element) {
        var name = $(element).parents("section").attr('data-parent-name');

        $.ajax({
            type: 'POST',
            url: Routing.generate('select_causales'),
            data: {
                id: $(element).val()
            },
            beforeSend: function (xhr) {
                $(".load-spinner").show();
            },
            complete: function (jqXHR, textStatus) {
                $(".load-spinner").hide();
            },
            success: function (data) {
                var $selector = $('.select-causal-' + name);

                $selector.html('<option>Selección opción</option>');
                for (var i = 0, total = data.length; i < total; i++) {
                    $selector.append('<option value="' + data[i].id + '">' + data[i].name + '</option>');
                }

                $(".load-spinner").hide();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $(".load-spinner").hide();
            }
        });
    },
    getClase: function (element) {
        var name = $(element).parents("section").attr('data-parent-name');

        $.ajax({
            type: 'POST',
            url: Routing.generate('select_clases'),
            data: {
                id: $(element).val()
            },
            beforeSend: function (xhr) {
                $(".load-spinner").show();
            },
            complete: function (jqXHR, textStatus) {
                $(".load-spinner").hide();
            },
            success: function (data) {
                var $selector = $('.select-clase-' + name);

                $selector.html('<option>Selección opción</option>');
                for (var i = 0, total = data.length; i < total; i++) {
                    $selector.append('<option value="' + data[i].id + '">' + data[i].name + '</option>');
                }

                $(".load-spinner").hide();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $(".load-spinner").hide();
            }
        });
    },
    embedFormCollection: function () {
        if ($("#collecction-fields-list").length <= 0) {
            return false;
        }

        var collectionCount = $("#collecction-fields-list").attr('data-collection-count');

        $('#add-another-collection').click(function (e) {
            e.preventDefault();

            var coleccionList = $('#collecction-fields-list');

            // grab the prototype template
            var newWidget = coleccionList.attr('data-prototype');
            // replace the "__name__" used in the id and name of the prototype
            // with a number that's unique to your emails
            // end name attribute looks like name="contact[emails][2]"
            newWidget = newWidget.replace(/__name__/g, collectionCount);
            collectionCount++;

            // create a new list element and add it to the list
            var newLi = $('<li></li>').html(newWidget);
            newLi.appendTo(coleccionList);
        });
    },
    removeFormCollection: function (element) {
        var parent = $(element).parents("li");

        $(parent).remove();
    }
};

$(document).ready(function () {
    app.embedFormCollection();
});
