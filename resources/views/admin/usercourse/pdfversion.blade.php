<!DOCTYPE html>
<html>
<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<style type="text/css">
    table tr td,
    table tr th{
        font-size: 9pt;
    }
</style>
<center>
    <h4>Laporan Pembelian</h4>
        {{--<h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a></h5>--}}
</center>

<table class='table table-bordered'>
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kursus</th>
        <th>Harga</th>
        <th>Tanggal</th>
        <th>Oleh</th>
    </tr>
    </thead>
    <tbody>
    @php $i=1 @endphp
    @forelse($r as $p)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{$p->name}}</td>
            <td>{{$p->course}}</td>
            <td>Rp. {{number_format($p->total_price)}}</td>
            <td>{{date('j-F-Y', strtotime($p->payments_date))}}</td>
            <td>{{$p->approved_by}}</td>
        </tr>
    @empty
        <tr>
            <td colspan="9">
                <div class="card-body">
                    <h3 style="text-align: center">Tidak Ada Data</h3>
                </div>
            </td>
        </tr>
    @endforelse
    </tbody>
</table>

</body>
</html>