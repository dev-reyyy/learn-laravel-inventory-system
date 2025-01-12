@extends('components.layout')

@section('title', 'Warehouse')

@section('content')
    <div class="heading">    
        <h2>Manage Warehouses</h2>
        <button class="btn btn-primary" data-link="{{ route('warehouse.create') }}" data-ajax-popup="true">Create</button>
    </div>

    <div class="main-container">
        <div class="table-responsive border shadow-sm rounded">
            <table class="table table-hover dataTable" id="tableTemplate">
                <thead>
                    <tr>
                        <th width="3%" class="no-sort">#</th>
                        <th width="15%">Code Ref.</th>
                        <th>Name</th>
                        <th class="render-ll">Address</th>
                        <th width="3%" class="no-sort"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($warehouses as $warehouse)
                        <tr>
                            <td class="text-center"></td>
                            <td>{{ $warehouse->reference_code }}</td>
                            <td><a class="link-underline link-offset-2-hover link-underline-opacity-0 link-underline-opacity-75-hover fw-semibold" href="" data-link="{{ route('warehouse.show', $warehouse->id) }}" data-ajax-popup="true">{{ $warehouse->name }}</a></td>
                            <td>{{ $warehouse->address }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <a class="btn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </a>
                                
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" data-link="{{ route('warehouse.edit', $warehouse->id) }}" data-ajax-popup="true">Edit</a></li>
                                        <li>
                                            <form action="{{ route('warehouse.destroy', $warehouse->id) }}" method="POST">
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