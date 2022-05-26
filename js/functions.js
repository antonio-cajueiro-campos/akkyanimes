function limitar(campo) {

    var evento = campo || window.event;
    var chave = evento.keyCode || evento.which;
    chave = String.fromCharCode(chave);
 
    var valida = /^(\r|\n|[0-9])+$/;
 
    if (!valida.test(chave)) {
        evento.returnValue = false;
       
        if(evento.preventDefault)
            evento.preventDefault();
    }
}

function avancar130() {
    var atual = document.getElementById('video').currentTime;
    atual = atual + 90;
    video.currentTime = atual;
}
function telaCheia() {
    var isInFullScreen = (document.fullscreenElement && document.fullscreenElement !== null) ||
    (document.webkitFullscreenElement && document.webkitFullscreenElement !== null) ||
    (document.mozFullScreenElement && document.mozFullScreenElement !== null) ||
    (document.msFullscreenElement && document.msFullscreenElement !== null);
    if (!isInFullScreen)
        entrarTelaCheia();
    else
        sairTelaCheia();  
}

function entrarTelaCheia() {
    var video = document.getElementById("video");

    if (video.requestFullscreen)
        video.requestFullscreen();
    else
        if (video.mozRequestFullScreen)
            video.mozRequestFullScreen();
        else
            if (video.webkitRequestFullscreen)
                video.webkitRequestFullscreen();
            else
                if (video.msRequestFullscreen)
                    video.msRequestFullscreen();
}

function sairTelaCheia() {
    if (document.exitFullscreen)
        document.exitFullscreen();
    else
        if (document.webkitExitFullscreen)
            document.webkitExitFullscreen();
        else
            if (document.mozCancelFullScreen)
                document.mozCancelFullScreen();
            else
                if (document.msExitFullscreen)
                    document.msExitFullscreen();
}

function pp() {
    var video = document.getElementById('video');
    if (video.paused)
        video.play();
    else
        video.pause();
}

var ahoyy = 0;
var tentar = 0;

function ahoy() {
    ahoyy++;
    if (ahoyy > 50) {
        swal("Para com isso seu doente");
        tentar++;
        if (tentar >= 3) {
            swal("Para de tentar que não vo deixar");
            tentar = 0;
        }
    } else {
        var footer = document.getElementById('footer');
        var navbar = document.getElementById('navbar');
        
        var coder = Math.floor(Math.random() * 200);
        var codeg = Math.floor(Math.random() * 200);
        var codeb = Math.floor(Math.random() * 200);
        var color = "background: rgb("+coder+", "+codeg+", "+codeb+");";
                
        var audio = new Audio('sounds/ahoy.mp3');

        audio.addEventListener('canplaythrough', function() {
            audio.play();

            wallChange();
            footer.setAttribute('style', color);
            navbar.setAttribute('style', color);
        });
    }
}

function miku() {
    var ooeeoo = document.getElementById('ooeeoo');
    
    if (ooeeoo.duration > 0 && !ooeeoo.paused) {
        ooeeoo.pause();
    } else {
        ooeeoo.currentTime = 0;
        ooeeoo.volume = 0.5;
        ooeeoo.loop = true;
        ooeeoo.play();
    }
}

function snk3() {
    var snk = document.getElementById('snk');
    
    if (snk.duration > 0 && !snk.paused) {
        snk.pause();
    } else {
        snk.currentTime = 0;
        snk.volume = 0.5;
        snk.loop = true;
        snk.play();
    }
}

var ver1 = false;
var ver2 = false;
var ver3 = false;

var vers1 = false;
var vers2 = false;
var vers3 = false;

function atalhos() {
    var anime = document.getElementById('anime');
    var ep = document.getElementById('ep');
    var evento = window.event;
    var chaveS = evento.which;

    chave = String.fromCharCode(chaveS);

    anime = (document.activeElement === anime);
    ep = (document.activeElement === ep);

    if (!anime && !ep) {
        if (chaveS == 109) {
            ver1 = true;
            ver2 = false;
            ver3 = false;
        } else if (chaveS == 105 && ver1 == true) {
            ver1 = false;
            ver2 = true;
            ver3 = false;
        } else if (chaveS == 107 && ver2 == true) {
            ver1 = false;
            ver2 = false;
            ver3 = true;
        } else if (chaveS == 117 && ver3 == true) {
            ver1 = false;
            ver2 = false;
            ver3 = false;
            miku();
        } else {
            ver1 = false;
            ver2 = false;
            ver3 = false;
        }
        
        if (chaveS == 115) {
            vers1 = true;
            vers2 = false;
            vers3 = false;
        } else if (chaveS == 110 && vers1 == true) {
            vers1 = false;
            vers2 = true;
            vers3 = false;
        } else if (chaveS == 107 && vers2 == true) {
            vers1 = false;
            vers2 = false;
            vers3 = true;
        } else if (chaveS == 51 && vers3 == true) {
            vers1 = false;
            vers2 = false;
            vers3 = false;
            snk3();
        } else {
            vers1 = false;
            vers2 = false;
            vers3 = false;
        }
        switch (chave) {
            case 'p': case 'P':
                pp();
                break;
            case 'f': case 'F':
                telaCheia();     
                break;
            case 'j': case 'J':
                passar(1);
                break;
            case 'h': case 'H':
                passar(0);
                break;
            case 'q': case 'Q':
                avancar130();
                break;
            case 'a': case 'A':
                ahoy()
                break;
        }
    }
}

function wallChange() {
    var codigo = Math.floor(Math.random() * 10);
    var wrapper = document.getElementById("wrapper");
    var bg1 = "background: url(images/bg1.png)";
    var bg2 = "background: url(images/bg2.png)";
    var bg3 = "background: url(images/bg3.png)";
    var bg4 = "background: url(images/bg4.png)";

    switch (codigo) {
        case 0: case 1: case 2:
            wrapper.setAttribute("style", bg1);
            break;
        case 3: case 4:
            wrapper.setAttribute("style", bg2);
            break;
        case 5: case 6:
            wrapper.setAttribute("style", bg3);
            break;
        case 7: case 8: case 9:
            wrapper.setAttribute("style", bg4);
            break;
        default:
            wrapper.setAttribute("style", bg1);
    }
}

function passar(sinal) {
    var url = window.location.href; 
    var res = url.split('?'); 

    if (res[1] !== undefined) {

        var parametros = res[1].split('&');
        var param = new Array(); 
        var valor = new Array();

        for (var cont = 0; cont <= 1; cont++) {
            if (parametros[cont] !== undefined) {

                captura = parametros[cont].split('=');
                param[cont] = captura[0];
                valor[cont] = captura[1];
                var ep = valor[cont].replace("#", "");

                if (ep % 1 === 0) {
                    ep = parseInt(ep);
                    if (sinal === 0)
                        var ep = ep-1;
                    else
                        var ep = ep+1;
                } else
                    var anime = valor[cont];

            window.location.href = "?anime=" + anime + "&ep=" + ep;
            }
        }
    }
}
