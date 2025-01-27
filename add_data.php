<?php  
include 'config.php';
include 'lib/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Form input manual
    if (isset($_POST['addButton'])) {
        $staffID = mysqli_real_escape_string($conn, $_POST['staffID']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $jabatan = mysqli_real_escape_string($conn, $_POST['ay']);
        $division = mysqli_real_escape_string($conn, $_POST['division']);
        $class = mysqli_real_escape_string($conn, $_POST['class']);  // Ambil data kelas

        // Pastikan Anda memasukkan data untuk semua kolom yang ada
        $query = "INSERT INTO staff_selection (staff_id, name, class, status, ay, at) 
                  VALUES ('$staffID', '$name', '$class', 'Accepted', '$jabatan', '$division')";
        if (mysqli_query($conn, $query)) {
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Staff data has been added successfully.',
                    confirmButtonText: 'OK'
                });
            </script>";
        } else {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Failed to add staff data. Please try again.',
                    confirmButtonText: 'OK'
                });
            </script>";
        }
    }

    // Jika ada file CSV yang diunggah
    if (isset($_FILES['fileToUpload'])) {
    $fileTmpName = $_FILES['fileToUpload']['tmp_name'];

    // Memeriksa apakah file yang diunggah adalah CSV
    if (pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION) == 'csv') {
        $handle = fopen($fileTmpName, "r");
        if ($handle !== FALSE) {
            // Melewati header CSV
            fgetcsv($handle);

            // Membaca data CSV
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // Pastikan CSV sesuai urutan kolom
                $staffID = mysqli_real_escape_string($conn, $data[0]);
                $name = mysqli_real_escape_string($conn, $data[1]);
                $jabatan = mysqli_real_escape_string($conn, $data[2]);
                $division = mysqli_real_escape_string($conn, $data[3]);
                $class = mysqli_real_escape_string($conn, $data[4]);

                // Query Insert
                $query = "INSERT INTO staff_selection (staff_id, name, class, status, ay, at) 
                          VALUES ('$staffID', '$name', '$class', 'Accepted', '$jabatan', '$division')";

                if (!mysqli_query($conn, $query)) {
                    echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Failed to add some data. Please check the CSV file.',
                            confirmButtonText: 'OK'
                        });
                    </script>";
                }
            }
            fclose($handle);

            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'File Uploaded!',
                    text: 'Staff data has been imported successfully from the file.',
                    confirmButtonText: 'OK'
                });
            </script>";
        }
        } else {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid File!',
                    text: 'Please upload a valid CSV file.',
                    confirmButtonText: 'OK'
                });
            </script>";
        }
    }
}
?>

<main>
    <div class="container mt-5">
        <div class="card">
            <div class="p-6">
                <h4 class="mb-4 card-title">Add HMST Staff</h4>
                
                <!-- Form untuk Input Data Manual -->
                <form method="POST" class="grid gap-6">
                    <!-- Staff ID -->
                    <div>
                        <label for="staffID" class="inline-block mb-2 text-sm font-medium text-default-800">Staff ID</label>
                        <input type="text" name="staffID" id="staffID" class="w-full form-input" placeholder="Enter Staff ID" required>
                    </div>
                    <!-- Name -->
                    <div>
                        <label for="name" class="inline-block mb-2 text-sm font-medium text-default-800">Name</label>
                        <input type="text" name="name" id="name" class="w-full form-input" placeholder="Enter Name" required>
                    </div>
                    <!-- Jabatan -->
                    <div>
                        <label for="ay" class="inline-block mb-2 text-sm font-medium text-default-800">Jabatan</label>
                        <select name="ay" id="ay" class="w-full form-select" required>
                            <option value="" disabled selected>Select Jabatan</option>
                            <option value="Kepala">Kepala</option>
                            <option value="Staff">Staff</option>
                        </select>
                    </div>
                    <!-- Division -->
                    <div>
                        <label for="division" class="inline-block mb-2 text-sm font-medium text-default-800">Division</label>
                        <select name="division" id="division" class="w-full form-select" required>
                            <option value="" disabled selected>Select Division</option>
                            <option value="Badan Administrasi">Badan Administrasi</option>
                            <option value="Badan Keuangan">Badan Keuangan</option>
                            <option value="Badan Aspirasi dan Pengembangan">Badan Aspirasi dan Pengembangan</option>
                            <option value="Badan Legislasi">Badan Legislasi</option>
                            <option value="Badan Urusan Rumah Tangga">Badan Urusan Rumah Tangga</option>
                            <option value="Komisi I">Komisi I</option>
                            <option value="Komisi II">Komisi II</option>
                            <option value="Komisi III">Komisi III</option>
                            <option value="Komisi IV">Komisi IV</option>
                        </select>
                    </div>
                    <!-- Class -->
                    <div>
                        <label for="class" class="inline-block mb-2 text-sm font-medium text-default-800">Class</label>
                        <input type="text" name="class" id="class" class="w-full form-input" placeholder="Enter Class" required>
                    </div>
                    <!-- Submit Button -->
                    <div>
                        <button class="w-full text-white btn bg-primary" type="submit" name="addButton">Add Staff</button>
                    </div>
                </form>

                <hr class="my-6"><br>
                <!-- Form untuk Mengunggah File CSV -->
                <h4 class="mb-4 card-title">Upload Staff Data (CSV) <small><b><a href="assets/template_data.csv" download>Download template CSV</a></b></small></h4>
                <!-- Link Download Template CSV -->
                <form method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="fileToUpload" class="inline-block mb-2 text-sm font-medium text-default-800">Choose CSV File</label>
                        <input type="file" name="fileToUpload" id="fileToUpload" class="w-full form-input" required>
                    </div>
                    <div>
                        <button class="w-full text-white btn bg-primary" type="submit">Upload File</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include 'lib/footer.php'; ?>
