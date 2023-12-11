"use strict"
/* 
Os ID do html são:
x = nome do produto
xq = quantidade do produto
xp = preço do produto
lastid = ultimo id do database para loops

var name = + "number inside string"
esse + transforma string para numero (int e float)
Para checar se existe algo escrito em um HTML (innerHTML, ou seja, dentro das tags) é preciso verificar apenas o document, sem atribuir a uma variavel, se não da erro no script inteiro! veja abaixo no primeiro if.
*/

//Preço
let lastid = + document.getElementById("lastid").value
let pstring //recebe string
let psnumber //deixa a string apenas com numeros
let preco //deixa os numeros no tipo numero
let precoindiv = []
let precofinal = 0 //soma tudo - valor final da compra
for (let i = 0; i <= lastid; i++) {
    if (document.getElementById(i + "p")) {
        pstring = document.getElementById(i + "p").innerHTML
        psnumber = pstring.replace(/\D/g, "");
        preco = + psnumber
        precoindiv.push(preco)
        console.log("Tamanho " + precoindiv.length)
        console.log("Preço de " + i + ": " + precoindiv[1])
        precofinal = precofinal + preco
    }
}
document.getElementById("result").innerHTML = "Total do pedido: R$" + precofinal

//Endereço
let endereco

let nome
let numero
let complemento
let rua
let bairro
let cidade
function addressdefine() {
    let verificador5 = 0
    if (document.getElementById("name").value != "") {
        nome = document.getElementById("name").value
        verificador5++
    }
    if (document.getElementById("number").value != "") {
        numero = document.getElementById("number").value
        verificador5++
    }

    if (document.getElementById("complement").value != "") {
        complemento = document.getElementById("complement").value
    } else {
        complemento = document.getElementById("complement").value = ""
    }

    if (document.getElementById("street").value != "") {
        rua = document.getElementById("street").value
        verificador5++
    }
    if (document.getElementById("district").value != "") {
        bairro = document.getElementById("district").value
        verificador5++
    }

    if (document.getElementById("city").value != "") {
        cidade = document.getElementById("city").value
        verificador5++
    }

    if (verificador5 === 5) {
        endereco = nome + "; " + rua + ", " + numero + ", " + bairro + ", " + complemento + ", " + cidade + "."
    } else {
        alert("Preencha todos os campos de endereço obrigatórios")
        nome = document.getElementById("name").value = ""
        numero = document.getElementById("number").value = ""
        complemento = document.getElementById("complement").value = ""
        rua = document.getElementById("street").value = ""
        bairro = document.getElementById("district").value = ""
        cidade = document.getElementById("city").value = ""
        endereco = undefined
    }
}

//Falta Quantidade e Nome do Produto Function para formar a string do zap
//Quantidade e Nome
let produtos = []
let quantity
let name
function quantityproductandprice() {
    produtos = []
    for (let i = 0; i <= lastid; i++) {
        if (document.getElementById(i)) {
            quantity = document.getElementById(i + "q").innerHTML
            name = document.getElementById(i).innerHTML
            produtos.push(quantity + " " + name + " " + "   R$" + precoindiv[produtos.length]) //Ele adiciona apenas o que existem. Se realmente encontrar um produto, será adicionado no 0
        }
    }
}

function criarStringProdutos(array) {
    return array.join('\n');
}

let produtoslista //aqui está todos os produtos do array já formatados para enviar


//Função Principal
function start() {
    addressdefine()
    quantityproductandprice()
    produtoslista = criarStringProdutos(produtos)
    let link = "https://wa.me/5511959261601?text="
    let textencoded
    let text = `
*Endereço:*         
`+
        endereco
        + `
    
*Itens:*
`+
        produtoslista
        + `

*Total pedido: R$` + precofinal + `*`;
    console.log(text)
    textencoded = encodeURIComponent(text);
    if (endereco != undefined) {
        link = "https://wa.me/5511959261601?text=" + textencoded
        window.location.href = link;
    }
}