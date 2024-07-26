<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Marca;
use App\Models\Categoria;
use App\Models\Produto;

class FiltroProduto extends Component
{
    public $search = '';
    public $selectedMarcas = [];
    public $selectedCategorias = [];
    public $produtos = [];

    protected $queryString = [
        'search' => ['except' => ''],
        'selectedMarcas' => ['except' => []],
        'selectedCategorias' => ['except' => []]
    ];

    public function mount()
    {
        $this->applyFilters();
    }

    public function updated($propertyName)
    {
        $this->applyFilters();
    }

    public function applyFilters()
    {
        $this->produtos = Produto::with('marca', 'categoria')
            ->when($this->search, function ($query) {
                $query->where('nome', 'like', '%' . $this->search . '%');
            })
            ->when($this->selectedMarcas, function ($query) {
                $query->orWhereIn('marca_id', $this->selectedMarcas);
            })
            ->when($this->selectedCategorias, function ($query) {
                $query->orWhereIn('categoria_id', $this->selectedCategorias);
            })
            ->get();
    }

    public function clearFilters()
    {
        $this->reset(['search', 'selectedMarcas', 'selectedCategorias']);
        $this->applyFilters();
    }

    public function render()
    {
        return view('livewire.filtro-produto', [
            'marcas' => Marca::orderBy('nome')->get(),
            'categorias' => Categoria::orderBy('nome')->get(),
        ]);
    }
}
