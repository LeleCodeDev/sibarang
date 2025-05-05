<dialog id="edit_modal_{{ $user->id }}" class="modal">
    <div class="modal-box">
        <form method="POST" action="{{ route('user.update', $user->id) }}">
            @csrf
            @method('PUT')
            <h3 class="font-bold text-lg mb-4">Edit User</h3>

            <div class="form-control mb-3">
                <label for="name" class="form-control">
                    Username
                </label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                    class="input input-bordered w-full @error('name') input-error @enderror"
                    placeholder="Enter your name">
                @error('name')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <div class="form-control mb-3">
                <label for="email" class="form-control">
                    Email
                </label>
                <input type="text" id="email" name="email" value="{{ old('email', $user->email) }}"
                    class="input input-bordered w-full @error('email') input-error @enderror"
                    placeholder="Enter your email">
                @error('email')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <div class="form-control mb-3">
                <label for="role" class="form-control">
                    Role
                </label> <br>
                <select name="role" "
                    class="select w-full input input-bordered @error('password') input-error @enderror">
                    <option disabled {{ old('role', $user->role) ? '' : 'selected' }}>Pick a role</option>
                    <option value="operator" {{ old('role', $user->role) == 'operator' ? 'selected' : '' }}>Operator
                    </option>
                    <option value="peminjam" {{ old('role', $user->role) == 'peminjam' ? 'selected' : '' }}>Peminjam
                    </option>
                </select>
                @error('role')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <div class="modal-action">
                <button type="submit" class="btn btn-primary">Edit</button>
                <button type="button" class="btn" onclick="edit_modal_{{ $user->id }}.close()">Cancel</button>
            </div>
        </form>
    </div>
</dialog>
