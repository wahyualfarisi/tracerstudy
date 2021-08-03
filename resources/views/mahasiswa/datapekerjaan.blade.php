<h4>Data Pekerjaan</h4>


<div class="button-table mb-5">
    <a href="#/tambah-pekerjaan" class="btn btn-danger">Tambah Pekerjaan</a>
</div>
<div class="section section-data-tables">
    <div class="row">
  
        <div class="col s12 table" id="table_container">
            <div class="card">
                <div class="card-content">
                    <div class="row">
  
                        <div class="col s12">
                            <table id="t_pekerjaan" class="display nowrap" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nama Perusahaan</th>
                                        <th>Jabatan</th>
                                        <th>Tanggal bekerja</th>
                                        <th>Tanggal selesai</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama Perusahaan</th>
                                        <th>Jabatan</th>
                                        <th>Tanggal bekerja</th>
                                        <th>Tanggal selesai</th>
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
          MahasiswaController.listPekerjaan();
      })
  </script>