<h4>Data Diri</h4>

<div class="row">
    <div class="col-md-3">
        <img src="{{ asset('assets/img/default_image.png') }}" class="img-responsive" alt="default">
    </div>
    <div class="col-md-9">
        <form class="form_login" id="form_login">
            <div class="form-group">
                <label for="nim">Nim</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="nim"
                    name="email"
                    required
                >
            </div>
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="nama_lengkap"
                    name="nama_lengkap"
                    required
                >
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="alamat"
                    name="alamat"
                    required
                >
            </div>
            <div class="form-group">
                <label for="no_telepon">Nomor Telepon</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="no_telepon"
                    name="no_telepon"
                    required
                >
            </div>
            <div class="form-group">
                <label for="prodi">Prodi</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="prodi"
                    name="prodi"
                    required
                >
            </div>
            <div class="form-group">
                <label for="judul_skripsi">Judul Skripsi</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="judul_skripsi"
                    name="judul_skripsi"
                    required
                >
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="dospem_1">Dosen Pembimbing 1</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="dospem_1"
                            name="dospem_1"
                            required
                        >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="dospem_2">Dosen Pembimbing 2</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="dospem_2"
                            name="dospem_2"
                            required
                        >
                    </div>
                </div>
            </div>
           
            <button type="submit" class="btn btn-danger">Update</button>
        </form>
    </div>
</div>