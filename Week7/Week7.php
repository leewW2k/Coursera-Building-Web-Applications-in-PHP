<?php 
    $prevPin = isset($_GET['md5']) ? $_GET['md5'] : '';
?> 

<title>
    #LEE WEI XIAN# md5 cracker
</title>
<h1>
    #LEE WEI XIAN# md5 cracker
</h1>
<p>
    This application takes an MD5 hash of a four digit pin and check all 10,000 possible four digit PINs to determine the PIN.
</p>
<pre>
Debug Output:
<?php 
    $time_start = microtime(true);
    $finalPin = 'Not found';
    if ($prevPin !== '')
    {
        for($i=0; $i < 10000; $i++){
            if ($i < 15){
                echo hash('md5', sprintf("%04d", $i))." ".sprintf("%04d", $i)."\n";
            }
            $check = hash('md5', sprintf("%04d", $i));
            if ($prevPin === $check){
                $finalPin = $i;
                continue;
            }
        }
    }
    $time_end = microtime(true);
    $elapsed_time = $time_end - $time_start;
    echo "Total checks: ".$i."\n";
    echo "Ellapsed time: ".$elapsed_time;
?>
</pre>

<p>
    PIN: <?= $finalPin ?>
</p>

<form action="http://localhost/Week7/Week7.php" method="GET">
    <input type="text" name="md5" size="40" value="<?= $prevPin ?>">
    <input type="submit" value="Crack MD5">
</form>