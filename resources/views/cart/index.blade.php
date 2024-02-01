@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['title'])
@section('content')
<div class="card">
    <div class="card-header">
        Products in Cart
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">
                        ID
                    </th>
                    <th scope="col">
                        Name
                    </th>
                    <th scope="col">
                        Price
                    </th>
                    <th scope="col">
                        Quantity
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($viewData['products'] as $product)
                <tr>
                    <td>{{$product->getId()}}</td>
                    <td>{{$product->getName()}}</td>
                    <td>{{$product->getPrice()}}</td>
                    <td>{{session('products')[$product->getId()]}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="text-end">
                @if(count($viewData['products']) > 0)
                <a class="btn bg-primary text-white mb-2" href="{{route('cart.purchase')}}">Purchase</a>
                <a class="btn btn-danger mb-2" href="{{route('cart.delete')}}">
                    Remove all products form Cart
                </a>
                @endif
                <button class="btn btn-outline-secondary disabled mb-2">
                    Total to pay:
                    </b>${{$viewData['total']}}
                </button>
            </div>
        </div>
    </div>
</div>
@endsection