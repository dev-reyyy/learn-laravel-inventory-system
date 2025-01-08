@extends('components.layout')

@section('title', 'Categories')

@section('content')
    <div class="heading">    
        <h2>Manage Categories</h2>
        <button class="btn btn-primary" data-link="{{ route('product-category.create') }}" data-ajax-popup="true">Create</button>
    </div>

    <div class="main-container">
        <div class="table-responsive border shadow-sm rounded">
            <table class="table table-hover dataTable" id="tableTemplate">
                <thead>
                    <tr>
                        <th width="3%" class="no-sort">#</th>
                        <th>Name</th>
                        <th class="render-ll">Description</th>
                        <th width="3%" class="no-sort"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="text-center"></td>
                            <td><a class="link-underline link-offset-2-hover link-underline-opacity-0 link-underline-opacity-75-hover fw-semibold" href="" data-link="{{ route('product-category.show', $category->id) }}" data-ajax-popup="true">{{ $category->name }}</a></td>
                            <td>{{ $category->description }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <a class="btn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fi fi-rr-menu-dots-vertical"></i>
                                    </a>
                                
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" data-link="{{ route('product-category.edit', $category->id) }}" data-ajax-popup="true">Edit</a></li>
                                        <li>
                                            <form action="{{ route('product-category.destroy', $category->id) }}" method="POST">
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