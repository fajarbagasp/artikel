<!-- // resources/views/admin/users/edit.blade.php -->

<form action="{{ route('admin.users.update', $user) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Nama:</label>
    <input type="text" name="name" value="{{ $user->name }}" required>
    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ $user->email }}" required>
    <button type="submit">Simpan</button>
</form>
