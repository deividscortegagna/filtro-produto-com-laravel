<div>
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-header">Filtros</div>
                <div class="card-body">
                    <div class="form-group">
                        <input
                            type="text"
                            wire:model.defer="search"
                            class="form-control"
                            placeholder="Nome do Produto"
                            wire:keydown.enter="applyFilters"
                        >
                    </div>
                    <div class="form-group">
                        <label for="categorias">Categorias</label>
                        <div class="list-group" id="categorias" style="max-height: 200px; overflow-y: auto;">
                            @foreach($categorias as $categoria)
                                <label class="list-group-item">
                                    <input type="checkbox" wire:model="selectedCategorias" value="{{ $categoria->id }}">
                                    {{ $categoria->nome }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="marcas">Marcas</label>
                        <div class="list-group" id="marcas" style="max-height: 200px; overflow-y: auto;">
                            @foreach($marcas as $marca)
                                <label class="list-group-item">
                                    <input type="checkbox" wire:model="selectedMarcas" value="{{ $marca->id }}">
                                    {{ $marca->nome }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <button wire:click="applyFilters" class="btn btn-primary btn-block">Aplicar Filtros</button>
                    <button wire:click="clearFilters" class="btn btn-secondary btn-block mt-2">Limpar Filtros</button>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Produtos</div>
                <div class="card-body">
                    @if($produtos->isEmpty())
                        <p class="text-center">Nenhum produto encontrado.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Preço</th>
                                        <th>Marca</th>
                                        <th>Categoria</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($produtos as $produto)
                                        <tr>
                                            <td>{{ $produto->nome }}</td>
                                            <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                                            <td>{{ $produto->marca->nome }}</td>
                                            <td>{{ $produto->categoria->nome }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
