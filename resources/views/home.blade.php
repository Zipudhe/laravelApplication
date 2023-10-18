@extends('layouts.index')
@section('content')
<style>
    .wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 90%;
        padding: 1rem;
    }

    .wrapper h1 {
        margin-bottom: 1rem;
        width: 100%;
        text-align: center;
        border-bottom: 1px solid white;
        line-height: 200%;
    }

    .cardList {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 2rem;

        padding: 1rem;
    }
</style>

<div class="wrapper">
    <h1> Home page </h1>
    <div class="cardList" >
        @foreach ($vagas as $vaga)
            <x-card :vaga="$vaga" />
        @endforeach
    </div>
</div>
@endsection
