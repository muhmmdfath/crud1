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
    <nav class="navbar navbar-expand-lg navbar-light bg-light custom-navbar">
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
          <div class="menu-container mx-auto">
            <!-- Isi menu tengah jika ada -->
          </div>
        </div>
      </div>
    </nav>
  </header>

  <div class="container">
    <h1 class="text-center mt-5" style="margin-top:70px !important;">karyawan</h1>
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

    <h1 class="text-center mt-5" style="margin-top:120px !important;">Data Part</h1>

    <button type="button" class="btn btn-primary ml-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">Input
      Part</button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Input Part</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form action="/part/save" method="post">
            <div class="modal-body">
              <div class="mb-3">
                <input type="text" class="form-control" id="part-search" placeholder="Cari Part...">
              </div>
              <div id="part-result"></div>
              <div class="mb-3">
                <label for="part-code" class="col-form-label">Part Code</label>
                <input type="text" class="form-control" id="part-code" name="part_code">
              </div>
              <div class="mb-3">
                <label for="part-name" class="col-form-label">Part Name</label>
                <input type="text" class="form-control" id="part-name" name="part_name">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Input Part</button>
            </div>
          </form>

          <script>
            document.getElementById('part-search').addEventListener('input', function () {
              let keyword = this.value;
              if (keyword.length > 1) {
                fetch('/part/search?keyword=' + keyword)
                  .then(response => response.json())
                  .then(data => {
                    let resultHTML = '<ul class="list-group">';
                    data.forEach(item => {
                      resultHTML += `
                      <li class="list-group-item" onclick="selectPart('${item.ItemCode}', '${item.ItemName}')">
                          ${item.ItemCode} - ${item.ItemName}
                      </li>`;
                    });
                    resultHTML += '</ul>';
                    document.getElementById('part-result').innerHTML = resultHTML;
                  });
              } else {
                document.getElementById('part-result').innerHTML = '';
              }
            });

            function selectPart(code, name) {
              document.getElementById('part-code').value = code;
              document.getElementById('part-name').value = name;
              document.getElementById('part-result').innerHTML = '';
            }
          </script>

        </div>
      </div>
    </div>

    <table class="table mt-5">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Part Code</th>
          <th scope="col">Part Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($part as $pr => $part): ?>
          <tr>
            <th scope="row"><?= $pr + 1; ?></th>
            <td><?= esc($part['part_code']); ?></td>
            <td><?= esc($part['part_name']); ?></td>
            <td>
              <!-- <a href="/karyawan/edit/<?= $part['id']; ?>" class="btn btn-warning btn-sm">
                <ion-icon name="pencil"></ion-icon>
              </a> -->
              <a href="/part/delete/<?= $part['id']; ?>" class="btn btn-danger btn-sm"
                onclick="return confirm('Apakah Anda yakin ingin menghapus part ini?')">
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

  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</body>

</html>
