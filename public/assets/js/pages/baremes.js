/* 
 *LIONNEL NAWEJ KAYEMBE
 */
(function($, ProjectHelpers) {
    'use strict';

    $(function() {
        var $tbody = $('#baremes-table tbody');

        function fetch() {
            ProjectHelpers.ajaxGet('/api/baremes_salariaux')
                .done(function(res) { renderRows(res.data || res); })
                .fail(function() { ProjectHelpers.showAlert('Erreur lors du chargement des barèmes', 'danger'); });
        }

        function renderRows(items) {
            $tbody.empty();
            $.each(items, function(i, b) {
                var $tr = $('<tr>');
                $tr.append($('<td>').text(b.id));

                $tr.append($('<td>').text(b.categorie));
                $tr.append($('<td>').text(b.classe));
                $tr.append($('<td>').text(b.echelon));
                $tr.append($('<td>').text((b.salaire_mensuel || 0) + ' ' + (b.devise || '')));
                $tr.append($('<td>').text(b.statut));
                var $actions = $('<td>');
                $actions.append('<button class="btn btn-sm btn-outline-primary btn-edit me-1" data-id="' + b.id + '">Modifier</button>');
                $actions.append('<button class="btn btn-sm btn-outline-danger btn-delete" data-id="' + b.id + '">Supprimer</button>');
                $tr.append($actions);
                $tbody.append($tr);
            });
            attachActions();
        }

        function attachActions() {
            $('.btn-edit').off('click').on('click', function() {
                var id = $(this).data('id');
                ProjectHelpers.ajaxGet('/api/baremes_salariaux/' + id).done(function(d) {
                    fillForm(d);
                    $('#baremeModal').modal('show');
                }).fail(function() { ProjectHelpers.showAlert('Impossible de charger le barème', 'danger'); });
            });

            $('.btn-delete').off('click').on('click', function() {
                var id = $(this).data('id');
                if (!confirm('Supprimer ce barème ?')) return;
                ProjectHelpers.ajaxDelete('/api/baremes_salariaux/' + id)
                    .done(function() {
                        ProjectHelpers.showAlert('Barème supprimé', 'success');
                        fetch();
                    })
                    .fail(function() { ProjectHelpers.showAlert('Erreur lors de la suppression', 'danger'); });
            });
        }

        function fillForm(d) {
            $('#bareme-id').val(d.id);

            $('#bareme-categorie').val(d.categorie);
            $('#bareme-classe').val(d.classe);
            $('#bareme-echelon').val(d.echelon);
            $('#bareme-fonction').val(d.fonction || '');
            $('#bareme-salaire').val(d.salaire_mensuel || '');
            $('#bareme-devise').val(d.devise || 'USD');
            $('#bareme-allocation').val(d.allocation_familiale || 0);
            $('#bareme-transport-j').val(d.transport_journalier || 0);
            $('#bareme-transport-m').val(d.transport_mensuel || 0);
            $('#bareme-prime-fonction').val(d.prime_fonction || 0);
            $('#bareme-prime-risque').val(d.prime_risque || 0);
            $('#bareme-prime-anciennete').val(d.prime_anciennete || 0);
            $('#bareme-treizieme').prop('checked', !!d.treizieme_mois);
            $('#bareme-treizieme-montant').val(d.treizieme_mois_montant || 0);
            $('#bareme-statut').val(d.statut || 'actif');
            $('#bareme-note').val(d.note || '');
        }


        $('#btn-add-bareme').on('click', function(e) {
            e.preventDefault();
            $('#bareme-form')[0].reset();
            $('#bareme-id').val('');
            $('#bareme-devise').val('USD');
            $('#baremeModal').modal('show');
        });

        $('#btn-save-bareme').on('click', function() {
            var id = $('#bareme-id').val();
            var payload = {
                categorie: $('#bareme-categorie').val(),
                classe: $('#bareme-classe').val(),
                echelon: $('#bareme-echelon').val(),
                fonction: $('#bareme-fonction').val(),
                salaire_mensuel: parseFloat($('#bareme-salaire').val() || 0),
                devise: $('#bareme-devise').val(),
                allocation_familiale: parseFloat($('#bareme-allocation').val() || 0),
                transport_journalier: parseFloat($('#bareme-transport-j').val() || 0),
                transport_mensuel: parseFloat($('#bareme-transport-m').val() || 0),
                prime_fonction: parseFloat($('#bareme-prime-fonction').val() || 0),
                prime_risque: parseFloat($('#bareme-prime-risque').val() || 0),
                prime_anciennete: parseFloat($('#bareme-prime-anciennete').val() || 0),
                treizieme_mois: $('#bareme-treizieme').prop('checked') ? 1 : 0,
                treizieme_mois_montant: parseFloat($('#bareme-treizieme-montant').val() || 0),
                statut: $('#bareme-statut').val(),
                note: $('#bareme-note').val()
            };

            var req = id ? ProjectHelpers.ajaxPut('/api/baremes_salariaux/' + id, payload) : ProjectHelpers.ajaxPost('/api/baremes_salariaux', payload);
            req.done(function() {
                $('#baremeModal').modal('hide');
                ProjectHelpers.showAlert('Barème enregistré', 'success');
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
