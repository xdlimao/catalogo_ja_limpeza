"use strict"
/* 
Os ID do html são:
x = nome do produto
xq = quantidade do produto
xp = preço do produto
lastid = ultimo id do database para loops

var name = + "number inside string"
esse + transforma string para numero (int e float)
*/

//Preço
let lastid = + document.getElementById("lastid").value
let pstring //recebe string
let psnumber //deixa a string apenas com numeros
let preco //deixa os numeros no tipo numero
let precofinal = 0 //soma tudo - valor final da compra
for (let i = 0; i <= lastid; i++) {
    if (document.getElementById(i + "p")) {
        pstring = document.getElementById(i + "p").innerHTML
        psnumber = pstring.replace(/\D/g, "");
        preco = + psnumber
        precofinal = precofinal + preco
    }
}
//Depois no futuro, salvar cada preço de cada produto pra apresentar na mensagem do zap
document.getElementById("result").innerHTML = "Total do pedido: R$" + precofinal
//precofinal ja está disponivel para ser usado

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
        alert(nome + numero + complemento + rua + bairro + cidade)
        //Formula a string melhor depois para o zap aqui
        endereco = nome + numero + complemento + rua + bairro + cidade
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

//Função Principal
function start() {
    addressdefine()
    if (endereco != null) {
        console.log(endereco)
    }
}