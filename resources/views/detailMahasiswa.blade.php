<h4>Detail Mahasiswa </h4>

<div class="row" style="margin-top: 3rem">
    <div class="col-md-2">
        <img src="{{ asset('assets/img/default_image.png') }}" width="100%" class="img-responsive preview_image" alt="default">
        
        
        <label class="custom-file-upload col-md-12">
            <input type="file" class="custome_upload" name="photo" />
            <i class="fa fa-cloud-upload"></i> Upload Foto
        </label>

    </div>
    <div class="col-md-10">
        <form class="form_login" id="form_login">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nim">Nim</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="nim"
                            name="nim"
                            required
                        >
                    </div>
                </div>
                <div class="col-md-6">
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
                </div>
                <div class="col-md-12">
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
                </div>
            </div>
           
            <div class="row">
                <div class="col-md-6">
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
                </div>
                <div class="col-md-6">
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
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
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
                </div>
                <div class="col-md-6">
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="email"
                            name="email"
                            required
                        >
                    </div>
                </div>
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
            <button class="btn btn-primary col-md-12" id="btn_konfirmasi" style="display: none">Konfirmasi</button>
           
        </form>




        <table class="table" id="table_pekerjaan" style="display: none">
            <thead>
                <tr>
                    <th>Nama Perusahaan</th>
                    <th>Pekerjaan</th>
                    <th>Tanggal Bekerja</th>
                    <th>Tanggal Selesai</th>
                </tr>
            </thead>
            <tbody id="list_pekerjaan"></tbody>
           
            
          </table>

          
    </div>
</div>
<script>
    var id_mahasiswa = "{{ $id }}";
    MahasiswaController.detail(id_mahasiswa);
</script>