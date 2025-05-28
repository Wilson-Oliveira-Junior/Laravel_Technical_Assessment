@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-info text-white d-flex align-items-center justify-content-between">
                    <span><i class="bi bi-box-seam me-2"></i>Controle de Estoque</span>
                    <a href="{{ route('products.index') }}" class="btn btn-sm btn-light"><i class="bi bi-arrow-left"></i> Voltar</a>
                </div>
                <div class="card-body p-0">
                    @if(isset($inventories) && count($inventories) > 0)
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Produto</th>
                                        <th>Variação</th>
                                        <th>Estoque Atual</th>
                                        <th>Atualizar Estoque</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($inventories as $inventory)
                                        <tr>
                                            <td>{{ $inventory->product->name }}</td>
                                            <td>{{ $inventory->variation ?? '-' }}</td>
                                            <td>
                                                <span class="fw-bold {{ $inventory->stock <= 3 ? 'text-danger' : ($inventory->stock <= 10 ? 'text-warning' : 'text-success') }}">
                                                    {{ $inventory->stock }}
                                                </span>
                                            </td>
                                            <td>
                                                <form action="{{ route('inventory.update', $inventory->id) }}" method="POST" class="d-flex gap-2 align-items-center">
                                                    @csrf @method('PUT')
                                                    <input type="number" name="stock" value="{{ $inventory->stock }}" min="0" class="form-control form-control-sm" style="width:90px;">
                                                    <button class="btn btn-primary btn-sm"><i class="bi bi-save"></i> Salvar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="p-4 text-center text-muted">
                            <i class="bi bi-box-seam display-4"></i>
                            <p class="mt-3">Nenhum estoque cadastrado.</p>
                            <a href="{{ route('products.create') }}" class="btn btn-primary">Cadastrar Produto</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
