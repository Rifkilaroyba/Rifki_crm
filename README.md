<<<<<<< HEAD
# CRM PT. Smart

Website Customer Relationship Management (CRM) sederhana untuk PT. Smart, dirancang khusus untuk mendukung divisi sales dan manager dalam mengelola calon customer, produk, dan proyek.

---

## 📝 Fitur Utama

1. **Halaman Login**
   - Login menggunakan akun sales atau manager.
   - Semua user login bisa mengakses semua halaman sementara (role-based access belum diterapkan).

2. **Lead Management (Sales)**
   - List calon customer (leads) dengan status: `New`, `Processing`, `Approved`, `Rejected`.
   - Tambah, edit, dan hapus lead.
   - Tampilan modern dan responsif menggunakan TailwindCSS.

3. **Product Management**
   - Halaman master produk (layanan internet) untuk menambahkan, mengedit, dan menghapus produk.
   - Harga produk ditampilkan dalam format profesional.

4. **Project Management**
   - Buat project dari lead.
   - Approval manager untuk project (sementara semua user bisa akses).

5. **Customer List**
   - Menampilkan customer yang sudah berlangganan beserta layanan mereka.

---

## 📂 Struktur Folder (Ringkas)

app/
├── Http/
│ ├── Controllers/
│ │ ├── LeadController.php
│ │ ├── ProductController.php
│ │ ├── ProjectController.php
│ │ └── CustomerController.php
│ └── Middleware/ (optional untuk role di tahap selanjutnya)
resources/
├── views/
│ ├── leads/
│ │ ├── index.blade.php
│ │ ├── create.blade.php
│ │ └── edit.blade.php
│ ├── products/
│ │ ├── index.blade.php
│ │ ├── create.blade.php
│ │ └── edit.blade.php
│ ├── projects/
│ │ ├── index.blade.php
│ │ └── create.blade.php
│ └── customers/
│ └── index.blade.php
routes/
└── web.php


---

## ⚡ Catatan Pengembangan

- **Role-based access** belum diterapkan.  
  Untuk sementara semua user login bisa mengakses semua halaman.
- Bisa ditambahkan middleware `role` di tahap pengembangan selanjutnya:
  - `/leads` → hanya untuk sales
  - `/projects/approve` → hanya untuk manager
- Jika ingin sempurnakan, buat **RoleMiddleware** dan daftarkan di `app/Http/Kernel.php`.

- ## Catatan Pengembangan

Selama proses pengembangan terdapat beberapa kendala teknis pada environment lokal (laptop), 
termasuk performa perangkat yang sempat menurun (lag) saat menjalankan service dan dependency development, 
khususnya pada proses konfigurasi database dan build asset.

Namun kendala tersebut berhasil diatasi dengan:
- Penyesuaian konfigurasi PostgreSQL
- Optimasi proses development secara bertahap
- Pengujian ulang fitur menggunakan Laravel Tinker
- Validasi fitur CRUD secara bertahap di setiap modul

Seluruh fitur utama tetap dapat berjalan sesuai kebutuhan, dan dokumentasi penggunaan aplikasi telah disertakan pada repository ini.

---

## 👤 Demo Accounts

| Role    | Email            | Password |
|---------|------------------|----------|
| Manager | manager@test.com | manager  |
| Sales   | sales@test.com   | sales    |

> Catatan: ID user di database
>
> ```
> id: 1 | Manager | manager@test.com | manager
> id: 2 | Sales   | sales@test.com   | sales
> ```

---

## 🚀 Cara Menjalankan

1. Clone repo:
```bash
git clone https://github.com/Rifkilaroyba/Rifki_crm.git

=======
# Rifki_crm
>>>>>>> 45380d406b2aa93c1512464686b0f3bcc724e361



