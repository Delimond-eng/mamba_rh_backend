$(function() {

    function loadSelects() {

        ProjectHelpers.ajaxGet('/api/groupes?all=1').done(function(res) {
            var groups = res.groups || res || [];
            window.groupsCache = groups;
            var opts = (groups || []).map(function(g) { return '<option value="' + g.id + '">' + (g.libelle || g.name || g.label) + '</option>'; }).join('');
            $('#agent-groupe-horaire').append(opts);
        });

        ProjectHelpers.ajaxGet('/api/services').done(function(res) {
            var items = res.data || res || [];
            var opts = (items || []).map(function(s) { return '<option value="' + s.id + '">' + (s.nom || s.name || s.code || s.libelle) + ' (' + s.id + ')</option>'; }).join('');
            $('#agent-service').append(opts);
            try { $('#agent-service').select2({ width: '100%', placeholder: 'Sélectionnez un service', allowClear: true }); } catch (e) {}
        }).fail(function() { /* ignore */ });


        ProjectHelpers.ajaxGet('/api/sites', { key: 'all' }).done(function(res) {
            var items = res.sites || res || [];
            var opts = (items || []).map(function(s) { return '<option value="' + s.id + '">' + (s.name || s.libelle || s.label) + '</option>'; }).join('');
            $('#agent-site').append(opts);
            try { $('#agent-site').select2({ width: '100%', placeholder: 'Sélectionnez un site', allowClear: true }); } catch (e) {}
        }).fail(function() { /* ignore */ });

        ProjectHelpers.ajaxGet('/api/horaires?all=1').done(function(res) {
            var hrs = res.horaires || res || [];
            window.horairesCache = hrs;
            var opts = (hrs || []).map(function(h) { return '<option value="' + h.id + '">' + h.libelle + ' (' + h.started_at + '-' + h.ended_at + ')</option>'; }).join('');
            $('#agent-horaire').append(opts);
        });

        ProjectHelpers.ajaxGet('/api/baremes_salariaux?all=1').done(function(res) {
            var items = res.data || res || res.baremes || [];
            window.baremesCache = items;
            var opts = (items || []).map(function(b) { return '<option value="' + b.id + '">' + (b.fonction || b.libelle || b.name || b.label) + '</option>'; }).join('');
            $('#agent-bareme').append(opts);
        }).fail(function() {});


    }

    $('#btn-save-agent').on('click', function(e) {
        e.preventDefault();
        var payload = {

            agent_id: $('#agent-id').val() || null,
            matricule: $('#agent-matricule-input').val(),
            fullname: $('#agent-nom-local').val(),
            telephone: $('#agent-telephone').val(),
            email: $('#agent-email').val(),
            date_naissance: $('#agent-date-naissance').val(),
            date_embauche: $('#agent-date-embauche').val(),
            lieu_naissance: $('#agent-lieu-naissance').val(),
            adresse: $('#agent-adresse').val(),
            etat_civil: $('#agent-etat-civil').val(),
            est_marie: $('#agent-est-marie').is(':checked') ? 1 : 0,
            nom_conjoint: $('#agent-nom-conjoint').val(),
            nombre_enfants: $('#agent-nb-enfants').val(),
            noms_enfants: $('#agent-noms-enfants').val(),
            groupe_horaire: $('#agent-groupe-horaire').val(),
            service_id: $('#agent-service').val(),
            site_id: $('#agent-site').val(),
            bareme: $('#agent-bareme').val(),
            type_emploi: $('#agent-type-emploi').val(),
            password: $('#agent-password').val()
        };

        var photoUrl = $('#agent-photo-url').val();
        if (photoUrl) payload.photo_url = photoUrl;


        ProjectHelpers.ajaxPost('/api/agents/info', payload)
            .done(function() {
                ProjectHelpers.showAlert('Agent enregistré', 'success');
                $('#agent-profile-form').find('input,select').each(function() {
                    var t = $(this).prop('type');
                    if (t === 'checkbox' || t === 'radio') {
                        $(this).prop('checked', false);
                    } else {
                        $(this).val('');
                    }
                });
                $('#agent-photo-url').val('');
                $('#agent-id').val('');
                try { $('#agent-service').val('').trigger('change'); } catch (e) {}
                try { $('#agent-site').val('').trigger('change'); } catch (e) {}

                $('#agent-fullname').text(payload.fullname || 'Nouvel agent');
                $('#agent-matricule').text(payload.matricule || '-');
            }).fail(function(xhr) {

                var msg = 'Erreur lors de l\'enregistrement';
                try {
                    if (xhr && xhr.responseJSON && xhr.responseJSON.message) {
                        msg = xhr.responseJSON.message;
                    } else if (xhr && xhr.responseJSON && typeof xhr.responseJSON === 'object') {

                        if (xhr.responseJSON.errors) {
                            var first = Object.values(xhr.responseJSON.errors)[0];
                            if (Array.isArray(first)) msg = first[0];
                        }
                    }
                } catch (e) { /* ignore parse errors */ }
                ProjectHelpers.showAlert(msg, 'danger');
                console.error(xhr);
            });
    });


    (function prefillFromQuery() {
        try {
            var params = new URLSearchParams(window.location.search);
            var editId = params.get('edit_id');
            if (!editId) return;
            ProjectHelpers.ajaxGet('/api/agents/' + editId).done(function(res) {
                var a = res || res.data || {};

                $('#agent-matricule-input').val(a.matricule || '');
                $('#agent-fullname').text(a.fullname || '');
                $('#agent-matricule').text(a.matricule || '-');
                if (a.info) {
                    $('#agent-telephone').val(a.info.telephone || '');
                    $('#agent-email').val(a.info.email || '');
                    $('#agent-date-naissance').val(a.info.date_naissance || '');
                    $('#agent-date-embauche').val(a.info.date_embauche || '');
                    $('#agent-lieu-naissance').val(a.info.lieu_naissance || '');
                    $('#agent-adresse').val(a.info.adresse || '');
                    $('#agent-nom-conjoint').val(a.info.nom_conjoint || '');
                    $('#agent-nb-enfants').val(a.info.nombre_enfants || '');
                    $('#agent-noms-enfants').val((a.info.noms_enfants || []).join(', '));
                }

                $('#agent-id').val(a.id || '');

                if (a.service_id) { $('#agent-service').val(a.service_id).trigger('change'); }
                if (a.site && a.site.id) { $('#agent-site').val(a.site.id).trigger('change'); }
                if (a.groupe && a.groupe.id) $('#agent-groupe-horaire').val(a.groupe.id);
                if (a.photo) {
                    $('.avatar img').attr('src', a.photo);
                    $('#agent-photo-url').val(a.photo);
                }
            }).fail(function() { ProjectHelpers.showAlert('Impossible de charger les données de l\'agent', 'danger'); });
        } catch (e) { /* ignore */ }
    })();

    loadSelects();

    $('#agent-est-marie').on('change', function() {
        var show = $(this).is(':checked');
        $('#agent-nom-conjoint').closest('.col-md-3').toggle(show);
        $('#agent-nb-enfants').closest('.col-md-3').toggle(show);
        $('#agent-noms-enfants').closest('.col-md-3').toggle(show);
        if (!show) {
            $('#agent-nom-conjoint').val('');
            $('#agent-nb-enfants').val(0);
            $('#agent-noms-enfants').val('');
        }
    }).trigger('change');


    $('#agent-bareme').on('change', function() {
        var id = $(this).val();
        var b = (window.baremesCache || []).find(function(x) { return x.id == id; });
        if (!b) { $('#bareme-details').text(''); return; }
        var lines = [];
        lines.push('Fonction: ' + (b.fonction || ''));
        if (b.salaire_mensuel) lines.push('Salaire: ' + b.salaire_mensuel + ' ' + (b.devise || ''));
        if (b.prime_fonction) lines.push('Prime fonction: ' + b.prime_fonction);
        if (b.prime_risque) lines.push('Prime risque: ' + b.prime_risque);
        $('#bareme-details').html(lines.join(' — '));
    });


    $('#agent-groupe-horaire').on('change', function() {
        var gid = $(this).val();
        if (!gid) { $('#horaire-details').text(''); return; }
        ProjectHelpers.ajaxGet('/api/groupes?all=1').done(function(res) {
            var groups = res.groups || res || [];
            var g = groups.find(function(x) { return x.id == gid; });
            var html = '';
            if (g && g.horaire) {
                var h = g.horaire;
                html = 'Horaire: ' + (h.libelle || '') + ' — Début: ' + (h.started_at || '') + ' — Fin: ' + (h.ended_at || '');
            }
            $('#horaire-details').text(html);
        });
    });


    $('#btn-open-photo').on('click', function(e) {
        e.preventDefault();
        var $f = $('<input type="file" accept="image/*" style="display:none" />');
        $f.on('change', function() {
            var file = this.files[0];
            if (!file) return;
            var fd = new FormData();
            fd.append('photo', file);
            var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/api/agents/photo',
                method: 'POST',
                data: fd,
                processData: false,
                contentType: false,
                headers: { 'X-CSRF-TOKEN': token },
                success: function(res) {
                    if (res.url) {
                        $('.avatar img').attr('src', res.url);
                        ProjectHelpers.showAlert('Photo enregistrée', 'success');
                        $('#agent-photo-url').val(res.url);
                    }
                },
                error: function(err) { ProjectHelpers.showAlert('Erreur upload photo', 'danger'); }
            });
        });
        $('body').append($f);
        $f.trigger('click');
    });
});
