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
   Permintaan Pinjaman Dana Bulan <?php $monthNum = $month; $monthName = date("F", mktime(0, 0, 0, $monthNum, 10)); echo $monthName; //output: May?> {{$year}} (Dalam jutaan)
  </caption>
   <thead>
    <tr>
      <td rowspan="2" style="width: 5%;">SPK</td>
      <td rowspan="2" style="width: 10%;">Nama Proyek</td>
      <td rowspan="2" style="width: 5%;">Cash In</td>
      <td rowspan="2" style="width: 5%;">Cash Out</td>
      <td rowspan="2" style="width: 5%;">Posisi Surpl/ def Proyek Awal Bulan</td>
      <td colspan="3">Pembayaran Cash Di Proyek</td>
      <td colspan="3">Pembayaran Via Departemen dan Pusat</td>
      <td rowspan="2" style="width: 5%;">Surplus/Defisit Stlh Dropping</td>
      <td rowspan="2" style="width: 5%;">Keterangan</td>
    </tr>
    <tr>
      <td style="width: 5%;">Minggu 1/2</td>
      <td style="width: 5%;">Minggu 3/4</td>
      <td style="width: 5%;">Disetujui</td>
      <td style="width: 5%;">Konvensional</td>
      <td style="width: 5%;">Fasilitas Bank</td>
      <td style="width: 5%;">Disetujui</td>
    </tr>
    </thead>
    <tbody>
      <tr>
          <td colspan="13" align="left">Proyek</td>
        </tr>
        @foreach($loan as $data)
        <tr>
          <td>{{ $data->proyek->spk }}</td>
          <td>{{ $data->proyek->nm_proyek }}</td>
          <td>{{ number_format($data->cash_in) }}</td>
          <td>{{ number_format($data->cash_out) }}</td>
          <td>{{ number_format($data->cash_in - $data->cash_out) }}</td>
          <td>{{ number_format($data->cash_dwi1) }}</td>
          <td>{{ number_format($data->cash_dwi2) }}</td>
          <td>{{ number_format($data->accept_cashdwi) }}</td>
          <td>{{ number_format($data->cash_konvensional) }}</td>
          <td>{{ number_format($data->cash_bank) }}</td>
          <td>{{ number_format($data->accept_cashkon) }}</td>
          <td><?php $dataloan = $data->cash_in - $data->cash_out - $data->accept_cashdwi - $data->accept_cashkon;
            $dataTermin1 = Termin::where('proyek_id', '=', $data->proyek->id)
                            ->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
                            ->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
                            ->orWhere(function($query) use($month, $year, $data)
                            {
                              $query->where('proyek_id', '=', $data->proyek->id)
                                  ->where(DB::raw('MONTH(tgl_dwi2)'), '=', $month ) 
                                  ->where(DB::raw('YEAR(tgl_dwi2)'), '=', $year );
                              })
                        ->sum('cash_dwi1');
            $dataTermin2 = Termin::where('proyek_id', '=', $data->proyek->id)
                            ->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
                            ->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
                            ->orWhere(function($query) use($month, $year, $data)
                            {
                              $query->where('proyek_id', '=', $data->proyek->id)
                                  ->where(DB::raw('MONTH(tgl_dwi2)'), '=', $month ) 
                                  ->where(DB::raw('YEAR(tgl_dwi2)'), '=', $year );
                              })
                        ->sum('cash_dwi2');
                        echo number_format($dataloan + $dataTermin1 + $dataTermin2);
          ?></td>
          <td>{{ $data->ket }}</td>
        </tr>
        @endforeach
        @foreach($noLoan as $data)
        <tr>
          <td><font color="red">{{ $data->spk }}</font></td>
          <td><font color="red">{{ $data->nm_proyek }}</font></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        @endforeach
        <tr>
          <td colspan="2">Jumlah Proyek</td>
          <td>{{ number_format($cash_in) }}</td>
          <td>{{ number_format($cash_out) }}</td>
          <td>{{ number_format($cash_in - $cash_out) }}</td>
          <td>{{ number_format($cash_dwi1) }}</td>
          <td>{{ number_format($cash_dwi2) }}</td>
          <td>{{ number_format($accept_cashdwi) }}</td>
          <td>{{ number_format($cash_konvensional) }}</td>
          <td>{{ number_format($cash_bank) }}</td>
          <td>{{ number_format($accept_cashkon) }}</td>
          <td><?php $dataloan = $cash_in - $cash_out - $accept_cashdwi - $accept_cashkon;
            $dataTermin1 = Termin::whereIn('proyek_id', $loan_get)
                            ->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
                            ->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
                            ->orWhere(function($query) use($month, $year, $loan_get)
                            {
                              $query->whereIn('proyek_id', $loan_get)
                                  ->where(DB::raw('MONTH(tgl_dwi2)'), '=', $month ) 
                                  ->where(DB::raw('YEAR(tgl_dwi2)'), '=', $year );
                              })
                        ->sum('cash_dwi1');
            $dataTermin2 = Termin::whereIn('proyek_id', $loan_get)
                            ->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
                            ->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
                            ->orWhere(function($query) use($month, $year, $loan_get)
                            {
                              $query->whereIn('proyek_id', $loan_get)
                                  ->where(DB::raw('MONTH(tgl_dwi2)'), '=', $month ) 
                                  ->where(DB::raw('YEAR(tgl_dwi2)'), '=', $year );
                              })
                        ->sum('cash_dwi2');
                        echo number_format($dataloan + $dataTermin1 + $dataTermin2);
          ?></td>
          <td></td>
        </tr>
        <tr>
          <td colspan="13" align="left">Divisi</td>
        </tr>
        @foreach($loandiv as $data)
        <tr>
          <td>{{ $data->div->spk }}</td>
          <td>{{ $data->div->nm_divisi }}</td>
          <td>{{ number_format($data->cash_in) }}</td>
          <td>{{ number_format($data->cash_out) }}</td>
          <td>
            <?php 
            $dataSurplus = $cash_ind - $cash_outd;
            if ($dataSurplus < 0) {
              $strd = str_replace('-', '', ($dataSurplus));
              echo '('.number_format($strd).')';
            } else {
              echo number_format($dataSurplus);
            }
            ?>
          <td>{{ number_format($data->cash_dwi1) }}</td>
          <td>{{ number_format($data->cash_dwi2) }}</td>
          <td>-</td>
          <td>{{ number_format($data->cash_konvensional) }}</td>
          <td>{{ number_format($data->cash_bank) }}</td>
          <td>-</td>
          <td>
            <?php 
              $dataloand = $cash_ind - $cash_outd - $cash_dwi1d - $cash_dwi2d - $cash_konvensionald - $cash_bankd;
            if ($dataloand < 0) {
              $stra = str_replace('-', '', ($dataloand));
              echo '('.number_format($stra).')';
            } else {
              echo number_format($stra);
            }
            ?>
          </td>
          <td>{{ $data->ket }}</td>
        </tr>
        @endforeach
        <tr>
          <td colspan="2">Jumlah Divisi</td>
          <td>{{ number_format($cash_ind) }}</td>
          <td>{{ number_format($cash_outd) }}</td>
          <td>
            <?php 
            $dataSurplus = $cash_ind - $cash_outd;
            if ($dataSurplus < 0) {
              $strd = str_replace('-', '', ($dataSurplus));
              echo '('.number_format($strd).')';
            } else {
              echo number_format($dataSurplus);
            }
            ?>
          </td>
          <td>{{ number_format($cash_dwi1d) }}</td>
          <td>{{ number_format($cash_dwi2d) }}</td>
          <td>-</td>
          <td>{{ number_format($cash_konvensionald) }}</td>
          <td>{{ number_format($cash_bankd) }}</td>
          <td>-</td>
          <td>
            <?php 
              $dataloand = $cash_ind - $cash_outd - $cash_dwi1d - $cash_dwi2d - $cash_konvensionald - $cash_bankd;
            if ($dataloand < 0) {
              $strb = str_replace('-', '', ($dataloand));
              echo '('.number_format($strb).')';
            } else {
              echo number_format($strb);
            }
            ?>
          </td>
          <td></td>
        </tr>
        <tr>
          <td colspan="2">Total</td>
          <td>{{ number_format($cash_in + $cash_ind) }}</td>
          <td>{{ number_format($cash_out + $cash_outd) }}</td>
          <td>
            <?php 
            $datatotSurplus = $cash_in - $cash_out + $cash_ind - $cash_outd;
            if ($datatotSurplus < 0) {
              $strf = str_replace('-', '', ($datatotSurplus));
              echo '('.number_format($strf).')';
            } else {
              echo number_format($datatotSurplus);
            }
            ?>
          </td>
          <td>{{ number_format($cash_dwi1 + $cash_dwi1d) }}</td>
          <td>{{ number_format($cash_dwi2 + $cash_dwi2d) }}</td>
          <td>{{ number_format($accept_cashdwi) }}</td>
          <td>{{ number_format($cash_konvensional + $cash_konvensionald) }}</td>
          <td>{{ number_format($cash_bank + $cash_bankd) }}</td>
          <td>{{ number_format($accept_cashkon) }}</td>
          <td>
            <?php 
            $dataTot = $dataloand + $dataTermin1 + $dataTermin2 + $dataloan;
            if ($dataTot < 0) {
              $strc = str_replace('-', '', ($dataTot));
              echo '('.number_format($strc).')';
            } else {
              echo number_format($dataTot);
            }
            ?>
          </td>
          <td></td>
        </tr>
    </tbody>
  </table>
</body>
</html>
      