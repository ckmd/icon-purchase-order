<div class="modal fade"  id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Hapus Item</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form action="{{route('item.destroy', 'test')}}" method="post">
      {{method_field('delete')}}
      {{csrf_field()}}
        <div class="modal-body">
            <p class="text-center">Apakah anda yakin akan menghapus Item ?</p>
            <input type="hidden" class="form-control" name="id" id="itemid">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>
