<html>
    <form action="time.php" method="post">
        Вставьте ссылки:<br>
        <textarea cols="100" rows="20" name="urls"></textarea><br><br>
        <input type=submit value="Узнать даты">
    </form>
</html>

<table>
    <tr>
        <td>
            
                       <?php
$source = $_POST['urls'];
$arrLinks = explode("\n", $source);
foreach ($arrLinks as $i) {
    print $i."<br>";
}

?>
      
        </td>
        <td>
    <?php
function getTimes() {
    $source = $_POST['urls'];
    $arr = explode("\n", $source);
    foreach ($arr as &$i) {
        list($first, $last) = explode(".ru/", $i);
        $i = $last;
        list($first, $last) = explode("\"", $i);
        $i = $first;
    }
    unset($i);
    foreach ($arr as $i) {
        $time_file=filemtime($i);
        $time = date ("d.m.Y", $time_file);
        print $time."<br>";
    }
}

getTimes();
?>
        </td>
    </tr>
</table>







