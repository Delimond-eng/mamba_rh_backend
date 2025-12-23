(function($, ProjectHelpers) {
    'use strict';

    $(function() {
        var $agentsList = $('#conges-agents-list');
        var $types = $('#conges-type');
        var $dateDebut = $('#conges-date-debut');
        var $filterSite = $('#filter-site');
        var $filterMatricule = $('#filter-matricule');
        var $filterNom = $('#filter-nom');

        var allAgents = [];
        var allSites = [];
        var allTypes = [];
        var currentMode = 'conge';

        function renderAgents(items) {
            $agentsList.empty();
            items.forEach(function(a) {
                var label = (a.fullname || a.nom || a.name || '') + ' (' + (a.matricule || a.id) + ')';
                var siteLabel = a.site && a.site.code ? (' — ' + a.site.code) : '';
                var $el = $('<button type="button" class="list-group-item list-group-item-action agent-item" data-id="' + a.id + '">' + label + siteLabel + '</button>');
                $agentsList.append($el);
            });
        }

        function loadAgents() {
            ProjectHelpers.ajaxGet('/api/agents')
                .done(function(res) {
                    allAgents = (res.data || res || []).map(function(a) {

                        a.fullname = a.fullname || (a.nom || (a.name));
                        return a;
                    });
                    applyFilters();
                })
                .fail(function() { ProjectHelpers.showAlert('Impossible de charger la liste des agents', 'danger'); });
        }

        function loadSites() {
            ProjectHelpers.ajaxGet('/api/sites')
                .done(function(res) {
                    allSites = (res.data || res || []);
                    $filterSite.empty().append('<option value="">Tous les sites</option>');
                    allSites.forEach(function(s) { $filterSite.append('<option value="' + s.id + '">' + (s.nom || s.name || s.code) + '</option>'); });
                }).fail(function() { /* ignore */ });
        }

        function applyFilters() {
            var siteId = $filterSite.val();
            var matriculeQ = ($filterMatricule.val() || '').toLowerCase();
            var nomQ = ($filterNom.val() || '').toLowerCase();
            var filtered = allAgents.filter(function(a) {
                if (siteId && (String(a.site_id || (a.site && a.site.id) || '') !== String(siteId))) return false;
                if (matriculeQ && !(String(a.matricule || '').toLowerCase().indexOf(matriculeQ) !== -1)) return false;
                if (nomQ && !((a.fullname || '').toLowerCase().indexOf(nomQ) !== -1)) return false;
                return true;
            });
            renderAgents(filtered);
        }

        function renderTypes() {
            $types.empty().append('<option value="">-- Choisir --</option>');
            var items = allTypes.filter(function(t) { return (t.type || 'conge') === currentMode; });
            items.forEach(function(t) { $types.append('<option value="' + t.id + '">' + (t.libelle || t.code || t.name) + '</option>'); });
        }

        function loadTypes() {
            ProjectHelpers.ajaxGet('/api/autorisations_types')
                .done(function(res) {
                    allTypes = res.data || res || res.autorisations_types || [];
                    renderTypes();
                })
                .fail(function() { ProjectHelpers.showAlert('Impossible de charger les types de congés', 'danger'); });
        }

        $(document).on('click', '.agent-item', function() {
            $(this).toggleClass('active');
        });

        $('#btn-assign-conges').on('click', function(e) {
            e.preventDefault();
            var agentIds = [];
            $agentsList.find('.agent-item.active').each(function() { agentIds.push($(this).data('id')); });
            var typeId = $types.val();
            var dateDebut = $dateDebut.val();
            if (!agentIds || agentIds.length === 0) { ProjectHelpers.showAlert('Sélectionner au moins un agent', 'info'); return; }
            if (!typeId) { ProjectHelpers.showAlert('Choisir un type de congé', 'info'); return; }
            if (!dateDebut) { ProjectHelpers.showAlert('Choisir une date de début', 'info'); return; }

            var payload = {
                agent_ids: agentIds,
                autorisation_type_id: typeId,
                date_debut: dateDebut
            };

            ProjectHelpers.ajaxPost('/api/conges/assign', payload)
                .done(function(res) {
                    ProjectHelpers.showAlert('Congés affectés: ' + (res.created || 0), 'success');
                })
                .fail(function(xhr) {
                    var msg = 'Erreur lors de l\'affectation';
                    if (xhr && xhr.responseJSON && xhr.responseJSON.message) msg = xhr.responseJSON.message;
                    ProjectHelpers.showAlert(msg, 'danger');
                });
        });

        loadSites();
        loadAgents();
        loadTypes();

        $filterSite.on('change', applyFilters);
        $filterMatricule.on('input', applyFilters);
        $filterNom.on('input', applyFilters);

        $('input[name="assign_mode"]').on('change', function() {
            currentMode = $('input[name="assign_mode"]:checked').val();
            renderTypes();
        });
    });

})(jQuery, window.ProjectHelpers || {});
