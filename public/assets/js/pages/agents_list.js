(function($, ProjectHelpers) {
    'use strict';

    $(function() {
        var $tableBody = $('#agents-table tbody');

        function loadAgents() {
            ProjectHelpers.ajaxGet('/api/agents')
                .done(function(res) {
                    var items = res.data || res;
                    $tableBody.empty();
                    $.each(items, function(i, a) {
                        var info = a.info || a.agentInfo || {};
                        var tr = $('<tr/>');
                        tr.append('<td>' + (i + 1) + '</td>');
                        // photo
                        var photoSrc = a.photo || '/assets/img/user-placeholder.png';
                        tr.append('<td><img src="' + photoSrc + '" class="rounded-circle" style="width:40px;height:40px;object-fit:cover"/></td>');
                        tr.append('<td>' + (a.matricule || '-') + '</td>');
                        tr.append('<td>' + (a.fullname || '-') + '</td>');
                        tr.append('<td>' + (a.telephone || '-') + '</td>');
                        tr.append('<td>' + (a.email || '-') + '</td>');
                        tr.append('<td>' + (a.service && a.service.name ? a.service.name : '-') + '</td>');
                        tr.append('<td>' + (a.groupe && a.groupe.name ? a.groupe.name : '-') + '</td>');
                        var actions = '<a href="#" class="btn btn-sm btn-primary btn-view-agent me-1" data-id="' + a.id + '">Voir</a>';
                        actions += '<a href="/agents?edit_id=' + a.id + '" class="btn btn-sm btn-secondary me-1">Modifier</a>';
                        actions += '<a href="#" class="btn btn-sm btn-info btn-edit-inline" data-id="' + a.id + '">Compléter</a>';
                        tr.append('<td>' + actions + '</td>');
                        $tableBody.append(tr);
                    });
                })
                .fail(function() { ProjectHelpers.showAlert('Impossible de charger la liste des agents', 'danger'); });
        }


        $(document).on('click', '.btn-view-agent', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            ProjectHelpers.ajaxGet('/api/agents/' + id).done(function(res) {
                var a = res || res.data || {};
                var info = a.info || a.agentInfo || {};
                var html = [];
                html.push('<div>');
                html.push('<ul class="nav nav-tabs" id="agentTabsModal" role="tablist">');
                html.push('<li class="nav-item" role="presentation"><button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab">Infos privées</button></li>');
                html.push('<li class="nav-item" role="presentation"><button class="nav-link" id="presence-tab" data-bs-toggle="tab" data-bs-target="#presence" type="button" role="tab">Présence</button></li>');
                html.push('<li class="nav-item" role="presentation"><button class="nav-link" id="paie-tab" data-bs-toggle="tab" data-bs-target="#paie" type="button" role="tab">Paie</button></li>');
                html.push('</ul>');
                html.push('<div class="tab-content p-3">');

                // Info tab
                html.push('<div class="tab-pane fade show active" id="info" role="tabpanel">');
                html.push('<div class="row">');
                html.push('<div class="col-md-4 text-center">');
                html.push('<img src="' + (a.photo || '/assets/img/user-placeholder.png') + '" class="rounded-circle img-fluid mb-2" />');
                html.push('<h5>' + (a.fullname || '-') + '</h5>');
                html.push('<p class="small text-muted">Matricule: ' + (a.matricule || '-') + '</p>');
                html.push('</div>');
                html.push('<div class="col-md-8">');
                html.push('<p><strong>Téléphone:</strong> ' + (info.telephone || '-') + '</p>');
                html.push('<p><strong>Email:</strong> ' + (info.email || '-') + '</p>');
                html.push('<p><strong>Lieu de naissance:</strong> ' + (info.lieu_naissance || '-') + '</p>');
                html.push('<p><strong>Date de naissance:</strong> ' + (info.date_naissance || '-') + '</p>');
                html.push('<p><strong>Adresse:</strong> ' + (info.adresse || '-') + '</p>');
                html.push('</div>');
                html.push('</div>');
                html.push('</div>');


                html.push('<div class="tab-pane fade" id="presence" role="tabpanel">');
                html.push('<p><strong>Service:</strong> ' + ((a.site && (a.site.nom || a.site.name)) || '-') + '</p>');
                html.push('<p><strong>Groupe:</strong> ' + ((a.groupe && (a.groupe.libelle || a.groupe.name)) || '-') + '</p>');
                html.push('<p><strong>Date d\'embauche:</strong> ' + ((a.info && a.info.date_embauche) || '-') + '</p>');
                html.push('<p><strong>Type d\'emploi:</strong> ' + ((a.info && a.info.type_emploi) || '-') + '</p>');
                html.push('</div>');


                html.push('<div class="tab-pane fade" id="paie" role="tabpanel">');
                html.push('<p><strong>Barème:</strong> ' + ((a.bareme && (a.bareme.libelle || a.bareme.fonction)) || '-') + '</p>');
                html.push('<p><strong>Statut:</strong> ' + (a.status || '-') + '</p>');
                html.push('</div>');

                html.push('</div>');
                html.push('</div>');
                $('#agent-bulletin-body').html(html.join(''));
                $('#btn-edit-agent-from-bulletin').attr('href', '/agents?edit_id=' + id);
                var modal = new bootstrap.Modal(document.getElementById('agentBulletinModal'));
                modal.show();
            }).fail(function() { ProjectHelpers.showAlert('Impossible de charger le bulletin', 'danger'); });
        });


        $(document).on('click', '.btn-edit-inline', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            ProjectHelpers.ajaxGet('/api/agents/' + id).done(function(res) {
                var a = res || res.data || {};
                var info = a.info || a.agentInfo || {};
                $('#edit-agent-id').val(a.id || '');
                $('#edit-agent-fullname').val(a.fullname || '');
                $('#edit-agent-telephone').val(info.telephone || '');
                $('#edit-agent-email').val(info.email || '');
                $('#edit-agent-date-embauche').val(info.date_embauche || '');
                var modal = new bootstrap.Modal(document.getElementById('agentEditModal'));
                modal.show();
            }).fail(function() { ProjectHelpers.showAlert('Impossible de charger les données', 'danger'); });
        });


        $('#btn-save-agent-inline').on('click', function(e) {
            var pid = $('#edit-agent-id').val();
            var payload = {
                agent_id: pid,
                fullname: $('#edit-agent-fullname').val(),
                telephone: $('#edit-agent-telephone').val(),
                email: $('#edit-agent-email').val(),
                date_embauche: $('#edit-agent-date-embauche').val()
            };
            ProjectHelpers.ajaxPost('/api/agents/info', payload).done(function(res) {
                ProjectHelpers.showAlert('Agent mis à jour', 'success');

                loadAgents();
                var modalEl = document.getElementById('agentEditModal');
                var modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();
            }).fail(function(xhr) {
                var msg = 'Erreur lors de la sauvegarde';
                try { if (xhr && xhr.responseJSON && xhr.responseJSON.message) msg = xhr.responseJSON.message; } catch (e) {}
                ProjectHelpers.showAlert(msg, 'danger');
            });
        });

        loadAgents();
    });

})(jQuery, window.ProjectHelpers || {});
