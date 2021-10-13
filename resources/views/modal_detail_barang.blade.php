<div class="row">
    <div class="col-lg-6">
        <table class="table">
            <tr>
                <td>
                    Sarana
                </td>
                <td>:</td>
                <td>{{ $barang->sarana }}</td>
            </tr>
            <tr>
                <td>
                    Aktiva
                </td>
                <td>:</td>
                <td>{{ $barang->aktiva }}</td>
            </tr>
            <tr>
                <td>
                    Serial Number
                </td>
                <td>:</td>
                <td>{{ $barang->sn }}</td>
            </tr>
            <tr>
                <td>
                    Keterangan
                </td>
                <td>:</td>
                <td>{{ $barang->keterangan }}</td>
            </tr>
        </table>
    </div>
    <div class="col-lg-6">
        <table class="table">
            <tr>
                <td>
                    Tanggal Kirim
                </td>
                <td>:</td>
                <td>{{ $barang->tanggal_kirim }}</td>
            </tr>
            <tr>
                <td>
                    Status Sarana
                </td>
                <td>:</td>
                <td><label class="bg-primary">{{ $barang->status_approved }} </label> </td>
            </tr>
            <tr>
                <td>
                    Tanggal Aproved
                </td>
                <td>:</td>
                <td>{{ $barang->tgl_approved }}</td>
            </tr>
            <tr>
                <td>
                    Nama Aprroved
                </td>
                <td>:</td>
                <td>{{ $barang->nama_approved }}</td>
            </tr>

        </table>
    </div>
</div>