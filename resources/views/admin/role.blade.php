<div class="form-group">
    <label for="role">Role</label>
    <select class="form-control" id="role" name="role" required>
        <option value="admin" {{ $admin->role == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="guest" {{ $admin->role == 'guest' ? 'selected' : '' }}>Guest</option>
        <option value="mahasiswa" {{ $admin->role == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
    </select>
</div>
