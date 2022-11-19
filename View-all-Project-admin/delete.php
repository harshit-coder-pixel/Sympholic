<?php
    if(isset($_GET['id']))
    {
        require_once '../config/connection.php';
        $id = $_GET['id'];
        $sql = "DELETE FROM project WHERE sno = $id";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            chdir('../ProjectPost/serverData');
            $current_dir=getcwd();
            $path = $current_dir."/PostData_".$id."/";
            deleteDir($path);
            header("Location: ./main.php");

        }
        else
        {
            echo "Error";
        }

    }
    function deleteDir($dirPath) {
        if (! is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }
?>
