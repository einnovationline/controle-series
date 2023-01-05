<x-layout tittle="Nova Série">
    <!-- abaixo outra forma de colaocar a rota, no forms.blade.php no href tem o modelo -->
    <!--<x-series.form :action="route('series.store')" :nome="old('nome')" :update="false" />-->

    <form action="{{ route('series.store') }}" method="post">
        @csrf

        <div class="row mb-3"
            <div class="col-8">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" 
                    autofocus
                    id="nome" 
                    name="nome" 
                    class="form-control" 
                    ($nome)value="{{ old('nome') }}">
            </div>

        <div class="col-2">
                <label for="seasonsQty" class="form-label">Nº temporadas:</label>
                <input type="text" 
                    id="seasonsQty" 
                    name="seasonsQty" 
                    class="form-control" 
                    ($nome)value="{{ old('seasonsQty') }}">
            </div>

        <div class="col-2">
                <label for="episodesPerSeason" class="form-label">Eps / Temporada:</label>
                <input type="text" 
                    id="episodesPerSeason" 
                    name="episodesPerSeason" 
                    class="form-control" 
                    ($nome)value="{{ old('episodesPerSeason') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
        <a href="{{ route('series.index') }}" class="btn btn-light" >Cancelar</a>
</x-layout>