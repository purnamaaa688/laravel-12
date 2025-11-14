@extends('layout')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">
        <h5 class="card-header">Mata Pelajaran</h5>
        <div class="card-body">

            <div class="mb-3">
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#tambahMapelModal">
                    Tambah Mapel
                </button>
            </div>

            <table class="table table-striped" id="table-mapel">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>ID</th>
                        <th>Nama Mapel</th>
                        <th>Kode Mapel</th>
                        <th>Jam Pelajaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mapel as $item)
                    <tr id="row-{{ $item->id }}">
                        <td>
                            <button class="btn btn-sm btn-primary btn-edit me-2"
                                data-id="{{ $item->id }}"
                                data-namamapel="{{ $item->nama_mapel }}"
                                data-kodemapel="{{ $item->kode_mapel }}"
                                data-jampelajaran="{{ $item->jam_pelajaran }}"
                                data-bs-toggle="modal" data-bs-target="#editMapelModal">
                                Edit
                            </button>
                            <button class="btn btn-sm btn-danger btn-delete"
                                data-id="{{ $item->id }}"
                                data-namamapel="{{ $item->nama_mapel }}">
                                Hapus
                            </button>
                        </td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_mapel }}</td>
                        <td>{{ $item->kode_mapel }}</td>
                        <td>{{ $item->jam_pelajaran }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahMapelModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-tambah-mapel">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Mata Pelajaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nama Mapel</label>
                        <input type="text" class="form-control" name="namamapel" required>
                    </div>
                    <div class="mb-3">
                        <label>Kode Mapel</label>
                        <input type="text" class="form-control" name="kodemapel" required>
                    </div>
                    <div class="mb-3">
                        <label>Jam Pelajaran</label>
                        <input type="number" class="form-control" name="jampelajaran" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editMapelModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-edit-mapel">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Mata Pelajaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit-id">
                    <div class="mb-3">
                        <label>Nama Mapel</label>
                        <input type="text" class="form-control" id="edit-namamapel" name="namamapel" required>
                    </div>
                    <div class="mb-3">
                        <label>Kode Mapel</label>
                        <input type="text" class="form-control" id="edit-kodemapel" name="kodemapel" required>
                    </div>
                    <div class="mb-3">
                        <label>Jam Pelajaran</label>
                        <input type="number" class="form-control" id="edit-jampelajaran" name="jampelajaran" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const tableBody = document.querySelector('#table-mapel tbody');

    // Tambah Mapel
    document.getElementById('form-tambah-mapel').addEventListener('submit', async function(e){
        e.preventDefault();
        const formData = new FormData(this);
        const res = await fetch("{{ route('mapel.store') }}", {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': csrfToken },
            body: formData
        });
        const data = await res.json();
        if(data.success){
            // Tambah row ke tabel
            const newRow = document.createElement('tr');
            newRow.id = 'row-' + data.mapel.id;
            newRow.innerHTML = `
                <td>
                    <button class="btn btn-sm btn-primary btn-edit me-2"
                        data-id="${data.mapel.id}"
                        data-namamapel="${data.mapel.namamapel}"
                        data-kodemapel="${data.mapel.kodemapel}"
                        data-jampelajaran="${data.mapel.jampelajaran}"
                        data-bs-toggle="modal" data-bs-target="#editMapelModal">Edit</button>
                    <button class="btn btn-sm btn-danger btn-delete"
                        data-id="${data.mapel.id}" data-namamapel="${data.mapel.namamapel}">Hapus</button>
                </td>
                <td>${data.mapel.id}</td>
                <td>${data.mapel.namamapel}</td>
                <td>${data.mapel.kodemapel}</td>
                <td>${data.mapel.jampelajaran}</td>
            `;
            tableBody.appendChild(newRow);
            this.reset();
            var modal = bootstrap.Modal.getInstance(document.getElementById('tambahMapelModal'));
            modal.hide();
            attachEventListeners(); // attach edit/delete event
        }
    });

    // Edit Mapel
    function attachEventListeners(){
        document.querySelectorAll('.btn-edit').forEach(btn => {
            btn.onclick = function(){
                document.getElementById('edit-id').value = this.dataset.id;
                document.getElementById('edit-namamapel').value = this.dataset.namamapel;
                document.getElementById('edit-kodemapel').value = this.dataset.kodemapel;
                document.getElementById('edit-jampelajaran').value = this.dataset.jampelajaran;
            };
        });

        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.onclick = async function(){
                if(!confirm(`Yakin ingin menghapus mapel ${this.dataset.namamapel}?`)) return;
                const id = this.dataset.id;
                const res = await fetch('/mapel/' + id, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'X-HTTP-Method-Override': 'DELETE'
                    }
                });
                const data = await res.json();
                if(data.success){
                    document.getElementById('row-' + id).remove();
                }
            };
        });
    }

    attachEventListeners();

    document.getElementById('form-edit-mapel').addEventListener('submit', async function(e){
        e.preventDefault();
        const id = document.getElementById('edit-id').value;
        const formData = new FormData(this);
        const res = await fetch('/mapel/' + id, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'X-HTTP-Method-Override': 'PUT'
            },
            body: formData
        });
        const data = await res.json();
        if(data.success){
            const row = document.getElementById('row-' + id);
            row.children[1].textContent = data.mapel.id;
            row.children[2].textContent = data.mapel.namamapel;
            row.children[3].textContent = data.mapel.kodemapel;
            row.children[4].textContent = data.mapel.jampelajaran;

            // Update data attributes untuk tombol
            const editBtn = row.querySelector('.btn-edit');
            editBtn.dataset.namamapel = data.mapel.namamapel;
            editBtn.dataset.kodemapel = data.mapel.kodemapel;
            editBtn.dataset.jampelajaran = data.mapel.jampelajaran;

            var modal = bootstrap.Modal.getInstance(document.getElementById('editMapelModal'));
            modal.hide();
        }
    });

});
</script>
@endpush
@endsection
