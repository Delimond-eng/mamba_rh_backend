$(function() {
    // const $table = $('#horaires-table tbody');

    function loadHoraires() {
        $.get('/api/horaires', function(res) {
            const rows = (res.horaires.data || res.horaires).map((h, idx) => {
                return `<tr data-id="${h.id}"><td>${idx+1}</td><td>${h.libelle}</td><td>${h.started_at}</td><td>${h.ended_at}</td><td>${h.tolerence||''}</td><td><button class="btn btn-sm btn-primary btn-edit">✎</button></td></tr>`;
            }).join('');
            $('#horaires-table tbody').html(rows);
        });
    }

    $('#btn-add-horaire').on('click', function(e) {
        e.preventDefault();
        $('#horaire-id').val('');
        $('#horaire-libelle').val('');
        $('#horaire-started').val('08:00');
        $('#horaire-ended').val('17:00');
        $('#horaire-tolerence').val('');
        new bootstrap.Modal(document.getElementById('horaireModal')).show();
    });

    $(document).on('click', '.btn-edit', function() {
        const $tr = $(this).closest('tr');
        const id = $tr.data('id');
        $.get('/api/horaires?all=1', function(res) {
            const h = (res.horaires || []).find(x => x.id == id);
            if (!h) return alert('Horaire introuvable');
            $('#horaire-id').val(h.id);
            $('#horaire-libelle').val(h.libelle);
            $('#horaire-started').val(h.started_at);
            $('#horaire-ended').val(h.ended_at);
            $('#horaire-tolerence').val(h.tolerence || '');
            new bootstrap.Modal(document.getElementById('horaireModal')).show();
        });
    });

    $('#btn-save-horaire').on('click', function() {
        const payload = {
            id: $('#horaire-id').val() || null,
            libelle: $('#horaire-libelle').val(),
            started_at: $('#horaire-started').val(),
            ended_at: $('#horaire-ended').val(),
            tolerence: $('#horaire-tolerence').val()
        };
        ProjectHelpers.ajaxPost('/api/horaires', payload)
            .done(function() {
                bootstrap.Modal.getInstance(document.getElementById('horaireModal')).hide();
                loadHoraires();
            })
            .fail(function(err) {
                var msg = err && err.responseJSON && err.responseJSON.errors ? err.responseJSON.errors.join(',') : (err.responseText || 'Erreur serveur');
                alert('Erreur: ' + msg);
            });
    });

    loadHoraires();
});
