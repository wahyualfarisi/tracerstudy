<h4>Data Master</h4>

<div class="button-table mb-5">
    <a href="#/data-master/add" class="btn btn-primary">Tambah Data</a>
</div>

<div class="section section-data-tables">
  <div class="row">

      <div class="col s12 table" id="table_container">
          <div class="card">
              <div class="card-content">
                  <div class="row">

                      <div class="col s12">
                          <table id="t_pertanyaan" class="display nowrap" width="100%">
                              <thead>
                                  <tr>
                                      <th>Pertanyaan</th>
                                  </tr>
                              </thead>
                              <tbody>
                              
                              </tbody>
                              <tfoot>
                                  <tr>
                                    <th>Pertanyaan</th>
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
    MasterPertanyaan.data();
  })
</script>