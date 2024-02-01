@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
@forelse ($viewData['orders'] as $order)
<div class="card mb-4">
    <div class="card-header">
        Order #{{$order->getId()}}

    </div>

    <div class="card-body">
        <b>Date:</b>{{$order->getCreatedAt()}}
        <table class="table table-bordered table-striped text-center text-center mt-3">
            <thead>
                <tr>
                    <th scope="col">
                        Item ID
                    </th>
                    <th scope="col">
                        Product Name
                    </th>
                    <th scope="col">
                        Price
                    </th>
                    <th scope="col">
                        Quantity
                    </th>
                </tr>
            </thead>
            @foreach($order->getItems() as $item)
            <tr>
                <td>{{$item->getId()}}</td>
                <td>
                    <a href="{{route('products.show', ['id' => $item->getProduct()->getId()])}}" class="link-success">
                        {{$item->getProduct()->getName()}}
                    </a>
                </td>
                <td>
                    ${{$item->getPrice()}}
                </td>
                <td>
                    {{$item->getQuantity()}}
                </td>
            </tr>
            @endforeach
        </table>
        <div class="card-footer">
            <div class="text-end">
                <b>
                    Total:
                </b>
                ${{$order->getTotal()}}
            </div>
        </div>
    </div>
</div>
@empty
<div class="alert alert-danger" role="alert">
    Seems to be that you have not purchased anything in our store =(.
</div>
@endforelse
@endsection