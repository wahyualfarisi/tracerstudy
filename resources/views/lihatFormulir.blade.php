<h4>Formulir Tracer Study</h4>

<div class="row">
    <div class="col-md-12">
        <table class="table" id="formulirJadwal">
            <tr>
                <th>Tanggal Dimulai</th>
                <td class="tanggal_dimulai">-</td>
            </tr>
            <tr>
                <th>Tanggal Selesai</th>
                <td class="tanggal_selesai">-</td>
            </tr>
            <tr>
                <th>Tahun Kelulusan</th>
                <td class="tahun_kelulusan">-</td>
            </tr>
            
        </table>
        <div class="formulir_action">
            <button class="btn btn-primary col-md-12" id="btn_submit_formulir" style="display: none">Submit Formulir</button>
        </div>
    </div>
    <div class="col-md-12">
        <div class="pengisianFormulir"></div>
    </div>
</div>


<script>
    $(function() {
        var ID = "{{ $id }}"
        MahasiswaController.pengisian(ID);
    })
</script>