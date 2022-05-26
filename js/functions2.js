var antonio = {
    nome: "antonio",
    limpar: function(local) {
        switch (local) {
            case "quarto":
                console.log("o quarto do " + this.nome + " está limpo");
                break;
            case "sala":
                console.log("a sala do " + this.nome + " está limpa");
                break;
            case "cozinha":
                console.log("a cozinha do " + this.nome + " está limpa");
                break;
        }
    }
}