<!-- resources/views/components/confirm-delete-modal.blade.php -->
<div id="confirmDeleteModal" class="fixed inset-0 z-50 bg-black/50 items-center justify-center hidden">
    <div class="bg-white rounded-xl shadow-lg p-6 max-w-sm w-full animate-fadeIn relative">
        <h2 class="text-xl font-bold mb-4 text-center" id="confirmDeleteMessage">
            Are you sure?
        </h2>
        <div class="flex justify-center gap-4">
            <button id="cancelDelete" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Cancel</button>
            <button id="confirmDelete" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">Yes, Delete</button>
        </div>
        <button onclick="closeConfirmDelete()" class="absolute top-3 right-4 text-gray-500 hover:text-red-500 text-xl">×</button>
    </div>
</div>

<script>
    let deleteForm = null;

    function openConfirmDelete(formElement, itemName = '') {
        deleteForm = formElement;
        const modal = document.getElementById('confirmDeleteModal');
        const message = document.getElementById('confirmDeleteMessage');

        if (itemName) {
            message.textContent = `Are you sure you want to delete "${itemName}"?`;
        } else {
            message.textContent = `Are you sure?`;
        }

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeConfirmDelete() {
        const modal = document.getElementById('confirmDeleteModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('cancelDelete')?.addEventListener('click', closeConfirmDelete);
        document.getElementById('confirmDelete')?.addEventListener('click', function () {
            if (deleteForm) {
                deleteForm.submit();
            }
        });
    });
</script>
