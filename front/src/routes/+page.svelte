<script>
    import { onMount } from "svelte";

  const logout = async () => {
    fetch("http://localhost/prova-web/back/logout.php", {
      credentials: "include",
    });
    localStorage.removeItem("logado");
    location.reload();
  };

    let nome = "";
    let raca = "";
    let idade = "";
    let peso = "";
    let pets = [];
    let logado = "";

    const postpet = async () => {
        const postRoute = "http://localhost/prova-web/back/create-pet.php";
        const dado = new FormData();
        dado.append("nome", nome);
        dado.append("raca", raca);
        dado.append("idade", idade);
        dado.append("peso", peso);
        let res = await fetch(postRoute, {
            method: "POST",
            body: dado,
            credentials: "include",
        });
        if (!res.ok) {
            alert("erro: não foi possível postar as informações");
            return;
        }
        ospets();
    };

    const ospets = async () => {
        const loadRoute = "http://localhost/prova-web/back/get-userpets.php";
        const res = await fetch(loadRoute, {
            credentials: "include",
        });
        pets = await res.json();
    };

    onMount(() => {
        ospets();
        logado = localStorage.getItem('logado');
    });

    const deletepets = async (id) => {
        const data = new FormData();
        data.append("id", id);
        const deleteRoute = "http://localhost/prova-web/back/deletepet.php";
        const res = await fetch(deleteRoute, {
            method: "POST",
            body: data,
            credentials: "include",
        })
        if(!res.ok){
            alert("erro: não foi possível deletar o objeto");
            return;
        }
        ospets();
    }


</script>

<div class="img-fundo"/>

<body>
    {#if logado != 'true'}
    <div class="box">
        <h1>Welcome to Paw friends!</h1>
        Welcome to our site! this site is cool as heck!
        <br>
        <br>
        <a href="/login">Login</a>
        <a href="/register">Register</a>
    </div>
    {:else}
    <div class="nav">
        <button>Index</button>
        <button>Register</button>
        <button style="cursor: pointer" id="logout" type="button" on:click={logout}>Logout</button>
    </div>
    <div class="box-pets">
        <h1 style="color: white">Register your pet name</h1>
        <form on:submit|preventDefault={postpet}>
            <input type="text" placeholder="Your pet name" id="nome" bind:value={nome}/>
            <input type="text" placeholder="Your dog breed" id="raca" bind:value={raca}/>
            <input type="text" placeholder="Your age" id="idade" bind:value={idade}/>
            <input type="text" placeholder="Your weight" id="peso" bind:value={peso}/>
            <br>
            <button class="btn-send">🐾 Send 🐾</button>
        </form>
        <h3 class="registers"><i>Register</i></h3>
        {#each pets as pet }
        <div class="sobre">
            {pet.PET_NOME} {pet.PET_RAÇA} {pet.PET_IDADE} {pet.PET_PESO}
            <span style="color:red; cursor:pointer" on:click={() => deletepets(pet.PET_ID)}>&times;</span>
        </div>
        <br>
    {/each}
    </div>
    {/if}
</body>

<style>
    .nav{
        margin: auto;
    }
    .registers{
        text-align: center;
        color:rgb(44, 39, 34);
    }
    .sobre{
        color: white;
        margin: 0;
    }
    .box-pets{
        width: 1100px;
        height: 30%;
        margin: auto;
        margin-top: 250px;
        padding: 10px;
        background-color: rgba(86, 96, 64, 0.834);
        border-radius: 40px;
        box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px,rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
    }
    .btn-send{
        height: 60px;
        width: 150px;
        border: 2px solid rgb(42, 36, 33);
        color: white;
        cursor: pointer;
        margin: 10px;
        margin-top: 15px;
        border-radius: 10px;
        background-color: rgb(82, 72, 61);
    }
    input{
        width: 200px;
        height: 35px;
        margin: 2px;
        padding-left: 20px;
        border: none;
        border-radius: 5px;
    }
    button{
        width: 150px;
        height: 30px;
        border: rgb(82, 72, 61);
        color: white;
        margin: 5px;
        border-radius: 10px;
        background-color: rgb(82, 72, 61);
    }
    body {
        text-align: center;
        font-size: 20px;
        font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
    }
    button{
        width: 100px;
        height:50px;
        font-size: 20px;
    }
    .box {
        width: 300px;
        margin: auto;
        margin-top: 250px;
        padding: 10px;
        background-color: rgba(86, 96, 64, 0.834);
        border-radius: 5%;
        box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px,rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
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