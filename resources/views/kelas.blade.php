@extends('layout')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

  <div class="card">
    <h5 class="card-header">Data Kelas</h5>
    <div class="card-body">
      <div class="mb-3">
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#input-kelas">Tambah</button>
      </div>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>aksi</th>
            <th>id</th>
            <th>Nama Kelas</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($kelas as $item)
          <tr data-id="{{ $item->id }}">
            <td>
              <button type="button" class="btn btn-sm btn-primary btn-edit me-2"
                data-bs-toggle="modal" data-bs-target="#edit-kelas"
                data-id="{{ $item->id }}"
                data-namakelas="{{ $item->namakelas }}">
                <i class="bx bx-edit-alt"></i>
              </button>
              <button type="button" class="btn btn-sm btn-danger btn-delete"
                data-bs-toggle="modal" data-bs-target="#delete-kelas"
                data-id="{{ $item->id }}"
                data-namakelas="{{ $item->namakelas }}">
                <i class="bx bx-trash"></i>
              </button>
            </td>
            <td>{{ $item->id }}</td>
            <td>{{ $item->namakelas }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>

<!-- Input Kelas Modal -->
<div class="modal fade" id="input-kelas" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Input Data Kelas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('kelas.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="namakelas" class="form-label">Nama Kelas</label>
              <input type="text" name="namakelas" id="namakelas" class="form-control" placeholder="Contoh: X A" required />
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

<!-- Edit Kelas Modal -->
<div class="modal fade" id="edit-kelas" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Data Kelas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="form-edit-kelas" action="" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="edit-namakelas" class="form-label">Nama Kelas</label>
              <input type="text" name="namakelas" id="edit-namakelas" class="form-control" required />
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

<!-- Delete Kelas Modal -->
<div class="modal fade" id="delete-kelas" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Data Kelas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="form-delete-kelas" action="" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-body">
          <p>Yakin ingin menghapus kelas <strong id="delete-nama">-</strong> ?</p>
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
  document.addEventListener('click', function(e) {
    const el = e.target.closest('.btn-edit');
    if (!el) return;
    const id = el.getAttribute('data-id');
    document.getElementById('edit-namakelas').value = el.getAttribute('data-namakelas') || '';
    const form = document.getElementById('form-edit-kelas');
    if (form) form.action = '/kelas/' + id;
  });

  document.addEventListener('click', function(e) {
    const el = e.target.closest('.btn-delete');
    if (!el) return;
    const id = el.getAttribute('data-id');
    const nama = el.getAttribute('data-namakelas') || '';
    const elNama = document.getElementById('delete-nama');
    if (elNama) elNama.textContent = nama;
    const delForm = document.getElementById('form-delete-kelas');
    if (delForm) delForm.action = '/kelas/' + id;
  });

  document.addEventListener('DOMContentLoaded', function() {
    const editForm = document.getElementById('form-edit-kelas');
    if (editForm) {
      editForm.addEventListener('submit', function(ev) {
        ev.preventDefault();
        const action = this.action;
        const token = this.querySelector('input[name="_token"]').value;
        const data = new URLSearchParams();
        data.append('_token', token);
        data.append('_method', 'PUT');
        data.append('namakelas', document.getElementById('edit-namakelas').value);
        fetch(action, { method: 'POST', headers: { 'Accept': 'application/json' }, body: data })
          .then(r => r.ok ? r.json() : r.json().then(j => { throw j; }))
          .then(d => {
            bootstrap.Modal.getInstance(document.getElementById('edit-kelas')).hide();
            showAlert('Data kelas berhasil diubah', 'success');
            setTimeout(() => location.reload(), 1000);
          })
          .catch(e => showAlert('Error: ' + JSON.stringify(e), 'danger'));
      });
    }

    const delForm = document.getElementById('form-delete-kelas');
    if (delForm) {
      delForm.addEventListener('submit', function(ev) {
        ev.preventDefault();
        const action = this.action;
        const token = this.querySelector('input[name="_token"]').value;
        fetch(action, { method: 'DELETE', headers: { 'X-CSRF-TOKEN': token, 'Accept': 'application/json' } })
          .then(r => r.ok ? r.json() : Promise.reject(r))
          .then(d => {
            bootstrap.Modal.getInstance(document.getElementById('delete-kelas')).hide();
            document.querySelector('tr[data-id="' + action.split('/').pop() + '"]').remove();
            showAlert('Data kelas dihapus', 'success');
          })
          .catch(e => showAlert('Gagal menghapus', 'danger'));
      });
    }
  });

  function showAlert(msg, type) {
    const el = document.createElement('div');
    el.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible"><span>' + msg + '</span><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
    document.querySelector('.container-xxl').prepend(el);
    setTimeout(() => el.remove(), 3000);
  }
</script>
@endpush

@endsection