<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id_kategori
 * @property string $nama_kategori
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Produk> $produk
 * @property-read int|null $produk_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategori newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategori newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategori query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategori whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategori whereIdKategori($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategori whereNamaKategori($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategori whereUpdatedAt($value)
 */
	class Kategori extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id_produk
 * @property int $id_kategori
 * @property string $nama_produk
 * @property string $deskripsi_produk
 * @property int $harga_produk
 * @property int $stok_produk
 * @property string $gambar_produk
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Kategori $kategori
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produk newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produk newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produk query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produk whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produk whereDeskripsiProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produk whereGambarProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produk whereHargaProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produk whereIdKategori($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produk whereIdProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produk whereNamaProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produk whereStokProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produk whereUpdatedAt($value)
 */
	class Produk extends \Eloquent {}
}

namespace App\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role query()
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id_store
 * @property string $nama_toko
 * @property string|null $deskripsi
 * @property string|null $tentang_kami
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Store newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Store newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Store query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Store whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Store whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Store whereIdStore($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Store whereNamaToko($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Store whereTentangKami($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Store whereUpdatedAt($value)
 */
	class Store extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id_user
 * @property int $id_role
 * @property string $email
 * @property string $password
 * @property string $nama
 * @property string $no_hp
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\alamat> $alamat
 * @property-read int|null $alamat_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\keranjang> $keranjang
 * @property-read int|null $keranjang_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\pesanan> $pesanan
 * @property-read int|null $pesanan_count
 * @property-read \App\Models\Role $role
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIdRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereNoHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id_alamat
 * @property int $id_user
 * @property int $id_kecamatan
 * @property int $id_desa
 * @property string $detail_alamat
 * @property string $nama_penerima
 * @property string $no_hp_penerima
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\desa $desa
 * @property-read \App\Models\kecamatan $kecamatan
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|alamat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|alamat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|alamat query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|alamat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|alamat whereDetailAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|alamat whereIdAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|alamat whereIdDesa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|alamat whereIdKecamatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|alamat whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|alamat whereNamaPenerima($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|alamat whereNoHpPenerima($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|alamat whereUpdatedAt($value)
 */
	class alamat extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id_desa
 * @property int $id_kecamatan
 * @property string $nama_desa
 * @property int $ongkir
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\kecamatan $kecamatan
 * @method static \Illuminate\Database\Eloquent\Builder<static>|desa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|desa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|desa query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|desa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|desa whereIdDesa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|desa whereIdKecamatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|desa whereNamaDesa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|desa whereOngkir($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|desa whereUpdatedAt($value)
 */
	class desa extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id_detail
 * @property int $id_pesanan
 * @property int $id_produk
 * @property int $quantity_per_produk
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\pesanan $pesanan
 * @property-read \App\Models\Produk $produk
 * @method static \Illuminate\Database\Eloquent\Builder<static>|detail_pesanan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|detail_pesanan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|detail_pesanan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|detail_pesanan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|detail_pesanan whereIdDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|detail_pesanan whereIdPesanan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|detail_pesanan whereIdProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|detail_pesanan whereQuantityPerProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|detail_pesanan whereUpdatedAt($value)
 */
	class detail_pesanan extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id_kecamatan
 * @property string $nama_kecamatan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\desa> $desas
 * @property-read int|null $desas_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|kecamatan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|kecamatan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|kecamatan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|kecamatan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|kecamatan whereIdKecamatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|kecamatan whereNamaKecamatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|kecamatan whereUpdatedAt($value)
 */
	class kecamatan extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id_keranjang
 * @property int $id_user
 * @property int $id_produk
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Produk $produk
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|keranjang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|keranjang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|keranjang query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|keranjang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|keranjang whereIdKeranjang($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|keranjang whereIdProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|keranjang whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|keranjang whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|keranjang whereUpdatedAt($value)
 */
	class keranjang extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id_metode_pembayaran
 * @property string $metode_pembayaran
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|metode_pembayaran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|metode_pembayaran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|metode_pembayaran query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|metode_pembayaran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|metode_pembayaran whereIdMetodePembayaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|metode_pembayaran whereMetodePembayaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|metode_pembayaran whereUpdatedAt($value)
 */
	class metode_pembayaran extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id_pesanan
 * @property int $id_user
 * @property int $id_alamat
 * @property int $id_metode_pembayaran
 * @property int $id_status_pembayaran
 * @property int $id_status_pemesanan
 * @property int $total
 * @property string|null $bukti_pembayaran
 * @property string|null $catatan
 * @property string $tanggal_pemesanan
 * @property string|null $tanggal_pengambilan
 * @property string|null $tanggal_konfirmasi
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\detail_pesanan> $detailPesanan
 * @property-read int|null $detail_pesanan_count
 * @property-read \App\Models\metode_pembayaran $metodePembayaran
 * @property-read \App\Models\status_pembayaran $statusPembayaran
 * @property-read \App\Models\status_pemesanan $statusPemesanan
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pesanan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pesanan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pesanan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pesanan whereBuktiPembayaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pesanan whereCatatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pesanan whereIdAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pesanan whereIdMetodePembayaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pesanan whereIdPesanan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pesanan whereIdStatusPembayaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pesanan whereIdStatusPemesanan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pesanan whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pesanan whereTanggalKonfirmasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pesanan whereTanggalPemesanan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pesanan whereTanggalPengambilan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pesanan whereTotal($value)
 */
	class pesanan extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id_status_pembayaran
 * @property string $status_pembayaran
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|status_pembayaran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|status_pembayaran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|status_pembayaran query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|status_pembayaran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|status_pembayaran whereIdStatusPembayaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|status_pembayaran whereStatusPembayaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|status_pembayaran whereUpdatedAt($value)
 */
	class status_pembayaran extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id_status_pemesanan
 * @property string $status_pemesanan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\pesanan> $pesanans
 * @property-read int|null $pesanans_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|status_pemesanan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|status_pemesanan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|status_pemesanan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|status_pemesanan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|status_pemesanan whereIdStatusPemesanan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|status_pemesanan whereStatusPemesanan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|status_pemesanan whereUpdatedAt($value)
 */
	class status_pemesanan extends \Eloquent {}
}

