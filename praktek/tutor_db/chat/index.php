<?php
require_once __DIR__ . "/../layout/header.php";
require_once __DIR__ . "/../includes/connection.php";

if (!isset($_SESSION['yanglogin'])) {
    header('Location: ../index.php');
    exit;
}

$pengirim = $_SESSION["yanglogin"]["pengguna_id"];
$queryPengguna = $pdo->prepare("SELECT * FROM pengguna where pengguna_id != ?");
$queryPengguna->execute([$pengirim]);
$listPengguna = $queryPengguna->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container my-3">
    <h1>Chatting</h1>

    <div class="row mb-3">
        <div class="col">
            <h3>Pengirim : <?= $_SESSION['yanglogin']['pengguna_nama'] ?></h3>
            <!-- <select class="form-select" id="chat_pengirim">
      <?php
        // foreach ($listPengguna as $row) {
        //   echo "<option value='$row[pengguna_id]'>$row[pengguna_nama]</option>";
        // }
        ?>
    </select> -->
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <h3>Penerima : </h3>
            <select class="form-select" id="chat_penerima">
                <?php
                foreach ($listPengguna as $row) {
                    echo "<option value='$row[pengguna_id]'>$row[pengguna_nama]</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <button class="btn btn-primary" id="btn-chatting">Start Chatting</button>
    </div>
    <div class="row mb-5">
        <div class="col-12 mb-5 clearfix" style="border:1px solid black;height:400px;padding:5px;overflow-y:scroll;" id="kotak_chat">
        </div>
        <div class="col-11">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Pesan" id="chat_isi">
            </div>
        </div>
        <div class="col-1">
            <button class="btn btn-success" id="btn-kirim">Kirim</button>
        </div>
    </div>
</div>

<script>
    function tampilkanPesan(response) {
        // const chat_pengirim = $("#chat_pengirim").val();
        const chat_pengirim = "<?= $_SESSION['yanglogin']['pengguna_id'] ?>";
        const chat_penerima = $("#chat_penerima").val();
        response.forEach(r => {
            let tampilan = "";
            if (r.chat_pengirim == chat_pengirim) {
                tampilan = `<div class="bg-success float-end text-white px-3 py-1 text-start mb-3">${r.chat_isi}</div>
          <div style="clear:both;"></div>`;
            } else {
                tampilan = `<div class="bg-primary float-start text-white px-3 py-1 text-start mb-3">${r.chat_isi}</div>
          <div style="clear:both;"></div>`;
            }
            $("#kotak_chat").append(tampilan);
        });
    }

    $(document).ready(function() {
        $("#btn-chatting").click(function(e) {
            $("#kotak_chat").html("");
            const chat_pengirim = "<?= $_SESSION['yanglogin']['pengguna_id'] ?>";
            const chat_penerima = $("#chat_penerima").val();
            $.ajax({
                type: "get",
                url: "./loadPesanSemua.php",
                data: {
                    chat_penerima: chat_penerima,
                    chat_pengirim: chat_pengirim,
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    tampilkanPesan(response);
                }
            });
        });

        $("#btn-kirim").click(function(e) {
            const chat_isi = $("#chat_isi").val();
            // const chat_pengirim = $("#chat_pengirim").val();
            const chat_pengirim = "<?= $_SESSION['yanglogin']['pengguna_id'] ?>";
            const chat_penerima = $("#chat_penerima").val();

            $.ajax({
                type: "post",
                url: "./kirim.php",
                data: {
                    chat_isi: chat_isi,
                    chat_penerima: chat_penerima,
                    chat_pengirim: chat_pengirim,
                },
                dataType: "text",
                success: function(response) {
                    const tampilan = `<div class="bg-success float-end text-white px-3 py-1 text-start mb-3">${chat_isi}</div>
          <div style="clear:both;"></div>`;
                    $("#kotak_chat").append(tampilan);
                }
            });
        });

        setInterval(() => {
            // const chat_pengirim = $("#chat_pengirim").val();
            const chat_pengirim = "<?= $_SESSION['yanglogin']['pengguna_id'] ?>";
            const chat_penerima = $("#chat_penerima").val();
            $.ajax({
                type: "get",
                url: "./loadPesanTerbaru.php",
                data: {
                    chat_penerima: chat_penerima,
                    chat_pengirim: chat_pengirim,
                },
                dataType: "json",
                success: function(response) {
                    tampilkanPesan(response);
                }
            });
        }, 1000);
    });
</script>

<?php
require_once __DIR__ . "/../layout/footer.php";
