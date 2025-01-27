<?php  
include 'config.php';
include 'lib/header.php';

// Ambil NIM dari URL
$staffID = isset($_GET['staffID']) ? mysqli_real_escape_string($conn, $_GET['staffID']) : null;

if ($staffID) {
    // Query ke database untuk mendapatkan data staff
    $query = "SELECT * FROM staff_selection WHERE staff_id = '$staffID'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $isAccepted = $data['status'] == 'Accepted';
        $statusClass = $isAccepted ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700';
        $statusText = $isAccepted 
            ? 'SELAMAT! Kamu lolos menjadi Pengurus Badan Legislatif HMST 2025.'
            : 'Mohon maaf, kamu belum diterima sebagai Pengurus Badan Legislatif HMST 2024.';

        // Alert langsung setelah pengecekan status
        echo '<div class="p-4 mb-4 text-sm text-white ' . ($isAccepted ? 'bg-green-600' : 'bg-red-600') . ' rounded-md" role="alert">
                <span class="font-bold">' . $statusText . '</span> 
              </div>';
    } else {
        // Jika data tidak ditemukan
        echo '<div class="p-4 mb-4 text-sm text-white bg-red-600 rounded-md" role="alert">
                <span class="font-bold">Error:</span> Data Tidak ditemukan.
              </div>';
        exit;
    }
} else {
    // Jika tidak ada NIM di URL
    echo '<div class="p-4 mb-4 text-sm text-white bg-red-600 rounded-md" role="alert">
            <span class="font-bold">Error:</span> Tidak ada Data tersebut dalam database kami.
          </div>';
    exit;
}
?>

<!-- Div Alert untuk Menampilkan Status -->
<div class="flex flex-col gap-6">
    <div class="p-6 bg-white rounded-md shadow-md">
        <?php if ($isAccepted): ?>
            <!-- Jika Accepted -->
            <img src="assets/images/HMST.png" alt="Logo HMST" class="h-16 mx-auto mb-4 text-center">
            <h4 class="mb-4 text-lg font-bold text-center text-red-700">Pengumuman Pengurus</br>Badan Legislatif HMST</h4>
            <table class="w-full mb-4 border border-collapse">
                <tr>
                    <td class="p-3 font-bold text-center border">NIM</td>
                    <td class="p-3 text-center border"><?php echo $data['staff_id']; ?></td>
                </tr>
                <tr>
                    <td class="p-3 font-bold text-center border">Nama</td>
                    <td class="p-3 text-center border"><?php echo $data['name']; ?></td>
                </tr>
                <tr>
                    <td class="p-3 font-bold text-center border">Kelas</td>
                    <td class="p-3 text-center border"><?php echo $data['class']; ?></td>
                </tr>
            </table>
            <table class="w-full mb-4 border border-collapse">
                <tr>
                    <td colspan="2" class="p-3 font-bold text-center border">BADAN LEGISLATIF HMST</td>
                </tr>
                <tr>
                    <td colspan="2" class="p-3 text-center border"><?php echo $data['ay']; ?> <?php echo $data['at']; ?></td>
                </tr>
            </table>
            <div class="p-4 text-center rounded-md <?php echo $statusClass; ?>">
                <span class="font-bold">Selamat! Kamu telah berhasil melewati proses seleksi dan kini menjadi bagian dari Badan Legislatif HMST. Semoga kamu dapat memberikan yang terbaik untuk Badan Legislatif HMST dan terus berkembang!</span>
            </div><br>
            
            <!-- Link WhatsApp -->
            <h4 class="mb-4 text-lg font-bold text-center text-purple-700">Link Komunitas</h4>
            <p class="mb-4 text-sm text-center text-gray-800">Silakan bergabung dengan Komunitas BL HMST di WhatsApp menggunakan link di bawah ini</p>
            <form>
                <div class="flex flex-col items-center gap-4">
                    <a href="MASUKAN-LINK-WA" target="_blank" class="px-6 py-2 text-white bg-green-500 rounded-md hover:bg-green-600">Bergabung ke Komunitas</a>
                    <a href="<?php echo $config['web']['url']; ?>assets/bl.pdf" target="_blank" class="px-6 py-2 text-white bg-purple-600 rounded-md hover:bg-purple-700">Daftar Pengurus BL (PDF)</a>
                </div>
            </form>
            <br>
           <h4 class="mb-4 text-lg font-bold text-center text-blue-700">Daftar <?php echo $data['at']; ?></h4>
            <?php
            // Query untuk mendapatkan Kepala (Ketua) dari divisi
            $divisionQuery = "SELECT * FROM staff_selection WHERE at = '{$data['at']}' AND status = 'Accepted' ORDER BY CASE WHEN ay LIKE 'Kepala%' THEN 1 ELSE 2 END";
            $divisionResult = mysqli_query($conn, $divisionQuery);

            if (mysqli_num_rows($divisionResult) > 0): ?>
                <table class="w-full mb-4 border border-collapse">
                    <thead>
                        <tr>
                            <th class="p-3 font-bold text-center border">Jabatan</th>
                            <th class="p-3 font-bold text-center border">Nama</th>
                            <th class="p-3 font-bold text-center border">Kelas</th>  
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($divisionResult)): ?>
                            <tr>
                                <td class="p-3 text-center border"><?php echo htmlspecialchars($row['ay']); ?></td>
                                <td class="p-3 text-center border"><?php echo htmlspecialchars($row['name']); ?></td>
                                <td class="p-3 text-center border">SISTEL <?php echo htmlspecialchars($row['class']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-center text-gray-700">Tidak ada teman satu divisi yang ditemukan.</p>
            <?php endif; ?>

        <?php else: ?>
            <!-- Jika Rejected -->
            <div class="text-center">
                <img src="assets/images/HMST.png" alt="Logo HMST" class="h-16 mx-auto mb-4">
                <h4 class="mb-4 text-lg font-bold text-red-700">Pengumuman Pengurus</br>Badan Legislatif HMST</h4>
                <table class="w-full mb-4 border border-collapse">
                    <tr>
                        <td class="p-3 font-bold border">NIM</td>
                        <td class="p-3 border"><?php echo $data['staff_id']; ?></td>
                    </tr>
                    <tr>
                        <td class="p-3 font-bold border">Nama</td>
                        <td class="p-3 border"><?php echo $data['name']; ?></td>
                    </tr>
                    <tr>
                        <td class="p-3 font-bold text-center border">Kelas</td>
                        <td class="p-3 text-center border">SISTEL <?php echo $data['class']; ?></td>
                    </tr>
                </table>
                <div class="p-4 text-center text-white bg-purple-600 rounded-md">
                    <span class="font-bold">Tetap Semangat! Kesempatan selalu ada, tinggal bagaimana kita mempersiapkan diri. Jangan berhenti berusaha, jalanmu masih panjang!</span> 
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'lib/footer.php'; ?>
