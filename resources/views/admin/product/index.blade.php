@extends('layouts.admin')

@section('content')
@include('admin.components.confirm-delete-modal')

{{-- Flash Messages --}}
@if (session('success'))
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
    class="mt-4 mx-4 flex items-center gap-2 p-3 rounded-lg bg-gradient-to-r from-green-400 to-emerald-500 text-white shadow-lg">
    <div class="w-6 h-6 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
    </div>
    <span class="font-medium">{{ session('success') }}</span>
</div>
@endif

@if (session('error'))
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
    class="mt-4 mx-4 flex items-center gap-2 p-3 rounded-lg bg-gradient-to-r from-red-400 to-rose-500 text-white shadow-lg">
    <div class="w-6 h-6 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </div>
    <span class="font-medium">{{ session('error') }}</span>
</div>
@endif

{{-- Background --}}
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 relative">
    <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-blue-200 to-cyan-200 opacity-10 rounded-full -translate-y-32 translate-x-32 blur-2xl"></div>
    
    <div class="relative p-4" x-data="productModal()">
        {{-- Header Section --}}
        <div class="bg-white rounded-xl shadow-lg mb-4">
            <div class="bg-gradient-to-r from-slate-600 to-cyan-700 p-4 rounded-t-xl">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-tshirt text-lg text-white"></i>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white">Product Management</h1>
                            <p class="text-cyan-200 text-sm">Kelola produk batik madura</p>
                        </div>
                    </div>
                    <button @click="openAddModal"
                        class="inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white font-medium px-4 py-2 rounded-lg shadow-md transition-colors">
                        <i class="fas fa-plus"></i> 
                        <span>Add Product</span>
                    </button>
                </div>
            </div>
        </div>

        {{-- Search Section --}}
        <div class="bg-white rounded-lg shadow-md p-4 mb-4">
            <form action="{{ route('product.index') }}" method="GET" class="flex flex-col sm:flex-row items-center gap-3">
                <div class="relative flex-1">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                        <i class="fas fa-search text-gray-400 text-sm"></i>
                    </div>
                    <input type="text" name="search" placeholder="Cari produk batik..."
                        class="w-full pl-9 pr-3 py-2 rounded-lg border border-gray-300 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200 transition-all"
                        value="{{ request('search') }}">
                </div>
                <div class="flex gap-2">
                    <button type="submit"
                        class="inline-flex items-center gap-1 bg-cyan-500 hover:bg-cyan-600 text-white font-medium px-4 py-2 rounded-lg shadow-sm transition-colors">
                        <i class="fas fa-search text-sm"></i> 
                        <span>Search</span>
                    </button>
                    <a href="{{ route('product.index') }}"
                        class="inline-flex items-center gap-1 bg-gray-400 hover:bg-gray-500 text-white font-medium px-4 py-2 rounded-lg shadow-sm transition-colors">
                        <i class="fas fa-times text-sm"></i> 
                        <span>Clear</span>
                    </a>
                </div>
            </form>
        </div>

        {{-- Modal --}}
        <div id="productModal" x-show="modalOpen" x-cloak
            class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center p-4">
            <div @click.outside="closeModal"
                class="bg-white w-full max-w-lg rounded-xl shadow-xl p-6 max-h-[90vh] overflow-y-auto">

                <!-- Modal Header -->
                <div class="flex items-center justify-between mb-4 pb-3 border-b">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-cyan-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-tshirt text-white text-sm"></i>
                        </div>
                        <h2 class="text-xl font-bold text-gray-800" x-text="editMode ? 'Edit Product' : 'Add Product'"></h2>
                    </div>
                    <button @click="closeModal"
                        class="w-8 h-8 bg-gray-100 hover:bg-red-100 rounded-lg flex items-center justify-center text-gray-500 hover:text-red-500">
                        <i class="fas fa-times text-sm"></i>
                    </button>
                </div>

                <!-- Modal Form -->
                <form :action="formAction" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <template x-if="editMode">
                        <input type="hidden" name="_method" value="PUT">
                    </template>

                    <div>
                        <label class="block font-medium text-gray-700 text-sm mb-1">
                            <i class="fas fa-tag text-cyan-600 mr-1"></i>Product Name
                        </label>
                        <input type="text" name="nameProduct" x-model="form.nameProduct"
                            class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200"
                            placeholder="Masukkan nama produk" required>
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 text-sm mb-1">
                            <i class="fas fa-align-left text-cyan-600 mr-1"></i>Description
                        </label>
                        <textarea name="description" x-model="form.description"
                            class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200"
                            rows="3" placeholder="Deskripsi produk batik"></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block font-medium text-gray-700 text-sm mb-1">
                                <i class="fas fa-money-bill text-cyan-600 mr-1"></i>Price
                            </label>
                            <input type="number" name="price" x-model="form.price"
                                class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200"
                                placeholder="Harga" required>
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700 text-sm mb-1">
                                <i class="fas fa-check-circle text-cyan-600 mr-1"></i>Status
                            </label>
                            <select name="status" x-model="form.status"
                                class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200"
                                required>
                                <option value="Available">Available</option>
                                <option value="Sold">Sold</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 text-sm mb-1">
                            <i class="fas fa-list text-cyan-600 mr-1"></i>Subcategory
                        </label>
                        <select name="sub_category_id" x-model="form.sub_category_id"
                            class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200"
                            required>
                            <option value="">Pilih Subcategory</option>
                            @foreach ($subcategories as $sub)
                            <option value="{{ $sub->idSubCategory }}">
                                {{ $sub->category->nameCategory }} - {{ $sub->nameSubCategory }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 text-sm mb-1">
                            <i class="fas fa-image text-cyan-600 mr-1"></i>Product Image
                        </label>
                        <input type="file" name="path" @change="previewImage($event)"
                            class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200">
                        <template x-if="preview">
                            <div class="mt-2 flex justify-center">
                                <img :src="preview" alt="Preview" class="w-20 h-20 object-cover rounded-lg border shadow-sm">
                            </div>
                        </template>
                        <template x-if="!preview && currentImage && editMode">
                            <div class="mt-2 flex justify-center">
                                <div class="relative">
                                    <img :src="currentImage" alt="Current Image" class="w-20 h-20 object-cover rounded-lg border shadow-sm">
                                    <div class="absolute -top-1 -right-1 bg-blue-500 text-white text-xs px-1 rounded-full">
                                        Current
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Modal Footer -->
                    <div class="flex justify-end gap-2 pt-4 border-t">
                        <button type="button" @click="closeModal"
                            class="px-4 py-2 rounded-lg bg-gray-400 hover:bg-gray-500 text-white font-medium transition-colors">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 rounded-lg bg-emerald-500 hover:bg-emerald-600 text-white font-medium transition-colors">
                            <i class="fas fa-save mr-1"></i>
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Products Table --}}
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gradient-to-r from-slate-600 to-cyan-700">
                        <tr>
                            <th class="px-4 py-3 text-left font-medium text-white text-sm">
                                <i class="fas fa-tag mr-1"></i>Name
                            </th>
                            <th class="px-4 py-3 text-left font-medium text-white text-sm">
                                <i class="fas fa-folder mr-1"></i>Category
                            </th>
                            <th class="px-4 py-3 text-left font-medium text-white text-sm">
                                <i class="fas fa-money-bill mr-1"></i>Price
                            </th>
                            <th class="px-4 py-3 text-left font-medium text-white text-sm">
                                <i class="fas fa-check-circle mr-1"></i>Status
                            </th>
                            <th class="px-4 py-3 text-left font-medium text-white text-sm">
                                <i class="fas fa-image mr-1"></i>Image
                            </th>
                            <th class="px-4 py-3 text-left font-medium text-white text-sm">
                                <i class="fas fa-calendar mr-1"></i>Created
                            </th>
                            <th class="px-4 py-3 text-center font-medium text-white text-sm">
                                <i class="fas fa-cogs mr-1"></i>Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($products as $product)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-3">
                                <div class="font-medium text-gray-900">{{ $product->nameProduct }}</div>
                                <div class="text-xs text-gray-500 mt-1">{{ Str::limit($product->description, 40) }}</div>
                            </td>
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center px-2 py-1 rounded-full bg-blue-100 text-blue-800 text-xs font-medium">
                                    {{ $product->subCategory->category->nameCategory ?? '-' }}
                                </span>
                                <div class="text-xs text-gray-500 mt-1">{{ $product->subCategory->nameSubCategory ?? '-' }}</div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="font-bold text-gray-900">Rp{{ number_format($product->price, 0, ',', '.') }}</div>
                            </td>
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $product->status == 'Available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    <i class="fas {{ $product->status == 'Available' ? 'fa-check-circle' : 'fa-times-circle' }} mr-1"></i>
                                    {{ ucfirst($product->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                @if ($product->path)
                                <img src="{{ asset('storage/' . $product->path) }}" 
                                    class="w-12 h-12 object-cover rounded-lg shadow-sm" 
                                    alt="Product">
                                @else
                                <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400"></i>
                                </div>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <div class="font-medium text-gray-900 text-sm">{{ $product->created_at->format('d M Y') }}</div>
                                <div class="text-xs text-gray-500 flex items-center mt-1">
                                    <i class="fas fa-user mr-1"></i>
                                    {{ $product->user->name ?? '-' }}
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-center space-x-2">
                                    <button
                                        @click="handleEditClick($event)"
                                        data-id="{{ $product->idProduct }}"
                                        data-name="{{ $product->nameProduct }}"
                                        data-description="{{ e($product->description) }}"
                                        data-price="{{ $product->price }}"
                                        data-subcategory="{{ $product->sub_category_id }}"
                                        data-status="{{ $product->status }}"
                                        data-image="{{ $product->path }}"
                                        class="w-8 h-8 bg-blue-500 hover:bg-blue-600 text-white rounded-lg flex items-center justify-center transition-colors">
                                        <i class="fas fa-edit text-sm"></i>
                                    </button>

                                    <form action="{{ route('product.destroy', $product->idProduct) }}" method="POST" class="inline-block" onsubmit="event.preventDefault(); openConfirmDelete(this, '{{ $product->nameProduct }}');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="w-8 h-8 bg-red-500 hover:bg-red-600 text-white rounded-lg flex items-center justify-center transition-colors">
                                            <i class="fas fa-trash text-sm"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-4 py-8 text-center">
                                <div class="flex flex-col items-center justify-center space-y-2">
                                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-tshirt text-gray-400 text-xl"></i>
                                    </div>
                                    <div class="font-medium text-gray-500">No products found</div>
                                    <div class="text-sm text-gray-400">Belum ada produk yang ditambahkan</div>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>

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
            currentImage: '',
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
                this.currentImage = '';
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
                this.currentImage = '';
                this.modalOpen = true;
            },
            handleEditClick(event) {
                const target = event.currentTarget;

                this.editMode = true;
                this.formAction = `/admin/product/${target.dataset.id}`;
                this.form = {
                    nameProduct: target.dataset.name,
                    description: target.dataset.description,
                    price: target.dataset.price,
                    sub_category_id: target.dataset.subcategory,
                    status: target.dataset.status,
                };
                this.preview = '';
                this.currentImage = target.dataset.image ? `/storage/${target.dataset.image}` : '';
                this.modalOpen = true;
            },
            closeModal() {
                this.modalOpen = false;
                this.preview = '';
                this.currentImage = '';
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