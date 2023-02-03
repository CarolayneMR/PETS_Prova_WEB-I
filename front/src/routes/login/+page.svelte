<script>
    let email = "";
    let senha = "";

    const submit = async () => {
        const auth = "http://localhost/prova-web/back/auth.php";

        const data = new FormData();
        data.append("email", email);
        data.append("senha", senha);

        const res = await fetch(auth, {
            method: "POST",
            body: data,
            credentials: "include",
        });

        if (!res.ok) {
            alert("Usuário ou senha incorreto");
            return;
        }

        localStorage.setItem("logado", "true");
        window.location.href = "/";
    };
</script>

<body>
    <div class="box">
        <form on:submit|preventDefault={submit}>
            <input type="text" placeholder="Your name" id="email" bind:value={email}/>
            <input type="password" placeholder="Your password" id="senha" bind:value={senha}/>
            <button>Login!</button>
        </form>
    </div>
</body>

<div class="img-fundo"></div>
<style>
    body {
        text-align: center;
        font-size: 20px;
        font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
            "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
    }
    .box {
        width: 300px;
        margin: auto;
        margin-top: 250px;
        padding: 10px;
        background-color: rgba(86, 96, 64, 0.834);
        border-radius: 5%;
        box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px,
            rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
    }
    .img-fundo {
        position: absolute;
        left: 0px;
        top: 0px;
        z-index: -1;
        width: 100%;
        background-image: url("https://uvn-brightspot.s3.amazonaws.com/assets/vixpt/c/cao-e-dono-troca-de-olhares-0217-1400x800.jpg");
        filter: blur(8px);
        -webkit-filter: blur(8px);
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
