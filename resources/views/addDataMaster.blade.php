<h4>Tambah</h4>

<div>
    <form id="form_pertanyaan">

        <div class="form-group">
            <label for="pertanyaan">Pertanyaan</label>
           <textarea name="pertanyaan" id="pertanyaan" class="form-control" cols="30" rows="10" required></textarea>
        </div>

        <h6>Jawaban</h6>

        <div class="jawaban_inputs">
            <div class="form-group">
                <input type="text" class="form-control" name="jawaban[0]" placeholder="Tulis jawaban"  required />
            </div>
        </div>
        
        <a href="javascript:void(0)" id="btn_tambah">+ Tambah Jawaban</a>

        <div class="action" style="display: flex; justify-content: flex-end">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

<script>
    $(function() {
        MasterPertanyaan.add()
    })
</script>