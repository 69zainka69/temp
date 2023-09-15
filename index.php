
<?php

require_once 'mysql.php';



$sql = "SELECT * FROM `product`";
$res = $dbcnx->query($sql);
    foreach($res as $vi){
        $id = $vi['product_id'];
        $sku = $vi['sku'];
            $product[$id] = $sku;
    }






    $sql = "SELECT * FROM `upload`";
        $res = $dbcnx->query($sql);
            foreach($res as $vi){
                    $filename = $vi['filename'];
                    $name = $vi['name'];
                    $p = $vi['product_id'];
                        $productid = $product[$p];
                        $axaptacode = $vi['model'];

                $filename = 'C:\server\OSPanel\domains\filemanual/upload/'.$filename;
$newfile = 'C:\server\OSPanel\domains\filemanual/uploads/'.$name;

                if (file_exists($filename)) {
                 //   echo "<p>Файл $filename есть</p>";

                    if (!copy($filename, $newfile)) {
                      //  echo "failed to copy $file...\n";
                    }

                    $output[$name]['code1c'] = $productid;
                    $output[$name]['codeax'] = $productid;
                } else {
                    echo "<p>Файл $filename не существует</p>";
                }
            }



            
	
					//	header('Content-Type: application/json');
					//	echo json_encode($output);