<div class="modal fade"  id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Edit Report</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form action="{{route('report.update', 'test')}}" method="post">
      {{method_field('patch')}}
      {{csrf_field()}}
        <div class="modal-body">
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Region SBU</th>
                    <th>Nama Item</th>
                    <th>Jatah Awal</th>
                </tr>
                <tr>
                    <td><input type="hidden" class="form-control" name="id" id="reportid"><input class="form-control" id="reportid" disabled></td>
                    <td><input type="hidden" class="form-control" name="nama_sbu" id="namasbu"><input class="form-control" id="namasbu" disabled></td>
                    <td><input type="hidden" class="form-control" name="id_item" id="namaitem"><input class="form-control" id="namaitem" disabled></td>
                    <td><input type="text" class="form-control" id="jatahawal" name="jatah_awal"></td>
                </tr>
            </table>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>
