<!-- Ubah Account Modal -->
<div class="modal fade" id="editAccountModal-{{ $account->id }}" tabindex="-1" aria-labelledby="editAccountModalLabel-{{ $account->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAccountModalLabel-{{ $account->id }}">Ubah data {{ $account->nama }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('account.update', $account->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <!-- Name Input -->
                    <div class="form-group mb-3">
                        <label for="name-{{ $account->id }}" class="form-label">Nama</label>
                        <input type="text" name="name" id="name-{{ $account->id }}" class="form-control" value="{{ old('name', $account->name) }}" required>
                    </div>

                    <!-- Email Input -->
                    <div class="form-group mb-3">
                        <label for="email-{{ $account->id }}" class="form-label">Email</label>
                        <input type="email" name="email" id="email-{{ $account->id }}" class="form-control" value="{{ old('email', $account->email) }}" required>
                    </div>

                    <!-- Username Input -->
                    <div class="form-group mb-3">
                        <label for="username-{{ $account->id }}" class="form-label">Nama Pengguna</label>
                        <input type="text" name="username" id="username-{{ $account->id }}" class="form-control" value="{{ old('username', $account->username) }}" required>
                    </div>

                    <!-- Password Input -->
                    <div class="form-group mb-3">
                        <label for="password-{{ $account->id }}" class="form-label">Kata Sandi Baru</label>
                        <input type="password" name="password" id="password-{{ $account->id }}" class="form-control" placeholder="Masukkan kata sandi baru">
                    </div>

                    <!-- Role Selection Dropdown -->
                    <div class="form-group mb-3">
                        <label for="roles-{{ $account->id }}" class="form-label">Hak Akses</label>
                        <select class="role-multiple form-select" name="roles[]" id="roles-{{ $account->id }}" multiple="multiple">
                            @foreach(["Super Admin", "Admin", "Guru", "Wali Kelas", "Siswa"] as $role)
                                <option value="{{ $role }}" {{ in_array($role, $account->getRoleNames()->toArray()) ? 'selected' : '' }}>{{ $role }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="modal-footer flex-column flex-sm-row">
                    <button type="button" class="btn btn-secondary mb-2 mb-sm-0 me-sm-2" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
/* Custom responsive styles for modal */
.modal-dialog {
    max-width: 90%;
    margin: 1rem auto;
}

.modal-content {
    border-radius: 0.5rem;
}

.modal-body {
    padding: 1.5rem;
}

.form-label {
    font-size: clamp(0.9rem, 2.5vw, 1rem);
    margin-bottom: 0.5rem;
}

.form-control, .form-select {
    font-size: clamp(0.9rem, 2.5vw, 1rem);
    padding: 0.5rem 0.75rem;
}

.btn {
    font-size: clamp(0.85rem, 2.5vw, 1rem);
    padding: 0.5rem 1rem;
    width: auto;
    min-width: 100px;
}

.modal-footer {
    padding: 1rem;
    display: flex;
    justify-content: flex-end;
    gap: 0.5rem;
}

/* Adjust Select2 or similar multi-select */
.role-multiple + .select2-container {
    width: 100% !important;
}

@media (max-width: 576px) {
    .modal-dialog {
        max-width: 95%;
        margin: 0.5rem auto;
    }

    .modal-body {
        padding: 1rem;
    }

    .modal-title {
        font-size: clamp(1rem, 4vw, 1.25rem);
    }

    .form-label, .form-control, .form-select, .btn {
        font-size: clamp(0.8rem, 3vw, 0.9rem);
    }

    .modal-footer {
        flex-direction: column;
        align-items: stretch;
    }

    .btn {
        width: 100%;
        min-width: unset;
    }
}

@media (max-width: 400px) {
    .modal-dialog {
        max-width: 100%;
        margin: 0;
    }

    .modal-content {
        border-radius: 0;
    }
}
</style>

<!-- Include Select2 initialization (if used) -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Initialize Select2 for multi-select with unique IDs
    const selectElements = document.querySelectorAll('.role-multiple');
    selectElements.forEach(function (element) {
        if (typeof jQuery !== 'undefined' && jQuery.fn.select2) {
            jQuery(element).select2({
                width: '100%',
                placeholder: 'Pilih hak akses',
                allowClear: true
            });
        }
    });
});
</script>
