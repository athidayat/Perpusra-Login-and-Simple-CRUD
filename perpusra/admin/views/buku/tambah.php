<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=buku&page=save" method="POST">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Judul Buku</label>
            <input type="text" name="judul" required value="<?=(isset($_POST['judul']))?$_POST['judul']:'';?>" class="form-control">
            <input type="hidden" name="id_buku"  value="<?=(isset($_POST['id_buku']))?$_POST['id_buku']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['judul']))?$err['judul']:'';?></span>
        </div>
        <div class="form-group">
        <label for="">Penulis</label>
            <input type="text" name="penulis" value="<?=(isset($_POST['penulis']))?$_POST['penulis']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['penulis']))?$err['penulis']:'';?></span>
        </div>
        <div class="form-group">
        <label for="">Penerbit</label>
            <input type="text" name="penerbit" value="<?=(isset($_POST['penerbit']))?$_POST['penerbit']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['penerbit']))?$err['penerbit']:'';?></span>
        </div>
       
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="">Tanggal</label>
            <input type="text" name="tgl" value="<?=(isset($_POST['tgl']))?$_POST['tgl']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['tgl']))?$err['tgl']:'';?></span>
        </div>
        <div class="form-group">
        <label for="">File</label>
            <input type="text" name="file_buku" value="<?=(isset($_POST['file_buku']))?$_POST['file_buku']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['file_buku']))?$err['file_buku']:'';?></span>     
        </div>
    
    </div>
    <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
    </div>
    </div>
</form>