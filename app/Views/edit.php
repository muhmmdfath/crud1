<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Karyawan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <h1 class="text-center mt-5">Edit Karyawan</h1>

    <form action="/karyawan/update/<?= $karyawan['id']; ?>" method="POST">
      <div class="mb-3">
        <label for="nama_depan" class="form-label">Nama Depan</label>
        <input type="text" class="form-control" id="nama_depan" name="nama_depan"
          value="<?= $karyawan['nama_depan']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="nama_belakang" class="form-label">Nama Belakang</label>
        <input type="text" class="form-control" id="nama_belakang" name="nama_belakang"
          value="<?= $karyawan['nama_belakang']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="departemen" class="form-label">Departemen</label>
        <input type="text" class="form-control" id="departemen" name="departemen"
          value="<?= $karyawan['departemen']; ?>" required>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
      <a href="/karyawan" class="btn btn-secondary">Kembali</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
  </script>
</body>

</html>
