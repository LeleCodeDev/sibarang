<dialog id="edit_modal_{{ $user->id }}" class="modal">
    <div class="modal-box">
        <form method="POST" action="{{ route('user.edit', $user->id) }}" >
            @csrf
            @method('PUT')
            <h3 class="font-bold text-lg mb-4">Add User</h3>

            <div class="form-control mb-3">
                <label for="name" class="form-control">
                    Username
                </label>
                <input type="text" id="name" name="name"
                    value="{{ old('name') }}"
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
                <input type="text" id="email" name="email"
                    value="{{ old('email') }}"
                    class="input input-bordered w-full @error('email') input-error @enderror"
                    placeholder="Enter your email">
                @error('email')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <div class="form-control mb-3">
                <label for="password" class="form-control">
                    Password
                </label>
                <input type="password" id="password" name="password"
                    class="input input-bordered w-full @error('password') input-error @enderror"
                    placeholder="Enter your password">
                @error('password')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <div class="form-control mb-3">
                <label for="role" class="form-control">
                    Role
                </label> <br>
                <select name="role" value="{{ old('role') }}"
                    class="select w-full input input-bordered @error('password') input-error @enderror">
                    <option disabled selected>Pick a role</option>
                    <option value="opereator">Operator</option>
                    <option value=peminjam>Peminjam</option>
                </select>
                @error('role')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <div class="modal-action">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn"
                    onclick="edit_modal_{{ $user->id }}.close()">Cancel</button>
            </div>
        </form>
    </div>
</dialog>
