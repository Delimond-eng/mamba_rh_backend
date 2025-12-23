/* 
 *LIONNEL NAWEJ KAYEMBE
 */
(function($, ProjectHelpers) {
    'use strict';

    $(function() {
        var apiBase = '/api/services';
        var $tbody = $('#services-table tbody');
        var $modal = $('#serviceModal');

        function fetchServices() {
            ProjectHelpers.ajaxGet(apiBase)
                .done(function(res) { renderRows(res.data || res); })
                .fail(function() { ProjectHelpers.showAlert('Erreur lors du chargement des services', 'danger'); });
        }

        function renderRows(items) {
            $tbody.empty();
            $.each(items, function(i, s) {
                var $tr = $('<tr>');
                $tr.append($('<td>').text(s.id));
                $tr.append($('<td>').text(s.code));
                $tr.append($('<td>').text(s.nom));
                $tr.append($('<td>').text(s.description || ''));
                $tr.append($('<td>').text(s.actif ? 'Oui' : 'Non'));
                var $actions = $('<td>');
                $actions.append('<button class="btn btn-sm btn-outline-primary btn-edit me-1" data-id="' + s.id + '">Modifier</button>');
                $actions.append('<button class="btn btn-sm btn-outline-danger btn-delete" data-id="' + s.id + '">Supprimer</button>');
                $tr.append($actions);
                $tbody.append($tr);
            });
            attachActions();
        }

        function attachActions() {
            $('.btn-edit').off('click').on('click', function() {
                var id = $(this).data('id');
                ProjectHelpers.ajaxGet(apiBase + '/' + id).done(function(d) {
                    $('#service-id').val(d.id);
                    $('#service-code').val(d.code);
                    $('#service-nom').val(d.nom);
                    $('#service-description').val(d.description || '');
                    $('#service-actif').prop('checked', !!d.actif);
                    $modal.modal('show');
                }).fail(function() { ProjectHelpers.showAlert('Impossible de charger le service', 'danger'); });
            });

            $('.btn-delete').off('click').on('click', function() {
                if (!confirm('Supprimer ce service ?')) return;
                var id = $(this).data('id');
                ProjectHelpers.ajaxDelete(apiBase + '/' + id).done(function() {
                    ProjectHelpers.showAlert('Service supprimé', 'success');
                    fetchServices();
                }).fail(function() { ProjectHelpers.showAlert('Erreur lors de la suppression', 'danger'); });
            });
        }

        $('#btn-add-service').on('click', function() {
            $('#service-form')[0].reset();
            $('#service-id').val('');
            $modal.modal('show');
        });

        $('#save-service').on('click', function() {
            var id = $('#service-id').val();
            var payload = {
                code: $('#service-code').val().trim(),
                nom: $('#service-nom').val().trim(),
                description: $('#service-description').val().trim(),
                actif: $('#service-actif').prop('checked') ? 1 : 0
            };
            var req = id ? ProjectHelpers.ajaxPut(apiBase + '/' + id, payload) : ProjectHelpers.ajaxPost(apiBase, payload);
            req.done(function() {
                $modal.modal('hide');
                ProjectHelpers.showAlert('Enregistré avec succès', 'success');
                fetchServices();
            }).fail(function(xhr) {
                var msg = 'Erreur';
                if (xhr && xhr.responseJSON && xhr.responseJSON.message) msg = xhr.responseJSON.message;
                ProjectHelpers.showAlert(msg, 'danger');
            });
        });

        fetchServices();
    });

})(jQuery, window.ProjectHelpers || {});