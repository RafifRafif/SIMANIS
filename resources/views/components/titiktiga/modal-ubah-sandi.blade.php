<!-- Modal Ubah Sandi -->
<div class="modal fade" id="ubahSandiModal" tabindex="-1" aria-labelledby="ubahSandiLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-sm rounded-4">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-semibold" id="ubahSandiLabel">Ubah Sandi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('ubah.sandi') }}" method="POST">
          @csrf

          <div class="mb-3 position-relative">
            <label for="sandiSaatIni" class="form-label fw-medium">Sandi Saat Ini</label>
            <input type="password" class="form-control pe-5" id="sandiSaatIni" name="current_password"
              placeholder="Isi sandi sebelumnya">
            <i class="fa-regular fa-eye toggle-eye" onclick="togglePassword('sandiSaatIni', this)"></i>
          </div>

          <div class="mb-3 position-relative">
            <label for="sandiBaru" class="form-label fw-medium">Sandi Baru</label>
            <input type="password" class="form-control pe-5" id="sandiBaru" name="new_password"
              placeholder="Isi sandi terbaru">
            <i class="fa-regular fa-eye toggle-eye" onclick="togglePassword('sandiBaru', this)"></i>
          </div>

          <div class="mb-4 position-relative">
            <label for="konfirmasiSandi" class="form-label fw-medium">Konfirmasi Sandi Baru</label>
            <input type="password" class="form-control pe-5" id="konfirmasiSandi" name="new_password_confirmation"
              placeholder="Isi ulang sandi baru">
            <i class="fa-regular fa-eye toggle-eye" onclick="togglePassword('konfirmasiSandi', this)"></i>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary px-4 py-2 rounded-3 w-100 fw-medium"
              style="background-color: #006AFF;">
              Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@if (session('success'))
  <script>alert("{{ session('success') }}");</script>
@endif

@if (session('error'))
  <script>alert("{{ session('error') }}");</script>
@endif


<!-- Script Toggle Password -->
<script>
  function togglePassword(id, icon) {
    const input = document.getElementById(id);
    if (input.type === "password") {
      input.type = "text";
      icon.classList.remove('fa-eye-slash');
      icon.classList.add('fa-eye-eye');
    } else {
      input.type = "password";
      icon.classList.remove('fa-eye-eye');
      icon.classList.add('fa-eye-slash');
    }
  }
</script>

<!-- CSS -->
<style>
  .form-control {
    border-radius: 12px !important;
    padding-right: 40px !important;
    /* ruang untuk ikon mata */
  }

  .toggle-eye {
    position: absolute;
    right: 12px;
    top: 72%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #888;
  }

  .toggle-eye:hover {
    color: #333;
  }

  .modal-content {
    border-radius: 16px;
  }

  .modal-header h5 {
    font-weight: 600;
  }

  .btn-primary {
    background-color: #006AFF;
    border: none;
  }

  .btn-primary:hover {
    background-color: #0059D1;
  }
</style>