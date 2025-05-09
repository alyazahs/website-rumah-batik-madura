@extends('layouts.admin')

@section('content')
@include('admin.components.confirm-delete-modal')
@if (session('success'))
    <div 
        x-data="{ show: true }" 
        x-init="setTimeout(() => show = false, 4000)" 
        x-show="show" 
        x-transition 
        class="mt-10 mx-4 flex items-start gap-3 p-4 rounded-lg bg-green-100 text-green-800 shadow-lg border border-green-300"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mt-1 shrink-0 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
        <span class="font-semibold">{{ session('success') }}</span>
    </div>
@endif

@if (session('error'))
    <div 
        x-data="{ show: true }" 
        x-init="setTimeout(() => show = false, 4000)" 
        x-show="show" 
        x-transition 
        class="mt-10 mx-4 flex items-start gap-3 p-4 rounded-lg bg-red-100 text-red-800 shadow-lg border border-red-300"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mt-1 shrink-0 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
        <span class="font-semibold">{{ session('error') }}</span>
    </div>
@endif
<div class="p-6 space-y-6"
    x-data="{
        openModal: false,
        editModal: false,
        openSubModal: false,
        editSubModal: false,
        editCategory: { id: '', nameCategory: '' },
        selectedCategoryId: null,
        newSubCategory: { nameSubCategory: '' },
        editSubCategory: { id: '', nameSubCategory: '' },
    }">

    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-bold text-gray-800">Category Management</h1>
        <button @click="openModal = true"
            class="inline-flex items-center bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-200">
            <i class="fas fa-plus mr-2 text-lg"></i> Add Category
        </button>
    </div>

    <!-- Category Cards -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        @foreach ($categories as $category)
        <div class="bg-white rounded-xl shadow-md p-5 hover:shadow-lg transition duration-300">
            <div class="flex justify-between items-start">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">{{ $category->nameCategory }}</h2>
                    <p class="text-sm text-gray-500">
                        Created on {{ $category->created_at->format('M d, Y') }} by {{ $category->user->name ?? '-' }}
                    </p>
                </div>
                <div class="space-x-4 flex items-center">
                    <button @click="
                        editCategory.id = '{{ $category->idCategory }}';
                        editCategory.nameCategory = '{{ $category->nameCategory }}';
                        editModal = true
                    " class="text-blue-500 hover:underline text-lg p-2" title="Edit Category"><i class="fas fa-edit text-xl"></i></button>

                    <button @click="
                        selectedCategoryId = '{{ $category->idCategory }}';
                        openSubModal = true
                    " class="text-green-500 hover:underline text-lg p-2" title="Add Subcategory"><i class="fas fa-plus text-xl"></i></button>

                    <form action="{{ route('category.destroy', $category->idCategory) }}" method="POST"
                    class="inline-block"
                    onsubmit="event.preventDefault(); openConfirmDelete(this, '{{ $category->nameCategory }}');">
                        @csrf @method('DELETE')
                        <button class="text-red-500 hover:underline text-lg p-2" title="Delete Category"><i class="fas fa-trash text-xl"></i></button>
                    </form>
                </div>
            </div>

            <!-- Subcategories -->
            <div class="mt-4">
                @if ($category->subCategories->count())
                <ul class="space-y-2">
                    @foreach ($category->subCategories as $sub)
                    <li class="flex justify-between items-start bg-gray-200 px-3 py-3 rounded" x-data="{ deleted: false }"
                        x-show="!deleted">
                        <div>
                            <p class="text-sm font-medium text-gray-800">{{ $sub->nameSubCategory }}</p>
                            <p class="text-xs text-gray-600">
                                Created on {{ $sub->created_at->format('M d, Y') }} by {{ $sub->user->name ?? '-' }}
                            </p>
                        </div>
                        <div class="space-x-4 flex items-center">
                            <button @click="
                                editSubCategory.id = '{{ $sub->idSubCategory }}';
                                editSubCategory.nameSubCategory = '{{ $sub->nameSubCategory }}';
                                editSubModal = true
                            " class="text-blue-500 hover:underline text-lg p-2" title="Edit Subcategory"><i class="fas fa-edit"></i></button>

                            <form action="{{ route('subcategory.destroy', $sub->idSubCategory) }}" method="POST"
                            onsubmit="event.preventDefault(); openConfirmDelete(this, '{{ $sub->nameSubCategory }}');" { $event.target.submit(); deleted = true; }"
                                class="inline">
                                @csrf @method('DELETE')
                                <button class="text-red-500 hover:underline text-lg p-2" title="Delete Subcategory"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @else
                <p class="text-sm text-gray-400">No subcategories.</p>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <!-- All Modals -->
    <template x-if="openModal || editModal || openSubModal || editSubModal">
        <div class="fixed inset-0 bg-black/5 z-50 flex items-center justify-center">
            <!-- Add/Edit Category Modal -->
            <div x-show="openModal || editModal" x-transition class="animate-fadeIn bg-white rounded-lg shadow-lg p-6 w-full max-w-md relative">
                <h2 class="text-xl font-bold mb-4" x-text="openModal ? 'Add Category' : 'Edit Category'"></h2>
                <form :action="openModal ? '{{ route('category.store') }}' : '/admin/category/' + editCategory.id"
                    method="POST" class="space-y-4">
                    @csrf
                    <template x-if="editModal">
                        <input type="hidden" name="_method" value="PUT" />
                    </template>
                    <input type="text" name="nameCategory" x-model="openModal ? null : editCategory.nameCategory"
                        :value="openModal ? '' : undefined"
                        placeholder="Category Name"
                        class="w-full border border-gray-300 rounded px-4 py-2" required>
                    <div class="flex justify-end gap-2">
                        <button @click="openModal = false; editModal = false" type="button"
                            class="bg-gray-200 px-4 py-2 rounded">Cancel</button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
                    </div>
                </form>
                <button @click="openModal = false; editModal = false" class="absolute top-2 right-2 text-gray-500">✕</button>
            </div>

            <!-- Add/Edit Subcategory Modal -->
            <div x-show="openSubModal || editSubModal" x-transition
                class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md relative">
                <h2 class="text-xl font-bold mb-4" x-text="openSubModal ? 'Add Subcategory' : 'Edit Subcategory'"></h2>
                <form :action="openSubModal ? '/admin/subcategory/' + selectedCategoryId : '/admin/subcategory/update/' + editSubCategory.id"
                    method="POST" class="space-y-4">
                    @csrf
                    <template x-if="editSubModal">
                        <input type="hidden" name="_method" value="PUT" />
                    </template>
                    <input type="text" name="nameSubCategory"
                        x-model="openSubModal ? newSubCategory.nameSubCategory : editSubCategory.nameSubCategory"
                        placeholder="Subcategory Name"
                        class="w-full border border-gray-300 rounded px-4 py-2" required>
                    <div class="flex justify-end gap-2">
                        <button @click="openSubModal = false; editSubModal = false" type="button"
                            class="bg-gray-200 px-4 py-2 rounded">Cancel</button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
                    </div>
                </form>
                <button @click="openSubModal = false; editSubModal = false" class="absolute top-2 right-2 text-gray-500">✕</button>
            </div>
        </div>
    </template>
</div>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.95);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .animate-fadeIn {
        animation: fadeIn 0.2s ease-out;
    }
</style>
@endsection