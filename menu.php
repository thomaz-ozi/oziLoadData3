<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">oziPlugins</span>
    </a>

    <ul class="nav nav-pills">
        <li class="nav-item">
            <a href="#" class="nav-link active" aria-current="page"

               data-zld-log="true"
               data-zld-url="home.php"
               data-zld-destiny-id="mainContainer"
               data-zld-catch-itemName="about:nome"
             >Home</a></li>

        <li class="nav-item">
            <a href="#" class="nav-link" onclick="oziLoadData({
                    ldUrl:'description.php',
                    ldDestinyId:'mainContainer',
                    ldCatchItenName:['about:nome']
                })">
                Descrição
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link"
               onclick="oziLoadData({
                    zldUrl:'form.html',
                    zldDestinyId:'mainContainer',
                   zldCatchItenName:['formularios:nome']
                }, null, this)">Formularios</a></li>
        <li class="nav-item">
            <a href="#" class="nav-link"
               onclick="oziLoadData({
                    ldUrl:'about.html',
                    ldDestinyId:'mainContainer',
                    ldCatchItenName:['about:nome']
                })">About</a></li>
    </ul>
</header>