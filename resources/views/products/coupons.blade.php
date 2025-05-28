@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-warning text-dark d-flex align-items-center justify-content-between">
                    <span><i class="bi bi-ticket-detailed me-2"></i>Cupons de Desconto</span>
                    <a href="{{ route('coupons.create') }}" class="btn btn-sm btn-primary"><i class="bi bi-plus"></i> Novo Cupom</a>
                </div>
                <div class="card-body p-0">
                    @if(isset($coupons) && count($coupons) > 0)
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Código</th>
                                        <th>Valor</th>
                                        <th>Validade</th>
                                        <th>Mínimo</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($coupons as $coupon)
                                        <tr>
                                            <td>{{ $coupon->code }}</td>
                                            <td>R$ {{ number_format($coupon->value, 2, ',', '.') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($coupon->valid_until)->format('d/m/Y') }}</td>
                                            <td>R$ {{ number_format($coupon->min_value, 2, ',', '.') }}</td>
                                            <td>
                                                @if($coupon->valid_until && \Carbon\Carbon::now()->gt($coupon->valid_until))
                                                    <span class="badge bg-danger">Expirado</span>
                                                @elseif($coupon->valid_until)
                                                    <span class="badge bg-success">Válido</span>
                                                @else
                                                    <span class="badge bg-secondary">Sem validade</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('coupons.edit', $coupon) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                                                <form action="{{ route('coupons.destroy', $coupon) }}" method="POST" style="display:inline;">
                                                    @csrf @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="p-4 text-center text-muted">
                            <i class="bi bi-ticket-detailed display-4"></i>
                            <p class="mt-3">Nenhum cupom cadastrado.</p>
                            <a href="{{ route('coupons.create') }}" class="btn btn-primary">Cadastrar Cupom</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
