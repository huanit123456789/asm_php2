-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 22, 2024 lúc 12:41 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `asm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cauhoi`
--

CREATE TABLE `cauhoi` (
  `id_ch` int(11) NOT NULL,
  `id_db` int(11) NOT NULL,
  `nd_ch` text NOT NULL,
  `da1_ch` text NOT NULL,
  `da2_ch` text NOT NULL,
  `da3_ch` text NOT NULL,
  `da4_ch` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cauhoi`
--

INSERT INTO `cauhoi` (`id_ch`, `id_db`, `nd_ch`, `da1_ch`, `da2_ch`, `da3_ch`, `da4_ch`) VALUES
(1, 1, 'Đâu là câu lệnh in ra màn hình trong ngôn ngữ C++', 'echo a;', 'cin>>a;', 'cout< < a;', 'console.log(a);'),
(2, 2, 'Đâu là câu lệnh in ra màn hình console trong ngôn ngữ Javascript', 'console.log(a);', 'log(a);', 'var a;', 'let a;'),
(3, 1, 'Trong ngôn ngữ lập trình C++, từ khóa nào được sử dụng để khai báo một biến nguyên?', 'int', 'const', 'float', 'char'),
(4, 1, 'Cấu trúc của rẽ nhánh dạng thiếu trong ngôn ngữ lập trình C++ là:', ' if< điều kiện>:\r\n\r\n       < câu lệnh>', 'if< điều kiện>\r\n\r\n       < câu lệnh>', 'if< điều kiện> then:\r\n\r\n       < câu lệnh>', 'if (< điều kiện>) < câu lệnh>;'),
(5, 1, 'Trong cấu trúc rẽ nhánh dạng thiếu câu lệnh < câu lệnh> được thực hiện khi:', 'Điều kiện sai.', 'Điều kiện đúng.', 'Điều kiện bằng 0.', 'Điều kiện khác 0.'),
(6, 1, 'int a = 2;\r\nint b = 5;\r\nint c = 5 * a % b  +  7;\r\ncout << c;', '7', '8', '9', '10'),
(7, 1, 'cout << 56 + 05 << 33 << endl;', '6133', '4598', '3654', '1234'),
(8, 1, 'int result = 4 * 3 % 5 + 2 - (int)3.88;\r\ncout << result << endl;', '1', '5', '3', '2'),
(9, 1, 'int yourAge = 10;\r\n\r\ncout << yourAge++;\r\n\r\ncout << (++yourAge * 3);', '36', '1036', '2236', '1236'),
(10, 1, 'Khai báo một biến integer có tên là myNumber và gán giá trị là 42.', 'int myNumber = 42;', 'var myNumber = 42;', 'char myNumber = 42;', 'float myNumber = 42;'),
(11, 1, 'Viết một vòng lặp for để in ra các số từ 1 đến 5.', 'for (int i = 1; i <= 5; ++i) {\r\n        cout << i << \" \";\r\n    }', 'for (int i = 1; i < 5; ++i) {\r\n        cout << i << \" \";\r\n    }', 'for (int i = 0; i <= 5; ++i) {\r\n        cout << i << \" \";\r\n    }', 'for (int i = 1; i >= 5; ++i) {\r\n        cout << i << \" \";\r\n    }'),
(12, 2, 'Khai báo một biến có tên là myVar và gán giá trị là chuỗi \"Hello, JavaScript!', 'var myVar = \"Hello, JavaScript!\";\r\n', '$myVar = \"Hello, JavaScript!\";', 'myVar = \"Hello, JavaScript!\";', 'string myVar = \"Hello, JavaScript!\";'),
(13, 2, 'Viết một câu lệnh điều kiện để kiểm tra xem một số num có lớn hơn 0 hay không', 'if (num > 0) {\r\n    console.log(\"Số lớn hơn 0.\");\r\n} else {\r\n    console.log(\"Số không lớn hơn 0.\");\r\n}\r\n', 'if (> 0) {\r\n    console.log(\"Số lớn hơn 0.\");\r\n} else {\r\n    console.log(\"Số không lớn hơn 0.\");\r\n}\r\n', 'if ($num > 0) {\r\n    console.log(\"Số lớn hơn 0.\");\r\n} else {\r\n    console.log(\"Số không lớn hơn 0.\");\r\n}\r\n', 'if (number > 0) {\r\n    console.log(\"Số lớn hơn 0.\");\r\n} else {\r\n    console.log(\"Số không lớn hơn 0.\");\r\n}\r\n'),
(14, 2, 'Khai báo một mảng có tên là myArray chứa các số từ 1 đến 5', 'var myArray = [1, 2, 3, 4, 5];\r\n', 'myArray = [1, 2, 3, 4, 5];', '$myArray = [1, 2, 3, 4, 5];', 'int myArray = [1, 2, 3, 4, 5];'),
(15, 2, 'Viết một hàm có tên là multiply nhận vào hai số và trả về tích của chúng', 'function multiply(a, b) {\r\n    console.log (a * b);\r\n}', 'function multiply(a, b) {\r\n    echo a * b;\r\n}', 'function multiply(a, b) {\r\n    return a * b;\r\n}\r\n', 'function multiply(a, b) {\r\n    $temp =  a * b;\r\n}'),
(16, 2, 'Viết một đoạn mã sử dụng sự kiện click để thay đổi màu nền của một phần tử HTML khi được nhấp chuột', 'document.getElementById(\"myElement\").addEventListener(\"change\", function() {\r\n    this.style.backgroundColor = \"red\";\r\n});\r\n', 'document.getElementById(\"myElement\").addEventListener(\"onchange\", function() {\r\n    this.style.backgroundColor = \"red\";\r\n});\r\n', 'document.getElementById(\"myElement\").addEventListener(\"onclick\", function() {\r\n    this.style.backgroundColor = \"red\";\r\n});\r\n', 'document.getElementById(\"myElement\").addEventListener(\"click\", function() {\r\n    this.style.backgroundColor = \"red\";\r\n});\r\n'),
(17, 2, 'Toán tử  ??', 'Nếu vế trái NULL hoặc UNDEFINED thì trả về vế phải', 'Nếu vế phải NULL hoặc UNDEFINED thì trả về vế trái', 'Toán tử logic', 'Toán tử  gán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `id_cv` int(11) NOT NULL,
  `ten_cv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`id_cv`, `ten_cv`) VALUES
(1, 'Quản lý'),
(2, 'Người dùng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dapan`
--

CREATE TABLE `dapan` (
  `id_da` int(11) NOT NULL,
  `id_ch` int(11) NOT NULL,
  `da_da` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dapan`
--

INSERT INTO `dapan` (`id_da`, `id_ch`, `da_da`) VALUES
(1, 1, 3),
(2, 3, 1),
(3, 2, 1),
(4, 4, 4),
(5, 5, 2),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 2),
(10, 10, 1),
(11, 11, 1),
(12, 13, 1),
(13, 14, 1),
(14, 15, 3),
(15, 16, 4),
(16, 17, 1),
(17, 12, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `debai`
--

CREATE TABLE `debai` (
  `id_db` int(11) NOT NULL,
  `ten_db` varchar(255) NOT NULL,
  `anh_db` varchar(255) NOT NULL,
  `mota_db` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `debai`
--

INSERT INTO `debai` (`id_db`, `ten_db`, `anh_db`, `mota_db`) VALUES
(1, 'Quiz C++', './public/image/c++.jpg', 'Luyện tập với bộ câu hỏi lập trình C++ cơ bản'),
(2, 'Quiz Javascript', './public/image/js.jpg', 'Luyện tập với bộ câu hỏi lập trình JS cơ bản'),
(3, 'Quiz PHP', './public/image/php.jpg', 'Luyện tập với bộ câu hỏi lập trình PHP cơ bản'),
(4, 'Quiz SQL', './public/image/sql.jpg', 'Luyện tập với bộ câu hỏi lập trình C++ cơ bản');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_tk` int(11) NOT NULL,
  `ten_tk` varchar(255) NOT NULL,
  `anh_tk` varchar(255) NOT NULL,
  `email_tk` varchar(255) NOT NULL,
  `mk_tk` varchar(255) NOT NULL,
  `id_cv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id_tk`, `ten_tk`, `anh_tk`, `email_tk`, `mk_tk`, `id_cv`) VALUES
(1, 'Duong Van Huan', './public/image/17058208970c3700b0a702785c2113.jpg', 'huandvph43667@fpt.edu.vn', 'Duonghuan2$', 2),
(2, 'admin', './public/image/1705820963Lạc giữa phố thị 4.jpg', 'admin@gmail.com', 'Duonghuan2$', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD PRIMARY KEY (`id_ch`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`id_cv`);

--
-- Chỉ mục cho bảng `dapan`
--
ALTER TABLE `dapan`
  ADD PRIMARY KEY (`id_da`);

--
-- Chỉ mục cho bảng `debai`
--
ALTER TABLE `debai`
  ADD PRIMARY KEY (`id_db`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_tk`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  MODIFY `id_ch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `id_cv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `dapan`
--
ALTER TABLE `dapan`
  MODIFY `id_da` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `debai`
--
ALTER TABLE `debai`
  MODIFY `id_db` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_tk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
