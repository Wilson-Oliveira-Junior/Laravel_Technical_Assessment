@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white d-flex align-items-center justify-content-between">
                    <span><i class="bi bi-cart4 me-2"></i>Carrinho de Compras</span>
                    <a href="{{ route('products.index') }}" class="btn btn-sm btn-light"><i class="bi bi-arrow-left"></i> Continuar comprando</a>
                </div>
                <div class="card-body p-0">
                    @if(session('cart') && count(session('cart')) > 0)
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Produto</th>
                                        <th>Variação</th>
                                        <th>Qtd</th>
                                        <th>Preço</th>
                                        <th>Subtotal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $subtotal = 0; @endphp
                                    @foreach(session('cart') as $item)
                                        @php $itemSubtotal = $item['price'] * $item['quantity']; $subtotal += $itemSubtotal; @endphp
                                        <tr>
                                            <td>{{ $item['name'] }}</td>
                                            <td>{{ $item['variation'] ?? '-' }}</td>
                                            <td>{{ $item['quantity'] }}</td>
                                            <td>R$ {{ number_format($item['price'], 2, ',', '.') }}</td>
                                            <td>R$ {{ number_format($itemSubtotal, 2, ',', '.') }}</td>
                                            <td>
                                                <form action="{{ route('cart.remove', $item['id']) }}" method="POST" style="display:inline;">
                                                    @csrf @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" title="Remover"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="p-3 border-top bg-light">
                            <form action="{{ route('cart.applyCoupon') }}" method="POST" class="row g-2 align-items-center mb-2">
                                @csrf
                                <div class="col-auto">
                                    <input type="text" name="coupon" class="form-control form-control-sm" placeholder="Cupom de desconto">
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-outline-primary btn-sm">Aplicar</button>
                                </div>
                                @if(session('coupon_error'))
                                    <div class="col-12">
                                        <span class="text-danger small">{{ session('coupon_error') }}</span>
                                    </div>
                                @endif
                            </form>
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                                <div>
                                    <div>Subtotal: <span class="fw-bold">R$ {{ number_format($subtotal, 2, ',', '.') }}</span></div>
                                    @php
                                        $frete = 20;
                                        if($subtotal >= 52 && $subtotal <= 166.59) $frete = 15;
                                        if($subtotal > 200) $frete = 0;
                                    @endphp
                                    <div>Frete: <span class="fw-bold">{{ $frete == 0 ? 'Grátis' : 'R$ '.number_format($frete, 2, ',', '.') }}</span></div>
                                    @if(session('coupon'))
                                        <div>Cupom: <span class="fw-bold text-success">-R$ {{ number_format(session('coupon')['value'], 2, ',', '.') }}</span></div>
                                    @endif
                                    <div class="fs-5 mt-2">Total: <span class="fw-bold text-primary">R$ {{ number_format($subtotal + $frete - (session('coupon')['value'] ?? 0), 2, ',', '.') }}</span></div>
                                </div>
                                <form action="{{ route('cart.checkout') }}" method="POST" class="mt-3 mt-md-0">
                                    @csrf
                                    <button class="btn btn-success btn-lg"><i class="bi bi-bag-check"></i> Finalizar Pedido</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="p-4 text-center text-muted">
                            <i class="bi bi-cart-x display-4"></i>
                            <p class="mt-3">Seu carrinho está vazio.</p>
                            <a href="{{ route('products.index') }}" class="btn btn-primary">Ver produtos</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
