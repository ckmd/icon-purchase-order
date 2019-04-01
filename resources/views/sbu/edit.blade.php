<div class="modal fade"  id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Edit Region SBU</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form action="{{route('sbu.update', 'test')}}" method="post">
      {{method_field('patch')}}
      {{csrf_field()}}
        <div class="modal-body">
            <table class="table table-striped">
                <tr>
                    <th>Nama Region SBU</th>
                </tr>
                <tr>
                    <input type="hidden" class="form-control" name="id" id="sbuid">
                    <td><input type="text" class="form-control" id="namasbu" name="nama_sbu" required></td>
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