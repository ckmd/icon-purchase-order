<div class="modal fade"  id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Tambah Stock</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form action="{{route('add-stock.store')}}" method="post">
      {{csrf_field()}}
        <div class="modal-body">

            <div class="form-group">
                <label for="sbu">Select list (select one):</label>
                <select name="nama_sbu" class="form-control" id="sbu">
                    <option selected>-- Pilih Region SBU --</option>
                @foreach($sbus as $r)
                    <option value="{{$r->nama_sbu}}">{{$r->nama_sbu}}</option>
                @endforeach
                </select>
            </div>

            <table class="table table-striped">
                <tr>
                    <th>No.</th>
                    <th>Nama Item</th>
                    <th>Harga_Unit</th>
                    <th>Jatah Awal</th>
                </tr>
                @foreach($items as $i)
                <tr>
                    <td>{{$i->id}}</td>
                    <td>{{$i->nama_item}}</td>
                    <td>{{number_format($i->unit_price).""}}</td>
                    <td><input type="text" class="form-control" name="{{$i->id}}"></td>
                </tr>
                @endforeach
            </table>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
