<?php
header('Access-Control-Allow-Origin: *');
$host = 'localhost';
$username = 'root';
$password = 'marcoreus11';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$req = filter_var($_REQUEST['q'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$context = filter_var($_REQUEST['c'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
if (strcasecmp($context,"country") == 0) {
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$req%'");
} else {
  $stmt = $conn->query("SELECT * FROM cities INNER JOIN countries ON countries.code = cities.country_code WHERE countries.name LIKE '%$req%'");
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php if (strcasecmp($context,"country") == 0):?>
  <table style = 'width: 100%', 'text-align: left'>
    <tr><th>Name</th><th>Continent</th><th>Independence</th><th>Head of State</th></tr>
  <?php foreach ($results as $row): ?>
    <tr><td><?= $row['name'].'</td><td>'.$row['continent'].'</td><td>'.$row['independence_year'].'</td><td>'.$row['head_of_state'];?></td></tr>
  <?php endforeach; ?>
  </table>
<?php else :?>
  <table style = 'width: 100%', 'text-align: left'>
    <tr><th>Name</th><th>District</th><th>Population</th></tr>
  <?php foreach ($results as $row): ?>
    <tr><td><?= $row['name'].'</td><td>'.$row['district'].'</td><td>'.$row['population'];?></td></tr>
  <?php endforeach; ?>
  <?php endif; ?>
  </table>