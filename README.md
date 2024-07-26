## Requisitos

- Minimo PHP 8.2
- Laravel
- LiveWire
- Composer
- XAMPP/Docker
- Laravel Sail (para uso com Docker)
- Node.js e npm

## Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/deividscortegagna/filtro-produto-com-laravel.git
   cd filtro-produto-com-laravel

2. Instale as dependências do PHP:
terminal
composer install

3. Instale as dependências do Node.js:
npm install
npm run dev

4. Configurar .env:
cp .env.example .env
php artisan key:generate
ajuste os dados da base de dados do seu local

5. Execute as migrations e seeders:
php artisan migrate --seed

6. Inicie o servidor de desenvolvimento:
php artisan serve

8. Para iniciar o projeto acesse:
http://localhost:8000/produtos

7. Para executar os testes automatizados:
php artisan test

## Funcionalidades
Filtragem por Nome do Produto
Filtragem por Categoria(s)
Filtragem por Marca(s)
Limpeza de Filtros
Persistência dos Parâmetros de Pesquisa

## Estrutura do Projeto
1. App\Models
Marca
Categoria
Produto
2. App\Livewire
FiltroProduto
3. resources/views/livewire
filtro-produto.blade.php
4. tests/Feature
FiltroProdutoTest.php
