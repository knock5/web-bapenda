<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Detail Restaurant</title>

  {{-- CSS Bootstrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <div class="container py-2">
    <div class="row py-3 justify-content-center align-items-center border-bottom mb-3">
      <div class="col-6">
        <a href="/dashboard/restaurants" class="btn btn-warning">Kembali</a>
      </div>
      <div class="col-6">
        <h2 class="text-end">Detail Restaurant</h2>
      </div>
    </div>

    <div class="row py-2 justify-content-center">
      <div class="col-md-6">
        <table class="table table-bordered text-center">
          <tbody>
            <tr>
              <td class="table-info">Nama Restaurant</td>
              <td class="table-warning">{{ $restaurant->name }}</td>
            </tr>
            <tr>
              <td class="table-info">ID Pemilik</td>
              <td class="table-warning">{{ $restaurant->user_id }}</td>
            </tr>
            <tr>
              <td class="table-info">Email</td>
              <td class="table-warning">{{ $restaurant->email }}</td>
            </tr>
            <tr>
              <td class="table-info">Telepon</td>
              <td class="table-warning">{{ $restaurant->phone }}</td>
            </tr>
            <tr>
              <td class="table-info">Alamat</td>
              <td class="table-warning">{{ $restaurant->address }}</td>
            </tr>
            <tr>
              <td class="table-info">Jam Buka</td>
              <td class="table-warning">{{ $restaurant->opening_hours }}</td>
            </tr>
            <tr>
              <td class="table-info">Jam Tutup</td>
              <td class="table-warning">{{ $restaurant->closing_hours }}</td>
            </tr>
            <tr>
              <td class="table-info">Pendapatan</td>
              <td class="table-warning">Rp. {{ number_format($restaurant->revenue, 0, ',', '.') }}</td>
            </tr>
            <tr>
              <td class="table-info">Pajak(%)</td>
              <td class="table-warning">{{ $restaurant->tax_rate }}</td>
            </tr>
            <tr>
              <td class="table-info">ID Pajak</td>
              <td class="table-warning">{{ $restaurant->tax_id_number }}</td>
            </tr>
            <tr>
              <td class="table-info">Tanggal Jatuh Tempo</td>
              <td class="table-warning">{{ $restaurant->tax_due_date }}</td>
            </tr>
            <tr>
              <td class="table-info">Tanggal Pembayaran Terakhir</td>
              <td class="table-warning">{{ $restaurant->last_tax_payment }}</td>
            </tr>
            <tr>
              <td class="table-info">Status Pembayaran Pajak</td>
              <td class="table-warning">
                @if ($restaurant->is_tax_paid)
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

    @if ($user->id === $restaurant->user_id && $restaurant->is_tax_paid === 0)
      <div class="pt-2 pb-4 text-center">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentModal">Bayar Pajak</button>
      </div>
    @endif

    {{-- modal transaksi --}}
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="paymentModalLabel">Pembayaran Pajak</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('user.transaksi') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label for="transactionId" class="form-label">Transaksi ID</label>
                <input type="text" class="form-control" id="transactionId" name="transaction_number" readonly>
              </div>
              <div class="mb-3">
                <input type="text" class="form-control" id="restaurantId" name="restaurant_id" value="{{ $restaurant->restaurant_id }}" readonly hidden>
              </div>            
              <div class="mb-3">
                <input type="text" class="form-control" id="hotelId" name="hotel_id" readonly hidden>
              </div>            
              <div class="mb-3">
                <label for="paymentMethod" class="form-label">Metode Pembayaran</label>
                <select class="form-select" id="paymentMethod" name="payment_method" required>
                  <option value="" selected hidden>Pilih metode pembayaran</option>
                  <option value="BCA">BCA</option>
                  <option value="BNI">BNI</option>
                  <option value="BRI">BRI</option>
                  <option value="Mandiri">Mandiri</option>
                  <option value="DANA">DANA</option>
                  <option value="Gopay">Gopay</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="taxRate" class="form-label">Pajak (%)</label>
                <input type="text" class="form-control" id="taxRate" value="{{ $restaurant->tax_rate }}" readonly>
              </div>
              <div class="mb-3">
                <input type="text" class="form-control" id="revenue" value="{{ $restaurant->revenue }}" hidden readonly>
              </div>
              <div class="mb-3">
                <label for="ammount" class="form-label">Total Bayar Pajak (Rp)</label>
                <input type="text" class="form-control" id="totalTax" name="ammount" readonly>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Bayar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
  </div>

  {{-- JS Bootstrap --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  {{-- local JS --}}
  <script src="{{ asset('js/resto-transaksi.js') }}"></script>
</body>
</html>