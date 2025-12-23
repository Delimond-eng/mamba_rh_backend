(function() {
    function renderRows(items) {
        var $b = $('#separations-table tbody');
        $b.empty();
        items.forEach(function(s) {
            var agent = s.agent ? (s.agent.fullname || s.agent.matricule) : '—';
            var tr = '<tr>' +
                '<td>' + agent + '</td>' +
                '<td>' + (s.type || '') + '</td>' +
                '<td>' + (s.date_evenement || '') + '</td>' +
                '<td>' + (s.motif || '') + '</td>' +
                '<td>' + (s.status || '') + '</td>' +
                '<td>' +
                '<button class="btn btn-sm btn-outline-secondary btn-annule" data-id="' + s.id + '">Annuler</button>' +
                '</td>' +
                '</tr>';
            $b.append(tr);
        });
    }

    function loadSeparations() {
        ProjectHelpers.ajaxGet('/api/separations', { key: 'all' }).done(function(res) {
            if (res && res.data) {
                renderRows(res.data);
            }
        }).fail(function() { ProjectHelpers.showAlert('Impossible de charger les séparations', 'danger'); });
    }

    function loadActiveAgents() {

        ProjectHelpers.ajaxGet('/api/agents').done(function(res) {
            var items = res.data || [];
            var active = items.filter(function(a) { return (a.status || 'actif') === 'actif'; });
            var $sel = $('#separation-agent');
            $sel.empty();
            active.forEach(function(a) {
                var label = (a.fullname || a.matricule || '') + ' (' + (a.matricule || a.id) + ')';
                $sel.append('<option value="' + a.id + '">' + label + '</option>');
            });
            try { $sel.select2({ width: '100%', placeholder: 'Sélectionnez un agent', allowClear: true }); } catch (e) {}
        }).fail(function() { ProjectHelpers.showAlert('Impossible de charger les agents', 'danger'); });
    }

    function openNew() {
        $('#separation-form')[0].reset();
        $('#separation-agent').val('').trigger('change');
        $('#separation-date').val(new Date().toISOString().slice(0, 10));
        var m = new bootstrap.Modal(document.getElementById('separationModal'));
        m.show();
    }

    function saveSeparation() {
        var payload = {
            agent_id: $('#separation-agent').val(),
            type: $('#separation-type').val(),
            date_evenement: $('#separation-date').val(),
            motif: $('#separation-motif').val(),
            document_remis: $('#separation-document').is(':checked') ? 1 : 0,
            solde_final_effectue: $('#separation-solde').is(':checked') ? 1 : 0,
            decision_par: $('#separation-decision').val()
        };
        ProjectHelpers.ajaxPost('/api/separations', payload).done(function(res) {
            ProjectHelpers.showAlert('Séparation enregistrée', 'success');
            var mEl = document.getElementById('separationModal');
            var m = bootstrap.Modal.getInstance(mEl);
            if (m) m.hide();
            loadSeparations();
            loadActiveAgents();
        }).fail(function(xhr) {
            var msg = 'Erreur lors de l\'enregistrement';
            if (xhr && xhr.responseJSON && xhr.responseJSON.errors) msg = (xhr.responseJSON.errors || []).join('\n');
            ProjectHelpers.showAlert(msg, 'danger');
        });
    }

    function annuleSeparation(id) {
        if (!confirm('Annuler cette séparation ?')) return;
        ProjectHelpers.ajaxPut('/api/separations/' + id + '/status', { status: 'annule' }).done(function() {
            ProjectHelpers.showAlert('Séparation annulée', 'success');
            loadSeparations();
            loadActiveAgents();
        }).fail(function() { ProjectHelpers.showAlert('Erreur lors de l\'annulation', 'danger'); });
    }

    $(function() {
        loadSeparations();
        loadActiveAgents();

        $('#btn-new-separation').on('click', function(e) {
            e.preventDefault();
            openNew();
        });
        $('#btn-save-separation').on('click', function(e) {
            e.preventDefault();
            saveSeparation();
        });

        $(document).on('click', '.btn-annule', function(e) {
            e.preventDefault();
            annuleSeparation($(this).data('id'));
        });
    });
})();