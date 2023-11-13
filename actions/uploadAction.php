
<?php include "../config/connection.php";

$message = '';
if(isset($_POST["submit"]))
{
    if($_FILES["file"]["name"] != '')
    {
        $array = explode(".", $_FILES["file"]["name"]);
        $extension = end($array);
        if($extension == 'sql')
        {
            $output = '';
            $count = 0;
            $file_data = file($_FILES["file"]["tmp_name"]);
            foreach($file_data as $row)
            {
                $start_character = substr(trim($row), 0, 2);
                if($start_character != '--' || $start_character != '/*' || $start_character != '//' || $row != '')
                {
                    $output = $output . $row;
                    $end_character = substr(trim($row), -1, 1);
                    if($end_character == ';')
                    {
                        if(!mysqli_query($connection, $output))
                        {
                            $count++;
                        }
                        $output = '';
                    }
                }
            }
            if($count > 0)
            {
                $message = '<label class="text-danger">There is an error in Database Import</label>';
                echo $message;
            }
            else
            {

                $message = '<label class="text-success">Database Successfully Imported</label>';
                echo "<script>";
                echo "console.log('Загружено Х записей и Y комментарие')";
                echo "</script>";
                echo $message;

            }
        }
        else
        {
            $message = '<label class="text-danger">Invalid File</label>';
            echo $message;
        }
    }
    else
    {
        $message = '<label class="text-danger">Please Select Sql File</label>';
    }
}
?>
