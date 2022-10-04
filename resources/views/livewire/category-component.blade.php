<div>
    <div class="row justify-content-between">
        <div class="col-sm-3 col-md-3 col-lg-3">
            <h2>Categorias</h2>
        </div>
        <div class="col-sm-9 col-md-6 col-lg-6 mt-2">
            <input wire:model="search" type="text" class="form-control" placeholder="Pesquisar...">    
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3 mt-2 w3-center">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle fa-lg"></i>&nbsp;ADICIONAR</a>
        </div>
        
    </div>
    @if ($categories->count())
    <div class="w3-card-4">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr class="w3-center txt-input-upper w3-dark-gray">
    
                        <th width="40%">NOME</th>
                        {{-- <th>IMAGEM</th> --}}
                        <th style="max-width: 40%">DESCRIÇÃO</th>
                        <th width="5">ATIVO</th>
                        <th width="5">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
    
                            <td class="txt-input-upper">{{ $category->name }}</td>
                            {{-- <td><img src="{{ url("storage/{$category->picture}") }}" alt="{{ $category->name }}"
                                    style="max-width: 70px;"></td>
    
                            <td> --}}
                            <td class="txt-input-upper">{{ $category->description }}</td>
                            <td class="w3-center">
                                @if ($category->active == 1)
                                    <i class="fas fa-power-off iconIndex text-success"></i>
                                @else
                                    <i class="fas fa-power-off iconIndex text-danger"></i>
                                @endif
                            </td>
                            <td>
                                <div class="row justify-content-center">
                                    <a href="{{ route('admin.categories.edit', $category->url) }}" class="btn w3-indigo"><i class="fas fa-pencil-alt w3-xlarge"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
        <div class="row justify-content-center">
            <div class="col-6">
                {{ $categories->links() }}
            </div>
            
        </div>
        
    </div>
    @else
        <div class="alert alert-secondary">
            <h3>Não há nenhum registro</h3>
        </div>
    @endif
    
</div>
