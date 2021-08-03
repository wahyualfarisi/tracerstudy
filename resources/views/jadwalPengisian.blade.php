<h4>Jadwal Pengisian Formulir</h4>

<div class="button-table mb-5">
    <a href="#/buat-jadwal" class="btn btn-danger">Buat Jadwal</a>
</div>
<div class="section section-data-tables">
    <div class="row">
  
        <div class="col s12 table" id="table_container">
            <div class="card">
                <div class="card-content">
                    <div class="row">
  
                        <div class="col s12">
                            <table id="t_jadwal" class="display nowrap" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal Di Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Tahun Kelulusan</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal Di Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Tahun Kelulusan</th>
                                        <th>Options</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
  
    </div>
  </div>

  <script>
      $(function() {
          JadwalPengisianController.data();
      })
  </script>
  