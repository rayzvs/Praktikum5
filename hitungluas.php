<html>
  <head></head>
  <body>
        <?php

          if(!empty($_GET))
		  {
            $nama = $_GET['n'];
            $diameter = $_GET['d'];
            $tinggi = $_GET['t'];

            $luas = pi() * ($diameter / 2) * ($diameter / 2) * $tinggi;
            echo "Luas Tabung " . $nama . " dengan diameter " . $diameter . " dan tinggi " . $tinggi . " adalah " . $luas . " satuan luas";
          }
		  
		  else
		  
		  {
            $namaFile = "data.txt";
            $trigger = ",";
            $myfile = fopen($namaFile, "r") or die("Tidak bisa buka file!");
  
            $result = array();
            while(!feof($myfile))
			{
              $line = fgets($myfile);
              $result[] = explode($trigger,$line);
            }
            
            fclose($myfile);
  
            //table
            echo "<h3>DATA UKURAN TABUNG</h3>";
            echo "<table>";
            echo "<tr>
                    <th>NAMA TABUNG</th>
                    <th>DIAMETER</th>
                    <th>TINGGI</th>
                    <th>LUAS</th>
            </tr>";
            foreach($result as $row){
              $href = "hitungluas.php?n=".$row[0]."&d=".$row[1]."&t=".$row[2];
              echo "<tr>";
                echo "<td>".$row[0]."</td>";
                echo "<td>".$row[1]."</td>";
                echo "<td>".$row[2]."</td>";
                echo "<td><a href='".$href."'>view</a></td>";
              echo "</tr>";
            }
            echo "</table>";
          }
        ?>
  </body>
</html>