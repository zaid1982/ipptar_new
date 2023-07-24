<br/><br/>
<div id="footer" class="dontprint">

<table width="100%" align="center" cellpadding="3" cellspacing="1">
  <tr>
    <td width="15%" align="center"><img src="../images/contactus.png" border="0" width="100" /></td>
    <td width="55%"><b>INSTITUT PENYIARAN DAN PENERANGAN TUN ABDUL RAZAK (IPPTAR)</b><br/>Kementerian Komunikasi dan Multimedia Malaysia,<br/>Peti Surat 12163,<br/>Jalan Pantai Baharu,<br/>59700, Kuala Lumpur.</td>
    <td width="30%">&#9742; 03-22957555<br/>&#9742; 03-22957575 / 03-22824796<br/>&#9993; webmaster[at]ipptar[dot]gov[dot]my</td>
  </tr>
  
  <tr>
    <td colspan="3" align="center"><hr size="1">Hak Cipta Terpelihara &copy; <?php print date(Y); ?> INSTITUT PENYIARAN DAN PENERANGAN TUN ABDUL RAZAK (IPPTAR)<br/>Paparan terbaik menggunakan Firefox 20.0 ke atas dengan resolusi minima 1024 x 768</div></td>
  </tr>
</table>

</div>

</div><!--close container-->

<!-- overlayed element -->
<div class="apple_overlay" id="overlay">
  <!-- the external content is loaded inside this tag -->
  <div class="contentWrap"></div>
</div>

<script>
$(function() {

    // if the function argument is given to overlay,
    // it is assumed to be the onBeforeLoad event listener
    $("a[rel]").overlay({

        mask: 'gray',
        effect: 'apple',

        onBeforeLoad: function() {

            // grab wrapper element inside content
            var wrap = this.getOverlay().find(".contentWrap");

            // load the page specified in the trigger
            wrap.load(this.getTrigger().attr("href"));
        }

    });
});
</script>

<?php include("bottom.php"); ?>