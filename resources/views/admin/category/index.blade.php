@extends('layouts.app')
@extends('admin.dashboard')

@section('content')
<div class="p-6"
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

    <h1 class="text-2xl font-bold mb-4">Daftar Kategori</h1>

    <!-- Tombol Tambah -->
    <button @click="openModal = true" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Add Category
    </button>

    <!-- Modal Tambah Kategori -->
    <div x-show="openModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow w-full max-w-md relative">
            <h2 class="text-xl font-semibold mb-4">Tambah Kategori</h2>
            <form action="{{ route('category.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="text" name="nameCategory" placeholder="Nama Kategori"
                    class="w-full border border-gray-300 rounded px-4 py-2" required>
                <div class="flex justify-end space-x-2">
                    <button @click="openModal = false" type="button" class="bg-gray-300 px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>
            <button @click="openModal = false" class="absolute top-2 right-2 text-gray-500">✕</button>
        </div>
    </div>

    <!-- Modal Edit Kategori -->
    <div x-show="editModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow w-full max-w-md relative">
            <h2 class="text-xl font-semibold mb-4">Edit Kategori</h2>
            <form :action="'/admin/category/' + editCategory.id" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <input type="text" name="nameCategory" x-model="editCategory.nameCategory"
                    class="w-full border border-gray-300 rounded px-4 py-2" required>
                <div class="flex justify-end space-x-2">
                    <button @click="editModal = false" type="button" class="bg-gray-300 px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>
            <button @click="editModal = false" class="absolute top-2 right-2 text-gray-500">✕</button>
        </div>
    </div>

    <!-- Modal Tambah Subkategori -->
    <div x-show="openSubModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow w-full max-w-md relative">
            <h2 class="text-xl font-semibold mb-4">Tambah Subkategori</h2>
            <form :action="'/admin/subcategory/' + selectedCategoryId" method="POST" class="space-y-4">
                @csrf
                <input type="text" name="nameSubCategory" x-model="newSubCategory.nameSubCategory"
                    placeholder="Nama Subkategori" class="w-full border border-gray-300 rounded px-4 py-2" required>
                <div class="flex justify-end space-x-2">
                    <button @click="openSubModal = false" type="button" class="bg-gray-300 px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>
            <button @click="openSubModal = false" class="absolute top-2 right-2 text-gray-500">✕</button>
        </div>
    </div>

    <!-- Modal Edit Subkategori -->
    <div x-show="editSubModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow w-full max-w-md relative">
            <h2 class="text-xl font-semibold mb-4">Edit Subkategori</h2>
            <form :action="'/admin/subcategory/update/' + editSubCategory.id" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <input type="text" name="nameSubCategory" x-model="editSubCategory.nameSubCategory"
                    class="w-full border border-gray-300 rounded px-4 py-2" required>
                <div class="flex justify-end space-x-2">
                    <button @click="editSubModal = false" type="button" class="bg-gray-300 px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>
            <button @click="editSubModal = false" class="absolute top-2 right-2 text-gray-500">✕</button>
        </div>
    </div>

    <!-- Tabel Kategori dan Subkategori -->
    <div class="mt-6 space-y-6">
        @foreach ($categories as $category)
            <div class="border rounded p-4 shadow-sm bg-white">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-lg font-semibold">{{ $category->nameCategory }}</h2>
                        <p class="text-sm text-gray-500">Dibuat: {{ $category->created_at->format('d M Y') }} oleh {{ $category->user->name ?? '-' }}</p>
                    </div>
                    <div class="space-x-2">
                        <button @click="
                            editCategory.id = '{{ $category->idCategory }}';
                            editCategory.nameCategory = '{{ $category->nameCategory }}';
                            editModal = true
                        " class="text-blue-600 hover:underline">Edit</button>
                        <button @click="
                            selectedCategoryId = '{{ $category->idCategory }}';
                            openSubModal = true
                        " class="text-green-600 hover:underline">+ Subkategori</button>
                        <form action="{{ route('category.destroy', $category->idCategory) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus kategori ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </div>
                </div>

                <!-- List Subkategori -->
                @if ($category->subCategories->count())
                    <ul class="mt-4 list-disc list-inside text-gray-700">
                        @foreach ($category->subCategories as $sub)
                        <li class="flex justify-between items-start" x-data="{ deleted: false }" x-show="!deleted">
                        <div>
                            <p>{{ $sub->nameSubCategory }}</p>
                            <p class="text-sm text-gray-500">
                                Dibuat: {{ $sub->created_at->format('d M Y') }} oleh {{ $sub->user->name ?? '-' }}
                            </p>
                        </div>
                        <div class="space-x-2">
                            <button @click="
                                editSubCategory.id = '{{ $sub->idSubCategory }}';
                                editSubCategory.nameSubCategory = '{{ $sub->nameSubCategory }}';
                                editSubModal = true
                            " class="text-blue-500 hover:underline text-sm">Edit</button>

                            <form 
                                action="{{ route('subcategory.destroy', $sub->idSubCategory) }}" 
                                method="POST" 
                                class="inline"
                                @submit.prevent="
                                    if(confirm('Hapus subkategori ini?')) {
                                        $event.target.submit();
                                        deleted = true;
                                    }
                                "
                            >
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 hover:underline text-sm">Delete</button>
                            </form>
                        </div>
                    </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-sm text-gray-500 mt-2">Belum ada subkategori.</p>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection
