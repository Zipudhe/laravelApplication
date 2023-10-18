<style>
    .card {
        background-color: #000;
        border-radius: 8px;
        box-shadow: 0 0 0.5rem black;
        padding: 1rem;
        margin-bottom: 1rem;

        height: fit-content;
        max-width: 350px;
    }

    h2 {
        color: #fff;
        margin-bottom: 0.5rem;
        font-weight: bold;
    }

    h3 {
        margin-bottom: 0.5rem;
    }

    .descripton {
        box-shadow: inset 0 0 0.5rem gray;
        padding: 1rem;
        border-radius: 8px;
    }

    .descripton h4 {
        line-height: 200%;
        font-weight: bold;
    }

    .requirements {
        margin-top: 1rem;
    }

    .requirements p {
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        line-height: 200%;
    }

</style>

<div class="card" >
    <h2> {{ $vaga->empresa }} </h2>
    <h3> {{ $vaga->titulo }} </h3>
    <div class="descripton" >
        <h4> Descrição: </h4>
        <p> {{ $vaga->descricao }} </p>
    </div>
    @if(is_array($vaga->requisitos))
        <div class="requirements" >
            <h4> Requisitos: </h4>
            @foreach ($vaga->requisitos as $requisito)
                <p> {{ $requisito }} </p>
            @endforeach
        </div>
    @endif
</div>
