<h4>Formulir</h4>


<div class="row">
    <div class="col-md-12">
        <table class="table" id="formulirJadwal">
            <tr>
                <th style="background-color: #ccc; color: #000;">Tanggal Dimulai</th>
                <td class="tanggal_dimulai">-</td>
            </tr>
            <tr>
                <th style="background-color: #ccc; color: #000;">Tanggal Selesai</th>
                <td class="tanggal_selesai">-</td>
            </tr>
            <tr>
                <th style="background-color: #ccc; color: #000;">Tahun Kelulusan</th>
                <td class="tahun_kelulusan">-</td>
            </tr>
        </table>
        
    </div>
    <div class="col-md-12">
        <div class="pengisianFormulir"></div>
        <div class="formulir_action" style="margin-top: 1rem">
            <button class="btn btn-primary col-md-12" id="btn_submit_formulir" style="display: none">Submit Formulir</button>
        </div>
    </div>
</div>


<script>
    $(function() {
        MahasiswaController.pengisian();
    })
</script>