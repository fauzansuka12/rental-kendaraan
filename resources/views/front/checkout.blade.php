<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('front/css/output.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <!-- CSS -->
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
</head>
<body class="pt-10 text-black font-poppins">
    <div id="checkout-section" class="max-w-[1200px] mx-auto w-full min-h-[calc(100vh-40px)] flex flex-col gap-[30px] bg-[url('assets/background/Hero-Banner.png')] bg-center bg-no-repeat bg-cover rounded-t-[32px] overflow-hidden relative pb-6">
       
        <div class="flex gap-10 px-[100px] relative z-10">
           <form action="{{ route('storeCheckout', $mobil->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col w-full gap-5 p-5 bg-white rounded-2xl">
                @csrf
                <p class="text-lg font-bold">Pemesanan</p>

                <div class="flex flex-col gap-5">
                    <!-- Simpan harga mobil sebagai hidden input -->
                    <input type="hidden" name="mobil_id" value="{{ $mobil->id }}">
                    <input type="hidden" id="hargaMobil" value="{{ $mobil->harga }}">

                    <!-- Nama User -->
                    <div class="flex items-center justify-between">
                        <p class="text-[#475466]">Nama</p>
                        <input type="text" name="nama" value="{{ Auth::user()->name }}" readonly class="border p-2">
                    </div>

                    <!-- Telephone User -->
                    <div class="flex items-center justify-between">
                        <p class="text-[#475466]">telephone</p>
                        <input type="text" name="telephone" required class="border p-2" value="{{ Auth::user()->telephone }}" readonly>
                    </div>

                    <!-- Alamat User -->
                    <div class="flex items-center justify-between">
                        <p class="text-[#475466]">Alamat</p>
                        <input type="text" name="alamat" required class="border p-2">
                    </div>

                    <!-- Tanggal Pemesan -->
                    <div class="flex items-center justify-between">
                        <p class="text-[#475466]">Tanggal Pemesan</p>
                        <input type="date" name="tgl_pesan" required class="border p-2">
                    </div>

                    <!-- Lama Sewa -->
                    <div class="flex items-center justify-between">
                        <p class="text-[#475466]">Lama Sewa</p>
                        <input type="number" id="lama" name="lama" min="1" required class="border p-2" value="1">
                        <p class="font-semibold">/Hari</p>
                    </div>

                    <!-- Total Harga -->
                    <div class="flex items-center justify-between">
                        <p class="text-[#475466]">Total</p>
                        <p class="font-semibold"><span id="total">0</span></p>
                        <input type="hidden" id="totalInput" name="total" value="0">
                    </div>
                </div>
                <hr>
                <button type="submit" class="p-[20px_32px] bg-[#FF6129] text-white rounded-full text-center font-semibold transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980]">
                    Pesan Sekarang
                </button>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let hargaMobil = parseFloat(document.getElementById('hargaMobil').value);
            let inputLama = document.getElementById('lama');
            let totalSpan = document.getElementById('total');
            let totalInput = document.getElementById('totalInput');

            function updateTotal() {
                let lama = parseInt(inputLama.value) || 1;
                let totalHarga = hargaMobil * lama;
                
                // Format harga ke Rupiah
                totalSpan.innerText = totalHarga.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
                totalInput.value = totalHarga;
            }

            // Jalankan fungsi saat halaman dimuat dan ketika input berubah
            inputLama.addEventListener('input', updateTotal);
            updateTotal();
        });
    </script>
    <script src="{{ asset('front/js/main.js') }}"></script>

</body>
</html>
