<?php
require 'Profileupdate.php';
$_SESSION["id"] = 1; // User's session
$sessionID = $_SESSION["id"];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $sessionID"));
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>AUXILIUM CATHOLIC SCHOOL</title>
        <link rel="stylesheet" href="School Demo.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <form class="form" id="form" action="" enctype="multipart/form-data" method="post">
            <div class="upload">
                <?php
                $id = $user["id"];
                $name = $user["image"];
                $image = $user["image"];
                ?>
                <img src="Images/<?php echo $image; ?>" width="125" height="125" title="<?php echo $image; ?> ">
                <div class="round">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="name" value="<?php echo $name; ?>">
                    <input type="file" name="image" id="image" accept = ".jpg, .jpeg, .jfif, .png">
                    <i class="fa-solid fa-camera-retro" style="color: #ccc;"></i>
                </div>
            </div>
        </form>
        <script type="text/javascript">
            document.getElementById("image").onchange = funcation() {
                document.getElementById("form").submit();
            }
        </script>
        <?php
        if(isset($_FILES["image"]["name"])) {
            $id = $_POST["id"];
            $name = $_POST["name"];

            $imageName = $_FILES["images"]["name"];
            $imageSize = $_FILES["image"]["size"];
            $tmpName = $_FILES["image"]["tmp_name"];

            // Image validation
            $validImageExtension = [".jpg, .jpeg, .jfif, .png"];
            $imageExtension = explode('.',$imageName);
            $imageExtension strtolower(end($imageExtension));
            if(!in_array($imageExtension, $validImageExtension)) {
                echo
                -
                <script>
                alert('Invalid Image Extension');
                document.location.herf = '../updateimageprofile';
                </script>
                -
                ;
            }
            elseif ($imageSize > 1200000) {
                echo
                -
                <script>
                alert('Image Size Is Too Large');
                document.location.herf = '../updateimageprofile';
                </script>
                -
                ;
            }
            else {
                // Generate new Image name
                $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa");
                $newImageName .= " . " . $imageExtension;
                $query = "UPDATE tb-user SET image = '$newImageName' WHERE id= $id";
                mysqli_query($conn,$query);
                move_uploaded_file($tmpName, 'Images/' . $newImageName);
                echo
                -
                <script>
                document.location.herf = '../updateimageprofile';
                </script>
                -
                ;
            }
        }?>
    </body>
</html>