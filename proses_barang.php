<?php
include 'config.php';

session_start();

$userId = $_SESSION["user_id"];

if (isset($_POST['simpan'])) {
    $namabarang = $_POST["nama"];
    $namapenyedia = $_POST["nama"];
    $penyediaid = $_POST["penyedia_id"];

        $query = "INSERT INTO barang (nama, nama, penyedia_id) values ('$namabarang', '$namapenyedia', '$penyediaid')";
        if ($conn->query($query) === TRUE) {
            $_SESSION['notification'] = [
                'type' => 'primary',
                'message' => 'Post Succesfully added.'

            ];
        } else {
            $_SESSION['notification'] = [
                'type' => 'danger',
                'message' => 'Error adding post: ' . $conn->error 
            ];
        }

    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Failed to upload image.'
        ];
    }

    header('Location: dashboard.php');
    exit();
}

if (isset($_POST['delete'])) {
    $postID = $_POST['postID'];

    $exec = mysqli_query($conn, "DELETE FROM barang WHERE barang_id='$postID'");

    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Post succesfully deleted.'
        ];

    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Error deleting post: ' . mysqli_error($conn)
        ];
    }
    header('Location: dashboard.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $postId = $_POST['post_id'];
    $postTitle = $_POST['post_title'];
    $content = $_POST['content'];
    $categoryId = $_POST['category_id'];
    $imageDir = "$assets/img/uploads/";

    if (!empty($_FILES["image_path"]["name"])) {
        $imageName = $_FILES["image_path"]["name"];
        $imagePath = $imageDir . $imageName;

        move_uploaded_file($_FILES["image_path"]["tmp_name"], $imagePath);
        
        $queryOldImage = "SELECT image_path FROM posts WHERE id_post = $postId";
        $resultOldImage = $conn->query($queryOldImage);
        if ($resultOldImage->num_rows > 0) {
            $oldImage = $resultOldImage->fetch_assoc()['image_path'];
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
        }
    } else {
        $imagePathQuery = "SELECT image_path FROM posts WHERE id_post = $postId";
        $result = $conn->query($imagePathQuery);
        $imagePath = ($result->num_rows > 0) ? $result->fetch_assoc()
        ['imagePath'] : null;
    }

    $queryUpdate = "UPDATE posts SET post_title = '$postTitle',
    content = '$content', category_id = $categoryId, image_path = '$imagePath'
    WHERE id_post = $postId";

    if ($conn->query($queryUpdate) === TRUE) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Postingan berhasil diperbarui.'        
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal memperbarui postingan.'
        ];
    }
    header('Location: dashboard.php');
    exit();
}


    


