<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách khoa</title>
</head>
<body>
    <?php
        // truy xuất dữ liệu từ cơ sở dữ liệu
        // 1. Kết nối đến máy chủ cơ sở dữ liệu (mysqli)
        $connect = new mysqli('localhost', 'root', '', 'k22cnt4_day08');
        // 2. Tạo truy vấn đọc dữ liệu từ bảng 
        $sql = "SELECT * FROM KHOA WHERE 1=1"; 
        // 3. Thực thi câu lệnh truy vấn 
        $resultSet = $connect->query($sql);
        //print_r($resultSet);
        // 4. Duyệt và hiển thị 
        //while($row=$resultSet->fetch_array()) {
        //    echo "<p> ".$row[0]."---".$row["TENKHOA"]; 
        //}
    ?>

    <h1>DANH SÁCH KHOA</h1>
    <hr/>
    <a href="create-khoa.php">Thêm mới</a>
    <table width="80%" align="center" border="1px">
        <thead>
            <tr>
                <th>STT</th>
                <th>MÃ KHOA</th>
                <th>TÊN KHOA</th>
                <th>TRẠNG THÁI</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $stt=0; 
                while($row = $resultSet->fetch_array()) {
                    $stt++;
            ?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $row["MAKH"]; ?></td>
                    <td><?php echo $row["TENKHOA"]; ?></td>
                    <td><?php echo $row["TRANGTHAI"]; ?></td>
                </tr>
            <?php

                }
            ?>
            
        </tbody>
    </table>
</body>
</html>