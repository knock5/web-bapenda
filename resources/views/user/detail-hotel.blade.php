<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Detail Hotel</title>

  {{-- CSS Bootstrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <div class="container py-2">
    <div class="row py-3 justify-content-center align-items-center border-bottom mb-3">
      <div class="col-6">
        <a href="/dashboard/hotels" class="btn btn-warning">Kembali</a>
      </div>
      <div class="col-6">
        <h2 class="text-end">Detail Hotel</h2>
      </div>
    </div>

    <div class="row py-2 justify-content-center">
      <div class="col-md-6">
        <table class="table table-bordered text-center">
          <tbody>
            <tr>
              <td class="table-info">Nama Hotel</td>
              <td class="table-warning">{{ $hotel->name }}</td>
            </tr>
            <tr>
              <td class="table-info">ID Pemilik</td>
              <td class="table-warning">{{ $hotel->user_id }}</td>
            </tr>
            <tr>
              <td class="table-info">Email</td>
              <td class="table-warning">{{ $hotel->email }}</td>
            </tr>
            <tr>
              <td class="table-info">Telepon</td>
              <td class="table-warning">{{ $hotel->phone }}</td>
            </tr>
            <tr>
              <td class="table-info">Alamat</td>
              <td class="table-warning">{{ $hotel->address }}</td>
            </tr>
            <tr>
              <td class="table-info">Rating</td>
              <td class="table-warning">{{ $hotel->rating }}</td>
            </tr>
            <tr>
              <td class="table-info">Fasilitas</td>
              <td class="table-warning">{{ $hotel->amenities }}</td>
            </tr>
            <tr>
              <td class="table-info">Pendapatan</td>
              <td class="table-warning">Rp. {{ number_format($hotel->revenue, 0, ',', '.') }}</td>
            </tr>
            <tr>
              <td class="table-info">Pajak(%)</td>
              <td class="table-warning">{{ $hotel->tax_rate }}</td>
            </tr>
            <tr>
              <td class="table-info">ID Pajak</td>
              <td class="table-warning">{{ $hotel->tax_id_number }}</td>
            </tr>
            <tr>
              <td class="table-info">Tanggal Jatuh Tempo</td>
              <td class="table-warning">{{ $hotel->tax_due_date }}</td>
            </tr>
            <tr>
              <td class="table-info">Tanggal Pembayaran Terakhir</td>
              <td class="table-warning">{{ $hotel->last_tax_payment }}</td>
            </tr>
            <tr>
              <td class="table-info">Status Pembayaran Pajak</td>
              <td class="table-warning">
                @if ($hotel->is_tax_paid)
                  <span class="badge bg-success">Lunas</span>
                @else
                  <span class="badge bg-danger">Belum Lunas</span>
                @endif
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    @if ($user->id === $hotel->user_id && $hotel->is_tax_paid === 0)
      <div class="py-2">
        <button class="btn btn-primary">Bayar Pajak</button>
      </div>
    @endif
  </div>

  {{-- JS Bootstrap --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>