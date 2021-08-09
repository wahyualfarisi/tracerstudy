<h4>Data User</h4>

<div class="button-table mb-5">
    <a href="#/users/add" class="btn btn-primary">Tambah User</a>
</div>
<div class="section section-data-tables">
    <div class="row">
  
        <div class="col s12 table" id="table_container">
            <div class="card">
                <div class="card-content">
                    <div class="row">
  
                        <div class="col s12">
                            <table id="t_user" class="display nowrap" width="100%">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>Nama Lengkap</th>
                                        <th>Akses</th>
                                        <th>Di buat tanggal</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Email</th>
                                        <th>Nama Lengkap</th>
                                        <th>Akses</th>
                                        <th>Di buat tanggal</th>
                                        <th>#</th>
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
      $( function() {
          UserController.data();
      })
  </script>