<?php
    function handleregister() {
        print('handlined register button');
    }
?>

<style>
        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            width: 100vw;
        }

        h1 {
            margin-bottom: 1rem;
        }

        form {
            display: grid;
            grid-tempalte-columns: 1fr;
            grid-template-rows: 0.33fr 0.33fr 0.33fr;
            grid-gap: 1rem;

            place-items: center;

            width: 500px;
            height: fit-content;
            max-height: 700px;
            padding: 1rem;
        }

        label {
            display: flex;
            flex-direction: column;
            align-items: start;
            justify-content: center;

            font-weight: bold;

            width: 100%;
        }

        input {
            padding: 10px;
            border-radius: 8px;
            width: 100%;
            margin-top: 0.7rem;
        }

        textarea {
            max-width: 100%;
            width: 100%;
            resize:vertical;
            border-radius: 8px;
            padding: 10px;
            margin-top: 0.7rem;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            place-items: center;
            border: solid 1px black;
            padding: 5px;
            border-radius: 8px;
            box-shadow: 0px 0px 2px 2px #2C2C2C;

            background-color: #2F2F2F;
        }

        form > button {
            padding: 10px;
            border-radius: 8px;
            margin-top: 0.5rem;
            background-color: green;
            opacity: 0.6;
            color: black;
            border: none;
            cursor: pointer;
        }
</style>
<main>
    <h1 style="font-size: 64px; margin-bottom: 3rem;" > Quero Trampar </h1>
    <div class="wrapper" >
        <h1>Formulário de cadastro</h1>
        <form method="POST" action="/register" >
            @csrf
            <label for="name" >
                Nome:
                <input
                    class="form-control"
                    type="text"
                    name="nome"
                    id="name"
                    placeholder="Digite seu nome"
                    @error('name') is-invalid @enderror
                    required
                />
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </label>
                <label for="email" >
                Email:
                <input
                    class="form-control"
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Digite melhor email"
                    @error('email') is-invalid @enderror
                    required
                />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </label>
            <label for="password" >
                Senha:
                <input id="password" name="senha" class="form-control" type="password" placeholder="Digite sua senha" />
            </label>
            <label for="confirm_password" >
                Confirme sua senha:
                <input id="confirm_password" name="confirmar_senha" class="form-control" type="password" placeholder="Digite novamente sua senha" />
            </label>
            <label for="habilidades">
                Stack:
                <textarea rows="10" cols="50" id="stack" name="stack" class="form-control" type="multiline"  placeholder="adicione as tecnologias separadas por virgula">
                </textarea>
            </label>

            <button type="submit" > Cadastrar </button>
        </form>
    </div>
</main>
