<?php include 'layout_php/header.php'?>
<!-- ========== Conteúdo aqui ========== -->

<div class="container object">
    <form class="pesquisa" action="" method="get">
        <div class="row text-center">
            <div class="col-6">
                <div class="row text-center">
                    <div class="col-12">
                        <label class="col-form-label" for="anime">Digite o nome do anime: </label>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-12">
                        <label class="col-form-label" for="ep">Digite o número do EP: </label>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row text-center">
                    <div class="col-12">
                        <input type="text" class="form-control texto" placeholder="Ex: shingeki no kyojin" name="anime" id="anime">
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-12">
                        <input type="text" onkeypress="return limitar();" class="form-control texto" placeholder="Ex: 1" name="ep" id="ep">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" title="Pesquisar anime" class="btn text-light btn-dark pesq">Pesquisar</button>
            </div>
        </div>
    </form>
    <?php
        $verificar = false;
        $verificar2 = true;
        
        if (isset($_GET['anime'])) {
            $anime_nome = $_GET['anime'];
            $ep = $_GET['ep'];
            $ep_first = substr($ep,0,1);
            $ep_len = strlen($ep);
            if ($ep_first != 0 && $ep_len < 2)
                $ep = "0".$ep;

            $anime_nome = rtrim($anime_nome);
            $anime_nome = ltrim($anime_nome);

            $anime_nome = str_replace(" ", "-", $anime_nome);
            $anime_nome = strtolower($anime_nome);

            $anime_letra = substr($anime_nome,0,1);
            $anime_letra = ucwords($anime_letra);
            $formato = ".mp4";
            $protocolo = "https://";
            $server = "ns569568";
            $ip = "ip-51-79-82.net";
            $caminho = "/Uploads/Animes/";
            $get = $protocolo.$server.".".$ip.$caminho;
            $url = $get.$anime_letra."/".$anime_nome."/".$ep.$formato;
 
            $verificar = true;
        }

        if (isset($_POST['voltar'])) {
            $ep = $_GET['ep'];
            $anime = $_GET['anime'];
            $ep--;
            header("location: ?anime=".$anime."&ep=".$ep);
        }

        if (isset($_POST['avancar'])) {
            $ep = $_GET['ep'];
            $anime = $_GET['anime'];
            $ep++;
            header("location: ?anime=".$anime."&ep=".$ep);            
        }

        if (isset($_GET['anime']) && isset($_GET['ep'])) {
            if ($anime_nome == "" || $ep == "") {
                $verificar = false;
                echo "<div class='row text-center pesquisa'>";
                echo "<div class='col-12'>";
                echo "<h3 class=erro>Preencha antes de pesquisar.</h3>";
                echo "</div>";
                echo "</div>";
                $verificar2 = false;
            }
        }
        if ($verificar) {
            $headers = get_headers($url, 1);
            $headers = array_change_key_case($headers);
            $fileSize = -1;
            if(isset($headers['content-length'])) {
                $fileSize = $headers['content-length'];
                if ($fileSize != 1424) {
                    $verificar = true;
                } else {
                    if ($verificar2)
                        echo "<div class='row text-center pesquisa'>";
                        echo "<div class='col-12'>";
                        echo "<h3 class=erro>Anime não encontrado!</h3>";
                        echo "<h3 class=erro>Lembre-se de não usar símbolos.</h3>";
                        echo "</div>";
                        echo "</div>";
                        $verificar = false;
                }
            }
        }

        if ($verificar) {
            $anime_nome = str_replace("-", " ", $anime_nome);
            $anime_nome = ucwords($anime_nome);
            echo "<div class='row row-title text-center'>";
            echo "<div class='col-12'>";
            echo "<h3>".$anime_nome." -  EP: ".$ep."</h3>";
            echo "</div>";
            echo "</div>";
            echo "<div class='row text-center videor'>";
            echo "<div class='col-12'>";    
            echo "<video id=video class=video autoplay controls src='".$url."'></video>";
            echo "</div>";
            echo "</div>";
        ?>
    <div class="row text-center control">
        <div onclick="passar(0)" title="Epsódio Anterior | atalho: (H)" class="col-3 b-left botao">
            <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-arrow-left-square-fill seta" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.354 10.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L6.207 7.5H11a.5.5 0 0 1 0 1H6.207l2.147 2.146z"/>
            </svg>
        </div>
        <div onclick="telaCheia()" class="col-3 botao" title="Entrar Tela Cheia / Sair Tela Cheia | atalho: (F)">
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-aspect-ratio-fill seta" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm1 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 1 0V5h2.5a.5.5 0 0 0 0-1h-3zm11 8a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-1 0V11h-2.5a.5.5 0 0 0 0 1h3z"/>
            </svg>
        </div>
        <div onclick="pp()" class="col-3 botao" title="Play / Pause | atalho: (P)">
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-play-fill seta" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
            </svg>
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-pause-fill seta" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.5 3.5A1.5 1.5 0 0 1 7 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5zm5 0A1.5 1.5 0 0 1 12 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5z"/>
            </svg>
        </div>
        <div onclick="passar(1)" title="Próximo Epsódio | atalho: (J)" class="col-3 b-right botao">
            <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-arrow-right-square-fill seta" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm5.646 10.646a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L9.793 7.5H5a.5.5 0 0 0 0 1h4.793l-2.147 2.146z"/>
            </svg>
        </div>
    </div>
    <?php } ?>
</div>

<!-- ========== Conteúdo termina aqui ========== -->
<?php include 'layout_php/footer.php'?>