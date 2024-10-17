@extends('templates.app')

@section('content-dinamis')
    <div class="container mt-5">
        <div class="d-flex justify-content-end flex-wrap mb-3">
            <!-- Form Search -->
            <form class="d-flex flex-wrap me-3 mb-2 mb-md-0" action="{{ route('data_buku.data') }}" method="GET" enctype="multipart/form-data">
                <input type="text" name="cari" placeholder="Cari Nama Buku..." class="form-control me-2 mb-2 mb-md-0">
                <button type="submit" class="btn btn-primary mb-2 mb-md-0">Cari</button>
            </form>
            <a href="{{ route('data_buku.tambah') }}" class="btn btn-success mb-2 mb-md-0">+ Tambah</a>
        </div>

        <!-- Alert jika ada pesan sukses -->
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <!-- Grid Buku -->
        <div class="row">
            @foreach ($bukus as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 d-flex justify-content-center">
                    <div class="card shadow-sm h-100" style="max-width: 250px;">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="card-img-top" style="height: 120px; object-fit: cover;">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="mt-3">Buku Berkualitas dari Perpustakaan Bintang</p>
                            <div class="d-flex justify-content-end flex-wrap">
                                <a href="{{ route('data_buku.ubah', $item->id) }}" class="btn btn-primary me-2 mb-2 w-100">Edit</a>
                                <a href="{{ route('peminjaman_buku.tambah', $item->id) }}" class="btn btn-warning me-2 mb-2 w-100">Pinjam Buku</a>
                                <button class="btn btn-danger w-100 mb-2" onclick="showModalDelete('{{ $item->id }}', '{{ $item->name }}')">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $bukus->links() }}
        </div>
    </div>

    <!-- Modal Hapus-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data buku <b id="nama_buku"></b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    function showModalDelete(id,name){
        // memasukkan teks dari parameter ke html bagian id="nama_buku"
        $('#nama_buku').text(name);
        // memanggil route hapus
        let url = "{{ route('data_buku.hapus', ':id') }}";
        // isi path dinamis :id dari data parameter id
        url = url.replace(':id', id);
        // action="" di form diisi dengan url diatas
        $("form").attr("action", url);
        // memunculkan modal dengan id="exampleModal"
        $('#exampleModal').modal('show');
    }
</script>
@endpush
