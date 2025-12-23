/* 
 *LIONNEL NAWEJ KAYEMBE
 */
(function($, ProjectHelpers) {
    'use strict';

    $(function() {
        var $agents = $('#select-agent');
        var $baremes = $('#select-bareme');

        function loadAgents() {
            ProjectHelpers.ajaxGet('/api/agents')
                .done(function(res) {
                    var items = res.data || res;
                    $agents.empty().append('<option value="">Choisir un agent...</option>');
                    $.each(items, function(i, a) { $agents.append('<option value="' + a.id + '">' + (a.nom || a.name || ('#' + a.id)) + '</option>'); });
                })
                .fail(function() { ProjectHelpers.showAlert('Impossible de charger la liste des agents', 'danger'); });
        }

        function loadBaremes() {
            ProjectHelpers.ajaxGet('/api/baremes_salariaux')
                .done(function(res) {
                    var items = res.data || res;
                    $baremes.empty().append('<option value="">Choisir un barème...</option>');
                    $.each(items, function(i, b) { $baremes.append('<option value="' + b.id + '">' + b.categorie + ' / ' + b.classe + ' / ' + b.echelon + ' (' + b.salaire_mensuel + ' ' + (b.devise || '') + ')' + '</option>'); });
                })
                .fail(function() { ProjectHelpers.showAlert('Impossible de charger les barèmes', 'danger'); });
        }

        $('#btn-assign-bareme').on('click', function() {
            var agentId = $agents.val();
            var baremeId = $baremes.val();
            var note = $('#assign-note').val();
            if (!agentId || !baremeId) { ProjectHelpers.showAlert('Choisir un agent et un barème', 'info'); return; }
            var payload = { agent_id: agentId, bareme_id: baremeId, note: note };
            ProjectHelpers.ajaxPost('/api/agent_baremes', payload)
                .done(function() { ProjectHelpers.showAlert('Barème affecté', 'success'); })
                .fail(function(xhr) {
                    var msg = 'Erreur';
                    if (xhr && xhr.responseJSON && xhr.responseJSON.message) msg = xhr.responseJSON.message;
                    ProjectHelpers.showAlert(msg, 'danger');
                });
        });

        loadAgents();
        loadBaremes();
    });

})(jQuery, window.ProjectHelpers || {});