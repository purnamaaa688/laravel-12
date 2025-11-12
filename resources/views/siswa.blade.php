@extends('layout')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

  <!-- Basic Bootstrap Table -->
  <div class="card">
    <h5 class="card-header">Data Siswa</h5>
    <div class="card-body">
      <div class="mb-3">
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#input-siswa">Tambah</button>
      </div>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>aksi</th>
            <th>id</th>
            <th>Nama Siswa</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Email</th>
            <th>NISN</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($siswa as $item)
          <tr data-id="{{ $item->id }}">
            <td>
              <button type="button" class="btn btn-sm btn-primary btn-edit me-2"
                data-bs-toggle="modal" data-bs-target="#edit-siswa"
                data-id="{{ $item->id }}"
                data-namasiswa="{{ $item->namasiswa }}"
                data-jeniskelamin="{{ $item->jeniskelamin }}"
                data-tempatlahir="{{ $item->tempatlahir }}"
                data-tanggallahir="{{ $item->tanggallahir }}"
                data-alamat="{{ $item->alamat }}"
                data-nohp="{{ $item->nohp }}"
                data-email="{{ $item->email }}"
                data-nisn="{{ $item->NISN }}">
                <i class="bx bx-edit-alt"></i>
              </button>
              <button type="button" class="btn btn-sm btn-danger btn-delete"
                data-bs-toggle="modal" data-bs-target="#delete-siswa"
                data-id="{{ $item->id }}"
                data-namasiswa="{{ $item->namasiswa }}">
                <i class="bx bx-trash"></i>
              </button>
            </td>
            <td>{{ $item->id }}</td>
            <td>{{ $item->namasiswa }}</td>
            <td>{{ $item->jeniskelamin }}</td>
            <td>{{ $item->tempatlahir }}</td>
            <td>{{ $item->tanggallahir }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->nohp }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->NISN }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>


<!-- Input Siswa Modal -->
<div class="modal fade" id="input-siswa" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Input Data Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('siswa.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="namasiswa" class="form-label">Nama Siswa</label>
              <input type="text" name="namasiswa" id="namasiswa" class="form-control" placeholder="Masukkan nama" required />
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-3">
              <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
              <select name="jeniskelamin" id="jeniskelamin" class="form-select" required>
                <option value="">-- Pilih --</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
            <div class="col mb-3">
              <label for="tempatlahir" class="form-label">Tempat Lahir</label>
              <input type="text" name="tempatlahir" id="tempatlahir" class="form-control" placeholder="Tempat lahir" />
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-3">
              <label for="tanggallahir" class="form-label">Tanggal Lahir</label>
              <input type="date" name="tanggallahir" id="tanggallahir" class="form-control" />
            </div>
            <div class="col mb-3">
              <label for="NISN" class="form-label">NISN</label>
              <input type="text" name="NISN" id="NISN" class="form-control" placeholder="NISN" />
            </div>
          </div>
          <div class="row">
            <div class="col mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control" rows="2"></textarea>
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-3">
              <label for="nohp" class="form-label">No Telepon</label>
              <input type="text" name="nohp" id="nohp" class="form-control" placeholder="08xx" />
            </div>
            <div class="col mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="email@domain" />
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Edit Siswa Modal -->
<div class="modal fade" id="edit-siswa" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Data Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="form-edit-siswa" action="" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="edit-namasiswa" class="form-label">Nama Siswa</label>
              <input type="text" name="namasiswa" id="edit-namasiswa" class="form-control" required />
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-3">
              <label for="edit-jeniskelamin" class="form-label">Jenis Kelamin</label>
              <select name="jeniskelamin" id="edit-jeniskelamin" class="form-select" required>
                <option value="">-- Pilih --</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
            <div class="col mb-3">
              <label for="edit-tempatlahir" class="form-label">Tempat Lahir</label>
              <input type="text" name="tempatlahir" id="edit-tempatlahir" class="form-control" />
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-3">
              <label for="edit-tanggallahir" class="form-label">Tanggal Lahir</label>
              <input type="date" name="tanggallahir" id="edit-tanggallahir" class="form-control" />
            </div>
            <div class="col mb-3">
              <label for="edit-NISN" class="form-label">NISN</label>
              <input type="text" name="NISN" id="edit-NISN" class="form-control" />
            </div>
          </div>
          <div class="row">
            <div class="col mb-3">
              <label for="edit-alamat" class="form-label">Alamat</label>
              <textarea name="alamat" id="edit-alamat" class="form-control" rows="2"></textarea>
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-3">
              <label for="edit-nohp" class="form-label">No Telepon</label>
              <input type="text" name="nohp" id="edit-nohp" class="form-control" />
            </div>
            <div class="col mb-3">
              <label for="edit-email" class="form-label">Email</label>
              <input type="email" name="email" id="edit-email" class="form-control" />
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Delete Siswa Modal -->
<div class="modal fade" id="delete-siswa" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Data Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="form-delete-siswa" action="" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-body">
          <p>Yakin ingin menghapus siswa <strong id="delete-nama">-</strong> ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>

@push('scripts')
<script>
  // Edit button: fill modal with data from attributes
  document.addEventListener('click', function(e) {
    const el = e.target.closest('.btn-edit');
    if (!el) return;
    const id = el.getAttribute('data-id');
    document.getElementById('edit-namasiswa').value = el.getAttribute('data-namasiswa') || '';
    document.getElementById('edit-jeniskelamin').value = el.getAttribute('data-jeniskelamin') || '';
    document.getElementById('edit-tempatlahir').value = el.getAttribute('data-tempatlahir') || '';
    document.getElementById('edit-tanggallahir').value = el.getAttribute('data-tanggallahir') || '';
    document.getElementById('edit-NISN').value = el.getAttribute('data-nisn') || '';
    document.getElementById('edit-alamat').value = el.getAttribute('data-alamat') || '';
    document.getElementById('edit-nohp').value = el.getAttribute('data-nohp') || '';
    document.getElementById('edit-email').value = el.getAttribute('data-email') || '';
    const form = document.getElementById('form-edit-siswa');
    if (form) form.action = '/siswa/' + id;
  });

  // Delete button: fill modal with data and set form action
  document.addEventListener('click', function(e) {
    const el = e.target.closest('.btn-delete');
    if (!el) return;
    const id = el.getAttribute('data-id');
    const nama = el.getAttribute('data-namasiswa') || '';
    const elNama = document.getElementById('delete-nama');
    if (elNama) elNama.textContent = nama;
    const delForm = document.getElementById('form-delete-siswa');
    if (delForm) delForm.action = '/siswa/' + id;
  });

  // Edit form AJAX handler
  document.addEventListener('DOMContentLoaded', function() {
    const editForm = document.getElementById('form-edit-siswa');
    if (!editForm) return;
    editForm.addEventListener('submit', function(ev) {
      ev.preventDefault();
      const action = this.action;
      const tokenInput = this.querySelector('input[name="_token"]');
      const token = tokenInput ? tokenInput.value : '';
      if (!action || !token) {
        showAlert('Error: Form configuration invalid', 'danger');
        return;
      }
      
      // Get all form inputs
      const namasiswa = document.getElementById('edit-namasiswa').value;
      const jeniskelamin = document.getElementById('edit-jeniskelamin').value;
      const tempatlahir = document.getElementById('edit-tempatlahir').value;
      const tanggallahir = document.getElementById('edit-tanggallahir').value;
      const alamat = document.getElementById('edit-alamat').value;
      const nohp = document.getElementById('edit-nohp').value;
      const email = document.getElementById('edit-email').value;
      const NISN = document.getElementById('edit-NISN').value;
      
      // Create URLSearchParams (works better with Laravel)
      const data = new URLSearchParams();
      data.append('_token', token);
      data.append('_method', 'PUT');
      data.append('namasiswa', namasiswa);
      data.append('jeniskelamin', jeniskelamin);
      data.append('tempatlahir', tempatlahir);
      data.append('tanggallahir', tanggallahir);
      data.append('alamat', alamat);
      data.append('nohp', nohp);
      data.append('email', email);
      data.append('NISN', NISN);
      
      fetch(action, {
        method: 'POST',
        headers: {
          'Accept': 'application/json'
        },
        body: data
      }).then(function(res) {
        if (!res.ok) {
          return res.json().then(function(j){ throw j; });
        }
        return res.json();
      }).then(function(data) {
        const modalEl = document.getElementById('edit-siswa');
        const bsModal = bootstrap.Modal.getInstance(modalEl);
        if (bsModal) bsModal.hide();
        showAlert('Data siswa berhasil diubah', 'success');
        // Refresh after 1 second to show updated data
        setTimeout(function(){ location.reload(); }, 1000);
      }).catch(function(err) {
        console.error('Error:', err);
        if (err.message) {
          showAlert('Error: ' + err.message, 'danger');
        } else if (err.errors) {
          const errorMsg = Object.values(err.errors).flat().join(', ');
          showAlert('Validation error: ' + errorMsg, 'danger');
        } else {
          showAlert('Gagal mengubah data: ' + JSON.stringify(err), 'danger');
        }
      });
    });
  });

  // Delete AJAX handler
  document.addEventListener('DOMContentLoaded', function() {
    const delForm = document.getElementById('form-delete-siswa');
    if (!delForm) return;
    delForm.addEventListener('submit', function(ev) {
      ev.preventDefault();
      const action = this.action;
      const tokenInput = this.querySelector('input[name="_token"]');
      const token = tokenInput ? tokenInput.value : '';
      if (!action) return;
      fetch(action, {
        method: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': token,
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        }
      }).then(function(res) {
        if (!res.ok) throw res;
        return res.json().catch(function(){ return {}; });
      }).then(function(data) {
        const modalEl = document.getElementById('delete-siswa');
        const bsModal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
        bsModal.hide();
        const id = action.split('/').pop();
        const row = document.querySelector('tr[data-id="' + id + '"]');
        if (row) row.remove();
        showAlert('Data siswa dihapus', 'success');
      }).catch(function(err) {
        if (err.json) {
          err.json().then(function(j){ showAlert(j.message || 'Gagal menghapus', 'danger'); }).catch(function(){ showAlert('Gagal menghapus', 'danger'); });
        } else {
          showAlert('Gagal menghapus', 'danger');
        }
      });
    });
  });

  function showAlert(message, type) {
    const container = document.querySelector('.container-xxl');
    if (!container) { alert(message); return; }
    const wrapper = document.createElement('div');
    wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    container.prepend(wrapper);
    setTimeout(function(){ try{ wrapper.querySelector('.alert').remove(); }catch(e){} }, 3000);
  }
</script>
@endpush

@endsection