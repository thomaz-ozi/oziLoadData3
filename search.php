<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid">

        <section id="historia-plugin">
            <h2 class="display-5 fw-bold">ozi-search</h2>

            <h4 class="display-6 fw-bold">Pesquisa sem precisar reload, simples e rápido</h4>

            <div class="row">
                <div class="col-6">
                    <label for="searchSimples">Pesquisa simples</label>
                    <input type="text" class="form-control" data-ozi-search="search-simples" name="searchSimples"
                           id="searchSimples" placeholder="" value="">
                    <?php include 'search-simples.php'; ?>

                </div>
                <div class="col-6">
                    <label for="searchSimples">Pesquisa Dupla,destaque </label>
                    <input type="text" class="form-control"
                           data-ozi-search="search-multi-high"
                           data-ozi-search-multi="true"
                           data-ozi-search-highlight="true"
                           name="searchSimples"
                           id="searchSimples" placeholder="" value="">
                    <?php include 'search-multi-high.php'; ?>

                </div>

            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <label for="searchSimples">Pesquisa texto em destaque </label>
                    <input type="text" class="form-control"
                           data-ozi-search="search-text"
                           data-ozi-search-multi="true"
                           data-ozi-search-highlight="bg-warning text-dark fw-bold"
                           data-ozi-search-no-filter="true"
                           name="searchSimples"
                           id="searchSimples" placeholder="" value="">

                    <?php include 'search-text.php'; ?>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-12">
                    <label for="searchSimples">Grupo </label>
                    <input type="text" class="form-control"
                           data-ozi-search="search-items"
                           data-ozi-group="search-group"
                           data-ozi-search-multi="true"

                           name="searchGruop"
                           id="searchGruop" placeholder="" value="">

                    <?php include 'search-group.php'; ?>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-6">
                    <label for="searchSimples">Menu </label>
                    <input
                            name="Menu"
                            type="text"
                            data-ozi-search="subMenu, subMenuNivel2"
                            data-ozi-search-menu="pesqMenu, hidden"
                            data-ozi-search-words="true"
                            data-ozi-search-highlight="bg-warning text-dark fw-bold"
                            placeholder="Pesquisar"
                    />

                    <?php include 'search-menu.php'; ?>
                </div>
                <div class="col-6">
                    <label for="searchSimples">Menu </label>
                    <input
                            type="text"
                            name="searchMenu"
                            data-ozi-search="search-menu"
                            data-ozi-group="search-title"
                            data-ozi-search-words="true"
                            data-ozi-search-highlight="bg-warning text-dark fw-bold"
                            placeholder="Pesquisar"
                    />

                    <?php include 'search-menu2.php'; ?>
                </div>
            </div>
        </section>
    </div>
</div>