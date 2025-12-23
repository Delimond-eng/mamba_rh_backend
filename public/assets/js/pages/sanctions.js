(function() {
    function renderRows(items) {
        var $b = $('#sanctions-table tbody');
        $b.empty();
        items.forEach(function(s) {
            var agent = s.agent ? (s.agent.fullname || s.agent.matricule) : '—';
            var tr = '<tr>' +
                '<td>' + agent + '</td>' +
                '<td>' + (s.type || '') + '</td>' +
                '<td>' + (s.duree_jours || '') + '</td>' +
                '<td>' + (s.date_sanction || '') + '</td>' +
                '<td>' + (s.motif || '') + '</td>' +
                '<td>' + (s.statut || '') + '</td>' +
                '<td>' +
                '<button class="btn btn-sm btn-outline-secondary btn-raise" data-id="' + s.id + '">Levee</button>' +
                '<button class="btn btn-sm btn-outline-danger btn-cancel ms-1" data-id="' + s.id + '">Annuler</button>' +
                '</td>' +
                '</tr>';
            $b.append(tr);
        });
    }

    function loadSanctions() {
        ProjectHelpers.ajaxGet('/api/sanctions', { key: 'all' }).done(function(res) {
            if (res && res.data) {
                renderRows(res.data);
            }
        }).fail(function() { ProjectHelpers.showAlert('Impossible de charger les sanctions', 'danger'); });
    }

    function loadActiveAgents() {
        ProjectHelpers.ajaxGet('/api/agents').done(function(res) {
            var items = res.data || [];
            var active = items.filter(function(a) { return (a.status || 'actif') === 'actif'; });
            var $sel = $('#sanction-agents');
            $sel.empty();
            active.forEach(function(a) {
                var label = (a.fullname || a.matricule || '') + ' (' + (a.matricule || a.id) + ')';
                $sel.append('<option value="' + a.id + '">' + label + '</option>');
            });
            try { $sel.select2({ width: '100%', placeholder: 'Sélectionnez des agents', allowClear: true }); } catch (e) {}
        }).fail(function() { ProjectHelpers.showAlert('Impossible de charger les agents', 'danger'); });
    }

    function openNew() {
        $('#sanction-form')[0].reset();
        $('#sanction-agents').val(null).trigger('change');
        $('#sanction-date').val(new Date().toISOString().slice(0, 10));
        $('#duree-wrapper').hide();
        var m = new bootstrap.Modal(document.getElementById('sanctionModal'));
        m.show();
    }

    function saveSanction() {
        var agentIds = $('#sanction-agents').val() || [];
        if (!agentIds || agentIds.length === 0) { ProjectHelpers.showAlert('Veuillez sélectionner au moins un agent', 'danger'); return; }
        var type = $('#sanction-type').val();
        var payload = {
            agent_ids: agentIds,
            type: type,
            duree_jours: type === 'mise_a_pied' ? parseInt($('#sanction-duree').val() || 0) : null,
            date_sanction: $('#sanction-date').val(),
            motif: $('#sanction-motif').val()
        };
        if (type === 'mise_a_pied' && (!payload.duree_jours || payload.duree_jours <= 0)) { ProjectHelpers.showAlert('Veuillez indiquer la durée en jours pour la mise à pied', 'danger'); return; }
        ProjectHelpers.ajaxPost('/api/sanctions', payload).done(function(res) {
            ProjectHelpers.showAlert('Sanctions enregistrées', 'success');
            var mEl = document.getElementById('sanctionModal');
            var m = bootstrap.Modal.getInstance(mEl);
            if (m) m.hide();
            loadSanctions();
            loadActiveAgents();
        }).fail(function(xhr) {
            var msg = 'Erreur';
            if (xhr && xhr.responseJSON) {
                if (xhr.responseJSON.errors) {

                    var parts = [];
                    Object.keys(xhr.responseJSON.errors).forEach(function(k) {
                        var arr = xhr.responseJSON.errors[k] || [];
                        arr.forEach(function(m) { parts.push(m); });
                    });
                    if (parts.length) msg = parts.join('\n');
                } else if (xhr.responseJSON.message) {
                    msg = xhr.responseJSON.message;
                }
            }
            ProjectHelpers.showAlert(msg, 'danger');
        });
    }

    function changeStatus(id, statut) {
        ProjectHelpers.ajaxPut('/api/sanctions/' + id + '/status', { statut: statut }).done(function() {
            ProjectHelpers.showAlert('Statut modifié', 'success');
            loadSanctions();
            loadActiveAgents();
        }).fail(function() { ProjectHelpers.showAlert('Erreur', 'danger'); });
    }

    $(function() {
        loadSanctions();
        loadActiveAgents();

        $('#btn-new-sanction').on('click', function(e) {
            e.preventDefault();
            openNew();
        });
        $('#btn-save-sanction').on('click', function(e) {
            e.preventDefault();
            saveSanction();
        });

        $('#sanction-type').on('change', function() {
            if ($(this).val() === 'mise_a_pied') $('#duree-wrapper').show();
            else $('#duree-wrapper').hide();
        });

        $(document).on('click', '.btn-raise', function(e) {
            e.preventDefault();
            changeStatus($(this).data('id'), 'levee');
        });
        $(document).on('click', '.btn-cancel', function(e) {
            e.preventDefault();
            changeStatus($(this).data('id'), 'annulee');
        });
    });
})();