$(function() {
    function loadHorairesOptions() {
        $.get('/api/horaires?all=1', function(res) {
            const opts = (res.horaires || []).map(h => `<option value="${h.id}">${h.libelle} (${h.started_at}-${h.ended_at})</option>`).join('');
            $('#group-horaire').html('<option value="">-- Aucun --</option>' + opts);
        });
    }

    function loadGroups() {
        $.get('/api/groupes', function(res) {
            const rows = (res.groups.data || res.groups).map((g, idx) => `<tr data-id="${g.id}"><td>${idx+1}</td><td>${g.libelle}</td><td>${g.horaire?g.horaire.libelle:'-'}</td><td><button class="btn btn-sm btn-primary btn-edit">✎</button></td></tr>`).join('');
            $('#groups-table tbody').html(rows);
        });
    }

    $('#btn-add-group').on('click', function(e) {
        e.preventDefault();
        $('#group-id').val('');
        $('#group-libelle').val('');
        loadHorairesOptions();
        new bootstrap.Modal(document.getElementById('groupModal')).show();
    });

    $(document).on('click', '.btn-edit', function() {
        const id = $(this).closest('tr').data('id');
        $.get('/api/groupes?all=1', function(res) {
            const g = (res.groups || []).find(x => x.id == id);
            if (!g) return alert('Groupe introuvable');
            $('#group-id').val(g.id);
            $('#group-libelle').val(g.libelle);
            loadHorairesOptions();
            setTimeout(() => $('#group-horaire').val(g.horaire_id || ''), 200);
            new bootstrap.Modal(document.getElementById('groupModal')).show();
        });
    });

    $('#btn-save-group').on('click', function() {
        const payload = {
            id: $('#group-id').val() || null,
            libelle: $('#group-libelle').val(),
            horaire_id: $('#group-horaire').val() || null
        };
        ProjectHelpers.ajaxPost('/api/groupes', payload)
            .done(function() {
                bootstrap.Modal.getInstance(document.getElementById('groupModal')).hide();
                loadGroups();
            })
            .fail(function(err) {
                var msg = err && err.responseJSON && err.responseJSON.errors ? err.responseJSON.errors.join(',') : (err.responseText || 'Erreur serveur');
                alert('Erreur: ' + msg);
            });
    });

    loadHorairesOptions();
    loadGroups();
});
