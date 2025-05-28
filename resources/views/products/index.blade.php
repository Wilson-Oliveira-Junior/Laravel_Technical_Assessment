@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="mb-0"><i class="bi bi-box"></i> Produtos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i> Novo Produto</a>
</div>
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Estoque</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                        <td>
                            @if(isset($product->inventory))
                                <span class="fw-bold {{ $product->inventory->stock <= 3 ? 'text-danger' : ($product->inventory->stock <= 10 ? 'text-warning' : 'text-success') }}">
                                    {{ $product->inventory->stock }}
                                </span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td class="d-flex gap-1">
                            <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm" title="Ver"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm" title="Editar"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')" title="Excluir"><i class="bi bi-trash"></i></button>
                            </form>
                            <form action="{{ route('cart.add', $product) }}" method="POST" style="display:inline;">
                                @csrf
                                <button class="btn btn-success btn-sm" title="Comprar"><i class="bi bi-cart-plus"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
