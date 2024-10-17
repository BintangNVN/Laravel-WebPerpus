@extends('templates.app')

@section('content-dinamis')
    <div class="container mt-5">
        <div class="d-flex justify-content-end flex-wrap">
            {{-- Form pencarian --}}
            <form class="d-flex flex-wrap me-3 mb-2 mb-md-0" action="{{ route('peminjaman_buku.data') }}" method="GET">
                <input type="text" name="cari" placeholder="Cari Nama Pengguna..." class="form-control me-2 mb-2 mb-md-0">
                <button type="submit" class="btn btn-primary mb-2 mb-md-0">Cari</button>
            </form>
            {{-- Tombol tambah data --}}
            <a href="{{ route('peminjaman_buku.tambah')}}" class="btn btn-success mb-2 mb-md-0">+ Tambah</a>
        </div>
        
        {{-- Pesan sukses --}}
        @if(Session::get('success'))
            <div class="alert alert-success mt-3">
                {{ Session::get('success') }}
            </div>
        @endif

        {{-- Tabel responsif --}}
        <div class="table-responsive mt-3">
            <table class="table table-stripped table-bordered text-center">
                <thead>
                    <th>#</th>
                    <th>Nama Peminjam</th>
                    <th>Email</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($pinjams as $index => $item)
                        <tr>
                            <td>{{ ($pinjams->currentPage()-1) * ($pinjams->perPage()) + ($index+1) }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('peminjaman_buku.ubah', $item->id) }}" class="btn btn-primary me-2">Edit</a>
                                <button class="btn btn-danger" onclick="showModalDelete('{{ $item->id }}', '{{ $item->name }}')">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                    @if ($pinjams->isEmpty())
                        <tr>
                            <td colspan="6">Data Peminjaman tidak tersedia</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-end my-3">
            {{ $pinjams->links() }}
        </div>
       
        {{-- Modal Hapus --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="">
                    <div class="modal-header">
                        @csrf
                        @method('DELETE')
                        <h1 class="modal-title fs-5" id="exampleModalLabel">HAPUS DATA PEMINJAMAN</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda Yakin Ingin Menghapus Data Peminjaman <b id="nama_obat"></b>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function showModalDelete(id, name){
            $('#nama_obat').text(name);
            let url = "{{ route('peminjaman_buku.hapus', ':id') }}";
            url = url.replace(':id', id);
            $("form").attr("action", url);
            $('#exampleModal').modal('show');
        }
    </script>
@endpush
