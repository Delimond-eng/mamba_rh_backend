(function($, ProjectHelpers) {
    'use strict';

    $(function() {
        var $tbody = $('#types-table tbody');

        function fetch() {
            ProjectHelpers.ajaxGet('/api/autorisations_types')
                .done(function(res) { renderRows(res.data || res); })
                .fail(function() { ProjectHelpers.showAlert('Erreur lors du chargement des types', 'danger'); });
        }

        function renderRows(items) {
            $tbody.empty();
            $.each(items, function(i, t) {
                var $tr = $('<tr>');
                $tr.append($('<td>').text(t.id));
                $tr.append($('<td>').text(t.code));
                $tr.append($('<td>').text(t.libelle));
                $tr.append($('<td>').text(t.type));
                $tr.append($('<td>').text(t.nombre_jours || '—'));
                $tr.append($('<td>').text(t.payable ? 'Oui' : 'Non'));
                $tr.append($('<td>').text(t.justificatif_obligatoire ? 'Oui' : 'Non'));
                $tr.append($('<td>').text(t.status));
                var $actions = $('<td>');
                $actions.append('<button class="btn btn-sm btn-outline-primary btn-edit me-1" data-id="' + t.id + '">Modifier</button>');
                $actions.append('<button class="btn btn-sm btn-outline-danger btn-delete" data-id="' + t.id + '">Supprimer</button>');
                $tr.append($actions);
                $tbody.append($tr);
            });
            attachActions();
        }

        function attachActions() {
            $('.btn-edit').off('click').on('click', function() {
                var id = $(this).data('id');
                ProjectHelpers.ajaxGet('/api/autorisations_types/' + id).done(function(d) {
                    fillForm(d);
                    $('#typeModal').modal('show');
                }).fail(function() { ProjectHelpers.showAlert('Impossible de charger le type', 'danger'); });
            });

            $('.btn-delete').off('click').on('click', function() {
                var id = $(this).data('id');
                if (!confirm('Supprimer ce type ?')) return;
                ProjectHelpers.ajaxDelete('/api/autorisations_types/' + id)
                    .done(function() {
                        ProjectHelpers.showAlert('Type supprimé', 'success');
                        fetch();
                    })
                    .fail(function() { ProjectHelpers.showAlert('Erreur lors de la suppression', 'danger'); });
            });
        }

        function fillForm(d) {
            $('#type-id').val(d.id);
            $('#type-code').val(d.code);
            $('#type-libelle').val(d.libelle);
            $('#type-type').val(d.type || 'conge');
            $('#type-nombre').val(d.nombre_jours || '');
            $('#type-payable').prop('checked', !!d.payable);
            $('#type-justificatif').prop('checked', !!d.justificatif_obligatoire);
            $('#type-status').val(d.status || 'actif');
        }

        $('#btn-add-type').on('click', function(e) {
            e.preventDefault();
            $('#type-form')[0].reset();
            $('#type-id').val('');
            $('#type-status').val('actif');
            $('#type-payable').prop('checked', true);
            $('#typeModal').modal('show');
        });

        $('#btn-save-type').on('click', function() {
            var id = $('#type-id').val();
            var payload = {
                code: $('#type-code').val(),
                libelle: $('#type-libelle').val(),
                type: $('#type-type').val(),
                nombre_jours: $('#type-nombre').val() || null,
                payable: $('#type-payable').prop('checked') ? 1 : 0,
                justificatif_obligatoire: $('#type-justificatif').prop('checked') ? 1 : 0,
                status: $('#type-status').val()
            };

            var req = id ? ProjectHelpers.ajaxPut('/api/autorisations_types/' + id, payload) : ProjectHelpers.ajaxPost('/api/autorisations_types', payload);
            req.done(function() {
                $('#typeModal').modal('hide');
                ProjectHelpers.showAlert('Type enregistré', 'success');
                fetch();
            }).fail(function(xhr) {
                var msg = 'Erreur';
                if (xhr && xhr.responseJSON) {
                    if (xhr.responseJSON.message) msg = xhr.responseJSON.message;
                    else if (xhr.responseJSON.errors) {
                        var errs = xhr.responseJSON.errors;
                        var first = Object.keys(errs)[0];
                        msg = errs[first][0];
                    }
                }
                ProjectHelpers.showAlert(msg, 'danger');
            });
        });

        fetch();
    });

})(jQuery, window.ProjectHelpers || {});