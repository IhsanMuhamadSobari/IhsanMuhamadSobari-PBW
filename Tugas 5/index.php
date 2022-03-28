<?php 
         $asal = [
         'Soekarno Hatta' => 50000,
         'Husein Sastranegara (BDO)' => 300000,
         'Abdul Rahman Saleh (MLG)' => 40000,
         'Juanda (SUB)' => 40000
        ];
        $tujuan = [
         'Ngurai Rai (DPS)' => 80000,
         'Hasanuddin (UPG)' => 70000,
         'Inanwatan (INX)' => 90000,
         'Sultan Iskandar Muda (BTJ)' => 70000
        ];

        function ambilPajakAsal($asal, $tujuan){
            $pajak = $asal[$tujuan];
            return $pajak;
        }

        function ambilPajakTujuan($tujuan, $asal){
            $pajak = $tujuan[$asal];
            return $pajak;
        }
    ?>

<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Tugas PBW</title>
  </head>
  <body>
    

    <section>
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mt-3 text-center">Form Penerbangan Pesawat</h2>
                <form method="post">
                    <div class="form-group mb-3">
                        <label for="nama">Nama Maskapai</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                    </div>

                    <div class="form-group mb-3">
                        <label for="tujuan">Asal</label>
                        <select class="form-select" id="asal" name="asal">
                            <?php foreach ($asal as $as => $pajak) : ?>
                            <option value="<?= $as ?>"><?= $as; ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tujuan">Tujuan</label>
                         <select class="form-select" id="tujuan" name="tujuan">
                             <?php foreach($tujuan as $tj => $pajak) :?>
                            <option value="<?= $tj; ?>"><?= $tj; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="harga">Harga Tiket</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp.</span>
                            <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga Tiket">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        </div>
    </section>

    <?php 
    $all_data = [];

    if(isset($_POST['submit'])){
        $pajak = ambilPajakAsal($asal, $_POST['asal']) + ambilPajakTujuan($asal, $_POST['tujuan']);
        $total = $pajak + $_POST['harga'];

         $data_input = [
                "nama" => $_POST['nama'],
                "asal" => $_POST['asal'],
                "tujuan" => $_POST['tujuan'],
                "harga" => $_POST['harga'],
                "pajak" => $pajak,
                "total" => $total
      ];

      array_push($all_data, $data_input);
      $json = json_encode($all_data, true);
    }
    
    ?>



    <section>
        <div class="container">
            <div class="row justify-content-center mt-5">
                 
                <div class="col-md-8">
                    <h2 class="text-center mb-3">Jadwal Penerbangan</h2>
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Nama Maskapai</th>
                        <th scope="col">Asal</th>
                        <th scope="col">Tujuan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Pajak</th>
                        <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_data as $data => $value): ?>
                        <tr>
                            <td><?= $all_data[$data]['nama']  ?></td>
                            <td><?= $all_data[$data]['asal']  ?></td>
                            <td><?= $all_data[$data]['tujuan']  ?></td>
                            <td><?= $all_data[$data]['harga']  ?></td>
                            <td><?= $all_data[$data]['pajak']  ?></td>
                            <td><?= $all_data[$data]['total']  ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>