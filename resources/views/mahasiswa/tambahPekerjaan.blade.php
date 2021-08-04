<h4>Tambah Pekerjaan</h4>

<div class="containers">
    <div class="col-md-6">
        <form id="form_pekerjaan">
            <div class="form-group">
                <label for="nama_perusahaan">Nama Perusahaan</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="nama_perusahaan" 
                    aria-describedby="date" 
                    placeholder="Nama perusahaan"
                    name="nama_perusahaan"
                    required
                >
            </div>
            <div class="form-group">
                <label for="pekerjaan">Pekerjaan</label>
                <input 
                    type="text" 
                    class="form-control"
                    id="pekerjaan" 
                    placeholder="Pekerjaan ex: programmer"
                    name="pekerjaan"
                    required
                >
            </div>
            <div class="form-group">
                <label for="tanggal_bekerja">Tanggal Bekerja</label>
                <input 
                    type="date" 
                    class="form-control"
                    id="tanggal_bekerja" 
                    placeholder="Pilih tanggal"
                    name="tanggal_bekerja"
                    required
                >
            </div>

            <div class="form-check" style="display: flex;">
                <input class="form-check-input" type="checkbox" id="isCurrent">
                <label class="form-check-label" for="isCurrent">
                  Sampai Sekarang
                </label>
              </div>

            <div class="form-group" id="field_tanggal_selesai">
                <label for="tanggal_selesai">Tanggal Selesai</label>
                <input 
                    type="date" 
                    class="form-control"
                    id="tanggal_selesai" 
                    placeholder="Pilih tanggal"
                    name="tanggal_selesai"
                >
            </div>
          
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>

<script>
    $(function() {
        MahasiswaController.addPekerjaan();
    });
</script>