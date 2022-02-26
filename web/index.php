<html>
  <head>
    <meta charset="UTF-8"/>
    <title>Топ 10 най-високи върхове в България</title>
  </head>
  <body>
    <div align="center">
      <h1>Топ 10 най-високи върхове в България</h1>
      <img src="bulgaria-map.png" />

<?php
   require_once ('config.php');

   try {
      $connection = new PDO("mysql:host={$host};dbname={$database};charset=utf8", $user, $password);
      $query = $connection->query("SELECT peak_name, height FROM mountains ORDER BY height DESC");
      $cities = $query->fetchAll();

      if (empty($cities)) {
         echo "<tr><td>Няма данни.</td></tr>\n";
      } else {
         foreach ($cities as $city) {
            print "<tr><td>{$city['peak_name']}</td><td align=\"right\">{$city['height']}</td></tr>\n";
         }
      }
   }
   catch (PDOException $e) {
      print "<tr><td><div align='center'>\n";
      print "Няма връзка към базата. Опитайте отново. <a href=\"#\" onclick=\"document.getElementById('error').style = 'display: block;';\">Детайли</a><br/>\n";
      print "<span id='error' style='display: none;'><small><i>".$e->getMessage()." <a href=\"#\" onclick=\"document.getElementById('error').style = 'display: none;';\">Скрий</a></i></small></span>\n";
      print "</div></td></tr>\n";
   }
?>
      </table>
    </div>
  </body>
</html>
