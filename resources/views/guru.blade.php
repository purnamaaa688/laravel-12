@extends('layout')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

  <div class="card">
    <h5 class="card-header">Data Guru</h5>
    <div class="card-body">
      <div class="mb-3">
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#input-guru">Tambah</button>
      </div>

      <div class="table-responsive text-nowrap">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>aksi</th>
              <th>id</th>
              <th>Nama Guru</th>
              <th>NIP</th>
              <th>Bidang Studi</th>
              <th>Email</th>
              <th>No Telepon</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($guru as $item)
            <tr data-id="{{ $item->id }}">
              <td>
                <button type="button" class="btn btn-sm btn-primary btn-edit me-2"
                  data-bs-toggle="modal" data-bs-target="#edit-guru"
                  data-id="{{ $item->id }}"
                  data-nama_guru="{{ $item->nama_guru }}"
                  data-nip="{{ $item->nip }}"
                  data-bidang_studi="{{ $item->bidang_studi }}"
                  data-email="{{ $item->email }}"
                  data-no_telepon="{{ $item->no_telepon }}">
                  <i class="bx bx-edit-alt"></i>
                </button>
                <button type="button" class="btn btn-sm btn-danger btn-delete"
                  data-bs-toggle="modal" data-bs-target="#delete-guru"
                  data-id="{{ $item->id }}"
                  data-nama_guru="{{ $item->nama_guru }}">
                  <i class="bx bx-trash"></i>
                </button>
              </td>
              <td>{{ $item->id }}</td>
              <td>{{ $item->nama_guru }}</td>
              <td>{{ $item->nip }}</td>
              <td>{{ $item->bidang_studi }}</td>
              <td>{{ $item->email }}</td>
              <td>{{ $item->no_telepon }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

<!-- Input Guru Modal -->
<div class="modal fade" id="input-guru" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Input Data Guru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('guru.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="nama_guru" class="form-label">Nama Guru</label>
              <input type="text" name="nama_guru" id="nama_guru" class="form-control" required />
            </div>
            <div class="col mb-3">
              <label for="nip" class="form-label">NIP</label>
              <input type="text" name="nip" id="nip" class="form-control" />
            </div>
            <div class="col mb-3">
              <label for="bidang_studi" class="form-label">Bidang Studi</label>
              <input type="text" name="bidang_studi" id="bidang_studi" class="form-control" />
            </div>
            <div class="col mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" id="email" class="form-control" />
            </div>
            <div class="col mb-3">
              <label for="no_telepon" class="form-label">No Telepon</label>
              <input type="text" name="no_telepon" id="no_telepon" class="form-control" />
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

<!-- Edit Guru Modal -->
<div class="modal fade" id="edit-guru" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Data Guru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="form-edit-guru" action="" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="edit-nama_guru" class="form-label">Nama Guru</label>
              <input type="text" name="nama_guru" id="edit-nama_guru" class="form-control" required />
            </div>
            <div class="col mb-3">
              <label for="edit-nip" class="form-label">NIP</label>
              <input type="text" name="nip" id="edit-nip" class="form-control" />
            </div>
            <div class="col mb-3">
              <label for="edit-bidang_studi" class="form-label">Bidang Studi</label>
              <input type="text" name="bidang_studi" id="edit-bidang_studi" class="form-control" />
            </div>
            <div class="col mb-3">
              <label for="edit-email" class="form-label">Email</label>
              <input type="email" name="email" id="edit-email" class="form-control" />
            </div>
            <div class="col mb-3">
              <label for="edit-no_telepon" class="form-label">No Telepon</label>
              <input type="text" name="no_telepon" id="edit-no_telepon" class="form-control" />
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

<!-- Delete Guru Modal -->
<div class="modal fade" id="delete-guru" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Data Guru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="form-delete-guru" action="" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-body">
          <p>Yakin ingin menghapus guru <strong id="delete-guru-nama">-</strong> ?</p>
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
    document.getElementById('edit-nama_guru').value = el.getAttribute('data-nama_guru') || '';
    document.getElementById('edit-nip').value = el.getAttribute('data-nip') || '';
    document.getElementById('edit-bidang_studi').value = el.getAttribute('data-bidang_studi') || '';
    document.getElementById('edit-email').value = el.getAttribute('data-email') || '';
    document.getElementById('edit-no_telepon').value = el.getAttribute('data-no_telepon') || '';
    const form = document.getElementById('form-edit-guru');
    if (form) form.action = '/guru/' + id;
  });

  document.addEventListener('click', function(e) {
    const el = e.target.closest('.btn-delete');
    if (!el) return;
    const id = el.getAttribute('data-id');
    const nama = el.getAttribute('data-nama_guru') || '';
    const elNama = document.getElementById('delete-guru-nama');
    if (elNama) elNama.textContent = nama;
    const delForm = document.getElementById('form-delete-guru');
    if (delForm) delForm.action = '/guru/' + id;
  });

  document.addEventListener('DOMContentLoaded', function() {
    const editForm = document.getElementById('form-edit-guru');
    if (editForm) {
      editForm.addEventListener('submit', function(ev) {
        // optional: handle via AJAX similar to kelas.js pattern
      });
    }

    const delForm = document.getElementById('form-delete-guru');
    if (delForm) {
      delForm.addEventListener('submit', function(ev) {
        // optional: handle via AJAX similar to kelas.js pattern
      });
    }
  });

</script>
@endpush

@endsection