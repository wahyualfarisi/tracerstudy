<h4>Edit Jadwal</h4>

<div class="containers">
    <div class="col-md-6">
        <form  id="form_edit_jadwal">
            <div class="form-group">
                <label for="tanggal_dimulai">Tanggal Di Mulai</label>
                <input 
                    type="date" 
                    class="form-control" 
                    id="tanggal_dimulai" 
                    aria-describedby="date" 
                    placeholder="Pilih Tanggal"
                    name="tanggal_dimulai"
                    required
                >
            </div>
            <div class="form-group">
                <label for="tanggal_selesai">Tanggal Selesai</label>
                <input 
                    type="date" 
                    class="form-control"
                    id="tanggal_selesai" 
                    placeholder="Pilih Tanggal"
                    name="tanggal_selesai"
                    required
                >
            </div>
          
            <button type="submit" class="btn btn-danger">UPDATE</button>
        </form>

    </div>
</div>

<script>
    $(function() {
        var id_jadwal = "{{ $id }}";
        JadwalPengisianController.edit(id_jadwal);
    })
</script>