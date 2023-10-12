<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới thông tin khoa</title>
</head>
<body>
    <?php
    // xử lý khi người dùng nhấn nút thêm mới 
    $error=''; 
    if(isset($_POST["btnTVCThemMoi"])){
        // 1. Kết nối 
        $connect = new mysqli('localhost', 'root', '', 'k22cnt4_day08');
        // 2. Lấy dữ liệu trên form
        $MAKH = $_POST["MAKH"];
        $TENKHOA = $_POST["TENKHOA"];
        $TRANGTHAI = $_POST["TRANGTHAI"]; 
        // 3. Tạo truy vấn thêm mới (INSERT)
        $sql = "INSERT INTO KHOA(MAKH, TENKHOA, TRANGTHAI) VALUES('$MAKH','$TENKHOA',$TRANGTHAI)";
        //echo $sql; 
        //die();
        // 4. Thực thi câu lệnh truy vấn 
        if($connect->query($sql)){
            header('Location:read-khoa.php');}
        else{
            $error="Lỗi thêm mới, ".$connect->error;
        }
    }
    ?>
    <form action="" method="post" name="frm">
        <h1>Thêm mới thông tin khoa</h1>
        <table border="1px" width="80%" align="center">
            <tbody>
                <tr>
                    <td>Mã khoa</td>
                    <td><input type="text" name="MAKH" id="MAKH"></td>
                </tr>
                <tr>
                    <td>Tên khoa</td>
                    <td><input type="text" name="TENKHOA" id="TENKHOA"></td>
                </tr>
                <tr>
                    <td>Trạng thái </td>
                    <td>
                        <select name="TRANGTHAI" id="TRANGTHAI">
                            <option value="1" selected>Hoạt động</option>
                            <option value="2">Tạm dừng</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Thêm mới" name="btnTVCThemMoi"></td>
                </tr>
            </tbody>
        </table>
        <div><?php echo $error; ?></div>
        <a href="read-khoa.php">Danh sách khoa</a>
    </form>
</body>
</html>