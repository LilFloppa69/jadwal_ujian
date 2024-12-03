<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jadwal UTS</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f5f6fa; /* Light gray background */
    }

    .navbar {
        background-color: #2c6e49; /* Green top bar */
        display: flex;
        justify-content: space-between; /* Space between left and center */
        align-items: center;
        padding: 0.5rem 1rem;
    }

    .navbar-brand {
        font-size: small;
        color: white !important;
        font-weight: 600;
    }

    .navbar-brand span {
        font-size: medium;
        font-weight: 650;
    }

    .semester-info {
        font-size: small;
        color: white;
        font-weight: 600;
        text-align: center;
        margin: 0 auto; /* Center this element */
    }

    .header-text {
        text-align: center;
        margin-top: 1rem;
        font-size: 1.2rem;
        font-weight: 600;
        color: #2c6e49;
    }

    .table {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Add slight shadow */
        overflow: hidden;
    }

    th {
        background-color: #f1f5f9; /* Light gray for table headers */
        text-transform: uppercase;
        font-weight: bold;
        font-size: 0.9rem;
    }

    td {
        font-size: 0.9rem;
        color: #333; /* Darker text */
    }

    h1 {
        color: #2c6e49; /* Match green color for titles */
        font-weight: 600;
    }
  </style>
</head>
<body>
  <!-- Top Bar -->
  <nav class="navbar">
    <img class="navbar-img" ="Logo_Universitas_Sumatera_Utara.svg.png" alt="">
    <a class="navbar-brand" href="https://satu.usu.ac.id/mahasiswa/home"><span>Satu Mahasiswa</span> <br> Universitas Sumatera Utara</a>
    <p class="semester-info">Semester Ganjil T.A. 2024/2025<br><?php echo date('l, d F Y'); ?></p>
  </nav>

  <div class="container mt-5">
    <h1 class="mb-4">Jadwal UTS</h1>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode</th>
          <th>Mata Kuliah</th>
          <th>Kelas</th>
          <th>Luring/Daring</th>
          <th>Ruangan</th>
          <th>Jadwal</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "web";

        // Buat koneksi ke database
        $conn = new mysqli("localhost", "root", "", "web");

        // Cek koneksi
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        // Ambil data dari database
        $sql = "SELECT * FROM jadwal_uts";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          $no = 1;
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $no . "</td>";
            echo "<td>" . $row["kode"] . "</td>";
            echo "<td>" . $row["mata_kuliah"] . "</td>";
            echo "<td>" . $row["kelas"] . "</td>";
            echo "<td>" . $row["luring_daring"] . "</td>";
            echo "<td>" . $row["ruangan"] . "</td>";
            echo "<td>" . $row["jadwal"] . "</td>";
            echo "</tr>";
            $no++;
          }
        } else {
          echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
        }

        $conn->close();
        ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
