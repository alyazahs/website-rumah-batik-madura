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
    
    <div class="relative p-4" x-data="categoryModal()">
        {{-- Header Section --}}
        <div class="bg-white rounded-xl shadow-lg mb-4">
            <div class="bg-gradient-to-r from-slate-600 to-cyan-700 p-4 rounded-t-xl">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-tags text-lg text-white"></i>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white">Category Management</h1>
                            <p class="text-cyan-200 text-sm">Kelola kategori produk batik madura</p>
                        </div>
                    </div>
                    <button @click="openAddCategoryModal"
                        class="inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white font-medium px-4 py-2 rounded-lg shadow-md transition-colors">
                        <i class="fas fa-plus"></i> 
                        <span>Add Category</span>
                    </button>
                </div>
            </div>
        </div>

        {{-- Category Cards Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
            @foreach ($categories as $category)
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                {{-- Category Header --}}
                <div class="bg-gradient-to-r from-gray-600 to-slate-700 p-4">
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <h2 class="text-xl font-bold text-white mb-1">{{ $category->nameCategory }}</h2>
                            <div class="flex items-center text-gray-200 text-sm">
                                <i class="fas fa-calendar-alt mr-1"></i>
                                <span>{{ $category->created_at->format('M d, Y') }}</span>
                            </div>
                            <div class="flex items-center text-gray-200 text-xs mt-1">
                                <i class="fas fa-user mr-1"></i>
                                <span>{{ $category->user->name ?? '-' }}</span>
                            </div>
                        </div>
                        <div class="flex items-center space-x-1">
                            <button @click="openEditCategoryModal('{{ $category->idCategory }}', '{{ $category->nameCategory }}')"
                                class="w-8 h-8 bg-white bg-opacity-20 hover:bg-opacity-30 text-white rounded-lg flex items-center justify-center transition-all"
                                title="Edit Category">
                                <i class="fas fa-edit text-sm"></i>
                            </button>
                            <button @click="openAddSubcategoryModal('{{ $category->idCategory }}')"
                                class="w-8 h-8 bg-white bg-opacity-20 hover:bg-opacity-30 text-white rounded-lg flex items-center justify-center transition-all"
                                title="Add Subcategory">
                                <i class="fas fa-plus text-sm"></i>
                            </button>
                            <form action="{{ route('category.destroy', $category->idCategory) }}" method="POST"
                                class="inline-block"
                                onsubmit="event.preventDefault(); openConfirmDelete(this, '{{ $category->nameCategory }}');">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="w-8 h-8 bg-white bg-opacity-20 hover:bg-red-500 text-white rounded-lg flex items-center justify-center transition-all"
                                    title="Delete Category">
                                    <i class="fas fa-trash text-sm"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Subcategories Section --}}
                <div class="p-4">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="font-semibold text-gray-700 flex items-center">
                            <i class="fas fa-list-ul mr-2 text-cyan-600"></i>
                            Subcategories
                        </h3>
                        <span class="inline-flex items-center px-2 py-1 rounded-full bg-cyan-100 text-cyan-800 text-xs font-medium">
                            {{ $category->subCategories->count() }} items
                        </span>
                    </div>

                    @if ($category->subCategories->count())
                    <div class="space-y-2 max-h-64 overflow-y-auto">
                        @foreach ($category->subCategories as $sub)
                        <div class="flex justify-between items-center bg-gradient-to-r from-gray-50 to-slate-50 p-3 rounded-lg border border-gray-200 hover:shadow-sm transition-all"
                            x-data="{ deleted: false }" x-show="!deleted">
                            <div class="flex-1">
                                <p class="font-medium text-gray-800">{{ $sub->nameSubCategory }}</p>
                                <div class="flex items-center text-xs text-gray-500 mt-1">
                                    <i class="fas fa-calendar mr-1"></i>
                                    <span>{{ $sub->created_at->format('M d, Y') }}</span>
                                    <span class="mx-2">•</span>
                                    <i class="fas fa-user mr-1"></i>
                                    <span>{{ $sub->user->name ?? '-' }}</span>
                                </div>
                            </div>
                            <div class="flex items-center space-x-1 ml-3">
                                <button @click="openEditSubcategoryModal('{{ $sub->idSubCategory }}', '{{ $sub->nameSubCategory }}')"
                                    class="w-7 h-7 bg-blue-500 hover:bg-blue-600 text-white rounded-lg flex items-center justify-center transition-colors"
                                    title="Edit Subcategory">
                                    <i class="fas fa-edit text-xs"></i>
                                </button>
                                <form action="{{ route('subcategory.destroy', $sub->idSubCategory) }}" method="POST"
                                    onsubmit="event.preventDefault(); openConfirmDelete(this, '{{ $sub->nameSubCategory }}');"
                                    class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        class="w-7 h-7 bg-red-500 hover:bg-red-600 text-white rounded-lg flex items-center justify-center transition-colors"
                                        title="Delete Subcategory">
                                        <i class="fas fa-trash text-xs"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-8">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-list text-gray-400 text-xl"></i>
                        </div>
                        <p class="text-gray-500 font-medium">No subcategories</p>
                        <p class="text-gray-400 text-sm">Belum ada subkategori</p>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        {{-- Empty State --}}
        @if($categories->isEmpty())
        <div class="bg-white rounded-xl shadow-lg p-12 text-center">
            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-tags text-gray-400 text-3xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-700 mb-2">No Categories Found</h3>
            <p class="text-gray-500 mb-6">Belum ada kategori yang ditambahkan</p>
            <button @click="openAddCategoryModal"
                class="inline-flex items-center gap-2 bg-cyan-500 hover:bg-cyan-600 text-white font-medium px-6 py-3 rounded-lg shadow-md transition-colors">
                <i class="fas fa-plus"></i>
                <span>Add First Category</span>
            </button>
        </div>
        @endif

        {{-- Modals --}}
        <div x-show="modalOpen" x-cloak
            class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center p-4">
            
            {{-- Category Modal --}}
            <div x-show="modalType === 'category'" @click.outside="closeModal"
                class="bg-white w-full max-w-md rounded-xl shadow-xl p-6">
                
                <!-- Modal Header -->
                <div class="flex items-center justify-between mb-4 pb-3 border-b">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-cyan-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-tags text-white text-sm"></i>
                        </div>
                        <h2 class="text-xl font-bold text-gray-800" x-text="editMode ? 'Edit Category' : 'Add Category'"></h2>
                    </div>
                    <button @click="closeModal"
                        class="w-8 h-8 bg-gray-100 hover:bg-red-100 rounded-lg flex items-center justify-center text-gray-500 hover:text-red-500">
                        <i class="fas fa-times text-sm"></i>
                    </button>
                </div>

                <!-- Category Form -->
                <form :action="formAction" method="POST" class="space-y-4">
                    @csrf
                    <template x-if="editMode">
                        <input type="hidden" name="_method" value="PUT">
                    </template>

                    <div>
                        <label class="block font-medium text-gray-700 text-sm mb-1">
                            <i class="fas fa-tag text-cyan-600 mr-1"></i>Category Name
                        </label>
                        <input type="text" name="nameCategory" x-model="form.nameCategory"
                            class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200"
                            placeholder="Masukkan nama kategori" required>
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

            {{-- Subcategory Modal --}}
            <div x-show="modalType === 'subcategory'" @click.outside="closeModal"
                class="bg-white w-full max-w-md rounded-xl shadow-xl p-6">
                
                <!-- Modal Header -->
                <div class="flex items-center justify-between mb-4 pb-3 border-b">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-emerald-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-list text-white text-sm"></i>
                        </div>
                        <h2 class="text-xl font-bold text-gray-800" x-text="editMode ? 'Edit Subcategory' : 'Add Subcategory'"></h2>
                    </div>
                    <button @click="closeModal"
                        class="w-8 h-8 bg-gray-100 hover:bg-red-100 rounded-lg flex items-center justify-center text-gray-500 hover:text-red-500">
                        <i class="fas fa-times text-sm"></i>
                    </button>
                </div>

                <!-- Subcategory Form -->
                <form :action="formAction" method="POST" class="space-y-4">
                    @csrf
                    <template x-if="editMode">
                        <input type="hidden" name="_method" value="PUT">
                    </template>

                    <div>
                        <label class="block font-medium text-gray-700 text-sm mb-1">
                            <i class="fas fa-list-ul text-emerald-600 mr-1"></i>Subcategory Name
                        </label>
                        <input type="text" name="nameSubCategory" x-model="form.nameSubCategory"
                            class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200"
                            placeholder="Masukkan nama subkategori" required>
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
    </div>
</div>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<script>
    function categoryModal() {
        return {
            modalOpen: false,
            modalType: '', // 'category' or 'subcategory'
            editMode: false,
            form: {
                nameCategory: '',
                nameSubCategory: '',
            },
            formAction: '',
            selectedCategoryId: null,

            openAddCategoryModal() {
                this.modalType = 'category';
                this.editMode = false;
                this.formAction = '{{ route("category.store") }}';
                this.form.nameCategory = '';
                this.modalOpen = true;
            },

            openEditCategoryModal(id, name) {
                this.modalType = 'category';
                this.editMode = true;
                this.formAction = `/admin/category/${id}`;
                this.form.nameCategory = name;
                this.modalOpen = true;
            },

            openAddSubcategoryModal(categoryId) {
                this.modalType = 'subcategory';
                this.editMode = false;
                this.formAction = `/admin/subcategory/${categoryId}`;
                this.selectedCategoryId = categoryId;
                this.form.nameSubCategory = '';
                this.modalOpen = true;
            },

            openEditSubcategoryModal(id, name) {
                this.modalType = 'subcategory';
                this.editMode = true;
                this.formAction = `/admin/subcategory/update/${id}`;
                this.form.nameSubCategory = name;
                this.modalOpen = true;
            },

            closeModal() {
                this.modalOpen = false;
                this.modalType = '';
                this.editMode = false;
                this.form = {
                    nameCategory: '',
                    nameSubCategory: '',
                };
                this.selectedCategoryId = null;
            }
        };
    }
</script>
@endsection