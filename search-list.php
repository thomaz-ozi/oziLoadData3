<style>

    .catalog {
        border: 1px solid var(--bs-light-hover);
        border-radius: 12px;
    }


    .catalog-head {
        font-weight: bold;
        background-color: #f8f9fa;
        padding: .5rem;
    }


    .catalog-striped {
        padding: 16px;
    }

    .catalog-striped:first-of-type {
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    .catalog-striped:last-of-type {
        border-bottom-left-radius: 12px;
        border-bottom-right-radius: 12px;
    }

    .catalog-hover:hover {
        background-color: var(--bg-light-100) !important;
        color: var(--bs-black) !important;
    }

    .catalog-striped:nth-child(odd) {
        background-color: var(--bs-white);
    }

    .catalog-striped:nth-child(even) {
        background-color: var(--bs-gray-90);
    }

</style>

<div class="catalog">

    <!--[if BLOCK]><![endif]-->
    <div class="d-flex catalog-striped catalog-hover  search-list gap-3">

        <!-- IMAGEM FIXA À ESQUERDA -->
        <div class="d-none d-sm-flex align-items-center">
            <img src="http://127.0.0.1:8000/images/user-default.png" alt="Logo de super" class="rounded-circle" style="width: 90px; height: 90px; object-fit: cover;">
        </div>

        <!-- TODO O RESTANTE DO CONTEÚDO -->
        <div class="flex-fill">

            <!-- HEADER -->
            <div class="d-flex align-items-center gap-3">

                <div>
                <span class="text-primary fw-bold">
                    ID #1
                </span>

                    <span class="text-light-hover"> | </span>

                    <span class="fw-bold">
                    super
                </span>
                </div>

                <div class="badge rounded-pill bg-badge fw-bold">
                    Super
                </div>

                <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-1 gap-sm-2 ms-auto">
                    <div class="fw-bold">Ativo</div>

                    <div class="custom-select">
                        <div wire:snapshot="{&quot;data&quot;:{&quot;active&quot;:1,&quot;title&quot;:null,&quot;idrow&quot;:1,&quot;table&quot;:&quot;empresas_users&quot;,&quot;iduser&quot;:&quot;mK4y3&quot;,&quot;empresa_id&quot;:null},&quot;memo&quot;:{&quot;id&quot;:&quot;5onwqZEQ1nhz3rpeLowL&quot;,&quot;name&quot;:&quot;active&quot;,&quot;path&quot;:&quot;empresa\/users&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;release&quot;:&quot;a-a-a&quot;,&quot;children&quot;:[],&quot;scripts&quot;:[&quot;752118209-0&quot;],&quot;assets&quot;:[],&quot;errors&quot;:[],&quot;locale&quot;:&quot;pt_BR&quot;},&quot;checksum&quot;:&quot;b2b9bc30606b5563db0f7a4f9f3c213b4db287490c70d7ca6c0bbca17cb101d1&quot;}" wire:effects="{&quot;scripts&quot;:{&quot;752118209-0&quot;:&quot;    &lt;script&gt;\n        $wire.on('show-active-confirmation', ({ id, actionText }) =&gt; {\n            if (id === 1) {\n                document.getElementById('actionText-1').innerText = actionText;\n                const modal = new bootstrap.Modal(document.getElementById('confirmationModal-1'));\n                modal.show();\n            }\n        });\n    &lt;\/script&gt;\n        &quot;}}" wire:id="5onwqZEQ1nhz3rpeLowL">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="switch-1" wire:click.prevent="askForConfirmation" checked="" wire:key="input-switch-1-on">
                                <label class="form-check-label" for="mK4y3"></label>
                            </div>
                            <!-- Modal de Confirmação -->
                            <div class="modal fade" id="confirmationModal-1" tabindex="-1" aria-labelledby="confirmationModalLabel-1" aria-hidden="true" wire:ignore.self="">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmationModalLabel-1" style="margin-top: 0;">Confirmar Alteração</h5>
                                            <button type="button" class="btn border-0 bg-transparent p-0" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="bi bi-x-circle" style="color:white; font-size: 20px;"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Você tem certeza que deseja <strong id="actionText-1"></strong> este item?</p>
                                            <div class="form-check mt-3 d-flex justify-content-center align-items-center gap-2">
                                                <label class="form-check-label" for="skipConfirmation-1">
                                                    Não perguntar novamente
                                                </label>
                                                <input class="form-check-input filtro-ativo-checkbox" type="checkbox" id="skipConfirmation-1">
                                            </div>
                                        </div>
                                        <div class="modal-footer" style="gap: 60px;">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary" wire:click="toggleActive(document.getElementById('skipConfirmation-1').checked)" data-bs-dismiss="modal">
                                                Confirmar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="dropdown">
                    <button class="btn btn-actions" type="button" data-bs-toggle="dropdown" style="padding: 0;">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end actions-menu" style="padding: 0;">
                        <li class="dropdown-header" style="margin: auto;">Ações</li>

                        <li>
                            <a class="dropdown-item action-item" href="http://127.0.0.1:8000/empresa/users/eyJpdiI6InRNb2lhVWtNNlFjem5MeWxqOWo4dHc9PSIsInZhbHVlIjoiTTFtdmJtNUk4cjJXQThRZjdwUDFxdz09IiwibWFjIjoiMjcxOTM3Mjk3MjVmZGVjMzVkZDU1NmFkYWZkYmU2ZGFhY2FhNmIyOTg1NjgxN2Y5NDAxNjQ0NzQ0MmQwMzlhMCIsInRhZyI6IiJ9/edit">
                                <i class="mdi mdi-pencil me-2"></i> Editar
                            </a>
                        </li>

                        <li>
                            <button type="button" class="dropdown-item action-item" wire:click="$dispatch('abrirAlterarSenha', [1])">
                                <i class="mdi mdi-key-variant me-2"></i> Alterar senha
                            </button>
                        </li>

                        <form action="http://127.0.0.1:8000/empresa/users/1" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                            <input type="hidden" name="_token" value="UjMXnnPUL4lqTSKz6G445VNpH6HD8nmtmRYpeXSR" autocomplete="off">                                        <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="dropdown-item action-item text-danger">
                                <i class="mdi mdi-delete-outline me-2"></i> Deletar Usuário
                            </button>
                        </form>
                    </ul>
                </div>

            </div>

            <hr style="margin: 0.5rem">

            <!-- INFORMAÇÕES -->
            <div class="row">
                <div class="col-sm-2">
                    <div class="fw-bold">Username</div>
                    <div class="text-muted">-</div>
                </div>

                <div class="col-sm-2">
                    <div class="fw-bold">Documento</div>
                    <div class="text-muted">-</div>
                </div>

                <div class="col-sm-2">
                    <div class="fw-bold">Criado em</div>
                    <div class="text-muted">
                        14/03/2026 04:21:38


                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="fw-bold">Verificado em</div>
                    <div class="text-muted">
                        14/03/2026 04:21:38


                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="fw-bold">Atualizado em</div>
                    <div class="text-muted">
                        18/03/2026 23:07:04


                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="d-flex catalog-striped catalog-hover  search-list gap-3">

        <!-- IMAGEM FIXA À ESQUERDA -->
        <div class="d-none d-sm-flex align-items-center">
            <img src="http://127.0.0.1:8000/images/user-default.png" alt="Logo de Distribuidor" class="rounded-circle" style="width: 90px; height: 90px; object-fit: cover;">
        </div>

        <!-- TODO O RESTANTE DO CONTEÚDO -->
        <div class="flex-fill">

            <!-- HEADER -->
            <div class="d-flex align-items-center gap-3">

                <div>
                <span class="text-primary fw-bold">
                    ID #2
                </span>

                    <span class="text-light-hover"> | </span>

                    <span class="fw-bold">
                    Distribuidor
                </span>
                </div>

                <div class="badge rounded-pill bg-badge fw-bold">
                    Distribuidor
                </div>

                <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-1 gap-sm-2 ms-auto">
                    <div class="fw-bold">Ativo</div>

                    <div class="custom-select">
                        <div wire:snapshot="{&quot;data&quot;:{&quot;active&quot;:1,&quot;title&quot;:null,&quot;idrow&quot;:2,&quot;table&quot;:&quot;empresas_users&quot;,&quot;iduser&quot;:&quot;fDZ9j&quot;,&quot;empresa_id&quot;:null},&quot;memo&quot;:{&quot;id&quot;:&quot;5IVfwgYzoLcTyXPGFJyg&quot;,&quot;name&quot;:&quot;active&quot;,&quot;path&quot;:&quot;empresa\/users&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;release&quot;:&quot;a-a-a&quot;,&quot;children&quot;:[],&quot;scripts&quot;:[&quot;752118209-0&quot;],&quot;assets&quot;:[],&quot;errors&quot;:[],&quot;locale&quot;:&quot;pt_BR&quot;},&quot;checksum&quot;:&quot;3753d3dd4b85c47c696cf793205656d184ac5c01a0377fbe6a73149ef18b4171&quot;}" wire:effects="{&quot;scripts&quot;:{&quot;752118209-0&quot;:&quot;    &lt;script&gt;\n        $wire.on('show-active-confirmation', ({ id, actionText }) =&gt; {\n            if (id === 2) {\n                document.getElementById('actionText-2').innerText = actionText;\n                const modal = new bootstrap.Modal(document.getElementById('confirmationModal-2'));\n                modal.show();\n            }\n        });\n    &lt;\/script&gt;\n        &quot;}}" wire:id="5IVfwgYzoLcTyXPGFJyg">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="switch-2" wire:click.prevent="askForConfirmation" checked="" wire:key="input-switch-2-on">
                                <label class="form-check-label" for="fDZ9j"></label>
                            </div>
                            <!-- Modal de Confirmação -->
                            <div class="modal fade" id="confirmationModal-2" tabindex="-1" aria-labelledby="confirmationModalLabel-2" aria-hidden="true" wire:ignore.self="">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmationModalLabel-2" style="margin-top: 0;">Confirmar Alteração</h5>
                                            <button type="button" class="btn border-0 bg-transparent p-0" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="bi bi-x-circle" style="color:white; font-size: 20px;"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Você tem certeza que deseja <strong id="actionText-2"></strong> este item?</p>
                                            <div class="form-check mt-3 d-flex justify-content-center align-items-center gap-2">
                                                <label class="form-check-label" for="skipConfirmation-2">
                                                    Não perguntar novamente
                                                </label>
                                                <input class="form-check-input filtro-ativo-checkbox" type="checkbox" id="skipConfirmation-2">
                                            </div>
                                        </div>
                                        <div class="modal-footer" style="gap: 60px;">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary" wire:click="toggleActive(document.getElementById('skipConfirmation-2').checked)" data-bs-dismiss="modal">
                                                Confirmar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="dropdown">
                    <button class="btn btn-actions" type="button" data-bs-toggle="dropdown" style="padding: 0;">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end actions-menu" style="padding: 0;">
                        <li class="dropdown-header" style="margin: auto;">Ações</li>

                        <li>
                            <a class="dropdown-item action-item" href="http://127.0.0.1:8000/empresa/users/eyJpdiI6Im9ML296Z2lSY1E0WWNjMEMzUTNYbWc9PSIsInZhbHVlIjoiblB5Nkwza0RjZGFXcTFxaWdwTWZTdz09IiwibWFjIjoiZjE0ZTQ0NDkyMzI0YzRjMGI0MDM5NmE5ZmJkMzc5MGNhYjNmOTI3MGRjNzBiNTgwYWQ0ZjBlNmUzNGY1MWU1MCIsInRhZyI6IiJ9/edit">
                                <i class="mdi mdi-pencil me-2"></i> Editar
                            </a>
                        </li>

                        <li>
                            <button type="button" class="dropdown-item action-item" wire:click="$dispatch('abrirAlterarSenha', [2])">
                                <i class="mdi mdi-key-variant me-2"></i> Alterar senha
                            </button>
                        </li>

                        <form action="http://127.0.0.1:8000/empresa/users/2" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                            <input type="hidden" name="_token" value="UjMXnnPUL4lqTSKz6G445VNpH6HD8nmtmRYpeXSR" autocomplete="off">                                        <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="dropdown-item action-item text-danger">
                                <i class="mdi mdi-delete-outline me-2"></i> Deletar Usuário
                            </button>
                        </form>
                    </ul>
                </div>

            </div>

            <hr style="margin: 0.5rem">

            <!-- INFORMAÇÕES -->
            <div class="row">
                <div class="col-sm-2">
                    <div class="fw-bold">Username</div>
                    <div class="text-muted">-</div>
                </div>

                <div class="col-sm-2">
                    <div class="fw-bold">Documento</div>
                    <div class="text-muted">-</div>
                </div>

                <div class="col-sm-2">
                    <div class="fw-bold">Criado em</div>
                    <div class="text-muted">
                        14/03/2026 04:21:38


                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="fw-bold">Verificado em</div>
                    <div class="text-muted">
                        14/03/2026 04:21:38


                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="fw-bold">Atualizado em</div>
                    <div class="text-muted">
                        14/03/2026 04:21:38


                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="d-flex catalog-striped catalog-hover search-list  gap-3">

        <!-- IMAGEM FIXA À ESQUERDA -->
        <div class="d-none d-sm-flex align-items-center">
            <img src="http://127.0.0.1:8000/images/user-default.png" alt="Logo de Pedro revendedor" class="rounded-circle" style="width: 90px; height: 90px; object-fit: cover;">
        </div>

        <!-- TODO O RESTANTE DO CONTEÚDO -->
        <div class="flex-fill">

            <!-- HEADER -->
            <div class="d-flex align-items-center gap-3">

                <div>
                <span class="text-primary fw-bold">
                    ID #3
                </span>

                    <span class="text-light-hover"> | </span>

                    <span class="fw-bold">
                    Pedro revendedor
                </span>
                </div>

                <div class="badge rounded-pill bg-badge fw-bold">
                    Revendedor
                </div>

                <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-1 gap-sm-2 ms-auto">
                    <div class="fw-bold">Ativo</div>

                    <div class="custom-select">
                        <div wire:snapshot="{&quot;data&quot;:{&quot;active&quot;:1,&quot;title&quot;:null,&quot;idrow&quot;:3,&quot;table&quot;:&quot;empresas_users&quot;,&quot;iduser&quot;:&quot;aFzTs&quot;,&quot;empresa_id&quot;:null},&quot;memo&quot;:{&quot;id&quot;:&quot;Djv3cyLSDBrDPvZhrU2u&quot;,&quot;name&quot;:&quot;active&quot;,&quot;path&quot;:&quot;empresa\/users&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;release&quot;:&quot;a-a-a&quot;,&quot;children&quot;:[],&quot;scripts&quot;:[&quot;752118209-0&quot;],&quot;assets&quot;:[],&quot;errors&quot;:[],&quot;locale&quot;:&quot;pt_BR&quot;},&quot;checksum&quot;:&quot;7b1acefb0f77de9d361d986dadd39f3d221014a31c1b0738fb455e4fc31b26d4&quot;}" wire:effects="{&quot;scripts&quot;:{&quot;752118209-0&quot;:&quot;    &lt;script&gt;\n        $wire.on('show-active-confirmation', ({ id, actionText }) =&gt; {\n            if (id === 3) {\n                document.getElementById('actionText-3').innerText = actionText;\n                const modal = new bootstrap.Modal(document.getElementById('confirmationModal-3'));\n                modal.show();\n            }\n        });\n    &lt;\/script&gt;\n        &quot;}}" wire:id="Djv3cyLSDBrDPvZhrU2u">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="switch-3" wire:click.prevent="askForConfirmation" checked="" wire:key="input-switch-3-on">
                                <label class="form-check-label" for="aFzTs"></label>
                            </div>
                            <!-- Modal de Confirmação -->
                            <div class="modal fade" id="confirmationModal-3" tabindex="-1" aria-labelledby="confirmationModalLabel-3" aria-hidden="true" wire:ignore.self="">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmationModalLabel-3" style="margin-top: 0;">Confirmar Alteração</h5>
                                            <button type="button" class="btn border-0 bg-transparent p-0" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="bi bi-x-circle" style="color:white; font-size: 20px;"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Você tem certeza que deseja <strong id="actionText-3"></strong> este item?</p>
                                            <div class="form-check mt-3 d-flex justify-content-center align-items-center gap-2">
                                                <label class="form-check-label" for="skipConfirmation-3">
                                                    Não perguntar novamente
                                                </label>
                                                <input class="form-check-input filtro-ativo-checkbox" type="checkbox" id="skipConfirmation-3">
                                            </div>
                                        </div>
                                        <div class="modal-footer" style="gap: 60px;">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary" wire:click="toggleActive(document.getElementById('skipConfirmation-3').checked)" data-bs-dismiss="modal">
                                                Confirmar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="dropdown">
                    <button class="btn btn-actions" type="button" data-bs-toggle="dropdown" style="padding: 0;">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end actions-menu" style="padding: 0;">
                        <li class="dropdown-header" style="margin: auto;">Ações</li>

                        <li>
                            <a class="dropdown-item action-item" href="http://127.0.0.1:8000/empresa/users/eyJpdiI6IjZyZHdMRkg4bitYYklqQTF4N04vZ2c9PSIsInZhbHVlIjoiZlZoM1RmcEFsdzBCZUlwT2ZESFhQZz09IiwibWFjIjoiYzkzYTI5OTQ0MWUxM2M2Mzg2MzFkYjBlYzNjMzc5NjM4NDE4NTU5ODczYWJhOGU3ZTJhNDhiYTNjYjY5YmZhOSIsInRhZyI6IiJ9/edit">
                                <i class="mdi mdi-pencil me-2"></i> Editar
                            </a>
                        </li>

                        <li>
                            <button type="button" class="dropdown-item action-item" wire:click="$dispatch('abrirAlterarSenha', [3])">
                                <i class="mdi mdi-key-variant me-2"></i> Alterar senha
                            </button>
                        </li>

                        <form action="http://127.0.0.1:8000/empresa/users/3" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                            <input type="hidden" name="_token" value="UjMXnnPUL4lqTSKz6G445VNpH6HD8nmtmRYpeXSR" autocomplete="off">                                        <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="dropdown-item action-item text-danger">
                                <i class="mdi mdi-delete-outline me-2"></i> Deletar Usuário
                            </button>
                        </form>
                    </ul>
                </div>

            </div>

            <hr style="margin: 0.5rem">

            <!-- INFORMAÇÕES -->
            <div class="row">
                <div class="col-sm-2">
                    <div class="fw-bold">Username</div>
                    <div class="text-muted">-</div>
                </div>

                <div class="col-sm-2">
                    <div class="fw-bold">Documento</div>
                    <div class="text-muted">-</div>
                </div>

                <div class="col-sm-2">
                    <div class="fw-bold">Criado em</div>
                    <div class="text-muted">
                        14/03/2026 04:21:38


                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="fw-bold">Verificado em</div>
                    <div class="text-muted">
                        14/03/2026 04:21:38


                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="fw-bold">Atualizado em</div>
                    <div class="text-muted">
                        14/03/2026 04:21:38


                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="d-flex catalog-striped catalog-hover search-list gap-3">

        <!-- IMAGEM FIXA À ESQUERDA -->
        <div class="d-none d-sm-flex align-items-center">
            <img src="http://127.0.0.1:8000/images/user-default.png" alt="Logo de Usuário Inativo" class="rounded-circle" style="width: 90px; height: 90px; object-fit: cover;">
        </div>

        <!-- TODO O RESTANTE DO CONTEÚDO -->
        <div class="flex-fill">

            <!-- HEADER -->
            <div class="d-flex align-items-center gap-3">

                <div>
                <span class="text-primary fw-bold">
                    ID #4
                </span>

                    <span class="text-light-hover"> | </span>

                    <span class="fw-bold">
                    Usuário Inativo
                </span>
                </div>

                <div class="badge rounded-pill bg-badge fw-bold">
                    Usuário
                </div>

                <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-1 gap-sm-2 ms-auto">
                    <div class="fw-bold">Ativo</div>

                    <div class="custom-select">
                        <div wire:snapshot="{&quot;data&quot;:{&quot;active&quot;:0,&quot;title&quot;:null,&quot;idrow&quot;:4,&quot;table&quot;:&quot;empresas_users&quot;,&quot;iduser&quot;:&quot;wdh3P&quot;,&quot;empresa_id&quot;:null},&quot;memo&quot;:{&quot;id&quot;:&quot;pAFlqVCoLLRamKQXl1z8&quot;,&quot;name&quot;:&quot;active&quot;,&quot;path&quot;:&quot;empresa\/users&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;release&quot;:&quot;a-a-a&quot;,&quot;children&quot;:[],&quot;scripts&quot;:[&quot;752118209-0&quot;],&quot;assets&quot;:[],&quot;errors&quot;:[],&quot;locale&quot;:&quot;pt_BR&quot;},&quot;checksum&quot;:&quot;4e8de20c5f7ff5fd3bf3e1d072eb818572c19fc49105a8e5faabb7cd8000d502&quot;}" wire:effects="{&quot;scripts&quot;:{&quot;752118209-0&quot;:&quot;    &lt;script&gt;\n        $wire.on('show-active-confirmation', ({ id, actionText }) =&gt; {\n            if (id === 4) {\n                document.getElementById('actionText-4').innerText = actionText;\n                const modal = new bootstrap.Modal(document.getElementById('confirmationModal-4'));\n                modal.show();\n            }\n        });\n    &lt;\/script&gt;\n        &quot;}}" wire:id="pAFlqVCoLLRamKQXl1z8">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="switch-4" wire:click.prevent="askForConfirmation" wire:key="input-switch-4-off">
                                <label class="form-check-label" for="wdh3P"></label>
                            </div>
                            <!-- Modal de Confirmação -->
                            <div class="modal fade" id="confirmationModal-4" tabindex="-1" aria-labelledby="confirmationModalLabel-4" aria-hidden="true" wire:ignore.self="">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmationModalLabel-4" style="margin-top: 0;">Confirmar Alteração</h5>
                                            <button type="button" class="btn border-0 bg-transparent p-0" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="bi bi-x-circle" style="color:white; font-size: 20px;"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Você tem certeza que deseja <strong id="actionText-4"></strong> este item?</p>
                                            <div class="form-check mt-3 d-flex justify-content-center align-items-center gap-2">
                                                <label class="form-check-label" for="skipConfirmation-4">
                                                    Não perguntar novamente
                                                </label>
                                                <input class="form-check-input filtro-ativo-checkbox" type="checkbox" id="skipConfirmation-4">
                                            </div>
                                        </div>
                                        <div class="modal-footer" style="gap: 60px;">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary" wire:click="toggleActive(document.getElementById('skipConfirmation-4').checked)" data-bs-dismiss="modal">
                                                Confirmar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="dropdown">
                    <button class="btn btn-actions" type="button" data-bs-toggle="dropdown" style="padding: 0;">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end actions-menu" style="padding: 0;">
                        <li class="dropdown-header" style="margin: auto;">Ações</li>

                        <li>
                            <a class="dropdown-item action-item" href="http://127.0.0.1:8000/empresa/users/eyJpdiI6Ik1SN21JNVl1NEZId2lOMzdXeEVQWGc9PSIsInZhbHVlIjoiTGJ2U05uQ0hNZGJxRVRqOVFsSm9Wdz09IiwibWFjIjoiZDdmYTkwOTMzZGRmMzcxNjNmNGQ3NTdlNjUwYTIwZGI2MWY1ZTBjYWI4MjllMjc2NjdlY2VhOTI4NmZkNTY4MCIsInRhZyI6IiJ9/edit">
                                <i class="mdi mdi-pencil me-2"></i> Editar
                            </a>
                        </li>

                        <li>
                            <button type="button" class="dropdown-item action-item" wire:click="$dispatch('abrirAlterarSenha', [4])">
                                <i class="mdi mdi-key-variant me-2"></i> Alterar senha
                            </button>
                        </li>

                        <form action="http://127.0.0.1:8000/empresa/users/4" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                            <input type="hidden" name="_token" value="UjMXnnPUL4lqTSKz6G445VNpH6HD8nmtmRYpeXSR" autocomplete="off">                                        <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="dropdown-item action-item text-danger">
                                <i class="mdi mdi-delete-outline me-2"></i> Deletar Usuário
                            </button>
                        </form>
                    </ul>
                </div>

            </div>

            <hr style="margin: 0.5rem">

            <!-- INFORMAÇÕES -->
            <div class="row">
                <div class="col-sm-2">
                    <div class="fw-bold">Username</div>
                    <div class="text-muted">-</div>
                </div>

                <div class="col-sm-2">
                    <div class="fw-bold">Documento</div>
                    <div class="text-muted">-</div>
                </div>

                <div class="col-sm-2">
                    <div class="fw-bold">Criado em</div>
                    <div class="text-muted">
                        14/03/2026 04:21:38


                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="fw-bold">Verificado em</div>
                    <div class="text-muted">
                        14/03/2026 04:21:38


                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="fw-bold">Atualizado em</div>
                    <div class="text-muted">
                        14/03/2026 04:21:38


                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="d-flex catalog-striped catalog-hover  search-list gap-3">

        <!-- IMAGEM FIXA À ESQUERDA -->
        <div class="d-none d-sm-flex align-items-center">
            <img src="http://127.0.0.1:8000/images/user-default.png" alt="Logo de Bruno" class="rounded-circle" style="width: 90px; height: 90px; object-fit: cover;">
        </div>

        <!-- TODO O RESTANTE DO CONTEÚDO -->
        <div class="flex-fill">

            <!-- HEADER -->
            <div class="d-flex align-items-center gap-3">

                <div>
                <span class="text-primary fw-bold">
                    ID #5
                </span>

                    <span class="text-light-hover"> | </span>

                    <span class="fw-bold">
                    Bruno
                </span>
                </div>

                <div class="badge rounded-pill bg-badge fw-bold">
                    Administrador
                </div>

                <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-1 gap-sm-2 ms-auto">
                    <div class="fw-bold">Ativo</div>

                    <div class="custom-select">
                        <div wire:snapshot="{&quot;data&quot;:{&quot;active&quot;:1,&quot;title&quot;:null,&quot;idrow&quot;:5,&quot;table&quot;:&quot;empresas_users&quot;,&quot;iduser&quot;:&quot;cdzUg&quot;,&quot;empresa_id&quot;:null},&quot;memo&quot;:{&quot;id&quot;:&quot;Bl1vkUPZuwKmZ9Le2sT1&quot;,&quot;name&quot;:&quot;active&quot;,&quot;path&quot;:&quot;empresa\/users&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;release&quot;:&quot;a-a-a&quot;,&quot;children&quot;:[],&quot;scripts&quot;:[&quot;752118209-0&quot;],&quot;assets&quot;:[],&quot;errors&quot;:[],&quot;locale&quot;:&quot;pt_BR&quot;},&quot;checksum&quot;:&quot;6774b7ab876231bbe70c589835f068df270eed039484d683d43c03cf56778c29&quot;}" wire:effects="{&quot;scripts&quot;:{&quot;752118209-0&quot;:&quot;    &lt;script&gt;\n        $wire.on('show-active-confirmation', ({ id, actionText }) =&gt; {\n            if (id === 5) {\n                document.getElementById('actionText-5').innerText = actionText;\n                const modal = new bootstrap.Modal(document.getElementById('confirmationModal-5'));\n                modal.show();\n            }\n        });\n    &lt;\/script&gt;\n        &quot;}}" wire:id="Bl1vkUPZuwKmZ9Le2sT1">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="switch-5" wire:click.prevent="askForConfirmation" checked="" wire:key="input-switch-5-on">
                                <label class="form-check-label" for="cdzUg"></label>
                            </div>
                            <!-- Modal de Confirmação -->
                            <div class="modal fade" id="confirmationModal-5" tabindex="-1" aria-labelledby="confirmationModalLabel-5" aria-hidden="true" wire:ignore.self="">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmationModalLabel-5" style="margin-top: 0;">Confirmar Alteração</h5>
                                            <button type="button" class="btn border-0 bg-transparent p-0" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="bi bi-x-circle" style="color:white; font-size: 20px;"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Você tem certeza que deseja <strong id="actionText-5"></strong> este item?</p>
                                            <div class="form-check mt-3 d-flex justify-content-center align-items-center gap-2">
                                                <label class="form-check-label" for="skipConfirmation-5">
                                                    Não perguntar novamente
                                                </label>
                                                <input class="form-check-input filtro-ativo-checkbox" type="checkbox" id="skipConfirmation-5">
                                            </div>
                                        </div>
                                        <div class="modal-footer" style="gap: 60px;">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary" wire:click="toggleActive(document.getElementById('skipConfirmation-5').checked)" data-bs-dismiss="modal">
                                                Confirmar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="dropdown">
                    <button class="btn btn-actions" type="button" data-bs-toggle="dropdown" style="padding: 0;">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end actions-menu" style="padding: 0;">
                        <li class="dropdown-header" style="margin: auto;">Ações</li>

                        <li>
                            <a class="dropdown-item action-item" href="http://127.0.0.1:8000/empresa/users/eyJpdiI6ImdnUTRzY09DcTlIZ2hiVHZrNHR2SGc9PSIsInZhbHVlIjoiSXU3RFFJSEYySythazNuRUp3aC9mQT09IiwibWFjIjoiZDM5ODVkMTAxODYzYjdlYmExYmExMDA5ZDQyYjA3NGY2OTg2MDIxYmEwODNkOWE4ZjU4NjlkOTIzYjFhYzQxMCIsInRhZyI6IiJ9/edit">
                                <i class="mdi mdi-pencil me-2"></i> Editar
                            </a>
                        </li>

                        <li>
                            <button type="button" class="dropdown-item action-item" wire:click="$dispatch('abrirAlterarSenha', [5])">
                                <i class="mdi mdi-key-variant me-2"></i> Alterar senha
                            </button>
                        </li>

                        <form action="http://127.0.0.1:8000/empresa/users/5" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                            <input type="hidden" name="_token" value="UjMXnnPUL4lqTSKz6G445VNpH6HD8nmtmRYpeXSR" autocomplete="off">                                        <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="dropdown-item action-item text-danger">
                                <i class="mdi mdi-delete-outline me-2"></i> Deletar Usuário
                            </button>
                        </form>
                    </ul>
                </div>

            </div>

            <hr style="margin: 0.5rem">

            <!-- INFORMAÇÕES -->
            <div class="row">
                <div class="col-sm-2">
                    <div class="fw-bold">Username</div>
                    <div class="text-muted">-</div>
                </div>

                <div class="col-sm-2">
                    <div class="fw-bold">Documento</div>
                    <div class="text-muted">-</div>
                </div>

                <div class="col-sm-2">
                    <div class="fw-bold">Criado em</div>
                    <div class="text-muted">
                        14/03/2026 04:21:38


                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="fw-bold">Verificado em</div>
                    <div class="text-muted">
                        14/03/2026 04:21:38


                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="fw-bold">Atualizado em</div>
                    <div class="text-muted">
                        14/03/2026 04:21:38


                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="d-flex catalog-striped catalog-hover  search-list gap-3">

        <!-- IMAGEM FIXA À ESQUERDA -->
        <div class="d-none d-sm-flex align-items-center">
            <img src="http://127.0.0.1:8000/images/user-default.png" alt="Logo de João" class="rounded-circle" style="width: 90px; height: 90px; object-fit: cover;">
        </div>

        <!-- TODO O RESTANTE DO CONTEÚDO -->
        <div class="flex-fill">

            <!-- HEADER -->
            <div class="d-flex align-items-center gap-3">

                <div>
                <span class="text-primary fw-bold">
                    ID #6
                </span>

                    <span class="text-light-hover"> | </span>

                    <span class="fw-bold">
                    João
                </span>
                </div>

                <div class="badge rounded-pill bg-badge fw-bold">
                    Usuário
                </div>

                <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-1 gap-sm-2 ms-auto">
                    <div class="fw-bold">Ativo</div>

                    <div class="custom-select">
                        <div wire:snapshot="{&quot;data&quot;:{&quot;active&quot;:1,&quot;title&quot;:null,&quot;idrow&quot;:6,&quot;table&quot;:&quot;empresas_users&quot;,&quot;iduser&quot;:&quot;tTKj8&quot;,&quot;empresa_id&quot;:null},&quot;memo&quot;:{&quot;id&quot;:&quot;MTdI2QIDwk4Z5zGIPEmu&quot;,&quot;name&quot;:&quot;active&quot;,&quot;path&quot;:&quot;empresa\/users&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;release&quot;:&quot;a-a-a&quot;,&quot;children&quot;:[],&quot;scripts&quot;:[&quot;752118209-0&quot;],&quot;assets&quot;:[],&quot;errors&quot;:[],&quot;locale&quot;:&quot;pt_BR&quot;},&quot;checksum&quot;:&quot;510fe47ac8c2740b1c5640569d32aada36035a34f1c859e29eaf52d429ef238c&quot;}" wire:effects="{&quot;scripts&quot;:{&quot;752118209-0&quot;:&quot;    &lt;script&gt;\n        $wire.on('show-active-confirmation', ({ id, actionText }) =&gt; {\n            if (id === 6) {\n                document.getElementById('actionText-6').innerText = actionText;\n                const modal = new bootstrap.Modal(document.getElementById('confirmationModal-6'));\n                modal.show();\n            }\n        });\n    &lt;\/script&gt;\n        &quot;}}" wire:id="MTdI2QIDwk4Z5zGIPEmu">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="switch-6" wire:click.prevent="askForConfirmation" checked="" wire:key="input-switch-6-on">
                                <label class="form-check-label" for="tTKj8"></label>
                            </div>
                            <!-- Modal de Confirmação -->
                            <div class="modal fade" id="confirmationModal-6" tabindex="-1" aria-labelledby="confirmationModalLabel-6" aria-hidden="true" wire:ignore.self="">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmationModalLabel-6" style="margin-top: 0;">Confirmar Alteração</h5>
                                            <button type="button" class="btn border-0 bg-transparent p-0" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="bi bi-x-circle" style="color:white; font-size: 20px;"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Você tem certeza que deseja <strong id="actionText-6"></strong> este item?</p>
                                            <div class="form-check mt-3 d-flex justify-content-center align-items-center gap-2">
                                                <label class="form-check-label" for="skipConfirmation-6">
                                                    Não perguntar novamente
                                                </label>
                                                <input class="form-check-input filtro-ativo-checkbox" type="checkbox" id="skipConfirmation-6">
                                            </div>
                                        </div>
                                        <div class="modal-footer" style="gap: 60px;">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary" wire:click="toggleActive(document.getElementById('skipConfirmation-6').checked)" data-bs-dismiss="modal">
                                                Confirmar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="dropdown">
                    <button class="btn btn-actions" type="button" data-bs-toggle="dropdown" style="padding: 0;">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end actions-menu" style="padding: 0;">
                        <li class="dropdown-header" style="margin: auto;">Ações</li>

                        <li>
                            <a class="dropdown-item action-item" href="http://127.0.0.1:8000/empresa/users/eyJpdiI6IlBLMjNnTmdwMnNEbVJEUDRNSUVpd1E9PSIsInZhbHVlIjoibE1DT1ZjL2NZOTRONDNEK0doYzErdz09IiwibWFjIjoiOTlhNGNlNjg3MDU4MjZhYTE5N2I3YWEwNDFiYWNlNDc3Y2Y4OWM1M2I4ZjdjMmE3ZDIyYTg5ZGQ0MDY1OTMzNiIsInRhZyI6IiJ9/edit">
                                <i class="mdi mdi-pencil me-2"></i> Editar
                            </a>
                        </li>

                        <li>
                            <button type="button" class="dropdown-item action-item" wire:click="$dispatch('abrirAlterarSenha', [6])">
                                <i class="mdi mdi-key-variant me-2"></i> Alterar senha
                            </button>
                        </li>

                        <form action="http://127.0.0.1:8000/empresa/users/6" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                            <input type="hidden" name="_token" value="UjMXnnPUL4lqTSKz6G445VNpH6HD8nmtmRYpeXSR" autocomplete="off">                                        <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="dropdown-item action-item text-danger">
                                <i class="mdi mdi-delete-outline me-2"></i> Deletar Usuário
                            </button>
                        </form>
                    </ul>
                </div>

            </div>

            <hr style="margin: 0.5rem">

            <!-- INFORMAÇÕES -->
            <div class="row">
                <div class="col-sm-2">
                    <div class="fw-bold">Username</div>
                    <div class="text-muted">-</div>
                </div>

                <div class="col-sm-2">
                    <div class="fw-bold">Documento</div>
                    <div class="text-muted">-</div>
                </div>

                <div class="col-sm-2">
                    <div class="fw-bold">Criado em</div>
                    <div class="text-muted">
                        14/03/2026 04:21:38


                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="fw-bold">Verificado em</div>
                    <div class="text-muted">
                        14/03/2026 04:21:38


                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="fw-bold">Atualizado em</div>
                    <div class="text-muted">
                        14/03/2026 04:21:38


                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--[if ENDBLOCK]><![endif]-->

</div>
