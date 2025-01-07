<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>crud</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <link rel="stylesheet" href="<?= base_url('style2.css'); ?>">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="/auth/logout">
          <button type="button" class="btn btn-outline-info"
            style="font-weight:bold; font-family: 'Poppins', sans-serif;">
            <ion-icon name="arrow-undo-circle-outline"></ion-icon> Logout
          </button>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <!-- Menu Tengah dengan Container -->
          <div class="menu-container mx-auto">

          </div>
        </div>
      </div>
    </nav>
  </header>

  <div class="container">
    <h1 class="text-center mt-5" style="margin-top:120px !important;">CRUD karyawan</h1>
    <a href="/karyawan/tambah" class="btn btn-primary">
      Tambah Karyawan
    </a>
    <table class="table mt-5">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Depan</th>
          <th scope="col">Nama Belakang</th>
          <th scope="col">Departemen</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($karyawan as $key => $karyawan): ?>
          <tr>
            <th scope="row"><?= $key + 1; ?></th>
            <td><?= esc($karyawan['nama_depan']); ?></td>
            <td><?= esc($karyawan['nama_belakang']); ?></td>
            <td><?= esc($karyawan['departemen']); ?></td>
            <td>
              <a href="/karyawan/edit/<?= $karyawan['id']; ?>" class="btn btn-warning btn-sm">
                <ion-icon name="pencil"></ion-icon>
              </a>
              <a href="/karyawan/delete/<?= $karyawan['id']; ?>" class="btn btn-danger btn-sm"
                onclick="return confirm('Apakah Anda yakin ingin menghapus karyawan ini?')">
                <ion-icon name="trash-outline"></ion-icon>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>
