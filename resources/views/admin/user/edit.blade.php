<!-- resources/views/admin/user/edit.blade.php -->
<form method="POST" action="{{ route('user.update', $user->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label for="name">Nama</label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="w-full border rounded p-2" required>
    </div>
    <div class="mb-4">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="w-full border rounded p-2" required>
    </div>
    <div class="mb-4">
        <label for="level">Level</label>
        <select name="level" id="level" class="w-full border rounded p-2" required>
            <option value="admin" {{ $user->level === 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="super_admin" {{ $user->level === 'super_admin' ? 'selected' : '' }}>Super Admin</option>
        </select>
    </div>
    <div class="mb-4">
        <label for="status">Status</label>
        <input type="checkbox" name="status" id="status" value="1" {{ $user->status ? 'checked' : '' }}> Aktif
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
</form>