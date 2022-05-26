<?php
    //Nome do Site
    $nome_site = "Animes Akky";

    $name_db = str_replace(" ", "", $nome_site);
    $name_db = strtolower($name_db);

    //auto configuração de titulo
    $nome_pagina = basename($_SERVER['PHP_SELF']);
    $nome_pagina = pathinfo($nome_pagina, PATHINFO_FILENAME);

    if ($nome_pagina == "index")
        $nome_pagina = "início";
    if ($nome_pagina =="reco_list")
        $nome_pagina = "Recomendações";

    if (isset($_GET['anime']) && isset($_GET['ep'])) {
        $novo_nome = $_GET['anime'];
        $novo_nome = str_replace("-", " ", $novo_nome);
        $nome_pagina = $novo_nome;
    }

    $nome_pagina = str_replace("_", " ", $nome_pagina);
    $nome_pagina = ucwords($nome_pagina);

?>