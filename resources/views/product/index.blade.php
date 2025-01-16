@extends('components.layout')

@section('title', 'Product')

@section('content')
    <div class="heading">    
        <h2>Manage Product</h2>
        <button class="btn btn-primary" data-link="{{ route('product.create') }}" data-ajax-popup="true" data-modal-size="modal-lg">New Product</button>
    </div>

    <div class="main-container">
        <div class="table-responsive border shadow-sm rounded">
            <table class="table table-hover dataTable" id="tableTemplate">
                <thead>
                    <tr>
                        <th width="3%" class="no-sort">#</th>
                        <th width="30%">Product</th>
                        <th>Category</th>
                        <th>Stocks</th>
                        <th>SKU</th>
                        <th width="3%" class="no-sort"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="text-center"></td>
                            <td>
                                <a class="link-underline link-offset-2-hover link-underline-opacity-0 link-underline-opacity-75-hover fw-semibold" href="" data-link="{{ route('product.show', $product->id) }}" data-ajax-popup="true" data-modal-size="modal-lg">{{ $product->name }}</a>
                            </td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->quantity }} {{ $product->unit }}</td>
                            <td>{{ $product->sku }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <a class="btn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </a>
                                
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" data-link="{{ route('product.edit', $product->id) }}" data-ajax-popup="true" data-modal-size="modal-lg">Edit</a></li>
                                        <li>
                                            <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item" type="submit">Delete</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection