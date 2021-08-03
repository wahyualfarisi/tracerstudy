<h4>Data Mahasiswa</h4>

  <div class="section section-data-tables">
      <div class="row">

          <div class="col s12 table" id="table_container">
              <div class="card">
                  <div class="card-content">
                      <div class="row">

                          <div class="col s12">
                              <table id="t_mahasiswa" class="display nowrap" width="100%">
                                  <thead>
                                      <tr>
                                          <th>Nama</th>
                                          <th>Nim</th>
                                          <th>Tahun Lulus</th>
                                          <th>Prodi</th>
                                          <th>Email</th>
                                          <th>Options</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                        <th>Nama</th>
                                        <th>Nim</th>
                                        <th>Tahun Lulus</th>
                                        <th>Prodi</th>
                                        <th>Email</th>
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
      MahasiswaController.data();
    })
  </script>