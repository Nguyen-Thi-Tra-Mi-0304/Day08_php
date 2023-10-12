<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
</head>
<body>
    <?php
    // truy xuất cơ sở dữ liệu 
    // 1.kết nối đến máy chủ 
    $connect_tvc = new mysqli('localhost','root','','k22cnt4_day08');
    // 2.tạo truy vấn đọc dữ liệu từ bảng 
    $sql_tvc = "SELECT * FROM SINHVIEN WHERE 1=1"; 
    // 3.thực thi câu lệnh truy vấn 
    $result_tvc = $connect_tvc->query($sql_tvc); 
    ?>

    <h1>DANH SÁCH SINH VIÊN</h1>
    <hr/>
    <a href="create-sinhvien.php">Thêm mới</a>
    <table width="90%" align="center" border="1px" cellpadding="1" cellspacing="1">
        <thead>
           <tr>
            <th>STT</th>
            <th>MÃ SINH VIÊN</th>
            <th>HỌ SINH VIÊN</th>
            <th>TÊN SINH VIÊN</th>
            <th>NGÀY SINH</th>
            <th>GIỚI TÍNH</th>
            <th>ĐỊA CHỈ</th>
            <th>ĐIỆN THOẠI</th>
            <th>EMAIL</th>
            <th>TRẠNG THÁI</th>
            <th>MÃ KHOA</th>
           </tr>
        </thead>
        <tbody>
            <?php 
            // Duyệt và hiển thị 
            if($result_tvc->num_rows){
                $stt=0; 
                while($row_tvc = $result_tvc->fetch_array()){
                    $stt++;
            ?>
                <tr>
                    <td><?php echo $stt ?></td>
                    <td><?php echo $row_tvc["MASV"] ?></td>
                    <td><?php echo $row_tvc["HOSV"] ?></td>
                    <td><?php echo $row_tvc["TENSV"] ?></td>
                    <td><?php echo $row_tvc["NGAYSINH"] ?></td>
                    <td><?php echo $row_tvc["GIOITINH"] ?></td>
                    <td><?php echo $row_tvc["DIACHI"] ?></td>
                    <td><?php echo $row_tvc["DIENTHOAI"] ?></td>
                    <td><?php echo $row_tvc["EMAIL"] ?></td>
                    <td><?php echo $row_tvc["TRANGTHAI"] ?></td>
                    <td><?php echo $row_tvc["MAKH"] ?></td>
                </tr>
            <?php
                } // end while 
            } else {
            ?>
            <tr>
                <td colspan="10">Chưa có sinh viên nào</td>
            </tr>
            <?php 
            } //end if
            // kết thúc lặp 
            ?>
        </tbody>
    </table>
</body>
</html>