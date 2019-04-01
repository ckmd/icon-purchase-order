<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Tambah Item Baru</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form action="{{route('item.store')}}" method="post">
      {{csrf_field()}}
        <div class="modal-body">
            <div class="form-group">
                <label for="nama_item">Nama Item</label>
                <input type="text" class="form-control" name="nama_item" id="nama_item" required>
            </div>

            <div class="form-group">
                <label for="unit_price">Unit Price</label>
                <input type="text" class="form-control" name="unit_price" id="unit_price" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>