// ==============================================================
// Right sidebar options
// ==============================================================
/**
 * oziLoadData
 * --------------------------------------------------------------------------
 * --------------------------------------------------------------------------
 * Ver: (3.0)
 * data: 2026-01-30
 * --------------------------------------------------------------------------
 * input, radio, checkbox, file, select e textarea.
 */


/**
 * oziLoadData
 * ---------------------------
 * - zldUrl: endereço de envio
 * - zldDestinyId: destino da resposta
 * - zldDestinyAppend: true → acrescenta resposta no destino
 * - zldCatchGroupId: coleta dados dentro do ID informado
 * - ldCatchItemName: coleta itens individuais por nome
 * - zldMode: modo de envio → 'fetch' (padrão), 'window', 'page'
 * - zldModePageMethod: método → GET ou POST (padrão)
 * - zldModePageTarget: alvo da página → _self, _blank, _parent, _top, framename
 * - zldReloadScript: true → recarrega scripts da classe ld-reload
 * - zldFormClear: true → limpa formulários (exceto hidden) após envio
 * - zldLog: true → ativa debug
 * - zldJson: conteúdo em JSON
 * - zldCheckbox: valor do checkbox
 * - zldFormBusy: true → solicitação em andamento; botão desabilitado para evitar cliques repetidos
 * -----------------------
 * RETORN
 * * EX: let respot = oziLoadData({...
 *  * respot.perm: 0 = acesso liberado;
 *
 * @param data
 * @param attribute
 */

if (!window.__zld_inited) {
    window.__zld_inited = true;

    $(document).on('click change', '[data-zld-url]', function (e) {
        const el = (e.target && e.target.closest)
            ? e.target.closest('[data-zld-url]')
            : this;

        const zldLog = el.dataset.zldLog
            ? Boolean(JSON.parse(String(el.dataset.zldLog).toLowerCase()))
            : false;

        const attributes = {
            zldUrl: el.dataset.zldUrl,
            zldDestinyId: el.dataset.zldDestinyId,
            zldCatchGroupId:
                el.dataset.zldCatchGroupId ??
                el.getAttribute("data-zld-catch-group-id"),


            zldCatchItemName: el.dataset.zldCatchItemName || el.dataset.ldCatchItemName,

            zldMode: el.dataset.zldMode || el.dataset.ldWay || 'fetch',
            zldModePageMethod: el.dataset.zldModePageMethod,
            zldModePageTarget: el.dataset.zldModePageTarget,

            zldFormClear: el.dataset.zldFormClear,
            zldFormBusy: el.dataset.zldFormBusy === "true",

            zldReloadScript: el.dataset.zldReloadScript === "true",
            zldJson: el.dataset.zldJson,
            zldCheckbox: el.dataset.zldCheckbox,

            zldLog: zldLog
        };

        if (zldLog) {
            console.log('zldLog| dataset', el.dataset);
            console.log('zldLog| attributes', attributes);
        }

        oziLoadData(attributes, null, el);
    });
}


function oziLoadData(data = null, loadAttribute = null, clickedEl = null) {
    let ldValidate = 0;
    let formData = new FormData();
    console.log(data)

    if (data.zldLog) console.log("oziLoadData| data: entrada data", data);

    let elementData = clickedEl;

    const loadData = {
        zldLog: parseBool(data?.zldLog ?? data?.ldLog),

        zldUrl: data?.zldUrl ?? data?.ldUrl ?? "",
        zldDestinyId: data?.zldDestinyId ?? data?.ldDestinyId ?? "",
        zldDestinyAppend: parseBool(data?.zldDestinyAppend ?? data?.ldDestinyAppend),
        zldDestinyBefore: parseBool(data?.zldDestinyBefore ?? data?.ldDestinyBefore),

        zldCatchGroupId:
            data?.zldCatchGroupId ??
            data?.ldCatchGroupId,


        zldCatchItemName: data?.zldCatchItemName ?? data?.ldCatchItemName,

        zldMode: data?.zldMode ?? data?.ldWay ?? "fetch",
        zldModePageMethod: data?.zldModePageMethod ?? data?.ldWayPageMethod ?? "POST",
        zldModePageTarget: data?.zldModePageTarget ?? data?.ldWayPageTarget ?? "_self",

        zldFormClear: parseBool(data?.zldFormClear ?? data?.ldFormClear),
        zldFormBusy: parseBool(data?.zldFormBusy ?? data?.ldBusy),
        zldReloadScript: parseBool(data?.zldReloadScript ?? data?.ldReload),

        zldJson: data?.zldJson,
        zldCheckbox: data?.zldCheckbox ?? data?.ldCheckbox
    };


    if (loadData.zldLog) console.log("oziLoadData| loadData: distribuição ", loadData);

    const parseList = (raw) => {
        if (!raw) return [];
        if (Array.isArray(raw)) return raw;

        const s = String(raw).trim();

        if (s.startsWith("[") && s.endsWith("]")) {
            try {
                const arr = JSON.parse(s.replaceAll("'", '"'));
                return Array.isArray(arr) ? arr : [];
            } catch {
                return s.split(",").map(x => x.trim()).filter(Boolean);
            }
        }

        return s.split(",").map(x => x.trim()).filter(Boolean);
    };

    loadData.zldCatchGroupId = parseList(loadData.zldCatchGroupId);
    loadData.zldCatchItemName = parseList(loadData.zldCatchItemName);


    // chamada via script (sem evento)
    if (!elementData) {
        elementData = document.createElement("span");
        elementData.id = "zld-script-" + Date.now();
        document.body.appendChild(elementData);
    }

    if (!elementData.id || elementData.id.trim() === "") {
        elementData.id = zldGenerateId();
    }
    loadData.zldId = elementData.id;

    const $button = zldSafeById(loadData.zldId, loadData.zldLog);

    if (loadData.zldFormBusy === true && $button) {
        const already = $button.hasClass("disabled");
        if (already) return {perm: 1};
        $button.addClass("disabled");
    }

    const addCsrfIfMissing = () => {
        const tokenMeta = $('meta[name="csrf-token"]').attr('content');
        if (tokenMeta && !formData.has("_token")) {
            formData.append("_token", tokenMeta);
        }
    };

    console.log('>>>>', loadData.zldCatchGroupId);
    // Coleta grupos

    const normalizeDomId = (v) => {
        if (v === undefined || v === null) return "";
        let s = String(v).trim();

        // remove aspas soltas
        if ((s.startsWith('"') && s.endsWith('"')) || (s.startsWith("'") && s.endsWith("'"))) {
            s = s.slice(1, -1).trim();
        }

        // aceita "#meuId"
        if (s.startsWith("#")) s = s.slice(1).trim();

        return s;
    };


    // Coleta grupos
    if (Array.isArray(loadData.zldCatchGroupId)) {
        loadData.zldCatchGroupId.forEach(rawId => {
            const id = normalizeDomId(rawId);
            if (!id) return;

            const container = document.getElementById(id);
            if (!container) {
                if (loadData.zldLog) console.warn("LOG groupId não encontrado", rawId, "normalizado:", id);
                return;
            }

            const result = oziLoadDataValue(container, 1, loadData, formData, ldValidate);
            formData = result.formData;
            ldValidate = result.ldValidate;
            loadData.zldValidateName = result.zldValidateName;
        });
    }


    // Coleta individuais
    if (loadData.zldCatchItemName && loadData.zldCatchItemName.length) {
        loadData.zldCatchItemName.forEach(item => {
            if (!item) return;

            if (String(item).includes(":")) {
                const parts = String(item).split(":");
                const key = parts[0]?.trim();
                const val = parts.slice(1).join(":").trim();
                if (key) formData.append(key, val);
                return;
            }

            const container = document.getElementsByName(String(item).trim());
            const result = oziLoadDataValue(container, 2, loadData, formData, ldValidate);
            formData = result.formData;
            ldValidate = result.ldValidate;
            loadData.zldValidateName = result.zldValidateName;
        });
    }

    // ldJson
    if (loadData.zldJson) {
        try {
            const arr = Array.isArray(loadData.zldJson) ? loadData.zldJson : JSON.parse(loadData.zldJson);
            arr.forEach((row, index) => {
                formData.append(`zldJson[${index}]`, JSON.stringify(row));
            });
        } catch {
            if (loadData.zldLog) console.warn("LOG zldJson inválido", loadData.zldJson);
        }
    }

    addCsrfIfMissing();

    // URL join do seu jeito, só garantindo base
    let v_protocol = window.location.protocol;
    let v_url_host = `${v_protocol}//${window.location.host}/`;
    let v_url = loadData.zldUrl;

    console.log('ldValidate',ldValidate)

    // TRAVA AQUI: se tem erro, não envia nada
    if (ldValidate !== 0) {
        if ($button) $button.removeClass("disabled"); // solta o botão se você travou
        return { perm: ldValidate, invalid: loadData.zldValidateName || "" };
    }

    if (loadData.zldLog) console.log("LOG URL base", v_url);

    if (ldValidate !== 0) {
        if ($button) $button.removeClass("disabled");
        return {perm: ldValidate};
    }




    //NÃO ACONSELHADO UTILIZAR JUNTO FRAMEWORK JS
    if (loadData.zldReloadScript === true) {
        var reload = "<script>" + $(".zld-reload-script").html() + "<\/script>";
        // $("#zldReloadScript").html(reload);

        $("#zldReloadScript").contents().find("body").html(reload);

    }

    // Barra global
    if (zldConf.zldProgressBarGlobalOption === true) {
        const progress_bar_html = `
      <div class="progress-bar bg-warning active progress-bar-striped"
        role="progressbar"
        style="width:1%; height:7px; display:block; border-radius: 25px;">
        <span class="sr-only">Progress</span>
      </div>
    `;
        const $bar = $('.' + zldConf.zldProgressBarGlobalClass);
        if ($bar.length) {
            $bar.html(progress_bar_html).css({display: "block", width: "100%"});
            $('.' + zldConf.zldProgressBarGlobalClass + ' .progress-bar').animate(
                {width: "100%"},
                {
                    duration: 800,
                    step: function (now) {
                        $(this).text(Math.round(now) + "%");
                    },
                    complete: function () {
                        $(this).removeClass("bg-warning").addClass("bg-success");
                        $(this).text("Concluído!");
                    }
                }
            );
        }
    }

    const finishUi = () => {
        if (zldConf.zldProgressBarGlobalOption === true) {
            const $bar = $('.' + zldConf.zldProgressBarGlobalClass);
            if ($bar.length) setTimeout(() => $bar.css("display", "none"), 400);
        }
        if ($button) setTimeout(() => $button.removeClass("disabled"), 400);
    };

    const renderToDestiny = (html) => {
        const ld_destiny = loadData.zldDestinyId;
        if (!ld_destiny) return;

        const $destiny = $("#" + ld_destiny);
        if (!$destiny.length) {
            if (loadData.zldLog) console.warn("LOG destino não encontrado", ld_destiny);
            return;
        }

        if (loadData.zldDestinyAppend === true) $destiny.append(html);
        else if (loadData.zldDestinyBefore === true) $destiny.before(html);
        else $destiny.html(html);
    };

    const handleHttpErrorHtml = (status, html) => {
        const msg_error = `
      <div class="alert alert-warning alert-rounded font-13 m-2">
        <b>Erro ao carregar.</b>
        <div class="font-11 link-muted">Status ${status}</div>
      </div>
    `;
        renderToDestiny(msg_error);

        // se você usa esses ids, mantém
        $("#logErrorLaravelOziTitle").html(status);
        $("#logErrorLaravelOzi").contents().find("body").html(html);
    };

    if (loadData.zldMode === "fetch") {
        const method = (loadData.zldModePageMethod || "POST").toUpperCase();
        fetch(v_url, method === "GET"
            ? {method, headers: {"X-Requested-With": "XMLHttpRequest"}}
            : {method, body: formData}
        )

            .then(async (response) => {
                const html = await response.text();

                if (!response.ok) {
                    handleHttpErrorHtml(response.status, html);
                    return;
                }

                renderToDestiny(html);
            })
            .catch((err) => {
                if (loadData.zldLog) console.error("LOG fetch falhou", err);
                renderToDestiny(`
          <div class="alert alert-danger font-13 m-2">
            <b>Erro:</b> Não foi possível carregar.<br>
            <span class="font-11 link-muted">Verifique sua conexão.</span>
          </div>
        `);
            })
            .finally(() => {
                finishUi();

                // limpeza de form, por grupo
                if (loadData.zldFormClear) {
                    (loadData.zldCatchGroupId || []).forEach(groupId => {
                        if (!groupId) return;
                        const $group = $("#" + groupId);
                        if (!$group.length) return;

                        formData.forEach((value, key) => {
                            const $input = $group.find('[name="' + key + '"]');
                            if ($input.length && $input.attr("type") !== "hidden") {
                                $input.removeClass(zldConf.zldResponseValidClass).removeClass(zldConf.zldResponseInvalidClass);
                                $input.val("");
                            }
                        });
                    });
                }
            });

    } else if (loadData.zldMode === "window") {
        let qs = "";
        formData.forEach((value, key) => {
            qs += encodeURIComponent(key) + "=" + encodeURIComponent(value) + "&";
        });
        const finalUrl = loadData.zldUrl + "?" + qs;
        window.open(finalUrl, "_blank", "noopener,noreferrer");
        finishUi();

    } else if (loadData.zldMode === "page") {
        const form = document.createElement("form");
        form.method = (loadData.zldModePageMethod || "POST").toUpperCase();
        form.target = loadData.zldModePageTarget || "_self";
        form.action = loadData.zldUrl;

        formData.forEach((value, key) => {
            const input = document.createElement("input");
            input.type = "hidden";
            input.name = key;
            input.value = value;
            form.appendChild(input);
        });

        document.body.appendChild(form);
        form.submit();
        finishUi();

    } else {
        if (loadData.zldLog) console.warn("LOG zldMode inválido", loadData.zldMode);
        finishUi();
    }

    return {perm: ldValidate};
}

/**
 * ------------------------------------------------------------------------
 * Class Definition
 * ------------------------------------------------------------------------
 */

// --------------------> MANIPULADOR DE CLICK <------------------------
//A função zldClickCatch(e) é um manipulador de eventos de clique que identifica e retorna o elemento HTML que foi clicado pelo usuário.
function zldClickCatch(e) {
    var elem, evt = e ? e : event;
    if (typeof evt != 'undefined') {
        if (evt.srcElement) elem = evt.srcElement; else if (evt.target) elem = evt.target;
    } else {
        elem = 'undefined';
    }
    return elem;
}


function zldGenerateId() {
    return +Date.now() + Math.floor(Math.random() * 10000);
}

// Função segura para selecionar por ID
function zldSafeById(id, zldLog = false) {
    if (id && typeof id === "string" && id.trim() !== "") {
        const $el = $("#" + id);
        if ($el.length) return $el;
        if (zldLog) console.warn("LOG Elemento com id não encontrado", id);
    } else {
        if (zldLog) console.warn("LOG ID vazio ou inválido passado para zldSafeById()");
    }
    return null;
}

// --------------------> VERIFICA SE ELEMENTO EXISTE POR ID <------------------------
function zldGetElementById(elmId) {
    return document.getElementById(elmId) !== null;
}


// --------------------> OPÇÕES DO LOADDATA <------------------------
function oziLoadDataValue(container, v_catch, loadData = {}, formData, ldValidate) {

    console.log("oziLoadDataValue | Conf:", zldConf);

    if (loadData.zldLog) {
        console.log("LOG| container:", container);
        console.log("LOG| loadData:", loadData);
    }

    if (!container) {
        console.warn(`Info: 'Null' | Catch: ${v_catch} | Objeto não encontrado`);
    }

    let objs = [];
    let v_local_name = "";
    let group_id = "";

    if (v_catch === 1) { // GRUPO
        objs = container.getElementsByTagName("input");
        group_id = `#${container.id} `;
        v_local_name = "input";

    } else if (v_catch === 2) { // INDIVIDUAL
        objs = container;
        if (objs[0]) {
            v_local_name = objs[0].localName;
        } else {
            console.warn("Info: Campo input não encontrado");
        }
    }

    // ATRIBUTOS (serão preenchidos no loop)
    let v_name, v_value, v_required, v_type, v_disabled, v_checked, v_files;

    if (v_local_name == 'input') {
        // loop de extração dos atributos
        for (const obj of objs) {
            // ---> Extraindo os conteúdos dos atributos

            // Caso especial: select2 multi não tem nome
            if (obj.classList.contains("select2-search__field")) {
                obj.name = "null";
                if (loadData.zldLog) {
                    console.log("LOG| INFO: select2 multi não tem nome");
                }
            } else if (!obj.getAttribute("name")) {
                console.error("LOG| ERROR: Algum dos seus objetos INPUT não possui atributo NAME", obj);
            }

            v_name = obj.name ?? null;
            v_value = obj.value ?? null;
            v_required = obj.required || false;
            v_disabled = obj.disabled || false;
            v_type = obj.type ?? null;
            v_checked = obj.checked || false;

            // Monta objeto com os dados do campo
            const fieldData = {
                name: v_name,
                value: v_value,
                required: v_required,
                disabled: v_disabled,
                type: v_type,
                checked: v_checked
            };

            if (loadData.zldLog) {
                console.log("LOG| FieldData extraído:", fieldData);
            }
            //------------------> TYPE <---------------------
            //tratamento específico para inputs do tipo radio
            if (v_type === "radio") {
                //------------------> TYPE: CHECKBOX
                if (v_required) {
                    if (v_checked) {
                        formData.append(v_name, v_value);
                    }
                    let ld_per_type_radio = 0;
                    $('[name="' + v_name + '"]').each(function () {
                        if ($(this).prop('checked')) {
                            ld_per_type_radio++;
                        }
                    });
                    if (ld_per_type_radio > 0) {
                        $('[name="' + v_name + '"]').each(function () {
                            const id = $(this).attr('id');
                            if (id) $('[for="' + id + '"]').addClass('text-success').removeClass('text-danger');
                        });
                    } else {
                        $('[name="' + v_name + '"]').each(function () {
                            $('[for=' + $(this).attr('id') + ']').removeClass('text-success').addClass('text-danger');
                        });
                        ldValidate++;
                        loadData.zldValidateName = (loadData.zldValidateName || "") + v_name + ",";

                    }
                } else {
                    if (v_checked) {
                        formData.append(v_name, v_value);
                    }
                }
            } else if (v_type === 'search') {
                if ((obj.className ?? null) !== 'select2-search__field') {
                    console.log('LOG| ERROR: search ', obj);
                }
            } else if (v_type === "checkbox") {
                if (v_disabled) continue;

                if (v_required) {
                    if (!v_checked) {
                        ldValidate++;
                        loadData.zldValidateName = (loadData.zldValidateName || "") + v_name + ",";
                        $(group_id + ' [name="' + v_name + '"]')
                            .removeClass(zldConf.zldResponseValidClass)
                            .addClass(zldConf.zldResponseInvalidClass);
                    } else {
                        $(group_id + ' [name="' + v_name + '"]')
                            .addClass(zldConf.zldResponseValidClass)
                            .removeClass(zldConf.zldResponseInvalidClass);
                        formData.append(v_name, v_value);
                    }
                } else {
                    if (v_checked) formData.append(v_name, v_value);
                }
            } else if (v_type === "file") {
                // ------------------> TYPE: FILE
                const v_file_objs = obj.files;
                let v_file_mask = "_files";
                if (obj.multiple === true) v_file_mask += "[]";


                for (const v_file of v_file_objs) {
                    if (v_required) {
                        if (!v_disabled) {
                            if (!v_file) {
                                // Impedido
                                if (loadData.zldLog) {
                                    console.warn("LOG| Campo obrigatório sem arquivo:", v_name);
                                }
                                ldValidate++;
                                loadData.zldValidateName = (loadData.zldValidateName || "") + v_name + ",";
                            } else {
                                // Permitido → concatena conteúdo
                                formData.append(v_name + v_file_mask, v_file);
                            }
                        }
                        // Se desabilitado, ignora
                    } else {
                        // Não obrigatório → concatena conteúdo
                        formData.append(v_name + v_file_mask, v_file);
                    }
                }
            } else {
                // ------------------> TYPE: TEXT / EMAIL / OUTROS
                if (v_required) {
                    if (!v_disabled) {
                        if (v_value === "") {
                            // INPUT vazio → impedido
                            $(group_id + ' [name="' + v_name + '"]').removeClass(zldConf.zldResponseValidClass).addClass(zldConf.zldResponseInvalidClass);
                            ldValidate++;
                            loadData.zldValidateName = (loadData.zldValidateName || "") + v_name + ",";
                        } else if (v_type === "email") {
                            // FILTRO DE EMAIL (simplificado)
                            const txt = v_value;
                            const invalid = (txt.indexOf("@") < 1) || (txt.indexOf(".") < 3) || (txt.indexOf("#") > -1) || (txt.indexOf(",") > -1);
                            if (invalid) {
                                $(group_id + ' [name="' + v_name + '"]').removeClass(zldConf.zldResponseValidClass).addClass(zldConf.zldResponseInvalidClass);
                                ldValidate++;
                                loadData.zldValidateName = (loadData.zldValidateName || "") + v_name + ",";
                            } else {
                                $(group_id + ' [name="' + v_name + '"]').addClass(zldConf.zldResponseValidClass).removeClass(zldConf.zldResponseInvalidClass);
                                formData.append(v_name, v_value);
                            }
                        } else {
                            // INPUT válido → permitido
                            if (v_name) {
                                $(group_id + ' [name="' + v_name + '"]').addClass(zldConf.zldResponseValidClass).removeClass(zldConf.zldResponseInvalidClass);
                            }
                            formData.append(v_name, v_value);
                        }
                    }
                    // Se desabilitado, ignora
                } else {
                    // Não obrigatório → concatena conteúdo
                    formData.append(v_name, v_value);
                }
            }
        }
    }

// --------------------> SELECT <------------------------
    //select múltiplo | select padrão | Select2
    if (v_catch === 1) { // GRUPO
        objs = container.getElementsByTagName("select");
        v_local_name = "select";

    } else if (v_catch === 2) { // INDIVIDUAL
        objs = container;
        if (objs[0]) {
            v_local_name = objs[0].localName;
        } else if (loadData.zldLog) {
            console.warn("Info: Campo select não encontrado");
        }
    }
    //ATRIBUTOS
    if (v_local_name === "select") {
        for (let i = 0; i < objs.length; ++i) {
            const obj = objs[i];

            if (!obj.getAttribute("name")) {
                console.warn("LOG| ERROR: Algum SELECT não possui atributo NAME", obj);
            }

            if (obj.selectedOptions) {
                if (obj.multiple) {
                    // SELECT MULTIPLE
                    const v_name = obj.name;
                    const v_name_m = v_name + "[]";
                    const v_required = obj.required || false;
                    const v_disabled = obj.disabled || false;
                    let v_value_m = 0;

                    for (const opt of obj.options) {
                        if (opt.selected) {
                            formData.append(v_name_m, opt.value);
                            v_value_m++;
                        }
                    }

                    if (v_required && !v_disabled) {
                        if (v_value_m === 0) {
                            $(group_id + ' [name="' + v_name + '"]').removeClass(zldConf.zldResponseValidClass).addClass(zldConf.zldResponseInvalidClass);
                            ldValidate++;
                            loadData.zldValidateName = (loadData.zldValidateName || "") + v_name + ",";
                        } else {
                            $(group_id + ' [name="' + v_name + '"]').addClass(zldConf.zldResponseValidClass).removeClass(zldConf.zldResponseInvalidClass);
                        }
                    }

                } else {
                    // SELECT DEFAULT
                    const selected = obj.selectedOptions[0];
                    if (selected) {
                        const v_name = obj.name;
                        const v_option_value = selected.value;
                        const v_required = obj.required || false;
                        const v_disabled = obj.disabled || false;

                        if (v_required && !v_disabled) {
                            if (v_option_value === "") {
                                $(group_id + ' [name="' + v_name + '"]').removeClass(zldConf.zldResponseValidClass).addClass(zldConf.zldResponseInvalidClass);
                                $(group_id + '#select2-' + v_name + '-container').parent().removeClass(zldConf.zldResponseValidClass+" border-0").addClass(zldConf.zldResponseInvalidClass+" border-0");
                                ldValidate++;
                                loadData.zldValidateName = (loadData.zldValidateName || "") + v_name + ",";
                            } else {
                                $(group_id + ' [name="' + v_name + '"]').addClass(zldConf.zldResponseValidClass).removeClass(zldConf.zldResponseInvalidClass);
                                const v_name_escaped = v_name.replace(/\[/g, "\\[").replace(/\]/g, "\\]");
                                $(group_id + '#select2-' + v_name_escaped + '-container').parent().addClass(zldConf.zldResponseValidClass + " border-0").removeClass(zldConf.zldResponseInvalidClass+" border-0");
                                formData.append(v_name, v_option_value);
                            }
                        } else {
                            formData.append(v_name, v_option_value);
                        }
                    }
                }
            }
        }
    }
    //--------------------> TEXTAREA <------------------------//
    // Encontre seus elementos filho `input`
    // CKEditor
    for (let i = 0; i < objs.length; ++i) {
        const obj = objs[i];
        const v_local_name = obj.localName;

        if (v_local_name === "textarea") {
            const v_name = obj.name;
            let v_value = obj.value;
            const v_id = obj.id;
            const v_class = obj.className;
            const v_required = obj.required || false;
            const v_disabled = obj.disabled || false;
            const v_maxlength = obj.maxLength > 0 ? obj.maxLength : null;
            const v_minlength = obj.minLength > 0 ? obj.minLength : null;

            if (!obj.getAttribute("name")) {
                console.error("LOG| ERROR: Algum TEXTAREA não possui atributo NAME", obj);
            }

            if (v_required && !v_disabled) {
                if (v_value === "") {
                    // Impedido
                    $(group_id + ' [name="' + v_name + '"]').addClass(zldConf.zldResponseInvalidClass).removeClass(zldConf.zldResponseValidClass);
                    ldValidate++;
                    loadData.zldValidateName = (loadData.zldValidateName || "") + v_name + ",";
                } else {
                    // Permitido
                    $(group_id + ' [name="' + v_name + '"]').addClass(zldConf.zldResponseValidClass).removeClass(zldConf.zldResponseInvalidClass);

                    if (v_class.indexOf("ckeditor") === 0) {
                        const v_result = zldCkEditor(v_id, v_name, null);
                        formData.append(v_result.v_name, v_result.v_value);
                    } else {
                        formData.append(v_name, v_value);
                    }
                }
            } else {
                // Não obrigatório
                if (v_class.indexOf("ckeditor") === 0) {
                    const v_result = zldCkEditor(v_id, v_name, null);
                    formData.append(v_result.v_name, v_result.v_value);
                } else {
                    formData.append(v_name, v_value);
                }
            }
        }
    }

    return {
        formData,
        ldValidate,
        zldValidateName: loadData.zldValidateName || ""
    };


}

function zldCkEditor(v_id, v_name, v_value) {
    try {
        console.log(CKEDITOR.instances[v_id])
        v_value = CKEDITOR.instances[v_id].getData();
    } catch (err) {
        console.log('LOG| TEXTAREA CkEditor', v_id);
        console.log(' - CkEditor| Name:', v_name);
        console.log(' - CkEditor| Value:', v_value);
        console.log(' - CkEditor|', err.message);

    } finally {

        const result = {
            "v_name": v_name, "v_value": v_value
        }

        return result;

    }
}


/**
 * enviarDadosPorFormulario
 *-----------------------------------
 * zldSendRedirectForm('https://example.com/destino', {
 * * nome: 'Thomaz',
 * * idade: '28',
 * * mensagem: 'Olá mundo!'
 *
 *});

 * */
function zldSendRedirectForm(destiny, data) {
    // Cria um novo formulário invisível
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = destiny;
    form.style.display = 'none';

    // Cria os campos com base no objeto 'dados'
    for (const chave in data) {
        if (data.hasOwnProperty(chave)) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = chave;
            input.value = data[chave];
            form.appendChild(input);
        }
    }

    // Adiciona o formulário ao corpo e envia
    document.body.appendChild(form);
    form.submit();
}


//Thomaz ozi
//2012-06-15

/**
 *
 *  ABRE UMA JANELA
 *  ---------------------------------
 *  * winName| _blank
 * @param theURL
 * @param winName
 * @param features
 */
function zldWindow(theURL, winName = '', features = '') {
    if (winName == '') {
        winName = "_blank";
    }
    if (features == '') {
        features = "toolbar=no,scrollbars=yes,resizable=yes,top=150,right=150,width=960,height=640";
    }

    window.open(theURL, winName, features);
}

function zldRedirectUrl(url) {
    window.location.href = url;
}

function parseBool(val) {
    if (val === undefined || val === null) return false;

    const s = String(val).trim().toLowerCase();
    return s === "true" || s === "1" || s === "on" || s === "yes";
}


/**
 * oziLoadDataConf
 * --------
 * - zldProgressBarGlobalClass: classe que recebe o evento da barra de progresso global
 * - zldProgressBarGlobalOption: true|false → ativa ou desativa a barra de progresso global
 * - zldResponseValidClass: classe personalizada para indicar status válido
 * - zldResponseInvalidClass: classe personalizada para indicar status inválido
 *
 *
 * @type {{}}
 */

//---------------> Configuração <------------------------
const zldConf = {
    zldProgressBarGlobalOption: true,
    zldProgressBarGlobalClass: "progress-bar-global",
    zldResponseValidClass: "is-valid",
    zldResponseInvalidClass: "is-invalid",
};
function oziLoadDataConf(conf = {}) {
    // Atualiza o objeto global com valores recebidos ou padrões
    zldConf.zldProgressBarGlobalOption = conf.zldProgressBarGlobalOption ?? zldConf.zldProgressBarGlobalOption ?? true;
    zldConf.zldProgressBarGlobalClass = conf.zldProgressBarGlobalClass ?? zldConf.zldProgressBarGlobalClass ?? 'progress-bar-global';
    zldConf.zldResponseValidClass = conf.zldResponseValidClass ?? zldConf.zldResponseValidClass ?? 'is-valid';
    zldConf.zldResponseInvalidClass = conf.zldResponseInvalidClass ?? zldConf.zldResponseInvalidClass ?? 'is-invalid';

    return zldConf;
}

