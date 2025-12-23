(function() {
    function renderSites(items) {
        var $b = $('#sites-table tbody');
        $b.empty();
        items.forEach(function(s) {
            var secteur = s.secteur ? s.secteur.libelle : '-';
            var tr = '<tr>' +
                '<td>' + (s.name || '') + '</td>' +
                '<td>' + secteur + '</td>' +
                '<td>' + (s.adresse || '') + '</td>' +
                '<td>' + (s.phone || '') + '</td>' +
                '<td><a href="#" class="btn btn-sm btn-primary btn-edit-site" data-id="' + s.id + '">Modifier</a></td>' +
                '</tr>';
            $b.append(tr);
        });
    }

    function loadSites() {
        ProjectHelpers.ajaxGet('/api/sites', { key: 'all' }).done(function(res) {
            if (res && res.sites) {
                renderSites(res.sites);
            }
        }).fail(function() {
            ProjectHelpers.showAlert('Impossible de charger les sites', 'danger');
        });
    }

    function loadSectors() {
        ProjectHelpers.ajaxGet('/api/sectors', { key: 'all' }).done(function(res) {
            if (res && res.sectors) {
                var $sel = $('#site-secteur');
                $sel.empty().append('<option value="">-- Aucun --</option>');
                res.sectors.forEach(function(s) {
                    $sel.append('<option value="' + s.id + '">' + s.libelle + '</option>');
                });
            }
        }).fail(function() {

        });
    }

    function openNewSecteur() {
        $('#secteur-id').val('');
        $('#secteur-libelle').val('');
        var m = new bootstrap.Modal(document.getElementById('secteurModal'));
        m.show();
    }

    function saveSecteur(keepOpen) {
        keepOpen = !!keepOpen;
        var payload = {
            id: $('#secteur-id').val() || undefined,
            libelle: $('#secteur-libelle').val()
        };
        ProjectHelpers.ajaxPost('/api/sectors', payload).done(function(res) {
            if (res && res.status === 'success') {
                ProjectHelpers.showAlert('Secteur enregistré', 'success');

                loadSectors();
                if (keepOpen) {

                    $('#secteur-id').val('');
                    $('#secteur-libelle').val('');
                    $('#secteur-libelle').focus();
                } else {
                    var mEl = document.getElementById('secteurModal');
                    var m = bootstrap.Modal.getInstance(mEl);
                    if (m) m.hide();
                }
            } else if (res && res.errors) {
                ProjectHelpers.showAlert((res.errors || []).join('\n'), 'danger');
            }
        }).fail(function() {
            ProjectHelpers.showAlert('Erreur lors de l\'enregistrement du secteur', 'danger');
        });
    }

    function openNew() {
        $('#site-id').val('');
        $('#site-name').val('');
        $('#site-adresse').val('');
        $('#site-phone').val('');
        $('#site-secteur').val('');
        var m = new bootstrap.Modal(document.getElementById('siteModal'));
        m.show();
    }

    function openEdit(id) {

        ProjectHelpers.ajaxGet('/api/sites', { key: 'all' }).done(function(res) {
            if (res && res.sites) {
                var s = res.sites.find(function(x) { return x.id == id; });
                if (s) {
                    $('#site-id').val(s.id);
                    $('#site-name').val(s.name || '');
                    $('#site-adresse').val(s.adresse || '');
                    $('#site-phone').val(s.phone || '');
                    $('#site-secteur').val(s.secteur_id || '');
                    var m = new bootstrap.Modal(document.getElementById('siteModal'));
                    m.show();
                }
            }
        }).fail(function() {
            ProjectHelpers.showAlert('Impossible de charger le site', 'danger');
        });
    }

    function saveSite() {
        var payload = {
            id: $('#site-id').val() || undefined,
            name: $('#site-name').val(),
            adresse: $('#site-adresse').val(),
            phone: $('#site-phone').val(),
            secteur_id: $('#site-secteur').val() || null
        };
        ProjectHelpers.ajaxPost('/api/sites', payload).done(function(res) {
            if (res && res.status === 'success') {
                ProjectHelpers.showAlert('Site enregistré', 'success');
                var mEl = document.getElementById('siteModal');
                var m = bootstrap.Modal.getInstance(mEl);
                if (m) m.hide();
                loadSites();
            } else if (res && res.errors) {
                ProjectHelpers.showAlert((res.errors || []).join('\n'), 'danger');
            }
        }).fail(function(xhr) {
            ProjectHelpers.showAlert('Erreur lors de l\'enregistrement', 'danger');
        });
    }

    $(function() {
        loadSites();
        loadSectors();

        $('#btn-new-site').on('click', function(e) {
            e.preventDefault();
            openNew();
        });
        $('#btn-save-site').on('click', function(e) {
            e.preventDefault();
            saveSite();
        });

        $('#btn-new-secteur').on('click', function(e) {
            e.preventDefault();
            openNewSecteur();
        });
        $('#btn-save-secteur').on('click', function(e) {
            e.preventDefault();
            saveSecteur(false);
        });
        $('#btn-save-secteur-add').on('click', function(e) {
            e.preventDefault();
            saveSecteur(true);
        });

        $(document).on('click', '.btn-edit-site', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            openEdit(id);
        });
    });

})();
