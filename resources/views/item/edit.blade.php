<div class="modal fade"  id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form action="{{route('item.update', 'test')}}" method="post">
      {{method_field('patch')}}
      {{csrf_field()}}
        <div class="modal-body">
            <table class="table table-striped">
                <tr>
                    <th>Nama Item</th>
                    <th>Harga Unit</th>
                </tr>
                <tr>
                    <input type="hidden" class="form-control" name="id" id="itemid">
                    <td><input type="text" class="form-control" id="namaitem" name="nama_item"></td>
                    <td><input type="text" class="form-control" id="unitprice" name="unit_price"></td>
                </tr>
            </table>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>
