<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <link rel="shortcut icon" href="data/favicon.ico">
  <title>Lupa Kata Laluan</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/subModal.css" />
  <script type="text/javascript" src="css/subModal.js"></script>
</head>

<body>
  <div id="container2">
    <?php
    include("conn.php");

    if (isset($_POST['submit'])) {

      if ($_POST['pwd'] == $_POST['pwd2']) {

        /* $select = "SELECT u_idnum
        FROM user
        WHERE u_idnum = '$_POST[idnum]'
        ORDER BY u_id ASC
        ";
        $result = mysql_query($select) or die("Query failed");
        $row = mysql_fetch_assoc($result); */

        // add parameterized query
        $rowCount = sqlSelect(
          'SELECT count(u_idnum) AS total FROM user WHERE u_idnum = ? ORDER BY u_id ASC', 
          array($_POST['idnum'])
        );
        $result = sqlSelect(
          'SELECT u_idnum FROM user WHERE u_idnum = ? ORDER BY u_id ASC', 
          array($_POST['idnum'])
        );

        // if (mysql_num_rows($result) == 1) {
        if ($rowCount['total'] == 1) {

          //$new_pwd = md5($_POST['pwd']);
          $new_pwd = $_POST['pwd'];
          $passwordmd5 = md5($new_pwd);

          /* $sql = "UPDATE user SET u_status = '1', u_pwd = '$passwordmd5' WHERE u_idnum = '$_POST[idnum]'";
          $result = mysql_query($sql) or die(mysql_error()); */

          // add parameterized query
          $result = sqlUpdate(
            'UPDATE user SET u_status = ?, u_pwd = ? WHERE u_idnum = ?', 
            array('1', $passwordmd5, $_POST['idnum'])
          );

          $_SESSION['alert']    = "Kata laluan baru telah disimpan.";
          $_SESSION['redirek']  = "index.php";
          $_SESSION['toplus']   = "";
          $pageTitle = 'Lupa Kata Laluan';
          include("kosong.php");
          exit;
        } else {

          $_SESSION['alert']    = "Emel tidak wujud. Sila hubungi Webmaster.";
          $_SESSION['redirek']  = "index.php";
          $_SESSION['toplus']   = "";
          $pageTitle = 'Lupa Kata Laluan';
          include("kosong.php");
          exit;
        }
      } else {
      }
    } else {

      #SQL Injection fix
      $id = addslashes($_GET["id"]);
      if (strlen($id) > 12) {
        exit;
      }
      $id = $id;
    }
    ?>
    <div id="content">
      <form id="form1" name="form1" method="post" action="">
        <table align="center" width="90%" border="0" cellpadding="0" cellspacing="7">
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="center" style="font-weight:bold">LUPA KATA LALUAN</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="center">Masukkan Kata Laluan Baru :<br><input type='text' name='pwd' size='25'></td>
          </tr>
          <tr>
            <td align="center">Masukkan Semula Kata Laluan Baru :<br><input type='text' name='pwd2' size='25'></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="center">
              <input type="hidden" name="idnum" value="<?php print $id; ?>">
              <input type="submit" name="submit" id="submit" value="  HANTAR  ">
              <input type="button" name="button2" id="button2" value="  BATAL  " onclick="window.parent.location.reload();window.close()">
            </td>
          </tr>
        </table>
      </form>
    </div><!--close content-->