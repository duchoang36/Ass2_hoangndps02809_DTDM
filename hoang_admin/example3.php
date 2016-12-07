<?php

$array_data = array(
	array(
		'ID' => 1,
		'first_name' => 'Trien',
		'last_name' => 'Ho Ngoc'
	),
	array(
		'ID' => 2,
		'first_name' => 'Binh',
		'last_name' => 'Nguyen Van'
	)
);

// Chèn XTemplate vào dự án
require_once 'xtemplate.class.php';

// Khởi tạo class
$xtpl = new XTemplate( 'example3.html', 'template' );

foreach( $array_data as $array )
{
	// Sử dụng assign, gán giá trị $array cho DATA
	$xtpl->assign( 'DATA', $array );

	// Sử dụng parse để đánh dấu khối chứa giá trị biến $array
	// Cú pháp: Khối ngoài -> khối con, sử dụng dấu chấm
	$xtpl->parse( 'main.loop' );
}

// Sử dụng parse, khai báo khối chứa nội dung này
$xtpl->parse( 'main' );

// In nội dung khôi main ra màn hình
echo $xtpl->text( 'main' );