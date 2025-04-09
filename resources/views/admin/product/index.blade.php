@extends('layouts.admin')

@section('content')
<div class="p-6" x-data="productModal()">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Product List</h1>
        <button @click="openAddModal"
            class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2 rounded-xl shadow transition">
            <i class="fas fa-plus"></i> Add Product
        </button>
    </div>

        <!-- Modal -->
        <div id="productModal" x-show="modalOpen" x-cloak
    class="fixed inset-0 z-50 bg-black/50 flex items-center justify-center">
    <div @click.outside="closeModal"
        class="bg-white w-full max-w-xl rounded-xl shadow-lg p-6 relative animate-fadeIn overflow-y-auto max-h-[90vh]">
        
        <!-- Tombol Close (pojok kanan atas) -->
        <button @click="closeModal"
            class="absolute top-3 right-4 text-gray-500 hover:text-red-500 text-xl font-bold">&times;</button>

        <!-- Modal Header -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-800" x-text="editMode ? 'Edit Product' : 'Add Product'"></h2>
        </div>

        <!-- Modal Form -->
        <form :action="formAction" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            <template x-if="editMode">
                <input type="hidden" name="_method" value="PUT">
            </template>

            <!-- Group: Basic Info -->
            <div class="grid gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
                    <input type="text" name="nameProduct" x-model="form.nameProduct"
                        class="w-full border px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" x-model="form.description"
                        class="w-full border px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        rows="3"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                    <input type="number" name="price" x-model="form.price"
                        class="w-full border px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
            </div>

            <!-- Group: Media -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Product Image</label>
                <input type="file" name="path" @change="previewImage($event)"
                    class="w-full border px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <template x-if="preview">
                    <img :src="preview" alt="Preview" class="mt-2 w-32 h-32 object-cover rounded-lg border">
                </template>
            </div>

            <!-- Group: Selects -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Subcategory</label>
                    <select name="sub_category_id" x-model="form.sub_category_id"
                        class="w-full border px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                        <option value="">Select Subcategory</option>
                        @foreach ($subcategories as $sub)
                            <option value="{{ $sub->idSubCategory }}">
                                {{ $sub->category->nameCategory }} - {{ $sub->nameSubCategory }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select name="status" x-model="form.status"
                        class="w-full border px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                        <option value="Available">Available</option>
                        <option value="Sold">Sold</option>
                    </select>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="flex justify-end gap-3 pt-4">
                <button type="button" @click="closeModal"
                    class="px-4 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 transition">
                    Cancel
                </button>
                <button type="submit"
                    class="px-5 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white shadow transition">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Fade In Animation -->
<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
    .animate-fadeIn {
        animation: fadeIn 0.2s ease-out;
    }
</style>

    <!-- Table -->
    <div class="bg-white shadow-md rounded-xl overflow-x-auto">
        <table class="min-w-full text-sm text-gray-700 table-auto border border-gray-200">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="px-4 py-3 border">Name</th>
                    <th class="px-4 py-3 border">Category</th>
                    <th class="px-4 py-3 border">Subcategory</th>
                    <th class="px-4 py-3 border">Price</th>
                    <th class="px-4 py-3 border">Status</th>
                    <th class="px-4 py-3 border">Image</th>
                    <th class="px-4 py-3 border">Created At</th>
                    <th class="px-4 py-3 border text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="border-t hover:bg-gray-50 transition">
                        <td class="px-4 py-3">{{ $product->nameProduct }}</td>
                        <td class="px-4 py-3">{{ $product->subCategory->category->nameCategory ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $product->subCategory->nameSubCategory ?? '-' }}</td>
                        <td class="px-4 py-3">Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="px-4 py-3">
                            <span
                                class="px-3 py-1 rounded-full text-xs font-medium {{ $product->status == 'Available' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ ucfirst($product->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            @if ($product->path)
                                <img src="{{ asset('storage/' . $product->path) }}" class="w-16 h-16 object-cover rounded" alt="Product Image">
                            @else
                                <span class="text-gray-400 italic">No image</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            {{ $product->created_at->format('d M Y') }}<br>
                            <span class="text-xs text-gray-500">by {{ $product->user->name ?? '-' }}</span>
                        </td>
                        <td class="px-4 py-3 text-center space-x-2">
                            <button @click="openEditModal({{ $product->idProduct }}, '{{ $product->nameProduct }}', '{{ $product->description }}', {{ $product->price }}, {{ $product->sub_category_id }}, '{{ $product->status }}')"
                                class="text-blue-600 hover:text-blue-800 font-medium transition">Edit</button>
                            <form action="{{ route('product.destroy', $product->idProduct) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-600 hover:text-red-800 font-medium transition">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-6 text-gray-500">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Alpine Script -->
<script>
    function productModal() {
        return {
            modalOpen: false,
            editMode: false,
            form: {
                nameProduct: '',
                description: '',
                price: '',
                sub_category_id: '',
                status: 'Available',
            },
            preview: '',
            formAction: '',
            openAddModal() {
                this.editMode = false;
                this.formAction = '{{ route("product.store") }}';
                this.form = {
                    nameProduct: '',
                    description: '',
                    price: '',
                    sub_category_id: '',
                    status: 'Available',
                };
                this.preview = '';
                this.modalOpen = true;
            },
            openEditModal(id, name, desc, price, subcategory_id, status) {
                this.editMode = true;
                this.formAction = `/admin/product/${id}`;
                this.form = {
                    nameProduct: name,
                    description: desc,
                    price: price,
                    sub_category_id: subcategory_id,
                    status: status,
                };
                this.preview = '';
                this.modalOpen = true;
            },
            closeModal() {
                this.modalOpen = false;
                this.preview = '';
            },
            previewImage(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.preview = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            }
        };
    }
</script>
@endsection
