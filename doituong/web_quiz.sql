-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 19, 2024 lúc 04:14 PM
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
-- Cơ sở dữ liệu: `web_quiz`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cauhoi`
--

CREATE TABLE `cauhoi` (
  `id_ch` int(11) NOT NULL,
  `nd_ch` text NOT NULL,
  `da1_ch` text NOT NULL,
  `da2_ch` text NOT NULL,
  `da3_ch` text NOT NULL,
  `da4_ch` text NOT NULL,
  `id_quiz` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cauhoi`
--

INSERT INTO `cauhoi` (`id_ch`, `nd_ch`, `da1_ch`, `da2_ch`, `da3_ch`, `da4_ch`, `id_quiz`) VALUES
(1, 'Đâu là câu lệnh in ra màn hình trong ngôn ngữ C++', 'echo a;', 'cin>>a;', 'cout< < a;', 'console.log(a);', 1),
(2, 'Trong ngôn ngữ lập trình C++, từ khóa nào được sử dụng để khai báo một biến nguyên?', 'int', 'const', 'float', 'char', 1),
(3, 'Cấu trúc của rẽ nhánh dạng thiếu trong ngôn ngữ lập trình C++ là:', ' if< điều kiện>:\r\n\r\n       < câu lệnh>', 'if< điều kiện>\r\n\r\n       < câu lệnh>', 'if< điều kiện> then:\r\n\r\n       < câu lệnh>', 'if (< điều kiện>) < câu lệnh>;', 1),
(4, 'Trong cấu trúc rẽ nhánh dạng thiếu câu lệnh < câu lệnh> được thực hiện khi:', 'Điều kiện sai.', 'Điều kiện đúng.', 'Điều kiện bằng 0.', 'Điều kiện khác 0.', 1),
(5, 'int a = 2;\r\nint b = 5;\r\nint c = 5 * a % b  +  7;\r\ncout << c;', '7', '8', '9', '10', 1),
(6, 'cout << 56 + 05 << 33 << endl;', '6133', '4598', '3654', '1234', 1),
(7, 'int result = 4 * 3 % 5 + 2 - (int)3.88;\r\ncout << result << endl;', '1', '5', '3', '2', 1),
(8, 'int yourAge = 10;\r\n\r\ncout << yourAge++;\r\n\r\ncout << (++yourAge * 3);', '36', '1036', '2236', '1236', 1),
(9, 'Khai báo một biến integer có tên là myNumber và gán giá trị là 42.', 'int myNumber = 42;', 'var myNumber = 42;', 'char myNumber = 42;', 'float myNumber = 42;', 1),
(10, 'Viết một vòng lặp for để in ra các số từ 1 đến 5.', 'for (int i = 1; i <= 5; ++i) {\r\n        cout << i << \" \";\r\n    }', 'for (int i = 1; i < 5; ++i) {\r\n        cout << i << \" \";\r\n    }', 'for (int i = 0; i <= 5; ++i) {\r\n        cout << i << \" \";\r\n    }', 'for (int i = 1; i >= 5; ++i) {\r\n        cout << i << \" \";\r\n    }', 1),
(11, 'Đâu là câu lệnh in ra màn hình console trong ngôn ngữ Javascript', 'console.log(a);', 'log(a);', 'var a;', 'let a;', 2),
(12, 'Khai báo một biến có tên là myVar và gán giá trị là chuỗi \"Hello, JavaScript!', 'var myVar = \"Hello, JavaScript!\";\r\n', '$myVar = \"Hello, JavaScript!\";', 'myVar = \"Hello, JavaScript!\";', 'string myVar = \"Hello, JavaScript!\";', 2),
(13, 'Viết một câu lệnh điều kiện để kiểm tra xem một số num có lớn hơn 0 hay không', 'if (num > 0) {\r\n    console.log(\"Số lớn hơn 0.\");\r\n} else {\r\n    console.log(\"Số không lớn hơn 0.\");\r\n}\r\n', 'if (> 0) {\r\n    console.log(\"Số lớn hơn 0.\");\r\n} else {\r\n    console.log(\"Số không lớn hơn 0.\");\r\n}\r\n', 'if ($num > 0) {\r\n    console.log(\"Số lớn hơn 0.\");\r\n} else {\r\n    console.log(\"Số không lớn hơn 0.\");\r\n}\r\n', 'if (number > 0) {\r\n    console.log(\"Số lớn hơn 0.\");\r\n} else {\r\n    console.log(\"Số không lớn hơn 0.\");\r\n}\r\n', 2),
(14, 'Khai báo một mảng có tên là myArray chứa các số từ 1 đến 5', 'var myArray = [1, 2, 3, 4, 5];\r\n', 'myArray = [1, 2, 3, 4, 5];', '$myArray = [1, 2, 3, 4, 5];', 'int myArray = [1, 2, 3, 4, 5];', 2),
(15, 'Viết một hàm có tên là multiply nhận vào hai số và trả về tích của chúng', 'function multiply(a, b) {\r\n    console.log (a * b);\r\n}', 'function multiply(a, b) {\r\n    echo a * b;\r\n}', 'function multiply(a, b) {\r\n    return a * b;\r\n}\r\n', 'function multiply(a, b) {\r\n    $temp =  a * b;\r\n}', 2),
(16, 'Viết một đoạn mã sử dụng sự kiện click để thay đổi màu nền của một phần tử HTML khi được nhấp chuột', 'document.getElementById(\"myElement\").addEventListener(\"change\", function() {\r\n    this.style.backgroundColor = \"red\";\r\n});\r\n', 'document.getElementById(\"myElement\").addEventListener(\"onchange\", function() {\r\n    this.style.backgroundColor = \"red\";\r\n});\r\n', 'document.getElementById(\"myElement\").addEventListener(\"onclick\", function() {\r\n    this.style.backgroundColor = \"red\";\r\n});\r\n', 'document.getElementById(\"myElement\").addEventListener(\"click\", function() {\r\n    this.style.backgroundColor = \"red\";\r\n});\r\n', 2),
(17, 'Toán tử  ??', 'Nếu vế trái NULL hoặc UNDEFINED thì trả về vế phải', 'Nếu vế phải NULL hoặc UNDEFINED thì trả về vế trái', 'Toán tử logic', 'Toán tử  gán', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dapan`
--

CREATE TABLE `dapan` (
  `id_da` int(11) NOT NULL,
  `id_ch` int(11) NOT NULL,
  `da_da` enum('1','2','3','4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dapan`
--

INSERT INTO `dapan` (`id_da`, `id_ch`, `da_da`) VALUES
(1, 1, '3'),
(2, 2, '1'),
(3, 3, '2'),
(4, 4, '2'),
(5, 5, '1'),
(6, 6, '1'),
(7, 7, '1'),
(8, 8, '1'),
(9, 9, '1'),
(10, 10, '1'),
(11, 11, '1'),
(12, 12, '1'),
(13, 14, '1'),
(14, 15, '1'),
(15, 16, '1'),
(16, 17, '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quiz`
--

CREATE TABLE `quiz` (
  `id_quiz` int(11) NOT NULL,
  `ten_quiz` varchar(250) NOT NULL,
  `mota_quiz` text NOT NULL,
  `anh_quiz` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quiz`
--

INSERT INTO `quiz` (`id_quiz`, `ten_quiz`, `mota_quiz`, `anh_quiz`) VALUES
(1, 'Quiz C++', 'Luyện tập với bộ câu hỏi lập trình C++ cơ bản', 'public/images/c++.jpg'),
(2, 'Quiz Javascript', 'Luyện tập với bộ câu hỏi lập trình JS cơ bản', 'public/images/js.jpg'),
(3, 'Quiz PHP', 'Luyện tập với bộ câu hỏi lập trình PHP cơ bản', 'public/images/php.jpg'),
(4, 'Quiz SQL', 'Luyện tập với bộ câu hỏi lập trình C++ cơ bản', 'public/images/sql.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_tk` int(11) NOT NULL,
  `ten_tk` varchar(250) NOT NULL,
  `anh_tk` varchar(250) NOT NULL,
  `email_tk` varchar(250) NOT NULL,
  `matkhau_tk` varchar(250) NOT NULL,
  `id_cv` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id_tk`, `ten_tk`, `anh_tk`, `email_tk`, `matkhau_tk`, `id_cv`) VALUES
(1, 'admin', 'public/images/17082306630c3700b0a702785c2113.jpg', 'admin@gmail.com', 'Duonghuan2$', '1'),
(2, 'Khach Hangaaaaa', 'public/images/1708224153eba6ee90d6337f6d2622.jpg', 'khachhang@gmail.com', 'Duonghuan2$', '2'),
(20, 'Duong huan', 'public/images/17083063930c3700b0a702785c2113.jpg', 'huandvph43667@fpt.edu.vn', 'Duonghuan2$', '2');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD PRIMARY KEY (`id_ch`);

--
-- Chỉ mục cho bảng `dapan`
--
ALTER TABLE `dapan`
  ADD PRIMARY KEY (`id_da`),
  ADD UNIQUE KEY `id_ch` (`id_ch`);

--
-- Chỉ mục cho bảng `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id_quiz`);

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
-- AUTO_INCREMENT cho bảng `dapan`
--
ALTER TABLE `dapan`
  MODIFY `id_da` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id_quiz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_tk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
