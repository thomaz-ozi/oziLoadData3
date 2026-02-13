<!--<section class="py-3 text-center container">-->
<!--    <div class="row py-lg-5">-->
<!--        <div class="col-lg-6 col-md-8 mx-auto">-->
<!--            <h1 class="fw-light">oziLoadData()</h1>-->
<!--            Desenvolvido para simplificar a coleta e validação de dados em múltiplos formulários e campos,-->
<!--            adaptável a-->
<!--            qualquer ambiente — do mais simples aos que utilizam frameworks modernos como Livewire, Alpine.js ou-->
<!--            Vue.-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!--<div class="p-5 mb-4 bg-light rounded-3">-->
<!--    <div class="container-fluid py-5">-->
<!--        <h1 class="display-5 fw-bold">Custom jumbotron</h1>-->
<!--        <p class="col-md-8 fs-4">-->
<!---->
<!--            <button class="btn btn-primary btn-lg" type="button">Example button</button>-->
<!--    </div>-->
<!--</div>-->
<h4>oziLoadData\Atributos:</h4>
<ul>
    <li><strong>zldUrl</strong>: Endereço de envio dos dados</li>
    <li><strong>zldDestinyId</strong>: Destino da resposta</li>
    <li><strong>zldDestinyAppend</strong>: 'on' → acrescenta a resposta no destino</li>
    <li><strong>zldCatchGroupId</strong>: Pega todos os dados dentro do ID especificado</li>
    <li><strong>zldCatchItemName</strong>: Pega os itens individuais por nome</li>
    <li><strong>zldMode</strong>: padrão='fetch'; 'window'; 'page'</li>

    <li><strong>zldModePageMethod</strong>: GET; POST = padrão</li>
    <li><strong>zldModePageTarget</strong>: _self; _blank; _parent; _top; framename</li>

    <li><strong>zldFormClear</strong>: 'on' → limpa os formulários (menos os hidden) após envio</li>
    <li><strong>zldFormBusy</strong>: true → solicitação em andamento; botão desabilitado para evitar cliques repetidos</li>

    <li><strong>zldReloadScript</strong>: 'on' → pesquisa a classe ld-reload e recarrega os scripts</li>
    <li><strong>zldJson</strong>: conteúdo JSON</li>
    <li><strong>zldCheckbox</strong>: valor do checkbox</li>

    <li><strong>zldLog</strong>: 'on' → ativa debug</li>

</ul>
<hr>
<section id="oziLoadDataConf">
    <h4>Customizando\Atributos</h4>
    A função oziLoadDataConf serve para configurar padrões visuais e de comportamento do seu plugin. seja Bootstrap 4.x ou 5.x
    <ul>
        <li><strong>ProgressBarGlobalClass</strong>: classe que recebe o evento da barra de progresso global</li>
        <li><strong>ProgressBarGlobalOption</strong>: <code>true|false</code> → ativa ou desativa a barra de progresso global</li>
        <li><strong>responseValidClass</strong>: classe personalizada para indicar status válido</li>
        <li><strong>responseInvalidClass</strong>: classe personalizada para indicar status inválido</li>
    </ul>
</section>

<section id="organizacao-modelos-lista">
    <h2>Organização dos Modelos de Uso</h2>
    <ul>
        <li>
            <strong>Inline Event Handler (legado)</strong><br>
            Exemplo: <code>&lt;a onclick="oziLoadData({ldUrl:'form.html', ldDestinyId:'mainContainer', })"&gt;Form&lt;/a&gt;</code><br>
            Classificação: atributo de evento HTML (HTML4/HTML5)<br>
            Recomendação: <em>não recomendado</em> em projetos modernos
        </li>
        <li>
            <strong>Custom Data Attributes (HTML5)</strong><br>
            Exemplo: <code>&lt;button data-zld-url="form.html" data-zld-destiny-id="mainContainer"&gt;Enviar&lt;/button&gt;</code><br>
            Classificação: custom data attributes (HTML5 Living Standard)<br>
            Recomendação: <em>recomendado</em> — padrão moderno e semântico
        </li>
        <li>
            <strong>JavaScript Function Call com Config Object</strong><br>
            Exemplo: <code>oziLoadData({ldUrl:'form.html', ldDestinyId:'mainContainer'})</code><br>
            Classificação: chamada de função JS com objeto literal<br>
            Recomendação: <em>recomendado</em> — padrão moderno em bibliotecas
        </li>
    </ul>
</section>
