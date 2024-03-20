<?php

$error_message ??= 'Đã có lỗi xảy ra';
$error = "<p class=\"error text-center mt-3\" >$error_message";
$error .= isset($reason) ? " vì:<br>$reason</p>" : "</p>";
$error .= isset($sql) ? "<p>Câu truy vấn là: {$sql}</p>" : '';
echo $error;
