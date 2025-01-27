<?php  
include 'config.php';
include 'lib/header.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['checkButton'])) {
    // Ambil input dari form
    $staffID = mysqli_real_escape_string($conn, $_POST['staffID']);

    // Query ke database
    $query = "SELECT * FROM staff_selection WHERE staff_id = '$staffID'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>
            window.location.href = 'detail.php?staffID=$staffID';
        </script>";
        exit; // Hentikan eksekusi kode lebih lanjut
    } else {
        echo '<div class="p-4 mb-4 text-sm text-white bg-red-600 rounded-md" role="alert">
                <span class="font-bold">Error:</span> NIM tersebut tidak terdaftar di Sistem Kami.
              </div>';
    }
}
?>

<div class="p-4 mb-4 text-sm text-white bg-purple-600 rounded-md" role="alert">
    <span class="font-bold">Info:</span> Masukan NIM Anda Untuk Melakukan Pengecekan Hasil Seleksi.
</div>

<div class="flex flex-col gap-6">
    <div class="card">
        <div class="p-6">
            <h4 class="mb-4 card-title">Announcement BL HMST</h4>
            <form method="POST" class="grid gap-6">
                <!-- Staff ID Input -->
                <div>
                    <label for="staffID" class="inline-block mb-2 text-sm font-medium text-default-800">NIM</label>
                    <input type="number" name="staffID" id="staffID" class="w-full form-input" placeholder="Enter Your NIM" required>
                </div>
                <!-- Submit Button -->
                <div>
                    <button class="w-full text-white btn bg-primary" type="submit" name="checkButton">Submit Form</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'lib/footer.php'; ?>
