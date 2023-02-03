<script>
    let nome = "";
    let email = "";
    let senha = "";

    const createUser = async () => {

        const create = "http://localhost/prova-web/back/create-user.php";
        const data = new FormData();
        data.append("nome", nome);
        data.append("email", email);
        data.append("senha", senha);

        fetch(create, {
            method: "POST",
            body: data,
        });
    };

</script>

<div class="img-fundo" />
<body>
    <div class="box">
        <h2>Register</h2>
        <form on:submit|preventDefault={createUser}>
            <input type="text" name="nome" id="nome" placeholder="Your name" required bind:value={nome}/>
            <input type="text" name="email" id="email" placeholder="Your email" required bind:value={email}/>
            <input type="password" name="senha" id="senha" placeholder="Your passward" required bind:value={senha}/>
            <button>🐾 Register! 🐾</button>
            <p>Have a account? <a href="login">Login in.</a></p>
        </form>
    </div>
</body>

<style>
    body {
        text-align: center;
        font-size: 20px;
        font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
    }
    p{
        font-size: 13px;
    }
    input{
        width: 200px;
        height: 35px;
        margin: 5px;
        border: none;
        border-radius: 5px;
    }
    button{
        width: 150px;
        height: 35px;
        border: none;
        color: white;
        margin: 5px;
        border-radius: 10px;
        background-color: rgb(82, 72, 61);
    }
    body {
        text-align: center;
        font-size: 20px;
        font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
            "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
        color: white;
    }
    .box {
        width: 300px;
        margin: auto;
        margin-top: 250px;
        padding: 10px;
        background-color: rgba(86, 96, 64, 0.834);
        border-radius: 40px;
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