<?php

use App\DetailKasus;
use Illuminate\Database\Seeder;
use App\Fitur;
use App\Kasus;

class FiturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fiturs = [
            [
                "nama_fitur"=> "Ada tampilan konten di LCD ketika di berikan cahaya (senter)",
                "kode_fitur"=> "F0001"
            ],
            [
                "nama_fitur"=> "Ketika dihubungkan dengan Flashdisk yang memiliki lampu indikator, indikator di Flashdisk tersebut menyala",
                "kode_fitur"=> "F0002"
            ],
            [
                "nama_fitur"=> "Ketika dihubungkan dengan Monitor, monitor merefleksikan tampilan dari layar laptop",
                "kode_fitur"=> "F0003"
            ],
            [
                "nama_fitur"=> "Tidak ada tampilan konten di LCD ketika di berikan cahaya (senter)",
                "kode_fitur"=> "F0004"
            ],
            [
                "nama_fitur"=> "Ketika dihubungkan dengan flashdisk yang memiliki lampu indikator, indikator di Flashdisk tersebut hanya berkedip/menyala 1x",
                "kode_fitur"=> "F0005"
            ],
            [
                "nama_fitur"=> "Ketika dihubungkan dengan Monitor, monitor tidak merefleksikan tampilan dari layar laptop",
                "kode_fitur"=> "F0006"
            ],
            [
                "nama_fitur"=> "Saat dilepas dari Mainboard memory RAM mengalami panas berlebih (over heat)",
                "kode_fitur"=> "F0007"
            ],
            [
                "nama_fitur"=> "Memory RAM tidak terasa panas (over heat)",
                "kode_fitur"=> "F0008"
            ],
            [
                "nama_fitur"=> "Ganti Memory RAM tidak tampil",
                "kode_fitur"=> "F0009"
            ],
            [
                "nama_fitur"=> "Terdengar bunyi beep yang berulang ketika laptop dihidupkan dan akan berhenti ketika salah satu keyboard ditekan (w7)",
                "kode_fitur"=> "F0010"
            ],
            [
                "nama_fitur"=> "Windows 10 atau 8 tidak loading hingga salah satu keyboard tidak ditekan",
                "kode_fitur"=> "F0011"
            ],
            [
                "nama_fitur"=> "Terdapat menu konfigurasi windows (windows 7) ketika laptop dihidupkan",
                "kode_fitur"=> "F0012"
            ],
            [
                "nama_fitur"=> "Ada huruf yang terus tertekan(berfungsi tanpa ditekan) ketika laptop dioperasikan lebih lama",
                "kode_fitur"=> "F0013"
            ],
            [
                "nama_fitur"=> "Touchpad (kursor) tidak bisa digerakkan",
                "kode_fitur"=> "F0014"
            ],
            [
                "nama_fitur"=> "Lebih dari 3 huruf tidak berfungsi",
                "kode_fitur"=> "F0015"
            ],
            [
                "nama_fitur"=> "tombol/key tidak bisa kembali ke posisi semula setelah ditekan",
                "kode_fitur"=> "F0016"
            ],
            [
                "nama_fitur"=> "Tuts/key terlepas (kaki penyangga patah)",
                "kode_fitur"=> "F0017"
            ],
            [
                "nama_fitur"=> "Tampilan LCD abnormal color ketika LCD Cover digerakkan / ditekan",
                "kode_fitur"=> "F0018"
            ],
            [
                "nama_fitur"=> "LCD harus berada diposisi yang tepat hingga bisa menampilkan konten dengan normal",
                "kode_fitur"=> "F0019"
            ],
            [
                "nama_fitur"=> "LCD too dark (tidak ada cahaya dari lcd, namun tampilan konten yang ditampilkan masih bisa dilihat jika diberikan cahaya (disenter)",
                "kode_fitur"=> "F0020"
            ],
            [
                "nama_fitur"=> "LCD Cable terputus/sobek",
                "kode_fitur"=> "F0021"
            ],
            [
                "nama_fitur"=> "Webcam tidak berfungsi",
                "kode_fitur"=> "F0022"
            ],
            [
                "nama_fitur"=> "Microphone tidak berfungsi",
                "kode_fitur"=> "F0023"
            ],
            [
                "nama_fitur"=> "No Power (tidak ada indikasi sama sekali pada lampu indicator laptop, meski sudah menggunakan charger)",
                "kode_fitur"=> "F0024"
            ],
            [
                "nama_fitur"=> "Short (tegangan arus pendek) jika dihubungkan dengan charger laptop yang memiliki lampu indikator, maka lampu indikator tersebut akan langsung mati",
                "kode_fitur"=> "F0025"
            ],
            [
                "nama_fitur"=> "No Display (tidak ada tampilan sama sekali pada lcd meski sudah melakukan penggantian memory RAM)",
                "kode_fitur"=> "F0026"
            ],
            [
                "nama_fitur"=> "Blue Screen",
                "kode_fitur"=> "F0027"
            ],
            [
                "nama_fitur"=> "White Screen",
                "kode_fitur"=> "F0028"
            ],
            [
                "nama_fitur"=> "Port USB/LAN/VGA/HDMI/Jack Audio tidak berfungsi",
                "kode_fitur"=> "F0029"
            ],
            [
                "nama_fitur"=> "Laptop tiba-tiba mati ketika penggunaan sudah lama (Autoshutdown)",
                "kode_fitur"=> "F0030"
            ],
            [
                "nama_fitur"=> "Terdengar suara berisik dari arah ventilasi pembuangan udara",
                "kode_fitur"=> "F0031"
            ],
            [
                "nama_fitur"=> "Terjadi panas berlebih (over heat)",
                "kode_fitur"=> "F0032"
            ],
            [
                "nama_fitur"=> "Fan mati / tidak berputar",
                "kode_fitur"=> "F0033"
            ],
            [
                "nama_fitur"=> "Fan berputar lambat",
                "kode_fitur"=> "F0034"
            ],
            [
                "nama_fitur"=> "baling-baling fan macet",
                "kode_fitur"=> "F0035"
            ],
            [
                "nama_fitur"=> "Touchpad/kursor  Tidak Muncul",
                "kode_fitur"=> "F0036"
            ],
            [
                "nama_fitur"=> "Driver Pointing Device pada Device Manager tidak terdeteksi",
                "kode_fitur"=> "F0037"
            ],
            [
                "nama_fitur"=> "Fungsi FN+F7 tidak bisa mengaktifkan kursor",
                "kode_fitur"=> "F0038"
            ],
            [
                "nama_fitur"=> "Touchpad bisa digerakkan sebentar",
                "kode_fitur"=> "F0039"
            ],
            [
                "nama_fitur"=> "Driver Pointing Device pada Device Manager terdeteksi",
                "kode_fitur"=> "F0040"
            ],
            [
                "nama_fitur"=> "Touchpad Tidak Sensitif (macet-macet)",
                "kode_fitur"=> "F0041"
            ],
            [
                "nama_fitur"=> "Harus menyalakan dan mematikan fungsi Touchpad dengan kombinasi FN+F7 baru touchpad berfungsi lagi dan kemudian touchpad akan macet lagi",
                "kode_fitur"=> "F0042"
            ],
            [
                "nama_fitur"=> "Terdapat garis yang membentang lurus baik horizontal maupun vertikal (abnormal line)",
                "kode_fitur"=> "F0043"
            ],
            [
                "nama_fitur"=> "Tampilan warna lcd tiba-tiba memudar (abnormal color)",
                "kode_fitur"=> "F0044"
            ],
            [
                "nama_fitur"=> "Terdapat flek disekitar lcd",
                "kode_fitur"=> "F0045"
            ],
            [
                "nama_fitur"=> "Terdapat stuck pixel (bercak berwarna terang pada lcd)",
                "kode_fitur"=> "F0046"
            ],
            [
                "nama_fitur"=> "Terdapat spot pixel (bercak berwarna hitam pada lcd)",
                "kode_fitur"=> "F0047"
            ],
            [
                "nama_fitur"=> "ketika dihidupkan muncul tulisan No Bootable Device atau No boot disk has been detected or the disk has failed",
                "kode_fitur"=> "F0048"
            ],
            [
                "nama_fitur"=> "Hardisk Model terdeteksi di menu Main  BIOS",
                "kode_fitur"=> "F0049"
            ],
            [
                "nama_fitur"=> "Pada bagian Boot, HDD tidak terdeteksi merknya",
                "kode_fitur"=> "F0050"
            ],
            [
                "nama_fitur"=> "Terdengar suara detak jam yang begitu keras dari lokasi hardisk di laptop (HDD Noisy)",
                "kode_fitur"=> "F0051"
            ],
            [
                "nama_fitur"=> "HDD LED Indicator hanya menyala diam tidak kedap-kedip",
                "kode_fitur"=> "F0052"
            ],
            [
                "nama_fitur"=> "Hasil cek dari software menandakan hardisk tidak sehat / not found",
                "kode_fitur"=> "F0053"
            ],
            [
                "nama_fitur"=> "Tidak mau booting",
                "kode_fitur"=> "F0054"
            ],
            [
                "nama_fitur"=> "Lambat ketika dioperasikan dan sering mengalami hang up dan aplikasi selalu Not Responding",
                "kode_fitur"=> "F0055"
            ],
            [
                "nama_fitur"=> "Terjadi Blue Screen dengan kode eror “KERNEL_DATA_INPAGE_ERROR_” Saat dihidupkan",
                "kode_fitur"=> "F0056"
            ],
            [
                "nama_fitur"=> "Laptop langsung masuk BIOS ketika dihidupkan dan pada menu \"Main\" HDD Model tidak terbaca",
                "kode_fitur"=> "F0057"
            ],
            [
                "nama_fitur"=> "Beberapa file/folder/partisi tidak bisa diakses",
                "kode_fitur"=> "F0058"
            ],
            [
                "nama_fitur"=> "Full Charge Capacity berkurang jauh dari Design Capacity pada Battery (cek menggunakan aplikasi Battery Monitor)",
                "kode_fitur"=> "F0059"
            ],
            [
                "nama_fitur"=> "Battery Not Detect",
                "kode_fitur"=> "F0060"
            ],
            [
                "nama_fitur"=> "Daya tahan battery cepat habis",
                "kode_fitur"=> "F0061"
            ],
            [
                "nama_fitur"=> "Abnormal Capacity (kapasitas battery terlihat sekian persen, namun ketika charger dicabut, laptop langsung mati",
                "kode_fitur"=> "F0062"
            ],
            [
                "nama_fitur"=> "Battery Consider (windows 7)",
                "kode_fitur"=> "F0063"
            ],
            [
                "nama_fitur"=> "Tampilan layar/kursor bergetar/bergerak tidak stabil",
                "kode_fitur"=> "F0064"
            ],
            [
                "nama_fitur"=> "Jika kabel digerakkan tiba-tiba laptop discharge (casan putus nyambung)",
                "kode_fitur"=> "F0065"
            ],
            [
                "nama_fitur"=> "Tidak ada indikator masuk power",
                "kode_fitur"=> "F0066"
            ],
            [
                "nama_fitur"=> "Speaker Sember",
                "kode_fitur"=> "F0067"
            ],
            [
                "nama_fitur"=> "Speaker tidak mengeluarkan suara",
                "kode_fitur"=> "F0068"
            ],
            [
                "nama_fitur"=> "Ketika dihubungkan dengan speaker eksternal atau Earphone, laptop mengeluarkan suara",
                "kode_fitur"=> "F0069"
            ],
            [
                "nama_fitur"=> "Ketika dihubungkan dengan speaker eksternal atau Earphone, laptop tidak mengeluarkan suara",
                "kode_fitur"=> "F0070"
            ],
            [
                "nama_fitur"=> "Hardisk tidak terdeteksi, namun Touchpad/kursor dan keyboard masih berfungsi",
                "kode_fitur"=> "F0071"
            ],
            [
                "nama_fitur"=> "USB / Flashdisk yang dihubungkan bisa terbaca",
                "kode_fitur"=> "F0072"
            ],
            [
                "nama_fitur"=> "Koneksi hardisk tiba-tiba terputus saat LCD digerakkan",
                "kode_fitur"=> "F0073"
            ],
            [
                "nama_fitur"=> "Keyboard dan touchpad tiba-tiba tidak berfungsi",
                "kode_fitur"=> "F0074"
            ],
            [
                "nama_fitur"=> "Hardisk tidak terdeteksi",
                "kode_fitur"=> "F0075"
            ],
            [
                "nama_fitur"=> "Keyboard dan touchpad tidak berfungsi",
                "kode_fitur"=> "F0076"
            ],
            [
                "nama_fitur"=> "Ketika LCD dihubungkan dengan docking keyboard, laptop langsung mati (short)",
                "kode_fitur"=> "F0077"
            ],
            [
                "nama_fitur"=> "Tidak bisa dihidupkan ketika masih terhubung dengan docking keyboard",
                "kode_fitur"=> "F0078"
            ],
            [
                "nama_fitur"=> "kursor berjalan sendiri",
                "kode_fitur"=> "F0079"
            ],
            [
                "nama_fitur"=> "konten ter-klik tanpa disentuh",
                "kode_fitur"=> "F0080"
            ],
            [
                "nama_fitur"=> "setelah dilakukan restart touchscreen normal",
                "kode_fitur"=> "F0081"
            ],
            [
                "nama_fitur"=> "Touchscreen tidak berfungsi",
                "kode_fitur"=> "F0082"
            ],
            [
                "nama_fitur"=> "Driver I2HC pada Device manager tidak terdeteksi",
                "kode_fitur"=> "F0083"
            ],
            [
                "nama_fitur"=> "Setelah ganti Touchpanel, Touchscreen tetap tidak berfungsi",
                "kode_fitur"=> "F0084"
            ],
            [
                "nama_fitur"=> "Driver I2HC pada Device Manager ditandai dengan tanda seru",
                "kode_fitur"=> "F0085"
            ],
            [
                "nama_fitur"=> "Indikator cas menyala saat dilakukan cas",
                "kode_fitur"=> "F0086"
            ],
            [
                "nama_fitur"=> "Autoshutdown ketika dihidupkan / susah di hidupkan",
                "kode_fitur"=> "F0087"
            ],
            [
                "nama_fitur"=> "ketika dilakukan short pada pin keyboard di mainboard, laptop menyala",
                "kode_fitur"=> "F0088"
            ],
            [
                "nama_fitur"=> "ketika dilakukan short pada pin keyboard di mainboard, laptop tidak menyala",
                "kode_fitur"=> "F0089"
            ],
            [
                "nama_fitur"=> "Indikator battery low tetap menyala meski battery dalam keadaan penuh atau diatas low level",
                "kode_fitur"=> "F0090"
            ],
            [
                "nama_fitur"=> "Charger rate rendah (sehingga kapasitas battery tidak bisa naik ketika dilakukan cahrge dan malah menurun)",
                "kode_fitur"=> "F0091"
            ],
            [
                "nama_fitur"=> "Keyboard Function Failure (ketika 1 huruf ditekan, ada beberapa huruf yang ikut berfungsi)",
                "kode_fitur"=> "F0092"
            ],
            [
                "nama_fitur"=> "Jam dan tanggal berubah setelah laptop dimatikan",
                "kode_fitur"=> "F0093"
            ],
            [
                "nama_fitur"=> "Saat dihidupkan laptop langsung masuk menu bios dengan sistem tanggal dan waktu yang tidak tepat",
                "kode_fitur"=> "F0094"
            ],
            [
                "nama_fitur"=> "Laptop susah dinyalakan",
                "kode_fitur"=> "F0095"
            ],
            [
                "nama_fitur"=> "Autoshutdown",
                "kode_fitur"=> "F0096"
            ],
            [
                "nama_fitur"=> "Autorestart",
                "kode_fitur"=> "F0097"
            ],
            [
                "nama_fitur"=> "Unstable",
                "kode_fitur"=> "F0098"
            ],
            [
                "nama_fitur"=> "Tidak bisa di charge",
                "kode_fitur"=> "F0099"
            ],
            [
                "nama_fitur"=> "Stuck Logo ",
                "kode_fitur"=> "F0100"
            ],
            [
                "nama_fitur"=> "Tidak Bisa masuk BIOS",
                "kode_fitur"=> "F0101"
            ],
            [
                "nama_fitur"=> "Camera not working",
                "kode_fitur"=> "F0102"
            ],
            [
                "nama_fitur"=> "Driver Imaging Device tiba-tiba menghilang saat LCD Cover digerakkan",
                "kode_fitur"=> "F0103"
            ],
            [
                "nama_fitur"=> "Ketika dihubungkan dengan USB atau Flash Drive muncul eror the last usb device you connected to this computer malfunctioned",
                "kode_fitur"=> "F0104"
            ],
            [
                "nama_fitur"=> "Driver Universal Serial Bus ditandai dengan tanda seru pada Device Manager",
                "kode_fitur"=> "F0105"
            ],
            [
                "nama_fitur"=> "Terdapat tanda silang pada icon battery pada saat di cas",
                "kode_fitur"=> "F0106"
            ],
            [
                "nama_fitur"=> "Tidak bisa full charge / stuck charge",
                "kode_fitur"=> "F0107"
            ]
        ];

        foreach ($fiturs as $f) {
            Fitur::create($f);
        }

        $kdetail = [
            [
                "kasus_id"=> "K0001",
                "fitur_id"=> "F0073",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0001",
                "fitur_id"=> "F0074",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0002",
                "fitur_id"=> "F0044",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0002",
                "fitur_id"=> "F0045",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0002",
                "fitur_id"=> "F0046",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0002",
                "fitur_id"=> "F0047",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0003",
                "fitur_id"=> "F0073",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0003",
                "fitur_id"=> "F0074",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0004",
                "fitur_id"=> "F0077",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0004",
                "fitur_id"=> "F0078",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0005",
                "fitur_id"=> "F0003",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0005",
                "fitur_id"=> "F0037",
                "bobot"=> "1"
            ],
            [
                "kasus_id"=> "K0005",
                "fitur_id"=> "F0038",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0006",
                "fitur_id"=> "F0086",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0006",
                "fitur_id"=> "F0087",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0006",
                "fitur_id"=> "F0097",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0006",
                "fitur_id"=> "F0088",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0007",
                "fitur_id"=> "F0073",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0007",
                "fitur_id"=> "F0074",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0008",
                "fitur_id"=> "F0010",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0008",
                "fitur_id"=> "F0015",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0008",
                "fitur_id"=> "F0017",
                "bobot"=> "1"
            ],
            [
                "kasus_id"=> "K0009",
                "fitur_id"=> "F0059",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0009",
                "fitur_id"=> "F0061",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0009",
                "fitur_id"=> "F0062",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0010",
                "fitur_id"=> "F0093",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0010",
                "fitur_id"=> "F0094",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0011",
                "fitur_id"=> "F0011",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0011",
                "fitur_id"=> "F0015",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0011",
                "fitur_id"=> "F0014",
                "bobot"=> "1"
            ],
            [
                "kasus_id"=> "K0012",
                "fitur_id"=> "F0024",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0012",
                "fitur_id"=> "F0025",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0013",
                "fitur_id"=> "F0051",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0013",
                "fitur_id"=> "F0053",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0013",
                "fitur_id"=> "F0054",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0013",
                "fitur_id"=> "F0056",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0013",
                "fitur_id"=> "F0057",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0014",
                "fitur_id"=> "F0059",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0014",
                "fitur_id"=> "F0061",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0014",
                "fitur_id"=> "F0062",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0015",
                "fitur_id"=> "F0051",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0015",
                "fitur_id"=> "F0053",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0015",
                "fitur_id"=> "F0054",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0015",
                "fitur_id"=> "F0057",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0016",
                "fitur_id"=> "F0011",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0016",
                "fitur_id"=> "F0015",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0016",
                "fitur_id"=> "F0014",
                "bobot"=> "1"
            ],
            [
                "kasus_id"=> "K0017",
                "fitur_id"=> "F0005",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0017",
                "fitur_id"=> "F0008",
                "bobot"=> "1"
            ],
            [
                "kasus_id"=> "K0017",
                "fitur_id"=> "F0009",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0018",
                "fitur_id"=> "F0065",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0018",
                "fitur_id"=> "F0066",
                "bobot"=> "2"
            ],
            [
                "kasus_id"=> "K0018",
                "fitur_id"=> "F0064",
                "bobot"=> "1"
            ],
            [
                "kasus_id"=> "K0019",
                "fitur_id"=> "F0012",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0019",
                "fitur_id"=> "F0013",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0019",
                "fitur_id"=> "F0010",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0020",
                "fitur_id"=> "F0086",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0020",
                "fitur_id"=> "F0087",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0020",
                "fitur_id"=> "F0097",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0020",
                "fitur_id"=> "F0088",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0021",
                "fitur_id"=> "F0043",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0021",
                "fitur_id"=> "F0045",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0021",
                "fitur_id"=> "F0046",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0022",
                "fitur_id"=> "F0024",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0022",
                "fitur_id"=> "F0025",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0023",
                "fitur_id"=> "F0054",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0023",
                "fitur_id"=> "F0055",
                "bobot"=> "4"
            ],
            [
                "kasus_id"=> "K0023",
                "fitur_id"=> "F0058",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0023",
                "fitur_id"=> "F0053",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0024",
                "fitur_id"=> "F0095",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0024",
                "fitur_id"=> "F0096",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0024",
                "fitur_id"=> "F0097",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0024",
                "fitur_id"=> "F0086",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0025",
                "fitur_id"=> "F0071",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0025",
                "fitur_id"=> "F0072",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0026",
                "fitur_id"=> "F0095",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0026",
                "fitur_id"=> "F0096",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0026",
                "fitur_id"=> "F0097",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0026",
                "fitur_id"=> "F0086",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0027",
                "fitur_id"=> "F0086",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0027",
                "fitur_id"=> "F0087",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0027",
                "fitur_id"=> "F0097",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0027",
                "fitur_id"=> "F0088",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0028",
                "fitur_id"=> "F0001",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0028",
                "fitur_id"=> "F0002",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0028",
                "fitur_id"=> "F0003",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0029",
                "fitur_id"=> "F0018",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0029",
                "fitur_id"=> "F0019",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0030",
                "fitur_id"=> "F0051",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0030",
                "fitur_id"=> "F0053",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0030",
                "fitur_id"=> "F0054",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0030",
                "fitur_id"=> "F0057",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0031",
                "fitur_id"=> "F0024",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0031",
                "fitur_id"=> "F0025",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0032",
                "fitur_id"=> "F0001",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0032",
                "fitur_id"=> "F0002",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0032",
                "fitur_id"=> "F0003",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0033",
                "fitur_id"=> "F0029",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0033",
                "fitur_id"=> "F0104",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0033",
                "fitur_id"=> "F0105",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0034",
                "fitur_id"=> "F0095",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0034",
                "fitur_id"=> "F0096",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0034",
                "fitur_id"=> "F0097",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0034",
                "fitur_id"=> "F0086",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0035",
                "fitur_id"=> "F0043",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0035",
                "fitur_id"=> "F0045",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0035",
                "fitur_id"=> "F0046",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0036",
                "fitur_id"=> "F0012",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0036",
                "fitur_id"=> "F0013",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0036",
                "fitur_id"=> "F0010",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0037",
                "fitur_id"=> "F0086",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0037",
                "fitur_id"=> "F0087",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0037",
                "fitur_id"=> "F0097",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0037",
                "fitur_id"=> "F0088",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0038",
                "fitur_id"=> "F0059",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0038",
                "fitur_id"=> "F0061",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0038",
                "fitur_id"=> "F0062",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0039",
                "fitur_id"=> "F0086",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0039",
                "fitur_id"=> "F0087",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0039",
                "fitur_id"=> "F0097",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0039",
                "fitur_id"=> "F0088",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0040",
                "fitur_id"=> "F0011",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0040",
                "fitur_id"=> "F0015",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0040",
                "fitur_id"=> "F0014",
                "bobot"=> "1"
            ],
            [
                "kasus_id"=> "K0041",
                "fitur_id"=> "F0054",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0041",
                "fitur_id"=> "F0055",
                "bobot"=> "4"
            ],
            [
                "kasus_id"=> "K0041",
                "fitur_id"=> "F0058",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0041",
                "fitur_id"=> "F0053",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0042",
                "fitur_id"=> "F0012",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0042",
                "fitur_id"=> "F0013",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0042",
                "fitur_id"=> "F0010",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0043",
                "fitur_id"=> "F0011",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0043",
                "fitur_id"=> "F0015",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0043",
                "fitur_id"=> "F0014",
                "bobot"=> "1"
            ],
            [
                "kasus_id"=> "K0044",
                "fitur_id"=> "F0005",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0044",
                "fitur_id"=> "F0008",
                "bobot"=> "1"
            ],
            [
                "kasus_id"=> "K0044",
                "fitur_id"=> "F0009",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0045",
                "fitur_id"=> "F0071",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0045",
                "fitur_id"=> "F0072",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0046",
                "fitur_id"=> "F0086",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0046",
                "fitur_id"=> "F0087",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0046",
                "fitur_id"=> "F0097",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0046",
                "fitur_id"=> "F0088",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0047",
                "fitur_id"=> "F0024",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0047",
                "fitur_id"=> "F0025",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0048",
                "fitur_id"=> "F0011",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0048",
                "fitur_id"=> "F0015",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0048",
                "fitur_id"=> "F0014",
                "bobot"=> "1"
            ],
            [
                "kasus_id"=> "K0049",
                "fitur_id"=> "F0090",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0049",
                "fitur_id"=> "F0091",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0050",
                "fitur_id"=> "F0080",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0050",
                "fitur_id"=> "F0079",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0050",
                "fitur_id"=> "F0081",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0051",
                "fitur_id"=> "F0054",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0051",
                "fitur_id"=> "F0055",
                "bobot"=> "4"
            ],
            [
                "kasus_id"=> "K0051",
                "fitur_id"=> "F0058",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0051",
                "fitur_id"=> "F0053",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0052",
                "fitur_id"=> "F0090",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0052",
                "fitur_id"=> "F0091",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0052",
                "fitur_id"=> "F0005",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0053",
                "fitur_id"=> "F0054",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0053",
                "fitur_id"=> "F0055",
                "bobot"=> "4"
            ],
            [
                "kasus_id"=> "K0053",
                "fitur_id"=> "F0058",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0053",
                "fitur_id"=> "F0053",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0054",
                "fitur_id"=> "F0054",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0054",
                "fitur_id"=> "F0055",
                "bobot"=> "4"
            ],
            [
                "kasus_id"=> "K0054",
                "fitur_id"=> "F0058",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0054",
                "fitur_id"=> "F0053",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0056",
                "fitur_id"=> "F0090",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0056",
                "fitur_id"=> "F0091",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0056",
                "fitur_id"=> "F0005",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0057",
                "fitur_id"=> "F0051",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0057",
                "fitur_id"=> "F0053",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0057",
                "fitur_id"=> "F0054",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0057",
                "fitur_id"=> "F0056",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0057",
                "fitur_id"=> "F0057",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0058",
                "fitur_id"=> "F0073",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0058",
                "fitur_id"=> "F0074",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0059",
                "fitur_id"=> "F0001",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0059",
                "fitur_id"=> "F0002",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0059",
                "fitur_id"=> "F0003",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0060",
                "fitur_id"=> "F0059",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0060",
                "fitur_id"=> "F0061",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0060",
                "fitur_id"=> "F0106",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0061",
                "fitur_id"=> "F0086",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0061",
                "fitur_id"=> "F0087",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0061",
                "fitur_id"=> "F0097",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0061",
                "fitur_id"=> "F0088",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0062",
                "fitur_id"=> "F0059",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0062",
                "fitur_id"=> "F0061",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0062",
                "fitur_id"=> "F0106",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0063",
                "fitur_id"=> "F0024",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0063",
                "fitur_id"=> "F0025",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0064",
                "fitur_id"=> "F0044",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0064",
                "fitur_id"=> "F0045",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0064",
                "fitur_id"=> "F0043",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0065",
                "fitur_id"=> "F0059",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0065",
                "fitur_id"=> "F0090",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0065",
                "fitur_id"=> "F0107",
                "bobot"=> "4"
            ],
            [
                "kasus_id"=> "K0066",
                "fitur_id"=> "F0005",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0066",
                "fitur_id"=> "F0008",
                "bobot"=> "1"
            ],
            [
                "kasus_id"=> "K0066",
                "fitur_id"=> "F0009",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0067",
                "fitur_id"=> "F0005",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0067",
                "fitur_id"=> "F0008",
                "bobot"=> "1"
            ],
            [
                "kasus_id"=> "K0067",
                "fitur_id"=> "F0009",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0068",
                "fitur_id"=> "F0051",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0068",
                "fitur_id"=> "F0053",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0068",
                "fitur_id"=> "F0054",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0068",
                "fitur_id"=> "F0056",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0069",
                "fitur_id"=> "F0059",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0069",
                "fitur_id"=> "F0061",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0069",
                "fitur_id"=> "F0106",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0070",
                "fitur_id"=> "F0059",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0070",
                "fitur_id"=> "F0061",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0070",
                "fitur_id"=> "F0106",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0071",
                "fitur_id"=> "F0012",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0071",
                "fitur_id"=> "F0013",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0071",
                "fitur_id"=> "F0010",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0072",
                "fitur_id"=> "F0051",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0072",
                "fitur_id"=> "F0053",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0072",
                "fitur_id"=> "F0054",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0072",
                "fitur_id"=> "F0056",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0073",
                "fitur_id"=> "F0011",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0073",
                "fitur_id"=> "F0015",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0074",
                "fitur_id"=> "F0011",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0074",
                "fitur_id"=> "F0015",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0075",
                "fitur_id"=> "F0024",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0075",
                "fitur_id"=> "F0025",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0076",
                "fitur_id"=> "F0090",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0076",
                "fitur_id"=> "F0091",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0076",
                "fitur_id"=> "F0005",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0077",
                "fitur_id"=> "F0044",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0077",
                "fitur_id"=> "F0043",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0078",
                "fitur_id"=> "F0012",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0078",
                "fitur_id"=> "F0013",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0078",
                "fitur_id"=> "F0010",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0079",
                "fitur_id"=> "F0012",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0079",
                "fitur_id"=> "F0013",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0079",
                "fitur_id"=> "F0010",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0055",
                "fitur_id"=> "F0090",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0055",
                "fitur_id"=> "F0091",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0055",
                "fitur_id"=> "F0005",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0080",
                "fitur_id"=> "F0090",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0080",
                "fitur_id"=> "F0091",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0080",
                "fitur_id"=> "F0005",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0081",
                "fitur_id"=> "F0018",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0081",
                "fitur_id"=> "F0019",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0081",
                "fitur_id"=> "F0020",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0082",
                "fitur_id"=> "F0030",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0082",
                "fitur_id"=> "F0032",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0082",
                "fitur_id"=> "F0033",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0083",
                "fitur_id"=> "F0065",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0083",
                "fitur_id"=> "F0066",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0083",
                "fitur_id"=> "F0064",
                "bobot"=> "1"
            ],
            [
                "kasus_id"=> "K0084",
                "fitur_id"=> "F0068",
                "bobot"=> "2"
            ],
            [
                "kasus_id"=> "K0084",
                "fitur_id"=> "F0069",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0085",
                "fitur_id"=> "F0092",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0085",
                "fitur_id"=> "F0091",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0086",
                "fitur_id"=> "F0093",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0086",
                "fitur_id"=> "F0094",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0087",
                "fitur_id"=> "F0100",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0087",
                "fitur_id"=> "F0101",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0088",
                "fitur_id"=> "F0102",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0088",
                "fitur_id"=> "F0103",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0089",
                "fitur_id"=> "F0024",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0089",
                "fitur_id"=> "F0099",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0090",
                "fitur_id"=> "F0011",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0090",
                "fitur_id"=> "F0015",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0091",
                "fitur_id"=> "F0030",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0091",
                "fitur_id"=> "F0032",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0091",
                "fitur_id"=> "F0033",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0092",
                "fitur_id"=> "F0011",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0092",
                "fitur_id"=> "F0015",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0093",
                "fitur_id"=> "F0095",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0093",
                "fitur_id"=> "F0096",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0093",
                "fitur_id"=> "F0097",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0093",
                "fitur_id"=> "F0086",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0094",
                "fitur_id"=> "F0048",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0094",
                "fitur_id"=> "F0049",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0094",
                "fitur_id"=> "F0050",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0095",
                "fitur_id"=> "F0014",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0095",
                "fitur_id"=> "F0041",
                "bobot"=> "1"
            ],
            [
                "kasus_id"=> "K0096",
                "fitur_id"=> "F0041",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0096",
                "fitur_id"=> "F0042",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0097",
                "fitur_id"=> "F0082",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0097",
                "fitur_id"=> "F0083",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0098",
                "fitur_id"=> "F0085",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0098",
                "fitur_id"=> "F0082",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0098",
                "fitur_id"=> "F0084",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0099",
                "fitur_id"=> "F0086",
                "bobot"=> "3"
            ],
            [
                "kasus_id"=> "K0099",
                "fitur_id"=> "F0088",
                "bobot"=> "5"
            ],
            [
                "kasus_id"=> "K0100",
                "fitur_id"=> "F0068",
                "bobot"=> "2"
            ],
            [
                "kasus_id"=> "K0100",
                "fitur_id"=> "F0070",
                "bobot"=> "5"
            ]
        ];

        $data = 1;
        foreach ($kdetail as $kd) {
            $kasus = Kasus::where('kasus_id', $kd['kasus_id'])->first();
            $kd['kasus_id'] = $kasus->id;

            $fitur = Fitur::where('kode_fitur', $kd['fitur_id'])->first();
            $kd['fitur_id'] = $fitur->id;
            DetailKasus::create($kd);
        }
    }
}
