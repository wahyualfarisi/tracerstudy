<h4>Laporan</h4>

<div class="containers">
    <div class="col-md-6">
        <form id="form_laporan">
            <div class="form-group">
                <label for="tahun_kelulusan">Pilih Tahun Kelulusan</label>
                <select name="tahun_kelulusan" id="tahun_kelulusan" class="form-control" required>
                    <option value=""></option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                </select>
            </div>
          
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>

<script>
    $( function() {
        LaporanControllor.form();
    })
</script>
