@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sale Result</h1>
        <p>Product: {{ $product->name }}</p>
        <p>Total: ${{ number_format($total, 2) }}</p>
        <p>Change: ${{ number_format($change, 2) }}</p>
        <a href="{{ route('sales.create') }}" class="btn btn-primary">Make Another Sale</a>
    </div>
@endsection
