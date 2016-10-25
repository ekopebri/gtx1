<html>
<head>
  <style type="text/css">
    table{
      text-align: center;
      vertical-align: middle;
      border: 1px solid black;
      font-size: 10;
      max-width: 842px;
    }

    body {
      padding: 1em;
    }
    table>thead>tr {
      font-weight: bold;
    }
    table>caption {
      font-size: 16px;
    }
  </style>
</head>
<body>
<table cellpadding="5" cellspacing="0" border="1">
  <caption>
   Penerimaan Termin Bulan <?php $monthNum = $month; $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
                  echo $monthName; //output: May
                ?> {{$year}} (Dalam jutaan)
  </caption>
   <thead>
    <tr>
      <td style="width: 10%;">SPK</td>
      <td style="width: 20%;">Nama Proyek</td>
      <td style="width: 15%;">Dwi Ming 1/2</td>
      <td style="width: 15%;">Dwi Ming 3/4</td>
      <td style="width: 15%;">Ri</td>
      <td style="width: 15%;">Belum Cair</td>
      <td style="width: 10%;">Keterangan</td>
    </tr>
    </thead>
    <tbody>
      @foreach($termin as $data)
      <tr>
        <td>{{ $data->proyek->spk }}</td>
        <td>{{ $data->proyek->nm_proyek }}</td>
        <td>{{ number_format($data->cash_dwi1) }}</td>
        <td>{{ number_format($data->cash_dwi2) }}</td>
        <td>{{ number_format($data->realisasi) }}</td>
        <td>{{ number_format($data->cash_dwi1 + $data->cash_dwi2 - $data->realisasi) }}</td>
        <td>{{ $data->ket }}</td>
      </tr>
      @endforeach
      @foreach($noTermin as $data)
      <tr color="red">
        <td><font color="red">{{ $data->spk }}</font></td>
        <td><font color="red">{{ $data->nm_proyek }}</font></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      @endforeach
      <tr>
        <td colspan="2">Total Termin Konsolidasi</td>
        <td>{{ number_format($cash_dwi1) }}</td>
        <td>{{ number_format($cash_dwi2) }}</td>
        <td>{{ number_format($realisasi) }}</td>
        <td>{{ number_format($cash_dwi1 + $cash_dwi2 - $realisasi) }}</td>
        <td></td>
      </tr>
    </tbody>
  </table>
</body>
</html>