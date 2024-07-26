<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use App\Models\Produto;
use App\Models\Marca;
use App\Models\Categoria;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FiltroProdutoTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function pode_filtrar_por_nome_do_produto()
    {
        $produtoEspecial = Produto::factory()->create(['nome' => 'Produto Especial']);
        $outroProduto = Produto::factory()->create(['nome' => 'Outro Produto']);

        Livewire::test('filtro-produto')
            ->set('search', 'Produto Especial')
            ->call('applyFilters')
            ->assertSee('Produto Especial')
            ->assertDontSee('Outro Produto');
    }

    /** @test */
    public function pode_filtrar_por_marcas()
    {
        $marcaA = Marca::factory()->create(['nome' => 'Marca A']);
        $marcaB = Marca::factory()->create(['nome' => 'Marca B']);
        $produtoA = Produto::factory()->create(['marca_id' => $marcaA->id]);
        $produtoB = Produto::factory()->create(['marca_id' => $marcaB->id]);

        Livewire::test('filtro-produto')
            ->set('selectedMarcas', [$marcaA->id])
            ->call('applyFilters')
            ->assertSee($produtoA->nome)
            ->assertDontSee($produtoB->nome);
    }

    /** @test */
    public function pode_filtrar_por_categorias()
    {
        $categoriaA = Categoria::factory()->create(['nome' => 'Categoria A']);
        $categoriaB = Categoria::factory()->create(['nome' => 'Categoria B']);
        $produtoA = Produto::factory()->create(['categoria_id' => $categoriaA->id]);
        $produtoB = Produto::factory()->create(['categoria_id' => $categoriaB->id]);

        Livewire::test('filtro-produto')
            ->set('selectedCategorias', [$categoriaA->id])
            ->call('applyFilters')
            ->assertSee($produtoA->nome)
            ->assertDontSee($produtoB->nome);
    }

    /** @test */
    public function pode_limpar_os_filtros()
    {
        $produtoEspecial = Produto::factory()->create(['nome' => 'Produto Especial']);
        $outroProduto = Produto::factory()->create(['nome' => 'Outro Produto']);

        Livewire::test('filtro-produto')
            ->set('search', 'Produto Especial')
            ->call('clearFilters')
            ->assertSee($produtoEspecial->nome)
            ->assertSee($outroProduto->nome);
    }
}
