<h4>Tambah User</h4>

<div class="containers">
    <div class="col-md-6">
        <form  id="form_user">
            <div class="form-group">
                <label for="email">Email</label>
                <input 
                    type="email" 
                    class="form-control" 
                    id="email" 
                    aria-describedby="date" 
                    placeholder="Masukan Email"
                    name="email"
                    required
                >
            </div>
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input 
                    type="text" 
                    class="form-control"
                    id="nama_lengkap" 
                    placeholder="Masukan nama lengkap"
                    name="nama_lengkap"
                    required
                >
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input 
                    type="text" 
                    class="form-control"
                    id="password" 
                    placeholder="Masukan Password"
                    name="password"
                    required
                >
            </div>
            <div class="form-group">
                <label for="akses">Akses</label>
                <select name="level" id="level" class="form-control" required>
                    <option value=""> -- Pilih Akses -- </option>
                    <option value="TU">TU</option>
                    <option value="SBK">Seksi Bidang Kemahasiswaan</option>
                </select>
            </div>
          
            <button type="submit" class="btn btn-danger">Submit</button>
        </form>

    </div>
</div>


<script>
    $( function() {
        UserController.add();
    })
</script>