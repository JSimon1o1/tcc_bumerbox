function togglePasswordLogin() {
    const x = document.getElementById("senha");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function togglePasswordMinhaConta(){
    const i = document.getElementById("senha_atual");
    if (i.type === "password") {
        i.type = "text";
    } else {
        i.type = "password";
    }

    const y = document.getElementById("nova_senha");
    if (y.type === "password") {
        y.type = "text";
    } else {
        y.type = "password";
    }

    const z = document.getElementById("confirmar_senha");
    if (z.type === "password") {
        z.type = "text";
    } else {
        z.type = "password";
    }
}

function togglePasswordRegistro(){
    const a = document.getElementById("senha");
    if (a.type === "password") {
        a.type = "text";
    } else {
        a.type = "password";
    }

    const b = document.getElementById("confirmar_senha");
    if (b.type === "password") {
        b.type = "text";
    } else {
        b.type = "password";
    }

}
