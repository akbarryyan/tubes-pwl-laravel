@extends('layout.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="mb-0">Dashboard</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tugas Besar PWL AKBAR RAYYAN 2303085</a></li>
                        <li class="breadcrumb-item active">Manage Product</li>
                    </ol>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Data Product</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                    Add Product
                </button>

                <!-- Modal Add Product -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">Add Produk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('products.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Produk</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Harga</label>
                                        <input type="number" class="form-control" id="price" name="price" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="stock" class="form-label">Stok</label>
                                        <input type="number" class="form-control" id="stock" name="stock" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add Product</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal konfirmasi hapus -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal-body">
                                <p>Are you sure you want to delete this produk?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div id="table-pagination" class="overflow-x-auto">
                    <div role="complementary" class="gridjd gridjs-container" style="width: 100%">
                        <div class="gridjs-wrapper" style="height: auto">
                            <table role="grid" class="gridjs-table" style="height: auto">
                                <thead class="gridjs-thead">
                                    <tr class="gridjs-tr">
                                        <th class="gridjs-th" style="width: 50px">No</th>
                                        <th class="gridjs-th">Name</th>
                                        <th class="gridjs-th">Description</th>
                                        <th class="gridjs-th">Price</th>
                                        <th class="gridjs-th">Stock</th>
                                        <th class="gridjs-th" width="280px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="gridjs-tbody">
                                    @foreach ($products as $product)
                                    <tr class="gridjs-tr">
                                        <td class="gridjs-td">{{ $loop->iteration }}</td>
                                        <td class="gridjs-td">{{ $product->name }}</td>
                                        <td class="gridjs-td">{{ $product->description }}</td>
                                        <td class="gridjs-td">Rp. {{ number_format($product->price, 0) }}</td>
                                        <td class="gridjs-td">{{ $product->stock }}</td>
                                        <td class="gridjs-td">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $product->id }}">
                                                Edit
                                            </button>

                                            <!-- Modal Edit Produk -->
                                            <div class="modal fade" id="editModal{{ $product->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $product->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel{{ $product->id }}">Edit Product</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('products.update', $product->id) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="mb-3">
                                                                    <label for="name" class="form-label">Nama Produk</label>
                                                                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                                                    <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="price" class="form-label">Harga</label>
                                                                    <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="stock" class="form-label">Stok</label>
                                                                    <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}" required>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="confirmDelete('{{ route('products.destroy', $product->id) }}')">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
<script>
    function confirmDelete(action) {
        document.getElementById('deleteForm').action = action;
    }
</script>