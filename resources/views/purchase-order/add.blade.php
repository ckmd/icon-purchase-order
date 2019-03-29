<div class="modal fade"  id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Tambah Purchase Order</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form action="{{route('purchase-order.store')}}" method="post">
      {{csrf_field()}}
        <div class="modal-body">

            <div class="form-group">
                <label for="sbu">Select list (select one):</label>
                <select name="nama_sbu" class="form-control" id="sbu" required>
                    <option value="" selected>-- Pilih Region SBU --</option>
                @foreach($sbus as $r)
                    <option value="{{$r->nama_sbu}}">{{$r->nama_sbu}}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="number">Purchase Order Number</label>
                <input type="text" class="form-control" name="po_number" id="number" required>
            </div>

            <div class="form-group">
                <label for="project">Nama Project (optional)</label>
                <input type="text" class="form-control" name="project_name" id="project">
            </div>

            <div class="form-group">
                <label for="reservasi">No Reservasi FSM</label>
                <input type="text" class="form-control" name="no_reservasi" id="reservasi" required>
            </div>

            <div class="form-group">
                <label for="date">Tanggal Purchase Order</label>
                <input type="date" class="form-control" name="po_date" id="date" required>
            </div>

            <table class="table table-striped">
                <tr>
                    <th>No.</th>
                    <th>Nama Item</th>
                    <th>Harga_Unit</th>
                    <th>Quantity</th>
                </tr>
                @foreach($items as $i)
                <tr>
                    <td>{{$i->id}}</td>
                    <td>{{$i->nama_item}}</td>
                    <td>{{number_format($i->unit_price).""}}</td>
                    <td><input type="text" class="form-control" name="{{$i->id}}" required></td>
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
