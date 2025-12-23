(function($, ProjectHelpers) {
    'use strict';

    $(function() {
        var $replacing = $('#agent-replacing');
        var $replaced = $('#agent-replaced');
        var $summary = $('#replaced-summary');

        function formatAgent(a) {
            if (!a) return '';
            var t = (a.fullname || a.nom || a.name || '') + ' (' + (a.matricule || a.id) + ')';
            if (a.site) t += ' — ' + (a.site.nom || a.site.code || '');
            return t;
        }

        function initSelect($el) {
            $el.select2({
                width: '100%',
                placeholder: 'Rechercher un agent',
                allowClear: true,
                ajax: {
                    url: '/api/agents',
                    dataType: 'json',
                    delay: 250,
                    transport: function(params, success, failure) {

                        return ProjectHelpers.ajaxGet('/api/agents').done(function(res) {
                            var items = res.data || res || [];
                            success({ results: items.map(function(a) { return { id: a.id, text: (a.fullname || a.nom || a.name || a.matricule), data: a }; }) });
                        }).fail(failure);
                    },
                    processResults: function(data) {
                        return data;
                    }
                },
                templateResult: function(item) { if (!item || !item.data) return item.text; return formatAgent(item.data); },
                templateSelection: function(item) { if (!item || !item.data) return item.text; return formatAgent(item.data); }
            });
        }

        initSelect($replacing);
        initSelect($replaced);

        $replaced.on('select2:select', function(e) {
            var data = e.params.data.data || null;
            if (data) {
                var site = data.site ? (data.site.nom || data.site.code || '') : '—';
                var grp = (data.groupe || data.agent_group || (data.groupe_id ? ('#' + data.groupe_id) : '—'));
                $summary.html('<strong>Site:</strong> ' + site + '<br/><strong>Groupe:</strong> ' + grp);
            } else $summary.empty();
        });

        $('#btn-save-mouvement').on('click', function() {
            var replacingId = $replacing.val();
            var replacedId = $replaced.val();
            if (!replacingId || !replacedId) { ProjectHelpers.showAlert('Choisir les deux agents', 'info'); return; }
            var payload = {
                agent_id: replacingId,
                agent_remplace_id: replacedId,
                type_mouvement: $('#type-mouvement').val(),
                motif_type: $('#motif-type').val(),
                motif_payload: {},
                date_debut: $('#mouvement-date-debut').val(),
                date_fin: null,
                observation: ''
            };


            var mt = payload.motif_type;
            if (mt === 'Sanction') {
                payload.motif_payload = {
                    type: $('#m_s_type').val(),
                    duree_jours: parseInt($('#m_s_duree').val() || 0),
                    motif: $('#m_s_motif').val(),
                    date_sanction: $('#mouvement-date-debut').val()
                };
                if (!payload.motif_payload.type) { ProjectHelpers.showAlert('Choisir le type de sanction', 'warning'); return; }
                if (payload.motif_payload.type === 'mise_a_pied' && (!payload.motif_payload.duree_jours || payload.motif_payload.duree_jours <= 0)) { ProjectHelpers.showAlert('Indiquer la durée en jours pour la mise à pied', 'warning'); return; }
            } else if (mt === 'Separation') {
                payload.motif_payload = {
                    type: $('#m_sep_type').val(),
                    date_evenement: $('#m_sep_date').val(),
                    motif: $('#m_sep_motif').val()
                };
                if (!payload.motif_payload.type) { ProjectHelpers.showAlert('Choisir le type de séparation', 'warning'); return; }
                if (!payload.motif_payload.date_evenement) { ProjectHelpers.showAlert("Indiquer la date de l'évènement", 'warning'); return; }
            } else if (mt === 'Conge') {
                payload.motif_payload = {
                    autorisation_type_id: $('#m_conge_type').val(),
                    date_debut: $('#m_conge_debut').val(),
                    duree_jours: parseInt($('#m_conge_jours').val() || 0)
                };
                if (!payload.motif_payload.autorisation_type_id && !payload.motif_payload.date_debut) { ProjectHelpers.showAlert('Indiquer le type de congé ou la date de début', 'warning'); return; }
            } else if (mt === 'Desertion') {
                payload.motif_payload = { notes: $('#m_des_notes').val() };
            }

            ProjectHelpers.ajaxPost('/api/mouvements', payload).done(function(res) {
                ProjectHelpers.showAlert('Mouvement créé', 'success');
            }).fail(function(xhr) {
                var msg = 'Erreur';
                if (xhr && xhr.responseJSON && xhr.responseJSON.message) msg = xhr.responseJSON.message;
                ProjectHelpers.showAlert(msg, 'danger');
            });
        });


        $('#motif-type').on('change', function() {
            var v = $(this).val();
            var $c = $('#motif-forms');
            $c.empty();
            if (v === 'Sanction') {
                $c.html('\n+<div class="row g-2">\n+  <div class="col-md-4">\n+    <label class="form-label">Type sanction</label>\n+    <select id="m_s_type" class="form-select">\n+      <option value="avertissement">Avertissement</option>\n+      <option value="blame">Blâme</option>\n+      <option value="mise_en_garde">Mise en garde</option>\n+      <option value="mise_a_pied">Mise à pied</option>\n+    </select>\n+  </div>\n+  <div class="col-md-2" id="m_s_duree_wrap" style="display:none">\n+    <label class="form-label">Durée (jours)</label>\n+    <input id="m_s_duree" type="number" min="0" class="form-control"/>\n+  </div>\n+  <div class="col-md-6">\n+    <label class="form-label">Motif</label>\n+    <input id="m_s_motif" class="form-control"/>\n+  </div>\n+</div>\n+');

                $c.find('#m_s_type').on('change', function() {
                    if ($(this).val() === 'mise_a_pied') $('#m_s_duree_wrap').show();
                    else $('#m_s_duree_wrap').hide();
                });
            } else if (v === 'Separation') {
                $c.html('\n+<div class="row g-2">\n+  <div class="col-md-4">\n+    <label class="form-label">Type séparation</label>\n+    <select id="m_sep_type" class="form-select">\n+      <option value="fin_contrat">Fin de contrat</option>\n+      <option value="licenciement">Licenciement</option>\n+      <option value="demission">Démission</option>\n+    </select>\n+  </div>\n+  <div class="col-md-4">\n+    <label class="form-label">Date évènement</label>\n+    <input id="m_sep_date" type="date" class="form-control"/>\n+  </div>\n+  <div class="col-md-4">\n+    <label class="form-label">Motif</label>\n+    <input id="m_sep_motif" class="form-control"/>\n+  </div>\n+</div>\n+');
            } else if (v === 'Conge') {
                $c.html('\n+<div class="row g-2">\n+  <div class="col-md-6">\n+    <label class="form-label">Type congé (autorisation type id)</label>\n+    <input id="m_conge_type" class="form-control" placeholder="id du type ou laisser vide"/>\n+  </div>\n+  <div class="col-md-3">\n+    <label class="form-label">Date début</label>\n+    <input id="m_conge_debut" type="date" class="form-control"/>\n+  </div>\n+  <div class="col-md-3">\n+    <label class="form-label">Nombre de jours</label>\n+    <input id="m_conge_jours" type="number" min="0" class="form-control"/>\n+  </div>\n+</div>\n+');
            } else if (v === 'Desertion') {
                $c.html('<div class="row g-2"><div class="col-12"><label class="form-label">Notes</label><textarea id="m_des_notes" class="form-control"></textarea></div></div>');
            }
        });

    });

})(jQuery, window.ProjectHelpers || {});
